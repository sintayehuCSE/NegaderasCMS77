<?php

namespace App\Http\Controllers;

use App\models\bus;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\RegistrationHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusController extends Controller
{
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
        return view('auth.register.bus');
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

            'phone'         => ['bail', 'required', 'string', 'mobile_number','min:9', 'max:10', 'unique:users'],
            
            'email'         => ['bail', 'required', 'string', 'email', 'max:191', 'unique:users'],
            
            'password'      => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            
            'name'          => ['bail', 'required', 'string', 'name', 'min:2', 'max:191', 'unique:buses'],

            'number'        => ['bail', 'required', 'string', 'min:2', 'max:191'],

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
            'role_id' => 2,
            'online' => 1,
            'last_login_ip' => request()->ip(),
            'last_login_device_info' => request()->server('HTTP_USER_AGENT'),
        ]);

        $request['phone'] = \App\RegistrationHelper::fix_mobile_number($request['phone']);

        $request['password'] = Hash::make($request['password']);

        $user =  User::create($request);

        $personalData = array();
        $personalData['name'] = $request['name'];
        $personalData['number'] = $request['number'];
        $personalData['user_id'] = $user->id;
        
        $personal = bus::create($personalData);

        return $user;
    }
}
