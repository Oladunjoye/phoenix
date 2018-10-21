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
    	Edit post : {{$post->title}}
    </div>

    <div class="card-body">

     <form action="{{route('posts.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
     	{{csrf_field()}}
		
     <div class="form-group">
     <label for="title"> Title </label>
     <input type="text" name="title" class="form-control" value ="{{$post->title}}">
     </div>	

     <div class="form-group">

     <label for="feature"> Featured image </label>
     <input type="file" name="feature" class="form-control">

     </div>

      <div class="form-group">

     <label for="category"> Select a category </label>
     <select  id="category" name="category_id" class="form-control">
         @foreach ($categories as $category)

         <option value="{{$category->id}}"

            @if($post->category->id == $category->id)

             selected

             @endif



            >



            {{$category->name}}</option>

         @endforeach

     </select>

     <div class="form-group">
        <label for="tags">Select Tags</label>
        @foreach($tags as $tag)
        <div class="checkbox">
        <label>

            <input type="checkbox" value="{{$tag->id}}" name="tags[]" @foreach($post->tags as $t)

             @if($tag->id == $t->id)

             checked

             @endif
             @endforeach



            >



            {{$tag->tag}}

        </label>
        </div>

        @endforeach
         
     </div>

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