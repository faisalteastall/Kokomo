@extends('layouts.layout')
@section('content')
   <div class="row">
                <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                <div class="breadcrumbs-dark pb-0 pt-1" id="breadcrumbs-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s10 m6 l6">
                                <h5 class="breadcrumbs-title mt-1 mb-0"><span>Add Coupon</span></h5>                               
                            </div>
                            <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light right" href="coupon.php"><span class="hide-on-small-onl">Back</span></a>
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
                                            <form action="{{route('save_coupon')}}" method="post" enctype="multipart/form-data" >
                                               {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="input-field col m6 s12 {{ $errors->has('coupon_name') ? ' has-error' : '' }}">
                                                        <input id="Name" type="text" name="coupon_name" value="{{old('coupon_name')}}">
                                                        <label for="Name">Coupon Name</label>
                                                        @if ($errors->has('coupon_name'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('coupon_name') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('coupon_code') ? ' has-error' : '' }}">
                                                        <input id="Price" type="text" name="coupon_code" value="{{old('coupon_code')}}">
                                                        <label for="Price">Coupon Code</label>
                                                        @if ($errors->has('coupon_code'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('coupon_code') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('coupon_type') ? ' has-error' : '' }}">
                                                        <select name="coupon_type" >
	                                                        <option value="" >Select</option>
	                                                        <option value="1" {{(old('coupon_type')=='1' ? 'selected':'')}}>Fixed Amount</option>
	                                                        <option value="2" {{(old('coupon_type')=='2' ? 'selected':'')}}>Percentage</option>
                                                         </select>
                                                        <label for="Price">Coupon Type</label>
                                                        @if ($errors->has('coupon_type'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('coupon_type') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('coupon_amount') ? ' has-error' : '' }}">
                                                        <input id="Price" type="text" name="coupon_amount" value="{{old('coupon_amount')}}">
                                                        <label for="Price">Coupon Amount</label>
                                                        @if ($errors->has('coupon_amount'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('coupon_amount') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="Price" type="text" name="max_discount" value="{{old('max_discount')}}">
                                                        <label for="Price">Max Discount</label>
                                                        @if ($errors->has('max_discount'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('max_discount') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('max_user_limit') ? ' has-error' : '' }}">
                                                        <input id="Price" type="text" name="max_user_limit" value="{{old('max_user_limit')}}">
                                                        <label for="Price">	Max user limit</label>
                                                        @if ($errors->has('max_user_limit'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('max_user_limit') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-field col m6 s12 {{ $errors->has('per_user_limit') ? ' has-error' : '' }}">
                                                        <input id="Price" type="text" value="{{old('per_user_limit')}}" name="per_user_limit">
                                                        <label for="Price">Per user limit</label>
                                                        @if ($errors->has('per_user_limit'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('per_user_limit') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>                                                   
                                                    <div class="input-field col m6 s12 {{ $errors->has('run_start_date') ? ' has-error' : '' }}">
                                                        <input  class="datepicker" id="birthdate" type="text" name="start_date" value="{{old('start_date')}}">
                                                        <label for="birthdate"> Start date</label>
                                                        @if ($errors->has('start_date'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('start_date') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>                                                   
                                                    <div class="input-field col m6 s12 {{ $errors->has('run_end_date') ? ' has-error' : '' }}">
                                                        <input  class="datepicker" id="birthdate" type="text" name="end_date" value="{{old('end_date')}}">
                                                        <label for="birthdate"> End Date</label>
                                                        @if ($errors->has('end_date'))
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('end_date') }}</strong>
                                                         </span>
                                                        @endif
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <h6 class="pb-2 mt-3">Description</h6>
                                                    <?php $count=1;?>
                                                    @if ($errors->has('description.*') || count(old('description')))
                                                    <?php $count=count(old('description'))+$count;?>
                                                    @foreach( old('description') as $i => $field)
                                                    @if($i==0)
                                                    <div class="input-field col s12 ">
                                                        <input  type="text" id="message5" class="materialize-textarea" name="description[]" value='{{old("description.$i")}}'> 
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
                                                        <input name="description[]" value='{{old("description.$i")}}' type="text"> 
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
                                                    <button type="button" class="btn mb-1 btn-outline-primary right" onclick="education_fields({{$count}});">Add Description </button>
                                                 
                                                </div>
                                                <div class="row">
                                                   <div class="col m12 s12 file-field input-field">
                                                        <h6 class="pb-2">Coupon Banner</h6>
                                                        <div class="input-images"></div>
                                                            @if ($errors->has('images'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('images') }}</strong>
                                                                </span>
                                                             @endif
                                                    </div>
                                                   
                                                    <div class="input-field col s12">
                                                        <button class="btn purple waves-effect purple right" type="submit" name="action">Submit
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
                    </div>
                </div>
   </div>
@endsection