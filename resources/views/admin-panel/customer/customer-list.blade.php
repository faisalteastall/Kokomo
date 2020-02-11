@extends('layouts.layout')
@section('content')
    <div class="row">
                    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                    <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col s10 m6 l6">
                                    <h5 class="breadcrumbs-title mt-2 mb-0"><span>Customer List</span></h5>
                                </div>
                                <div class="col s2 m6 l6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="container">
                            <div class="section">
                                <div class="row">
                                    <div class="col s12">
                                        <div id="borderless-table" class="card card-tabs">
                                            <div class="card-content">
                                                <div id="view-borderless-table">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <table class="responsive-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-field="id">#</th>
                                                                        <th data-field="name">Name</th>
                                                                        <th data-field="price">Email ID</th>
                                                                        <th data-field="price">Phone No.</th>
                                                                        <th data-field="price">No. of order</th>
                                                                        <th data-field="price">Action </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($customers as $key => $customer)
                                                                 <?php $color=($customer->status=='0'?'green':'red');
                                                                       $icon=($customer->status=='0'?'fa-toggle-on':'fa-toggle-off');
                                                                       $status =($customer->status=='0'?'1':'0');
                                                                       $msg = ($status=='0'?'enable':'disable');
                                                                 ?>
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td>{{$customer->firstname.' '.$customer->lastname}}</td>
                                                                        <td>{{$customer->email}}</td>
                                                                        <td>{{$customer->mobile}}</td>
                                                                        <td>{{$orders::where('customer_id',$customer->id)->count()}}</td>
                                                                        <td> 
                                                                            <a class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 tooltipped" data-position="top" data-tooltip="View" href="{{route('customer_detail',['id'=>$customer->customer_id])}}">
                                                                                <i class="material-icons">remove_red_eye</i>
                                                                            </a>
                                                                            <a class="mb-6 btn-floating waves-effect waves-light {{$color}} lightrn-1 tooltipped" data-position="top" data-tooltip="Disable" onclick="removefunction('customer','{{route('change_status',['id'=>$customer->id,'status'=>$status,'table'=>'customers'])}}','{{$msg}}')">
                                                                        <i class="fa {{$icon}}"></i>
                                                                        </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                         <div class="col s12">
                                                         {{ $customers->links('vendor.pagination.bootstrap-4') }}
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection