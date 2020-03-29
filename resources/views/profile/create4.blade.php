@extends('layouts.front2')
@section('title','editprofiletext')

@section('content')

<link rel="stylesheet" href="{{ asset('css/main21.css') }}">

<h2>ProfileCreate</h2>

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
 <label class="profileform">Enter Your Profile</label>
 <input type="entertitle" name="title" value="{{ $profile_form->title }}">
 <textarea class="enterprofile" name="body" rows="20">{{ $profile_form->body }}</textarea>
 </div>


<input type="hidden" name="id" value="{{ $profile_form->id }}">
 {{ csrf_field() }}

 <input type="submit" class="btn btn-primary" value="Update!">
</form>



@endsection