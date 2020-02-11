@extends('layouts.layout')
@section('content')

            <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                 <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <!-- Search for small screen-->
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-1 mb-0"><span>Edit Product</span></h5>
                               
                            </div>
                            <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light right" href="{{route('product_list')}}"><span class="hide-on-small-onl">Back</span></a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <div class="container">
                        <div class="seaction">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div id="Form-advance" class="card card card-default scrollspy">
                                        <div class="card-content">
                                        <?php 
                                           $prdct_size=explode(',', $product->prdct_size);
                                           $prdct_size_price=explode(',', $product->prdct_size_price);
                                           $prdct_quantity=explode(',', $product->prdct_quantity);
                                           // echo $prdct_size_price[array_search('XXL', $prdct_size)];
                                           // echo old('price.4');
                                                
                                                 //print_r(explode(',', $product->prdct_size));
                                              
                                                // die();

                                                    function statusChecked($size,$product){ 
                                                // if(old('size')=='')
                                                // {
                                                  
                                                    $size_array=old('size', explode(',', $product->prdct_size));
                                                    //   echo "<pre>";
                                                    // print_r($size_array);
                                                // }
                                                // else{
                                                //     $size_array=old('size');
                                                     
                                                // }
                                                return (is_array($size_array) and in_array($size, $size_array)) ? ' checked' : '' ;}?>                                       
                                            <form action="{{route('update_product')}}" method="post" enctype="multipart/form-data" id="uploadWidget">
                                               {{ csrf_field() }}
                                                <div class="row">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="hidden" name="prdct_image" value="{{$product->prdct_image}}">
                                                    <div class="input-field col m6 s12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <input id="name" type="text" name="name" value="{{old('name', $product->prdct_name)}}">
                                                        <label for="Name">Name</label>
                                                          @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                          @endif
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="Price" type="text" name="base_price" value="{{old('base_price', $product->prdct_base_price)}}">
                                                        <label for="Price">Base Price </label>
                                                        @if ($errors->has('base_price'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('base_price') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <select  id="Fit" name="fit" >
                                                            <option value="" >Select</option>
                                                            <option value="Regular" {{(old('fit',$product->prdct_fit)=='Regular' ? 'selected':'')}}>Regular</option>
                                                            <option value="Slim" {{(old('fit',$product->prdct_fit)=='Slim' ? 'selected':'')}}>Slim</option>
                                                            <option value="Skinny" {{(old('fit',$product->prdct_fit)=='Skinny' ? 'selected':'')}}>Skinny</option>
                                                        </select>
                                                        <label for="Fit">Size & Fit</label>
                                                        @if ($errors->has('fit'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('fit') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="Fit" type="text" name="material_care" value="{{!old('material_care') ? $product->prdct_material_care:old('material_care')}}">
                                                        <label for="Fit">Material & Care </label>
                                                        @if ($errors->has('material_care'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('material_care') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m12 s12">
                                                        <h6 class="pb-2">Size & Price</h6>
                                                        <div class="row">
                                                            <div class="input-field m1 col s6 mt-2">
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="size[]"  {{statusChecked('S',$product)}} value="S"  />
                                                                        <span>S</span>
                                                                    </label>
                                                                    @if ($errors->has('size'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('size') }}</strong>
                                                                        </span>
                                                                   @endif
                                                                </p>
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="quantity[]" value=" {{old('quantity.0',$prdct_quantity[array_search('S', $prdct_size)])}}">
                                                                <label for="Quantity">Quantity</label>
                                                                @if ($errors->has('quantity.0'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The quantity.0 field is required when size.0 is present","quantity.0", 'milk'), array('The quantity field is required when size S is checked', 'quantity'), $errors->first('quantity.0')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="price[]" value=" {{old('price.0',$prdct_size_price[array_search('S', $prdct_size)])}}">
                                                                <label for="Quantity">Price</label>
                                                                @if ($errors->has('price.0'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The price.0 field is required when size.0 is present","price.0", 'milk'), array('The price field is required when size S is checked', 'price'), $errors->first('price.0')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field m1 col s6 mt-2">
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="size[]" {{statusChecked('M',$product)}} value="M">
                                                                        <span>M</span>
                                                                    </label>
                                                                    @if ($errors->has('size'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('size') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="quantity[]" value="{{old('quantity.1',$prdct_quantity[array_search('M', $prdct_size)])}}">
                                                                <label for="Quantity">Quantity</label>
                                                                 @if ($errors->has('quantity.1'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The quantity.1 field is required when size.1 is present","quantity.1", 'milk'), array('The price field is required when size M is checked', 'quantity'), $errors->first('quantity.1')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="price[]" value="{{old('price.1',$prdct_size_price[array_search('M', $prdct_size)])}}">
                                                                <label for="Quantity">Price</label>
                                                                @if ($errors->has('price.1'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The price.1 field is required when size.1 is present","price.1", 'milk'), array('The price field is required when size M is checked', 'price'), $errors->first('price.1')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field m1 col s6 mt-2">
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="size[]" {{statusChecked('L',$product)}} value="L" />
                                                                        <span>L</span>
                                                                    </label>
                                                                    @if ($errors->has('size'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('size') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="quantity[]" value="{{old('quantity.2',$prdct_quantity[array_search('L', $prdct_size)])}}">
                                                                <label for="Quantity">Quantity</label>
                                                                @if ($errors->has('quantity.2'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The quantity.2 field is required when size.2 is present","quantity.2", 'milk'), array('The price field is required when size L is checked', 'quantity'), $errors->first('quantity.2')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="price[]" value="{{old('price.2',$prdct_size_price[array_search('L', $prdct_size)])}}">
                                                                <label for="Quantity">Price</label>
                                                                @if ($errors->has('price.2'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The price.2 field is required when size.2 is present","price.2", 'milk'), array('The price field is required when size L is checked', 'price'), $errors->first('price.2')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field m1 col s6 mt-2">
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="size[]" {{statusChecked('XL',$product)}} value="XL" />
                                                                        <span>XL</span>
                                                                    </label>
                                                                    @if ($errors->has('size'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('size') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="quantity[]" value="{{old('quantity.3',$prdct_quantity[array_search('XL', $prdct_size)])}}">
                                                                <label for="Quantity">Quantity</label>
                                                                 @if ($errors->has('quantity.3'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The quantity.3 field is required when size.3 is present","quantity.3", 'milk'), array('The quantity field is required when size XL is checked', 'quantity'), $errors->first('quantity.3')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="price[]" value="{{old('price.3',$prdct_size_price[array_search('XL', $prdct_size)])}}">
                                                                <label for="Quantity">Price</label>
                                                                 @if ($errors->has('price.3'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The price.3 field is required when size.3 is present","price.3", 'milk'), array('The price field is required when size XL is checked', 'price'), $errors->first('price.3')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field m1 col s6 mt-2">
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="size[]" {{statusChecked('XXL',$product)}} value="XXL" />
                                                                        <span>XXL</span>
                                                                    </label>
                                                                     @if ($errors->has('size'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('size') }}</strong>
                                                                        </span>
                                                                     @endif
                                                                </p>
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="quantity[]" value="{{old('quantity.4',$prdct_quantity[array_search('XXL', $prdct_size)])}}">
                                                                <label for="Quantity">Quantity</label>
                                                                 @if ($errors->has('quantity.4'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The quantity.4 field is required when size.4 is present","quantity.4", 'milk'), array('The quantity field is required when size XXL is checked', 'quantity'), $errors->first('quantity.4')) }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                            <div class="input-field col m2 s6">
                                                                <input id="Quantity" type="text" name="price[]" value="{{old('price.4',$prdct_size_price[array_search('XXL', $prdct_size)])}}">
                                                                <label for="Quantity">Price</label>
                                                                 @if ($errors->has('price.4'))
                                                                        <span class="help-block">
                                                                            <strong>{{ str_replace(array("The price.4 field is required when size.4 is present","price.4", 'milk'), array('The price field is required when size XXL is checked', 'price'), $errors->first('price.4')) }}</strong>
                                                                        </span>
                                                                 @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <h6 class="pb-2 mt-3">Description</h6>
                                                    <?php $count=1;
                                                   $prdct_desc= json_decode($product->prdct_desc,true);
                                                    //$prdct_desc= explode(',',$product->prdct_desc);

                                                       ?>
                                                    @if ($errors->has('description.*') || count(old('description')) || old('description',$prdct_desc))
                                                    <?php $count=count(old('description',$prdct_desc))+$count;?>
                                                    @foreach( old('description',$prdct_desc) as $i => $field)
                                                    @if($i==0)
                                                    <div class="input-field col s12">
                                                        <input  type="text" id="message5" class="materialize-textarea" name="description[]" value='{{old("description.$i",$field)}}'> 
                                                        <label for="message">Description</label>
                                                         @if ($errors->has("description.$i"))
                                                            <span class="help-block">
                                                                <strong>{{str_replace("description.$i",'description',$errors->first("description.$i")) }}</strong>
                                                            </span>
                                                        @endif
                                                    </div> 
                                                    @else 
                                                    <div id="education_fields">
                                                    <div class="form-group removeclass{{$i+1}}">
                                                    <div class="input-field col s12">
                                                        <input name="description[]" value='{{old("description.$i",$field)}}' type="text"> 
                                                        <label for="message">Description</label>
                                                        <div class="input-group-append"> <button style="position: absolute;float: right;top: 5px;right: 14px;" class="btn btn-danger" type="button" onclick="remove_education_fields({{$i+1}});"> <i class="material-icons">clear</i> </button></div> 
                                                         @if ($errors->has("description.$i"))
                                                            <span class="help-block">
                                                                <strong>{{str_replace("description.$i",'description',$errors->first("description.$i")) }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                   </div>
                                                   </div>
                                                    @endif
                                                                                                     
                                                    @endforeach
                                                    @else
                                                    <div class="input-field col s12">
                                                        <input id="message5" class="materialize-textarea" name="description[]" value="{{old('description.0')}}" type="text"> 
                                                        <label for="description" >Description</label>
                                                         @if ($errors->has("description.0"))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first("description.0") }}</strong>
                                                            </span>
                                                        @endif
                                                    </div> 
                                                    @endif  
                                                    <div id="education_fields"></div>
                                                    <button type="button" class="btn mb-1 btn-outline-primary right" onclick="education_fields({{$count-1}});">Add Description </button>
                                                    <div class="col m12 s12 file-field input-field">
                                                        <h6 class="pb-2">Product Highlight</h6>
                                                        <div class="input-field col s12">
                                                            <textarea id="message5" class="materialize-textarea" name="highlight">{{old('highlight',$product->prdct_highlight)}}</textarea>
                                                            <label for="message">Product Highlight</label>
                                                             @if ($errors->has('highlight'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('highlight') }}</strong>
                                                            </span>
                                                             @endif
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                               <div class="row">
                                                    <div class="col m12 s12 file-field input-field">
                                                    <h6 class="pb-2">Product Images</h6>
                                                  <!--  <input name="imagefile[]" type="file" multiple value=""/  id="uploader1">
                                              @if ($errors->has('imagefile.*'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('imagefile.*') }}</strong>
                                                                        </span>
                                                             @endif
                                                             <div class="dropzone dz-clickable" for="uploader1">
                                                        
                                                    <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                                     
                                                    </div> -->
                                                    <div class="input-images"></div>
                                                    @if ($errors->has('images'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('images') }}</strong>
                                                                        </span>
                                                             @endif
                                                </div>
                                                </div>
                                           
                                            <!--  <div class="row">
                                                    <div class="col m12 s12 file-field input-field">
                                                    <h6 class="pb-2">Product Images</h6>
                                                        <div class="dropzone" action="{{route('save_product')}}" id="mydropzones" method="post" id="form1">
                                                      <!--   {{ csrf_field() }} -->
                                                            <!-- <div class="fallback">
                                                            
                                                             
                                                                <input name="file[]" type="file" multiple / value="{{old('file')}}">
                                                            </div>
                                                             @if ($errors->has('file'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('file') }}</strong>
                                                                        </span>
                                                             @endif
                                                        </div>
                                                    </div> -->
                                                <!-- </div> -->
                                            
                                            <div class="row">
                                                 <div class="input-field col s12">
                                                        <button class="btn purple waves-effect purple right" type="submit" name="action" id="mysubmit" >Submit
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                            </div>
                                          </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection
