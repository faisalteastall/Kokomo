@extends('layouts.layout')
@section('content')
     <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="col s12 mt-3">
                    <div class="container">
                        <div class="section" id="faq">
                            <div class="faq row">
                                <div class="col s12 m6 l3">
                                    <a class="black-text">
                                        <div class="card z-depth-0 grey lighten-3 faq-card">
                                            <div class="card-content center-align">
                                                <i class="material-icons dp48 blue-text">border_all</i>
                                                <h6><b>Order Id</b></h6>
                                                <p>{{$order_id}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col s12 m6 l3">
                                    <a class="black-text">
                                        <div class="card z-depth-0 grey lighten-3 faq-card">
                                            <div class="card-content center-align">
                                                <i class="material-icons dp48 orange-text">person_outline</i>
                                                <h6><b>Name</b></h6>
                                                <p>{{$customer->firstname.' '.$customer->lastname}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col s12 m6 l3">
                                    <a class="black-text">
                                        <div class="card z-depth-0 grey lighten-3 faq-card">
                                            <div class="card-content center-align">
                                                <i class="material-icons dp48 red-text">phone</i>
                                                <h6><b>Contact No.</b></h6>
                                                <p>{{$customer->mobile}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col s12 m6 l3">
                                    <a class="black-text">
                                        <div class="card z-depth-0 grey lighten-3 faq-card">
                                            <div class="card-content center-align">
                                                <i class="material-icons dp48 green-text">email</i>
                                                <h6><b>Email ID</b></h6>
                                                <p>{{$customer->email}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>                               
                                <div class="col s12 m3 l3">
                                    <div class="card mt-2">
                                        <div class="card-content">
                                            <span class="card-title">Shipping Details</span>
                                            <div class="category-list">
                                                <ul class="collection ">                                                  
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">Name</p>
                                                                <p class="collections-content">{{$shipping->first_name.' '.$shipping->last_name}}</p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">Primary Contact Number</p>
                                                                <p class="collections-content">{{$shipping->primary_contact_number}} </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">  Alternate Contact Number</p>
                                                                <p class="collections-content">{{$shipping->alternate_contact_number}} </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600"> Address</p>
                                                                <p class="collections-content"> {{$shipping->street}}, {{$shipping->city}}, {{$shipping->state}} {{$shipping->pincode}} </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600"> Landmark</p>
                                                                <p class="collections-content">{{$shipping->landmark}} </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m9 l9">
                                    <div class="col-12 s12">
                                        <p class="card-title mt-3">Product Details</p>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">S.No.</th>
                                                    <th data-field="name">Product ID</th>
                                                    <th data-field="name">Product Name</th>
                                                    <th data-field="name">Size</th>
                                                    <th data-field="name">Price</th>
                                                    <th data-field="name">Qty.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order as $key =>$items)
                                            <?php $item = json_decode($items['order_item'])->item;
                                                              ?>
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->prdct_id}}</td>
                                                    <td>{{$item->prdct_name}}</td>
                                                    <td>{{json_decode($items['order_item'])->size}}</td>
                                                    <td>$ {{json_decode($items['order_item'])->price}}</td>
                                                    <td>{{json_decode($items['order_item'])->qty}}</td>
                                                </tr>
                                            @endforeach                                                
                                            </tbody>
                                        </table>
                                        <div class="clearfix"></div>
                                        <div class="card-title mt-4 w-100">Order Status</div>
                                        <ul class="collapsible categories-collapsible">                                        
                                            <li class="active">
                                                <div class="collapsible-header" tabindex="0">Ordered <i class="material-icons">keyboard_arrow_right </i></div>
                                                <div class="collapsible-body" style="display: block;">
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>                                                    
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header" tabindex="0">Packed <i class="material-icons">keyboard_arrow_right </i></div>
                                                <div class="collapsible-body">
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header" tabindex="0">Shipped<i class="material-icons">keyboard_arrow_right </i></div>
                                                <div class="collapsible-body">
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header" tabindex="0">Delivered<i class="material-icons">keyboard_arrow_right </i></div>
                                                <div class="collapsible-body">
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                    <p>Lorem ipsum dolor sit amet <br><small>18 jan, 2020 </small>  </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     </div>
@endsection