<?php

namespace App\Http\Controllers;

use App\models\company;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\RegistrationHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register.company');
    }

    protected function validator(array $data)
    {
        $data =  Validator::make($data, [

            'phone'         => ['required', 'string', 'mobile_number','min:9', 'max:10', 'unique:users'],
            
            'email'         => [ 'required', 'string', 'email', 'max:191', 'unique:users'],
            
            'password'      => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            
            'name'          => ['bail', 'required', 'string', 'name', 'min:2', 'max:191'],

            'location'      => ['bail', 'required', 'string', 'min:2', 'max:191'],

            'terms'         => ['required'],
            
        ]);
        return $data;
    }

    protected function create($request)
    {
        $request = array_merge($request, [
            'role_id' => 3,
            'online' => 1,
            'last_login_ip' => request()->ip(),
            'last_login_device_info' => request()->server('HTTP_USER_AGENT'),
        ]);

        $request['phone'] = \App\RegistrationHelper::fix_mobile_number($request['phone']);

        $request['password'] = Hash::make($request['password']);

        $user =  User::create($request);

        $personalData = array();
        $personalData['name'] = $request['name'];
        $personalData['location'] = $request['location'];

        $personal = company::create($personalData);
   
        return $user;
    }
}
