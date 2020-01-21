<?php

namespace App\Http\Controllers;

use App\travel_agency;
use App\models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\RegistrationHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TravelAgencyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form/ Override the default method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register.travel');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data =  Validator::make($data, [

            'phone'         => ['required', 'string', 'mobile_number','min:9', 'max:10', 'unique:users'],
            
            'email'         => [ 'required', 'string', 'email', 'max:191', 'unique:users'],
            
            'password'      => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            
            'name'          => ['bail', 'required', 'string', 'name', 'min:2', 'max:191'],

            'location'      => ['bail', 'required', 'string', 'min:2', 'max:191'],

            'number'        => ['bail', 'required', 'integer', 'min:2', 'max:191'],

            'terms'         => ['required'],
            
        ]);
        return $data;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($request)
    {
        $request = array_merge($request, [
            'role_id' => 6,
            'online' => 1,
            'last_login_ip' => request()->ip(),
            'last_login_device_info' => request()->server('HTTP_USER_AGENT'),
        ]);

        $request['phone'] = \App\RegistrationHelper::fix_mobile_number($request['phone']);

        $request['password'] = Hash::make($request['password']);

        $user =  User::create($request);

        //$settings = '{"notifications":{"send_payment":false,"receive_payment":false,"announcements":true,"have_a_problem_with_payment":true,"service_payment":true,"special_offers":true,"new_events":true,"bill_payment_period_reached":true},"securities":{"when_login_in":false,"logged_in_with_different_device":true,"two_step_verification":false},"language":"English (United States)","time_zone":"(GMT-06:00) East Africa"}';

        $personalData = array();
        $personalData['name'] = $request['name'];
        $personalData['location'] = $request['location'];
        $personalData['number'] = $request['number'];

        $personal = travel_agency::create($personalData);
   
        return $user;
    }
}
