@extends('layouts.front2')
@section('title','StoryCreate')

@section('content')
<link href="{{ asset('/css/main22.css' )}}" rel="stylesheet">

<div class="poststory">
    <h1>Post Story</h1>
</div>
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
    
    <div class="form">
        <label for="photo" class="file">Choose Image or Video</label>
        <div class="post">
            <input type="file" class="here" name="images[]">
            
        </div>
    </div>
    <br>
    </div>

    {{ csrf_field() }}
    <div class="post">
        <div class="btn postbtn">
            <input type="submit" value="post" />
        </div>
    </div>
</form>

@endsection