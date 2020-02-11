<?php
    namespace App\Http\Controllers\Frontend;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller; 
	use App\Shippingaddress;
	use Illuminate\Support\Facades\Validator;
	use Auth;
    
    class ShippingController extends Controller {

    	public function index()
    	{
    		$title    = 'Saved Address';
    		$shipping = Shippingaddress::where('customer_id','=',Auth::guard('customer')->user()->id)->where('status','=','0')->orderBy('id', 'DESC')->get()->toArray();
    		return view('frontend-panel.address', compact('title','shipping'));
    	}

    	public function removeShipping(Request $request)
        {
            Shippingaddress::where('id','=',$request->id)->update(['status'=>'1']);
            return redirect()->back()->withSuccess('Shipping address has been removed successfully!');
        }

        public function saveAddress(Request $request)
        {
          $customer_id=Auth::guard('customer')->user()->id;
         // if(isset($request->shipping) && $request->update_id==''){
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
           // }    
        
           
        if($request->update_id!='')
        {
            Shippingaddress::where('id','=',$request->update_id)->update($shippingData);
            return redirect()->back()->withSuccess('Shipping address has been updated successfully!');
        }
        
        else{

             Shippingaddress::create($shippingData);
             return redirect()->back()->withSuccess('Shipping address has been added successfully!');
        }
            
           
        }
}