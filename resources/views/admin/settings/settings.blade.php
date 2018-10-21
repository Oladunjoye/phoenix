@extends('layouts.app')

@section('content')

@include('admin.includes.errors')



<div class="card">
    <div class="card-header">
    	Edit blog settings
    </div>

    <div class="card-body">

     <form action="{{route('settings.update')}}" method="post" >
     	{{csrf_field()}}
		
     <div class="form-group">
     <label for="title">Site name </label>
     <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
     </div>	

     <div class="form-group">
     <label for="address"> Address </label>
     <input type="text" name="address" value="{{$settings->address}}" class="form-control">
     </div> 


     <div class="form-group">
     <label for="contact_number"> Contact Phone </label>
     <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
     </div> 

    <div class="form-group">
     <label for="contact_email"> Contact Email </label>
     <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
     </div> 





     

     

     <div class="form-group">
     <div class="text-center">
     	<button class="btn btn-success" type="submit">Update Site Settings</button>
     </div>

     </div>
		
	</form>


@stop