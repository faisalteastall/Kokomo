<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;  
    use App\Product;
    use App\Cart;
    use App\Sessioncart;
    use DB;
    use Session;
    use Auth;
    
    class CollectionController extends Controller {

        public function index()
        {
            $title    = "Collection List";
            $products =  Product::orderBy('id', 'DESC')->paginate(10);            
            return view('frontend-panel.collection', compact('title','products'));            
        }

        public function collectionDetail($id)
        {
            $title    = "Collection Detail";
            $products =  Product::where('prdct_id','=',$id)->first();
            $slideproducts =  Product::where('prdct_id', '!=', $id)->orderBy('id', 'DESC')->paginate(10);          
            return view('frontend-panel.collection-details', compact('title','products','slideproducts'));            
        }

        public function getAddToCart(Request $request)
        {
            $product  =  Product::find($request->id);           
            $oldCart  =  Session::has('cart')? Session::get('cart'):null;
            $cart     =  new Sessioncart($oldCart); 
            $cart->add($product,$request->size,$product['prdct_id'],(int)$request->qty,(float)$request->price,$request->key);
            if(Auth::guard('customer')->user()){
            $customer_id = Auth::guard('customer')->user()->id;
            $carts=Cart::where('customer_id',$customer_id)->first();
            if($carts!=''){           
            Cart::where('customer_id',$customer_id)->update([
                        'data'=>json_encode($cart)
                      ]);
                 }
            else{
                Cart::create([
                        'customer_id'=>$customer_id,
                        'data'=>json_encode($cart)
                      ]); 
             }
            }
            Session::forget('cart');            
            Session::put('cart',$cart); 
                     
            return redirect()->route('cart');
        }

        public function removeCart(Request $request)
        {   
            $cart = Session::get('cart');           
            if(array_key_exists($request->id, $cart->items)){              
                // Get the array    
                 // Unset the index you want
                $cart->totalPrice=$cart->totalPrice-$cart->items[$request->id]['current_price'];
                $cart->totalQty=$cart->totalQty-$cart->items[$request->id]['qty'];
                unset($cart->items[$request->id]);
                
               
            }
            if(Auth::guard('customer')->user()){
            $customer_id = Auth::guard('customer')->user()->id;
            Cart::where('customer_id',$customer_id)->update([
                        'data'=>json_encode($cart)
                      ]);
             }
            Session::forget('cart');          
            Session::put('cart', $cart);            
            return redirect()->back()->withSuccess('Item has been removed successfully!');
        }
        
    }