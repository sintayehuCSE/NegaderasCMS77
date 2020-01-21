<?php

namespace App\Http\Controllers;

use App\models\tracker;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\RegistrationHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrackerController extends Controller
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
        return view('auth.register.track');
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
            'role_id' => 5,
            'online' => 1,
            'last_login_ip' => request()->ip(),
            'last_login_device_info' => request()->server('HTTP_USER_AGENT'),
        ]);

        $request['phone'] = \App\RegistrationHelper::fix_mobile_number($request['phone']);

        $request['password'] = Hash::make($request['password']);

        $user =  User::create($request);

        $personalData = array();
        $personalData['name'] = $request['name'];

        $personal = tracker::create($personalData);
   
        return $user;
    }
}
