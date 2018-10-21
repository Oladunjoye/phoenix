 
@extends('layouts.app')


@section('content')



<div class="card">

	<table class="table table-hover ">
<!--  <div > -->

 	 <thead class="card-header">
 	 	<div class="card-header ">
		USERS
	</div>
		
		<th>Image </th>
		<th>name</th>
		<th>Permissions</th>
		<th>Delete</th>

	</thead>
    	
   <!--  </div>	 -->	
  
  

	<tbody>
		@if($users->count() > 0)
			@foreach($users as $user)
			<tr>
				<td> <img src="{{asset($user->profile->avatar)}}" width="60px" height="60px" style="border-radius: 50%"> </td>

				<td>{{$user->name}}</td>
				<td>
				
				@if($user->admin)
				<a href="{{route('user.notadmin',['id' =>$user->id])}}" class="btn btn-xs btn-primary">Remove admin</a>
				
				@else
				<a href="{{route('user.admin',['id' =>$user->id])}}" class="btn btn-xs btn-success">Make admin</a>
				@endif	

				</td>
				<td>
					@if(Auth::id() !== $user->id)

					<a href="{{route('user.delete',['id' =>$user->id])}}" class="btn btn-xs btn-danger">Delete</a>

					@endif

				</td>
				
			</tr>
			@endforeach
		@else
		<tr>
			<th>No users  </th>
		</tr>
		@endif
	</tbody>
 
  </table>
</div>
	
	





@stop

