@extends('layouts.front2')
@section('title','createprofiletext')

@section('content')

<link rel="stylesheet" href="{{ asset('css/main21.css') }}">

<div class="hii"><h1>ProfileCreate</h1></div>

 <form action="{{ action('ProfileController@create') }}" method="post" enctype="multipart/form-data">
 @if (count($errors) > 0)
        <ul>
    @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
    @endforeach
        </ul>
 @endif

 <h3>Your Profile Here</h3>
 <div class="profile">
 <div class="profileform"><h1>Enter Your Profile</h1></div>
 <br>
 <input type="text" name="title" value="{{ old('title') }}" class="title">
 <br>
 <textarea class="enterprofile" name="body" rows=5>{{ old('introduce') }}</textarea>
 </div>



 {{ csrf_field() }}
<div class="primary">
 <input type="submit" class="btn-primary" value="Create!">
 </div>
</form>



@endsection