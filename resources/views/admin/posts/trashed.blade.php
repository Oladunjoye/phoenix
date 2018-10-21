
@extends('layouts.app')


@section('content')



<div class="card">

	<table class="table table-hover ">
<!--  <div > -->

 	 <thead class="card-header">

 	 	<div class="card-header ">
		TRASHED POSTS
	</div>
		
		<th>Image </th>
		<th>Title</th>
		<th>Edit</th>
		<th>Restore</th>
		<th>Destroy</th>

	</thead>
    	
   <!--  </div>	 -->	
  <!--  -->
  

	<tbody>

		@if($posts->count() > 0)
		@foreach($posts as $post)
		<tr>
			<td><img src="{{$post->feature}}" alt="{{$post->title}}" width="90px" height="9 0px"></td>
			<td>{{$post->title}}</td>
			<td> Edit  </td>
			<td> <a href="{{route('posts.restore', ['id' => $post->id])}}" class="btn btn-xs btn-success">Restore</a> </td>
			<td><a href="{{route('posts.kill', ['id' => $post->id])}}" class="btn btn-xs btn-danger">Delete</a></td>
			
		</tr>
		@endforeach

		@else
		<tr>
			<th>No trashed post</th>
		</tr>
		@endif
	</tbody>
  
  </table>
</div>
	
	





@stop

