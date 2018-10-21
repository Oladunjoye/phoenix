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