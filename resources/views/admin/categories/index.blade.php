
@extends('layouts.app')


@section('content')



<div class="card">
	

	<table class="table table-hover ">




 	 <thead >
 	 	<div class="card-header ">
		Categories
	</div>
		
		<th>Category </th>
		<th>Editing</th>
		<th>Deleting</th>

	</thead>
    	
   <!--  </div>	 -->	
  
  

	<tbody>
		@if($categories->count() > 0)
		@foreach($categories as $category)
		<tr>
 			<td>{{$category->name}}</td>
			<td>
				<a href="{{route('category.edit', ['id' => $category ->id])}}" class="btn btn-xs btn-info">
				Edit
				</a>

			</td>
			<td>
				<a href="{{route('category.delete', ['id' => $category ->id])}}" class="btn btn-xs btn-danger">
				<i class="fas fa-trash-alt"></i>
				</a>

			</td>
			
		</tr>
		@endforeach
		@else
		
			<tr>
				<th> No categories set</th>
			</tr>
		
		@endif
	</tbody>
  
  </table>
</div>
	
	





@stop

