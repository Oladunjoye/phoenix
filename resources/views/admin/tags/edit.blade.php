@extends('layouts.app')

@section('content')

@include('admin.includes.errors')



<div class="card">
    <div class="card-header">
    	Edit tag: {{$tag->tag}}
    </div>

    <div class="card-body">

     <form action="{{route('tag.store')}}" method="post" >
     	{{csrf_field()}}
		
     <div class="form-group">
     <label for="title"> Tag </label>
     <input type="text" name="tag" class="form-control" value = "{{$tag->tag}}">
     </div>	

     

     

     <div class="form-group">
     <div class="text-center">
     	<button class="btn btn-success" type="submit">Submit</button>
     </div>

     </div>
		
	</form>


@stop