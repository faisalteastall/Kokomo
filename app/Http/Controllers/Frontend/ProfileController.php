<?php
    namespace App\Http\Controllers\Frontend;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Session;
    use DB;
    use Auth;
    use App\Customer;
    
    class ProfileController extends Controller {

        public function index()
        {
            $title="Profile";
            $customer=Auth::guard('customer')->user()->toArray();            
            return view('frontend-panel.profile', compact('title','customer'));
        }

        public function updateProfile(Request $request)
        {
           $this->validate($request,[
            'profile_image'   => 'required|mimes:jpg,jpeg,png|max:20000',                     
             ]);
           if($request->hasFile('profile_image')) {               
                    $profile_image = $request->file('profile_image')->hashName();
                    $request->file('profile_image')->move(storage_path('app/public/customers/'), $profile_image);               
            }
            $customer_id= Auth::guard('customer')->user()->id;
            Customer::where('id','=',$customer_id)->update(['image'=>$profile_image]);
            return redirect()->back()->withSuccess('Profile image updated successfully!');           
        }
    }
