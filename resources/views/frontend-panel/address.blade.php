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
                            <h5><a href="{{route('order')}}"> Order History</a></h5>
                        </div>
                    </div>
                    <div class="col-md-9">
                        
                       <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9">
                                <ul class="breadcrumbs mt-4">
                                   <li>
                                     <h2 class=" mb-3"><img class="mr-1" width="25" src="{{asset('public/assets/images/ic-2.png')}}"> Saved Address</h2>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12" style="{{(isset(Auth::guard('customer')->user()->id) && count($shipping)!=0) ?  '':'display:none;'}}" id="listAddress">
                             <form action="{{route('add_shipping')}}" method="Post">
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
                                   
                                </div>
                             </form>
                            </div>
                           </div>
                           </div>
                         <div  style="{{(!isset(Auth::guard('customer')->user()->id) || count($shipping)==0) ? '':'display:none;'}}" class="row" id="newform">
                           <form action="{{route('add_shipping')}}" method="Post" class="w-100 row">
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
                                         <button type="submit" class="btn btn--form btn--alt btn-new-bg">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
              
                    </div>
                   
                </div>
            </div>
     </div>
@endsection