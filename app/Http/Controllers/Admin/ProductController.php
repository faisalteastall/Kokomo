<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
    use App\Product;
    use DB;   
    
    class ProductController extends Controller {

        public function index()
        {
            $title    = "Product List";
            $products =  Product::orderBy('id', 'DESC')->paginate(4);            
            return view('admin-panel.product.product_list', compact('title','products'));            
        }
        
        public function viewProduct($id)
        {
            $title = "Product Detail";
            $product =  Product::where('prdct_id',$id)->first();           
            return view('admin-panel.product.view-product', compact('title','product'));
        }
        public function addProduct()
        {
            $title = "Add Product";
            return view('admin-panel.product.add_product', compact('title'));
        }

        public function editProduct($id)
        {
            $title = "Edit Product";
            $product =  Product::where('prdct_id',$id)->first();
            $img_array=[];
            
            foreach (explode(',',$product->prdct_image) as $key => $value) {
                $img_array[]=array('id'=>$key+1,'src'=>asset('storage/app/public/products/').'/'.$value);
                
            } 
            $img_array = json_encode($img_array);                    
            return view('admin-panel.product.edit-product', compact('title','product','img_array'));
        }

        public function updateProduct(Request $request)
        {
            $valid_array = [];
            $prdct_image = '';
            

            if(isset($request->size)){
                foreach ($request->size as $key => $value) {       
                       if($value=='S')
                               {
                                    $key1=0;
                               }
                       elseif ($value=='M') {
                                 $key1=1;
                                }   
                                 elseif ($value=='L') {
                                   $key1=2;
                                }   
                                 elseif ($value=='XL') {
                                  $key1=3;
                                }   
                                 elseif ($value=='XXL') {
                                   $key1=4;
                                }         
                    $valid_array["quantity.$key"] = "required_with:size.$key1|numeric|not_in:0";
                    $valid_array["price.$key"]    = "required_with:size.$key1|numeric|not_in:0";
                }
            }
            $my_array=$request->all();
            $my_array['quantity']=array_values(array_filter($request->quantity));
            $my_array['price']=array_values(array_filter($request->price));
 // echo "<pre>";
 // echo print_r($my_array['price']);
 //            print_r($valid_array);
 //            die();
            $valid_array['name']           = 'required|string|max:255';
            $valid_array['base_price']     = 'required|string|max:255';
            $valid_array['fit']            = 'required|string|string|max:255';
            $valid_array['size']           = 'required';           
            $valid_array['description.*']  = 'required|min:3|max:1000';
            $valid_array['material_care']  = 'required';
            $valid_array['quantity.*']     = 'required_with:size.*';                    
            $valid_array['price.*']        = 'required_with:size.*'; 
            if(count($request->preloaded)==0)
            {
             $valid_array['images']         = 'required';
             $valid_array['images.*']       = 'mimes:jpg,jpeg,png,bmp|max:20000';
            }
            
                         
            $valid_array['highlight']      = 'required|string|max:255';
            // echo "<pre>";
            // print_r(Validator::make($request->all(), $valid_array)->errors());
            // die();
            $valid                         =  Validator::make($my_array, $valid_array)->validate();
       
          $newImage  = explode(',', rtrim($request->prdct_image,','));
          $prevar    = $request->preloaded;
          $unlink_image =explode(',', rtrim($request->prdct_image,','));
          $lastcount = end($prevar)+1;    
           if(count($request->preloaded)!=0 || $request->hasFile('images'))
            {  
                if($lastcount== count(explode(',',$request->prdct_image)))
                {
                    foreach ($request->preloaded as $key => $value) { 
                        if(file_exists(storage_path('app/public/products/').$unlink_image[end($prevar)])){
                             unlink(storage_path('app/public/products/').$unlink_image[end($prevar)]);
                        }
                         
                         unset($newImage[end($prevar)]);                      
                                         
                    } 
                                
                }
                elseif(count($request->preloaded)< count(explode(',',$request->prdct_image))){                    
                   foreach ($request->preloaded as $key => $value) {
                       if($removeKey= array_key_exists($value-1,$newImage))
                       {                     
                           if(file_exists(storage_path('app/public/products/').$unlink_image[$removeKey])){ 
                            unlink(storage_path('app/public/products/').$unlink_image[$removeKey]); 
                            }

                         unset($newImage[$removeKey]);
                       }
                       
                    }     
                 
                }

                $newImage = array_filter($newImage);  
                     
                $newImage=implode(',',array_values($newImage));
              

                 if($request->hasFile('images')) {                   
                    foreach ($request->file('images') as $file) {
                        $prdct_image .= $file->hashName() .',';
                        $file->move(storage_path('app/public/products/'), $file->hashName());
                    }
                }
                   $prdct_image=$newImage.','.rtrim($prdct_image, ',');
                               
            }
            elseif(count($request->preloaded)==0) {
                 if($request->hasFile('images')) {                    
                    foreach ($request->file('images') as $file) {
                        $prdct_image .= $file->hashName() .',';
                        $file->move(storage_path('app/public/products/'), $file->hashName());
                    }
                }
            }
            else{
               
                $prdct_image = $request->prdct_image;
            }
     
            $producData  = [                
                'prdct_name'         => $request->name,
                'prdct_desc'         => json_encode($request->description),
                'prdct_highlight'    => $request->highlight,
                'prdct_image'        => rtrim($prdct_image,','),
                'prdct_fit'          => $request->fit,
                'prdct_size'         => implode(',',$request->size),
                'prdct_quantity'     => rtrim(implode(',',$request->quantity),','),
                'prdct_size_price'   => rtrim(implode(',',$request->price),','),
                'prdct_base_price'   => $request->base_price,
                'prdct_material_care' => $request->material_care,
              ];            
             
            $product = Product::where('id',$request->id)->update($producData);          
            return redirect()->back()->withSuccess('Product updated successfully!');            
        }

        public function saveProduct(Request $request)
        {
            $valid_array = [];
            $prdct_image = '';

            if(isset($request->size)){
                foreach ($request->size as $key => $value) {                
                    $valid_array["quantity.$key"] = "required_with:size.$key|numeric|not_in:0";
                    $valid_array["price.$key"]    = "required_with:size.$key|numeric|not_in:0";
                }
            }

            $valid_array['name']           = 'required|string|max:255';
            $valid_array['base_price']     = 'required|string|max:255';
            $valid_array['fit']            = 'required|string|string|max:255';
            $valid_array['size']           = 'required';           
            $valid_array['description.*']  = 'required|min:3|max:1000';
            $valid_array['material_care']  = 'required';
            $valid_array['quantity.*']     = 'required_with:size.*';                    
            $valid_array['price.*']        = 'required_with:size.*'; 
            $valid_array['images']         = 'required';
            $valid_array['images.*']       = 'mimes:jpg,jpeg,png,bmp|max:20000';             
            $valid_array['highlight']      = 'required|string|max:255';
            $valid                         =  Validator::make($request->all(), $valid_array)->validate();

            if($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $prdct_image .= $file->hashName() .',';
                    $file->move(storage_path('app/public/products/'), $file->hashName());
                }
            }

            $prdct_image = rtrim($prdct_image, ',');
            $last        = Product::orderBy('created_at', 'desc')->first();
            $start       = (empty($last)) ? 0 : substr($last['prdct_id'], 3);
            $nextid      = $start + 1;
            $prdct_id    = 'PRD'.str_pad($nextid, 4, '0', STR_PAD_LEFT);  
          
            $producData  = [
                'prdct_id'           => $prdct_id,
                'prdct_name'         => $request->name,
                'prdct_desc'         => json_encode($request->description),
                'prdct_highlight'    => $request->highlight,
                'prdct_image'        => $prdct_image,
                'prdct_fit'          => $request->fit,
                'prdct_size'         => implode(',',$request->size),
                'prdct_quantity'     => rtrim(implode(',',$request->quantity),','),
                'prdct_size_price'   => rtrim(implode(',',$request->price),','),
                'prdct_base_price'   => $request->base_price,
                'prdct_material_care' => $request->material_care,
              ];            
             
            $product = Product::create($producData);

            return redirect()->back()->withSuccess('Product added successfully!');       
        }
    }