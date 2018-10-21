@extends('layouts.app')

@section('content')

@if(count($errors) > 0)

<ul class="list-group">
    <li class="list-group-item">
        @foreach($errors->all() as $error)

        <li class="list-group-item text-danger">
            {{$error}}
        </li>
        @endforeach
    </li>
</ul>

@endif


<div class="card">
    <div class="card-header">
    	Create a new post
    </div>

    <div class="card-body">

     <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
     	{{csrf_field()}}
		
     <div class="form-group">
     <label for="title"> Title </label>
     <input type="text" name="title" class="form-control">
     </div>	

     <div class="form-group">

     <label for="feature"> Featured image </label>
     <input type="file" name="feature" class="form-control">

     </div>

      <div class="form-group">

     <label for="category"> Select a category </label>
     <select  id="category" name="category_id" class="form-control">
         @foreach ($categories as $category)

         <option value="{{$category->id}}">{{$category->name}}</option>

         @endforeach

     </select>

     </div>	

     <div class="form-group">
        <label for="tags">Select Tags</label>
        @foreach($tags as $tag)
        <div class="checkbox">
        <label><input type="checkbox" value="{{$tag->id}}" name="tags[]">{{$tag->tag}}</label>
        </div>

        @endforeach
         
     </div>

     <div class="form-group">

     <label for="content"> Content </label>
     <textarea name="content" id="content" class="form-control" cols="5" rows="5"  > </textarea>

     </div>	

     <div class="form-group">
     <div class="text-center">
     	<button class="btn btn-success" type="submit">Submit</button>
     </div>

     </div>
		
	</form>


@stop

@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">


@stop

@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.js"></script> 
<script src="./bower_components/summernote/dist/summernote.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script type="javascript">
    $(document).ready(function() {
  $('#content').summernote();
});
</script>


@stop