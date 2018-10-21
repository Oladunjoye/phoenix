@extends('layouts.app')

@section('content')

@include('admin.includes.errors')



<div class="card">
    <div class="card-header">
    	 Edit Profile
    </div>

    <div class="card-body">

     <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
     	{{csrf_field()}}
		
     <div class="form-group">
     <label for="title"> User </label>
     <input type="text" name="name" value="{{$user->name}}" class="form-control">
     </div>	

     <div class="form-group">
     <label for="Email"> Email </label>
     <input type="email" name="email" value ="{{$user->email}}" class="form-control">
     </div> 

     <div class="form-group">
     <label for="password"> New password </label>
     <input type="password" name="password" class="form-control">
     </div>

     <div class="form-group">
     <label for="title"> Upload Profile Picture </label>
     <input type="file" name="avatar" class="form-control">
     </div>

     <div class="form-group">
     <label for="Facebook"> Facebook Profile </label>
     <input type="text" name="facebook" value = "{{$user->profile->facebook}}" class="form-control" >
     </div>  

     <div class="form-group">
     <label for="Youtube"> Youtube Profile </label>
     <input type="text" name="youtube" value = "{{$user->profile->youtube}}" class="form-control" >
     </div> 

     <div class="form-group">
     <label for="title"> About You </label>
    <textarea name="about" id="about" cols="6" rows="10" class="form-control" value ="{{$user->profile->about}}"></textarea>
     </div>  





     

     

     <div class="form-group">
     <div class="text-center">
     	<button class="btn btn-success" type="submit">Update Profile</button>
     </div>

     </div>
		
	</form>


@stop