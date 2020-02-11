@extends('layouts.frontend_layout')
@section('content')  
    <div class="holder mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pro-img">
                              <div class="mycontainer">
                                 <img src="{{asset('storage/app/public/customers/'.$customer['image'])}}" alt=""  class="myimage">
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
                            <ul class="breadcrumbs mt-4">
                                <li><h2 class=" mb-3"><img class="mr-1" width="25" src="{{asset('public/assets/images/ic-3.png')}}">Personal Details</h2></li>
                            </ul>
                            <div class="com-md-12 box-shadow bdr mb-4 ">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-8">                                    
                                        <div class="table-responsive">
                                            <table class="table table-borderless h-font text-uppercase">
                                                <tbody>
                                                    <tr>
                                                        <td>First Name</td>
                                                        <td><b>{{$customer['firstname']}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><b>{{$customer['lastname']}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><b>{{$customer['mobile']}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email Address</td>
                                                        <td><b>{{$customer['email']}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td><b>{{$customer['gender']}}</b></td>
                                                    </tr>
                                                   <!--  <tr>
                                                        <td>Date Of Birth</td>
                                                        <td><b>22 June, 1991</b></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="sidebar-block text-right mt-3 mb-4">
                                            <button type="submit" class="btn btn--form btn--alt btn-new-bg">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection