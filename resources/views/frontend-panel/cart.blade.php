@extends('layouts.frontend_layout')
@section('content')

        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs mt-4">
                            <li><h3>Shopping Bag</h3></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>     
        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                   <div class="<?php if(!empty(Session::get('cart')->items)){ echo 'col-md-9';} else { echo 'col-md-12';}?>">
                        <div class="cart-table">
                        @if(!empty(Session::get('cart')->items))
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><h4 class="mb-0 text-normal text-center">Products</h4></div>
                                <div class="cart-table-prd-name"></div>
                                <div class="cart-table-prd-qty"></div>
                                <div class="cart-table-prd-price text-center"><h4 class="mb-0 text-normal mr-3">Amount</h4></div>
                                <div class="cart-table-prd-action"></div>
                            </div>
                            
                            @foreach(Session::get('cart')->items as $key=> $item)
                            <?php 
                              $sizeprice= $item['item']['prdct_size_price'];
                             // $sizeprice=explode(',',$sizeprice[0]);
                              $quantity1= $item['item']['prdct_quantity'];
                              $quantity=explode(',',$quantity1)[0];
                              $prd_size=explode(',',$item['item']['prdct_size']);
                              $price=$item['price'];
                              $id =$item['item']['id'];
                              $max=explode(',',$item['item']['prdct_quantity'])[array_search($item['size'],$prd_size)];
                               
                             ?>
                            <div class="cart-table-prd box-shadow p-2">
                                <div class="cart-table-prd-image"><a href="#"><img src="{{url('storage/app/public/products/'.explode(',',$item['item']['prdct_image'])[0])}}" alt="" style="width: 78px;height: 92.13px;"></a></div>
                                <div class="cart-table-prd-name">
                                    <h4 class="mb-0 text-normal">{{$item['item']['prdct_name']}}</h4>
                                    <p class="mt-0 text-normal">{{$item['item']['prdct_highlight']}} </p>  
                                    <div class="row mt-2">
                                        <div class="col">Size {{$item['size']}}</div>
                                        <div class="col">Fit {{$item['item']['prdct_fit']}}</div>
                                    </div>                                  
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="prd-block_qty">
                                        <div class="qty qty-changer">
                                            <fieldset >
                                                <!-- <input type="button" value="&#8210;" class="decrease">
                                                <input type="text" class="qty-input" value="{{$item['qty']}}" data-min="1" data-max="{{explode(',',$item['item']['prdct_quantity'])[array_search($item['size'],explode(',',$item['item']['prdct_size']))]}}">
                                                <input type="button" value="+" class="increase"> -->
                                                <input type="button" value="&#8210;" class="decrease" onclick="priceChange('{{$sizeprice}}','{{$max}}','decrease','{{$price}}','{{$id}}','{{$key}}','{{$item['size']}}','{{$key}}')">
                                                <input type="text" class="qty-input {{$key}}" value="{{$item['qty']}}" data-min="1" data-max="{{$max}}" id="changeInput" name="changeInput" >
                                                <input type="button" value="+" class="increase" onclick="priceChange('{{$sizeprice}}','{{$max}}','increase','{{$price}}','{{$id}}','{{$key}}','{{$item['size']}}','{{$key}}')">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price text-center" ><b >$ <span id="{{$key}}">{{$item['price']*$item['qty']}}</span></b> <br><br><span>Including all taxes</span></div>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross float-right" onclick="removeItem('{{$key}}')"; return false;"></a></div>
                            </div>
                            @endforeach
                            @else
                            <div class="cart-table-prd box-shadow p-2">
                          
                            <p>Oops! Cart is empty <a href="{{route('collection')}}" style="color:blue">Shop Now</a></p>
                            <img src="{{ asset('public/assets/images/emptycart.png')}}">
                            </div>
                            @endif
                           
                        </div>
                    </div>
                     @if(!empty(Session::get('cart')->items) )
                    <div class="col-md-3">
                       @if(isset(Auth::guard('customer')->user()->id))
                        <div class="sidebar-block mt-3">
                            <h4 class="mb-0 text-normal text-center">Coupons</h4>
                        </div>
                        <div class="sidebar-block mt-3">
                            <h4 class="mb-0 text-normal">View All Coupons</h4>
                        </div>
                        @endif
                        @if(isset(Auth::guard('customer')->user()->id))
                      <form action="{{route('coupon_apply')}}" method="Post">
                           {{ csrf_field() }}
                        <div class="sidebar-block open">
                            <div class="mt-2">
                              @foreach($coupons as $key=>$coupon)
                                <label class="customradio" onclick="coupon_radio('{{$coupon->coupon_code}}')">
                                    <span class="radiotextsty">{{$coupon->coupon_name}} </span>
                                    <input type="radio"  name="coupon_radio" {{(old('coupon_code')==$coupon->coupon_code ? 'checked':'')}}>                                   
                                    <span class="checkmark"></span>
                                </label>
                              @endforeach
                               
                            </div>
                            <div class="sidebar-block_content"><label class="text-uppercase">:</label>
                                <div class="form-flex {{ $errors->has('coupon_code') ? ' has-error' : '' }}">
                                    <div class="form-group"><input type="text" class="form-control" id="coupon_value" name="coupon_code" value="{{old('coupon_code')}}">
                                       
                                    </div>

                                    <button type="submit" class="btn btn--form btn--alt btn-new-bg">Apply</button>
                                </div>
                                 @if ($errors->has('coupon_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coupon_code') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        </div>
                    </form>
                    @if(session('coupon_error'))
                    <div class="alert alert-danger  alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('coupon_error') }}
                    </div>
                    @endif
                    @if(session('coupon_success'))
                    <div class="alert alert-success  alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('coupon_success') }}
                    </div>
                    @endif
                    <br>
                        @endif

                        <div class="sidebar-block mt-0">
                            <h4 class="mb-0 text-normal text-center">Order Summery</h4>
                        </div>
                        <div class="cart-table cart-table--sm">                              
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Sub Total</a></h2>
                                </div>
                                <div class="cart-table-prd-price"><b> {{Session::get('cart')->totalPrice}} $</b></div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Coupons Discount</a></h2>
                                </div>
                                <div class="cart-table-prd-price"><b>{{(session('discount_price'))?session('discount_price'):0.00}} $</b></div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Shipment Charges</a></h2>
                                </div>
                                <div class="cart-table-prd-price"><b>0 $</b></div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Total Payable</a></h2>
                                </div>
                                <div class="cart-table-prd-price"><b>{{(session('grand_total'))?session('grand_total'):Session::get('cart')->totalPrice}} $</b></div>
                            </div>
                        </div>
                     <!--    <div class="sidebar-block mt-0 text-center mt-3">
                            <button type="submit" class="btn btn--form btn--alt btn-new-bg">Place Order</button>
                        </div> -->
                    </div>
                    @if (session('status'))
                    <div class="alert alert-danger col-md-12 alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-block mt-3">
                                    <h4 class="mb-0 text-normal text-center">Contact Info</h4>
                                </div>
                            </div>
                            <div class="col-md-12" style="{{(isset(Auth::guard('customer')->user()->id) && count($shipping)!=0) ?  '':'display:none;'}}" id="listAddress">
                             <form action="{{route('place_order')}}" method="Post">
                               {{ csrf_field() }}
                                <div class="sidebar-block mt-3" >
                                   @foreach($shipping as $key=>$ship)
                                    <div class="clearfix bdr"><input id="formcheckoutRadio1" value="{{$ship['id']}}" name="ship_id" type="radio" class="radio" {{($key==0) ? 'checked':''}}> <label for="formcheckoutRadio1"> {{$ship['first_name'].' '.$ship['last_name']}}<br>{{$ship['primary_contact_number']}}<br>{{$ship['house_number']}}, {{$ship['street']}},{{$ship['landmark']}}, {{$ship['city']}}, {{$ship['state']}} {{$ship['pincode']}}</label>
                                        <span class="bt-r">
                                            <a class="btn btn-sm is-visible btn-new-bg" onclick="updateShipping('{{json_encode($ship)}}')"><i class="icon-pencil"></i></a>
                                            <a class="btn btn-sm is-visible btn-new-bg" onclick="removeShipping('{{$ship['id']}}')"><i class="icon-cross"></i></a>
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="discount_price" value="{{(session('discount_price'))?session('discount_price'):0.00}}">
                                <input type="hidden" name="coupon_code" value="{{old('coupon_code','')}}">
                                <div class="sidebar-block mt-0 text-center mt-3">
                                    <button type="button" class="btn btn--form btn--alt btn-new-bg" onclick="toggleDiv('newform','listAddress')">Add New Address</button>
                                    <button type="submit" class="btn btn--form btn--alt btn-new-bg">Place Order</button>
                                </div>
                             </form>
                            </div>
                           </div>
                           </div>
                         <div  style="{{(!isset(Auth::guard('customer')->user()->id) || count($shipping)==0) ? '':'display:none;'}}" class="row" id="newform">
                           <form action="{{route('place_order')}}" method="Post" class="w-100 row">
                             {{ csrf_field() }}
                                <div class="col-md-5">
                                    <div class="sidebar-block mt-3 ">
                                    <input type="hidden" name="shipping" value="shipping">
                                    <input type="hidden" name="flag" value="" id="flag">
                                    <input type="hidden" name="update_id" value="" id="update_id">
                                        <input class="input" placeholder="First Name" type="text" name="first_name" value="{{old('first_name')}}" required>
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                        <input class="input" placeholder="Last Name" type="text" name="last_name" value="{{old('last_name')}}" required>
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                        <input class="input" placeholder="House Number" type="text" name="house_no" value="{{old('house_no')}}" required>
                                        @if ($errors->has('house_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('house_no') }}</strong>
                                            </span>
                                        @endif
                                        <input class="input" placeholder="Street" type="text" name="street" value="{{old('street')}}" required>
                                        @if ($errors->has('street'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </span>
                                        @endif
                                        <input class="input" placeholder="City" type="text" name="city" value="{{old('city')}}" required>
                                         @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                 </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                <div class="sidebar-block mt-3">
                                    <input class="input" placeholder="Primary Contact Number" type="text" name="primary_contact_number" value="{{old('primary_contact_number')}}" required>
                                     @if ($errors->has('primary_contact_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('primary_contact_number') }}</strong>
                                            </span>
                                     @endif
                                    <input class="input" placeholder="Alternate Contact Number" type="text"  name="alternate_contact_number" value="{{old('alternate_contact_number')}}" required>
                                     @if ($errors->has('alternate_contact_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alternate_contact_number') }}</strong>
                                            </span>
                                     @endif
                                    <input class="input" placeholder="State" type="text" name="state" value="{{old('state')}}" required>
                                     @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                     @endif
                                    <input class="input" placeholder="Pin Code" type="text" name="pincode" value="{{old('pincode')}}" required>
                                     @if ($errors->has('pincode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pincode') }}</strong>
                                            </span>
                                     @endif
                                    <input class="input" placeholder="Landmark" type="text" name="landmark" value="{{old('landmark')}}" required>
                                    @if ($errors->has('landmark'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('landmark') }}</strong>
                                            </span>
                                     @endif
                                </div>
                                </div>
                                <input type="hidden" name="discount_price" value="{{(session('discount_price'))?session('discount_price'):0.00}}">
                                <input type="hidden" name="coupon_code" value="{{old('coupon_code','')}}">
                                <div class="col-md-12">                                             
                                    <div class="sidebar-block mt-0 text-center mt-3 mb-4">
                                         <button type="submit" class="btn btn--form btn--alt btn-new-bg">Place Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     @endif
                    
                    <div class="holder mt-4">
                        <div class="container">
                            <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2 mb-4" data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}' style="margin-bottom: 20px;">
                               @foreach($products as $key1=> $product)
                               
                                 <div class="prd prd-has-loader prd-new <?php if($key1==0){ echo "prd-popular";}?>">
                                    <div class="prd-inside">
                                        <div class="prd-img-area">
                                            <a href="collection-details.php" class="prd-img"><img src="{{url('storage/app/public/products/'.explode(',',$product->prdct_image)[0])}}" data-srcset="{{url('storage/app/public/products/'.explode(',',$product->prdct_image)[0])}}" alt="" class="js-prd-img lazyload" style="width: 255px;height: 301px;"></a>
                                              <div class="label-new">NEW</div>
                                               <div class="gdw-loader"></div> 
                                        </div>
                                        <div class="prd-info">
                                            <h2 class="prd-title"><a href="collection-details.php">{{$product->prdct_name}}</a></h2>
                                            <div class="prd-price">
                                                <div class="">{{$product->prdct_highlight}} </div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ <span id="{{$product->id}}">{{$product->prdct_base_price+explode(',',$product->prdct_size_price)[0]}}</span></div>
                                            </div>
                                            <div class="prd-hover">
                                                <div class="prd-action">
                                                    <button class="btn" onclick="addtobag('{{$product->id}}');"><i class="icon icon-handbag"></i><span>Add To Cart</span></button>
                                                    <div class=""><a href="{{ url('collection-detail').'/'.$product->prdct_id}}" class="icon-eye " ></a></div>
                                                </div>
                                                <div class="prd-options prd-hidemobile"><span class="label-options">Sizes:</span>
                                                    <ul class="list-options size-swatch">
                                                     @foreach(explode(',',$product->prdct_size) as $key=> $size)
                                                            @if($key==0)<li class="active userSize_{{$product->id}}">@else<li class="userSize_{{$product->id}}">@endif<a href="#" data-value="36" onclick="priceChange('{{explode(',',$product->prdct_size_price)[$key]}}','{{explode(',',$product->prdct_quantity)[$key]}}','','{{$product->prdct_base_price}}','{{$product->id}}')"><span class="value" data-quantity="{{explode(',',$product->prdct_quantity)[$key]}}" data-price="{{explode(',',$product->prdct_size_price)[$key]}},'','{{$product->prdct_base_price}}','{{$product->id}}">{{$size}}</span></a></li>
                                                            @endforeach
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                @endforeach                            
                                
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
  