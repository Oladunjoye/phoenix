
@extends('layouts.app')


@section('content')



<div class="card">

	<table class="table table-hover ">
<!--  <div > -->

 	 <thead class="card-header">
 	 	<div class="card-header ">
		POSTS
	</div>
		
		<th>Image </th>
		<th>Title</th>
		<th>Edit</th>
		<th>Trash</th>

	</thead>
    	
   <!--  </div>	 -->	
  
  

	<tbody>
		@if($posts->count() > 0)
			@foreach($posts as $post)
			<tr>
				<td><img src="{{$post->feature}}" alt="{{$post->title}}" width="90px" height="9 0px"></td>
				<td>{{$post->title}}</td>
				<td> <a href="{{route('posts.edit', ['id' => $post->id])}}" class="btn btn-xs btn-info">Edit</a>  </td>
				<td> <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-xs btn-danger">Trash</a> </td>
				
			</tr>
			@endforeach
		@else
		<tr>
			<th>No published posts </th>
		</tr>
		@endif
	</tbody>
 
  </table>
</div>
	
	





@stop

