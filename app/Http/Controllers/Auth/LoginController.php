<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\dishmotion\Order;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
       logout weilogg.com
    **/
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/');
    }


    /**-----------------------------------
    --------------------
    --------------------   dishmotion.com   ------------------
    --------------------
    --------------------
    -------------------------------------**/


     /**  show dishmotion login admin page  **/
    public function show_dishmotion_admin_login()
    {
        return view('/dishmotion/admin/login-admin');
    }

     /**  process dishmotion login admin  **/
    public function post_dishmotion_admin_login()
    {
        //validate login input
        $rules = array (
            'email' => 'required',
            'password' => 'required'
        );

        //  run validation rules on the inputs from the form
        $validator = Validator::make(Input::all(),$rules);

        //  if validator fails, redirect back to the form
        if ($validator->fails())
        {
            // return Redirect::to('/admin/login_admin')->withErrors($validator);
            echo "Validator Error";
        }
        else
        {
            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            //  attempt to do the login
            if(Auth::attempt($userdata))
            {
                //  testing is the page run
                //  echo "success";
                return Redirect::to('/dishmotion/admin');
            }
            else
            {
                // validation fail
                return Redirect::to('/dishmotion/login-admin');
            }
        }
    }


    /**
       logout dishmotion
    **/
    public function dishmotion_logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/dishmotion');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','dishmotion_logout','gateready_logout');
    }

    /**-----------------------------------
    --------------------
    --------------------   gateready.com   ------------------
    --------------------
    --------------------
    -------------------------------------**/

    /**  show dishmotion login admin page  **/
    public function show_gateready_login()
    {
        return view('/gateready/login');
    }

     /**
       logout gateready
    **/
    public function gateready_logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/gateready');
    }

     /**  process gateready login admin  **/
    public function post_gateready_login()
    {
        //validate login input
        $rules = array (
            'email' => 'required',
            'password' => 'required'
        );

        //  run validation rules on the inputs from the form
        $validator = Validator::make(Input::all(),$rules);

        //  if validator fails, redirect back to the form
        if ($validator->fails())
        {
            // return Redirect::to('/admin/login_admin')->withErrors($validator);
            echo "Validator Error";
        }
        else
        {
            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            //  attempt to do the login
            if(Auth::attempt($userdata))
            {
                //  testing is the page run
                //  echo "success";
                return Redirect::to('/gateready');
            }
            else
            {
                // validation fail
                return Redirect::to('/gateready/login');
            }
        }
    }
    
}
