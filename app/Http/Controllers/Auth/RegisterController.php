<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Hash;
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
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function createCustomer(Request $request)
    {
        $valid=Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'mobile' => 'required|digits:10',
            'modal' =>'required',
        ]);
      
        if($valid->failed()){
        return redirect()->back()->withInput($request->all())->withErrors($valid->errors()->add('modal', $request['modal']));
        }
        else{
            $last = Customer::orderBy('created_at', 'desc')->first();
            $start = (empty($last)) ? 0 : substr($last['customer_id'], 2);
            $nextid = $start + 1;
            $user_id = 'KC'.str_pad($nextid, 4, '0', STR_PAD_LEFT);           
        $customer = Customer::create([
            'customer_id'=>$user_id,
            'firstname' => $request['first_name'],
            'lastname' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'mobile' => $request['mobile'],
        ]);
        return redirect()->back();
       }
    }
}
