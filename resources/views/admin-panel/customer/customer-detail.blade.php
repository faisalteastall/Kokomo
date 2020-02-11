@extends('layouts.layout')
@section('content')
     <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="col s12 mt-3">
                    <div class="container">
                        <div class="section" id="faq">
                            <div class="faq row">                               
                                <div class="col s12 m6 l4">
                                    <a class="black-text">
                                        <div class="card z-depth-0 grey lighten-3 faq-card">
                                            <div class="card-content center-align">
                                                <i class="material-icons dp48 orange-text">person_outline</i>
                                                <h6><b>Name</b></h6>
                                                <p>Roshan Singh</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col s12 m6 l4">
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
                                <div class="col s12 m6 l4">
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
                                <!-- <div class="col s12 m3 l3">
                                    <div class="card mt-2">
                                        <div class="card-content">
                                            <span class="card-title">Shipping Details</span>
                                            <div class="category-list">
                                                <ul class="collection ">                                                  
                                                                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">Primary Contact Number</p>
                                                                <p class="collections-content">+91 9856985696 </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">  Alternate Contact Number</p>
                                                                <p class="collections-content">+91 9856985696 </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600"> Address</p>
                                                                <p class="collections-content"> Plot no- 519, Udyog Vihar Phase V, Gurugram, Haryana </p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                    <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600"> Landmark</p>
                                                                <p class="collections-content">Near AIHP Building </p>
                                                            </div>
                                                        </div>
                                                    </li>     
                                                     <li class="collection-item">
                                                        <div class="row">
                                                            <div class="col-12 s6">
                                                                <p class="collections-title font-weight-600">Name</p>
                                                                <p class="collections-content">Roshan Singh</p>
                                                            </div>
                                                        </div>
                                                    </li>                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col s12 m12 l12">
                                    <div class="col-12 s12">
                                        <p class="card-title mt-3">Order Details</p>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">Order ID</th>
                                                    <th data-field="name">Product ID</th>
                                                    <th data-field="name">Product Name</th>
                                                    <th data-field="name">Size</th>
                                                    <th data-field="name">Discount</th>
                                                    <th data-field="name">Price</th>
                                                    <th data-field="name">Qty.</th>
                                                    <th data-field="name">Status</th>
                                                    <th data-field="name">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key=>$order)
                                             <?php $item = json_decode($order['order_item'])->item;?>
                                                <tr>
                                                    <td>{{$order->order_id}}</td>
                                                    <td>{{$item->prdct_id}}</td>
                                                    <td>{{$item->prdct_name}}</td>
                                                    <td>{{json_decode($order['order_item'])->size}}</td>
                                                    <td>{{json_decode($order['order_item'])->price}}</td>
                                                    <td>{{$order->discount_price}}</td>
                                                    <td>1</td>
                                                    <td>Delivered</td>
                                                    <td>
                                                        <a href="{{route('order_detail',['id'=>$order->order_id,'customer_id'=>$order->customer_id])}}" class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s12">
                                     {{ $orders->links('vendor.pagination.bootstrap-4') }}
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     </div>
@endsection