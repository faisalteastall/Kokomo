<?php
    namespace App\Http\Controllers\Frontend;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;  
    use App\Product;
    use App\Coupon;
	use App\Shippingaddress;
	use Auth;
	use Session;

    
    class CartController extends Controller {

    	public function cart()
        {   
        	$products = Product::orderBy('id', 'DESC')->paginate(10);
	    	$coupons  =  Coupon::whereDate('start_date', '<=', date("Y-m-d"))
	                           ->whereDate('end_date', '>=', date("Y-m-d"))
	                           ->where('status', '=','0')
	                           ->where('available_limit', '>',0)
	                           ->orderBy('id', 'DESC')
	                           ->get();
	        if(isset(Auth::guard('customer')->user()->id))
	        {
             $shipping = Shippingaddress::where('customer_id','=',Auth::guard('customer')->user()->id)->where('status','=','0')->orderBy('id', 'DESC')->get()->toArray();
	        }
	        else{
             $shipping = [];
	        }
	        
            $title    = "Cart";
            return view('frontend-panel.cart', compact('title','products','coupons','shipping'));
        }
}