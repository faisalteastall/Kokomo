<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Product;
    use App\Cart;
    use App\Order;
    use App\Sessioncart;
    use App\Shippingaddress;
    use DB;
    use Session;
    use Auth;
    use App\Coupon;

    class OrderController extends Controller {
        
        public function index()
        {
            $title    = "Order History";
            $orders   =  Order::where('customer_id','=',Auth::guard('customer')->user()->id)->orderBy('id','desc')->get();
            return view('frontend-panel.order', compact('title','orders'));
        }
    	public function placeOrder(Request $request)
        {
            if(!isset(Auth::guard('customer')->user()->id)){
              return redirect()->back()->with('status', 'Please login first to placeOrder!');
            }           
         
          $customer_id=Auth::guard('customer')->user()->id;
          if(isset($request->shipping)){
            $validator=Validator::make($request->all(), [
            'first_name'     =>  'required',
            'last_name'      =>  'required',
            'house_no'       =>  'required',
            'street'         =>  'required',
            'state'          =>  'required',
            'city'           =>  'required',
            'landmark'       =>  'required',
            'pincode'        =>  'required',
            'primary_contact_number'          =>  'required',
            'alternate_contact_number'        =>  'required',
              ]);
            $validator->validate();           
            $shippingData  = [                
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
                'customer_id'                   => $customer_id,
                'house_number'                  => $request->house_no,
                'street'                        => $request->street, 
                'state'                         => $request->state,
                'city'                          => $request->city,
                'landmark'                      => $request->landmark,
                'pincode'                       => $request->pincode,
                'primary_contact_number'        => $request->primary_contact_number,              
                'alternate_contact_number'      => $request->alternate_contact_number,              
              ];
            }    
        
           
        elseif($request->update_id!='')
        {
            Shippingaddress::where('id','=',$request->update_id)->update($shippingData);
        }
        elseif(isset($request->ship_id)) 
        {            
           $shippingData = Shippingaddress::where('customer_id','=',$customer_id)->where('id',$request->ship_id)->first();           
        }
        else{

             Shippingaddress::create($shippingData);
        }
           
         $last = Order::groupBy('order_id')->orderBy('id', 'desc')->first();
         $start = (empty($last)) ? 0 : substr($last['order_id'], 3);       
         $nextid = $start + 1;
         $order_id = 'ORD'.str_pad($nextid, 4, '0', STR_PAD_LEFT);

          foreach (Session::get('cart')->items as $key => $item) {              
                $order = Order::create([
                'order_id'          => $order_id,
                'customer_id'       => $customer_id,
                'order_item'        => json_encode($item),
                'price'             => Session::get('cart')->totalPrice,
                'discount'          => $request->discount_price,
                'coupon_code'       => (isset($request->coupon_code)?$request->coupon_code:''),
                'shipping_data'     => json_encode($shippingData),
               ]);
          }

            Session::forget('cart');
            Cart::where('customer_id',Auth::guard('customer')->user()->id)->delete();
            return redirect()->back()->withSuccess('Order Placed successfully!'); 
        }

        public function couponApply(Request $request)
        {
            $customer_id=Auth::guard('customer')->user()->id;
            $this->validate($request,[
            'coupon_code'   => 'required',                   
               ]);
            $coupon  =  Coupon::whereDate('start_date', '<=', date("Y-m-d"))
                               ->whereDate('end_date', '>=', date("Y-m-d"))
                               ->where('status', '=','0')
                               ->where('available_limit', '>',0)
                               ->where('coupon_code', $request->coupon_code)
                               ->first();
            $coupon_limit= Order::where('customer_id','=',$customer_id)->where('coupon_code','=',$request->coupon_code)->count();
            $total   =  Session::get('cart')->totalPrice;
            $discount_price = 0;                               
                                                  
            if($coupon=='')
            {
                return redirect()->back()->withInput($request->only('coupon_code'))->with('coupon_error', 'Coupon is invalid or expired!');
            }
            elseif($coupon_limit==$coupon->per_user_limit) {

                return redirect()->back()->withInput($request->only('coupon_code'))->with('coupon_error', 'Coupon per user limit exceeded!');
            }
            else{
                    if($coupon->coupon_amount<$total)
                    {
                       if($coupon->coupon_type=='1')
                       {
                          $discount_price=$coupon->coupon_amount;                                
                       }
                       else{

                         $disc_amount=ceil($total*($coupon->coupon_amount/100));
                         if($coupon->max_discount!=0 && $disc_amount>$coupon->max_discount){
                             $discount_price=$coupon->max_discount;
                         }
                         else{
                            $discount_price=$disc_amount;
                         }
                       
                       }
                    }
                            $grand_total=$total-$discount_price; 
                return redirect()->back()->withInput($request->only('coupon_code'))->with('coupon_success', 'Coupon applied successfully!')->with('discount_price',$discount_price)->with('grand_total',$grand_total);
            }
        }
        
    }
      