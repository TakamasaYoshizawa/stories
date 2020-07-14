@extends('layouts.front2')
@section('title','mainpage')

@section('content')

<link rel="stylesheet" href="{{ asset('css/main2.css') }}">

<div class="profile">
    <div class="name">
        @guest
        <a class="nav-link2" href="{{ route('register')}}">{{ __('Create Accout!')}}</a>
        @else
        <a id="navbarDropdown" class="nav-link2" href="#" role="button">
            {{ Auth::user()->name }}<span class="caret"></span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>

<div class="aboutme">
  <tbody>
    @foreach($posts as $profile)
        <tr>
            <td>{{ \Str::limit($profile->title, 100) }}</td>
            <td>{{ \Str::limit($profile->body, 250) }}</td>
        </tr>
        <a href="{{ action('ProfileController@delete', ['id' => $profile->id]) }}" class="update">delete</a>
        <a href="{{ action('ProfileController@update', ['id' => $profile->id]) }}" class="update">update</a>
    @endforeach
</tbody>
<br>
</div>
</div>

<div class="new">
    <div class="newtitle">
        <h1>New</h1>
    </div>
    
    <div class="container1">
        @foreach ($images as $image)

        <img src="/storage/{{ $image->path . $image->name }}" class="images" style="height: 250px; width: 250px; border-radius: 50%;">

       　<a href="{{ action('StoriesController@delete', ['id' => $image->id]) }}" class="update">delete</a>
        @endforeach
    <div class="more">
        more...
    </div>
    </div>
</div>


{{ csrf_field() }}
@endsection