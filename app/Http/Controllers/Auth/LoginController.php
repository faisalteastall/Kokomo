<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Cart;
use App\Sessioncart;
use Session;
use Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest:customer')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function adminloginForm()
    {
        return view('adminAuth.login');
    }

    public function customerLogin(Request $request)
    {
       //  $this->validate($request,[
       //      'email'   => 'required|email',
       //      'password' => 'required|min:6',
       //      'modal' =>'required'

       // ]);
       $validator=Validator::make($request->all(), [
            'email'   => 'required|email',
            'password' => 'required|min:6',
            'modal' =>'required'

       ]);
        if($validator->fails())
        {
          return back()->withInput($request->only('email','password','modal'))->withErrors($validator->errors()->add('modal', 'loggedin')); 
        }
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) { 

              $this->updateCartSession();            
              

             return redirect()->back();
        }
        else
        {
           return back()->withInput($request->only('email','password','modal'))->withErrors(["password"=>"Invalid Credintials","modal"=>"loggedin"]); 
        }
       
    }
    public function updateCartSession()
    {
         $customer_id = Auth::guard('customer')->user()->id;
         $cart        = Session::has('cart')? Session::get('cart'):null;       
         $store_cart  = Cart::where('customer_id',$customer_id)->first();         
            if($cart!=''){
                if($store_cart==''){
                     Cart::create([
                        'customer_id'=>$customer_id,
                        'data'=>json_encode($cart)
                      ]);                     
                 }
                 else{ 
                     $store_carts        = Cart::where('customer_id',$customer_id)->first();
                     $store_cart_array   = json_decode($store_carts['data'],true);
                     $scart              = new Sessioncart($cart);
                     $scart->items       = $scart->items+$store_cart_array['items'];
                     $scart->totalQty    += $store_cart_array['totalQty'];
                     $scart->totalPrice  += $store_cart_array['totalPrice'];
                    
                     //$scart              = new Sessioncart($cart);
                     // $scart->add($store_cart_array['items'],$request->size,$product['prdct_id'],(int)$request->qty,(float)$request->price);
                     // $scart->items       = $store_cart_array['items'];
                     // $scart->totalQty    = $store_cart_array['totalQty'];
                     // $scart->totalPrice  = $store_cart_array['totalPrice'];                 
                    Cart::where('customer_id',$customer_id)->update([
                        'data'=>json_encode($scart)
                      ]);
                      
                    Session::forget('cart');
                    Session::regenerate();
                    Session::put('cart', $scart);                    

                 }
            }
            elseif($store_cart!=='')
            {
                Session::forget('cart');
                Session::regenerate();          
                $store_carts        = Cart::where('customer_id',$customer_id)->first();
                $store_cart_array   = json_decode($store_carts['data'],true);
                $scart              = new Sessioncart(null); 
                $scart->items       = $store_cart_array['items'];
                $scart->totalQty    = $store_cart_array['totalQty'];
                $scart->totalPrice  = $store_cart_array['totalPrice']; 
                Session::put('cart', $scart); 
            }
            
                
        // return $scart;  
    }
    public function adminlogin(Request $request)
    {
        $this->validate($request,[
            'email'   => 'required|email',
            'password' => 'required|min:6',            

       ]);
       
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

             return redirect()->intended('admin/');
        }
        else
        {
           return back()->withInput($request->only('email','password'))->withErrors(["password"=>"Invalid Credintials"]); 
        }
       
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('admin/login');
    }

    public function customerLogout(Request $request)
    {   
       
        Session::forget('cart');
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

        public function redirect() {          
            return Socialite::driver('google')->redirect();
        }
        public function redirectToFacebook() {           
            return Socialite::driver('facebook')->redirect();
        }
        public function callback(Request $req) {  
        // echo Session::get('link');
        // die();         
            $googleUser = Socialite::driver('google')->stateless()->user();
            $googleUser=$googleUser->user;
            echo "<pre>";
            print_r($googleUser);
            die();
            
            // try {
            //     // $googleUser = Socialite::driver('google')->user();
            //     $existUser = Customer::where('email',$googleUser['email'])->first();
            // //     echo "<pre>";
            // // print_r($existUser);
            // // exit();
            //     $token = bin2hex(openssl_random_pseudo_bytes(12));
            //     if($existUser) {
            //         //echo "<pre>"; print_r($existUser); exit ; 
            //         ///Auth::loginUsingId($existUser->id);
            //         $data = array(
            //             'access_token'=>$token,
            //             'login_time'=>date('Y-m-d h:i:s')              
            //         );
            //         Session::put('user_name', $existUser->firstname);
            //         Session::put('user_id', $existUser->user_id);
            //         Session::put('access_token', $token);
            //         Session::save();
            //         $updatetoken = Customer::where('email', $googleUser->email)->update($data);
            //     } else { 
            //         $last = Customer::orderBy('created_at', 'desc')->first();
            //         $start = (empty($last)) ? 0 : substr($last['user_id'], 2);
            //         $nextid = $start + 1;
            //         $user_id = 'SU'.str_pad($nextid, 4, '0', STR_PAD_LEFT);
            //         // $user = new Customer;
            //         // $user->firstname = $googleUser->name;
            //         // $user->email = $googleUser->email;
            //         // $user->google_id = $googleUser->id;
            //         // $user->password = md5(rand(1,10000));
            //         // $user->save();
            //         //Auth::loginUsingId($user->id);
            //         Customer::create([
            //             'firstname'     => $googleUser['name'],
            //             'lastname'      => '',
            //             'email'         => $googleUser['email'],
            //             'mobile'        => '+971',
            //             'access_token'  => $token,
            //             'user_id'       => $user_id,
            //             'role'          => 'customer',
            //             'status'        => '1',
            //             'device_type'   => 'none',
            //             'gmail_id'     => $googleUser['id'],
            //             'login_time'    => date('Y-m-d h:i:s'),
            //             'image'         => $googleUser['picture'],
            //         ]);
            //         Session::put('user_name', $googleUser['name']);
            //         Session::put('user_id', $user_id);
            //         Session::put('access_token', $token);
            //         Session::save();
            //     }
            //     //return redirect()->to('/home');
            //     return redirect(Session::get('link')); 
            // } 
            // catch (Exception $e) {
                // return 'error';
                return redirect(Session::get('link')); 
            }
       
        public function handleFacebookCallback() {
          $user = Socialite::driver('facebook')->stateless()->user();
          $user=$user->user;            
            // try {
            //     // $user = Socialite::driver('facebook')->user();
            //     $existUser = Customer::where('email', $user['email'])->first();
            //     //echo "<pre>"; print_r($user->getEmail()); exit ; 
            //     $token = bin2hex(openssl_random_pseudo_bytes(12));
            //     if($existUser) {
            //         $data = array(
            //             'access_token'=>$token,
            //             'login_time'=>date('Y-m-d h:i:s')              
            //         ); 
            //         Session::put('user_name', $existUser->firstname);
            //         Session::put('user_id', $existUser->user_id);
            //         Session::put('access_token', $token);
            //         Session::save();
            //         $updatetoken = Customer::where('email', $user['email'])->update($data);
            //     } else { 
            //         $last = Customer::orderBy('created_at', 'desc')->first();
            //         $start = (empty($last)) ? 0 : substr($last['user_id'], 2);
            //         $nextid = $start + 1;
            //         $user_id = 'SU'.str_pad($nextid, 4, '0', STR_PAD_LEFT);
            //         Customer::create([
            //             'firstname'     => explode(' ', $user['name'])[0],
            //             'lastname'      => explode(' ', $user['name'])[1],
            //             'email'         => $user['email'],
            //             'mobile'        => '+971',
            //             'access_token'  => $token,
            //             'user_id'       => $user_id,
            //             'role'          => 'customer',
            //             'status'        => '1',
            //             'device_type'   => 'none',
            //             'facebook_id'   => $user['id'],
            //             'login_time'    => date('Y-m-d h:i:s'),
            //             'image'         => 'userdefault.png',
            //         ]);
            //         Session::put('user_name', $user['name']);
            //         Session::put('user_id', $user_id);
            //         Session::put('access_token', $token);
            //         Session::save();
            //     }
            //     return redirect(Session::get('link'));  
            // } catch (Exception $e) {
            //     //return redirect('auth/facebook');
            //     return redirect(Session::get('link'));  
            // }
        }
}
