@extends('layouts.frontend_layout')
@section('content')
     <div class="holder mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pro-img">
                              <div class="mycontainer">
                                 <img src="{{asset('storage/app/public/customers/'.Auth::guard('customer')->user()->image)}}" alt=""  class="myimage">
                                     <div class="middle">
                                        <button type="submit" class="btn btn--form btn--alt btn-new-bg" style="border-radius: 15px;" id="imgbtn">Edit</button>
                                    </div>                                                                
                                </div>                                        
                            </div>
                            <form action="{{route('update_profile')}}" method="post" enctype="multipart/form-data" id="updateProfile">
                                {{ csrf_field() }}
                                <input type="file" id="my_file" style="display: none;" name="profile_image" />
                            </form>  
                             @if ($errors->has('profile_image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profile_image') }}</strong>
                            </span>
                            @endif
                            <div class="myaccountdetail mt-4">
                                <h5><a href="{{route('profile')}}"> Personal Details</a></h5>
                                <h5><a href="{{route('address')}}"> Saved Addresses</a></h5>
                                <h5><a href="{route('order')}}"> <b>Order History</b></a></h5>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="breadcrumbs mt-4">
                                <li><h2 class=" mb-3"><img class="mr-1" width="25" src="{{asset('public/assets/images/ic-1.png')}}"> Order History</h2></li>
                            </ul>
                            <div class="cart-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        @foreach($orders as $key=>$order)
                                        <?php $ship = json_decode($order->shipping_data,true);
                                              $item = json_decode($order->order_item,true);
                                              $product =$item['item'];                                             

                                          ?>
                                         <tr class="box-shadow p-2 card-bdr mt-3">
                                            <td><img width="120" src="{{url('storage/app/public/products/'.explode(',',$product['prdct_image'])[0])}}" alt=""></td>
                                            <td width="320">
                                                <h4 class="mb-0 text-normal mb-1">{{$product['prdct_name']}}</h4>
                                                <p class="mt-0 text-normal">{{$product['prdct_highlight']}} </p>  
                                                <div class="row mt-1">
                                                    <div class="col">Size M</div>
                                                    <div class="col">Qty {{$item['qty']}}</div>
                                                    <div class="col">Fit {{$item['fit']}}</div>
                                                </div> 
                                                <h4 class="mb-0 text-normal mt-2 mb-1">Delivery Address</h4>
                                                <p class="mt-0 text-normal">{{$ship['first_name'].' '.$ship['last_name']}}<br>{{$ship['primary_contact_number']}}<br>{{$ship['house_number']}}, {{$ship['street']}},{{$ship['landmark']}}, {{$ship['city']}}, {{$ship['state']}} {{$ship['pincode']}} </p>  
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mt-2"><b class="text-uppercase">Order Id :</b> <span class="ml-4"><b>{{$order->order_id}} </b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mt-2"><b class="text-uppercase">Order Date :</b> <span class="ml-4"><b>{{date('d M, Y',strtotime($order->created_at))}} </b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-2"><b class="text-uppercase">Delivery Date :</b> <span class="ml-3"><b>{{date('d M, Y',strtotime($order->created_at))}} </b></span></div>
                                            </td>
                                            <td class="pl-4">
                                                <h4 class="mb-0 text-normal text-center mb-1">Order Summery</h4>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1"><b>Product Price</b> <span class="bt-r"><b>$ {{$item['price']}} </b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1"><b>Sub Total</b> <span class="bt-r"><b>$ {{$order->price}} </b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1"><b>COUPONS DISCOUNT</b> <span class="bt-r"><b>$ {{$order->discount}}</b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1"><b>SHIPMENT CHARGES</b> <span class="bt-r"><b> $ 0</b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1"><b>TOTAL PAYABLE</b> <span class="bt-r"><b>$ {{$order->price-$order->discount}}</b></span></div>
                                                <div class="d-inline-flex w-100 text-uppercase f-900 mb-1" style="margin-top: 50px;"> <span class="bt-r"><button type="submit" class="btn btn--form btn--alt btn-new-bg">Cancel</button></span></div>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody></table>
                                </div>
                               
                            </div>
                        </div>
                      
                       
                    </div>
                </div> 
     </div>
 @endsection