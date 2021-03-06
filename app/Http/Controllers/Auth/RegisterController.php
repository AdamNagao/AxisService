<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role']==1){

            return Validator::make($data, [
                'first' => 'required|string|max:255',
                'last' => 'required|string|max:255',
                'address'=>'required|string|max:255',
                'city'=>'required|string|max:255',
                'state'=>'required|string|max:255',
                'phonenumber'=>'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'max:3',
                'rating'=> 'max:5',
                'numOfRating'=> 'integer',
                'licenseNum' =>'required',
                'insuranceNum' =>'required',
                'liabilityNum' =>'required',
            ]);


        } else {
            return Validator::make($data, [
                'first' => 'required|string|max:255',
                'last' => 'required|string|max:255',
                'address'=>'required|string|max:255',
                'city'=>'required|string|max:255',
                'state'=>'required|string|max:255',
                'phonenumber'=>'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'max:3',
                'rating'=> 'max:5',
                'numOfRating'=> 'integer',
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if($data['role']==1){
            return User::create([
                'first' => $data['first'],
                'last' => $data['last'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'phonenumber' => $data['phonenumber'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
                'licenseNum' => $data['licenseNum'],
                'insuranceNum' => $data['insuranceNum'],
                'liabilityNum' => $data['liabilityNum'],
            ]);
        } else {
            return User::create([
                'first' => $data['first'],
                'last' => $data['last'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'phonenumber' => $data['phonenumber'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
            ]);
        }
    }
}
