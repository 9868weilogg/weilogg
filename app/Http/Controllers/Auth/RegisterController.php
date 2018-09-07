<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\gateready\GatereadyUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\RegistersGatereadyUsers;

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

    //  original register user trait
    use RegistersUsers;
    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**-----------------------------------
    --------------------
    --------------------   dishmotion.com   ------------------
    --------------------
    --------------------
    -------------------------------------**/

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /**-----------------------------------
    --------------------
    --------------------   gateready.com   ------------------
    --------------------
    --------------------
    -------------------------------------**/
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function gateready_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'agree' => 'accepted'
        ]);
    }

    /**
     * Create a new gateready user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function gateready_create(array $data)
    {
        return GatereadyUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //  hardcode for testing input database, because database set these as not null
            'id' => '1234',
            'facebook_id' => '1234',
            'first_time' => '1',
            'transaction_quantity' => '1234',
            'invite_code' => '1234',
            'location_id' => '1234',
            'contact_number' => '1234',
            'gender_id' => '1234',
        ]);
    }

}
