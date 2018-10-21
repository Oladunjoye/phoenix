
@extends('layouts.app')


@section('content')



<div class="card">
	

	<table class="table table-hover ">




 	 <thead>
 	 	<div class="card-header ">Tags</div>
		
		<th>Tags </th>
		<th>Editing</th>
		<th>Deleting</th>

	</thead>
    	
 	
  
  

	<tbody>
		@if($tags->count() > 0)
		@foreach($tags as $tag)
		<tr>
 			<td>{{$tag->tag}}</td>
			<td>
				<a href="{{route('tag.edit', ['id' => $tag->id])}}" class="btn btn-xs btn-info">
				Edit
				</a>

			</td>
			<td>
				<a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-xs btn-danger">
				<i class="fas fa-trash-alt"></i>
				</a>

			</td>
			
		</tr>
		@endforeach
		@else
		
			<tr>
				<th> No tags set</th>
			</tr>
		
		@endif
	</tbody>
  
  </table>
</div>
	
	





@stop

