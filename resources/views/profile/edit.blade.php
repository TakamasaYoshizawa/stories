@extends('layouts.front2')
@section('title', 'プロフィール編集')

<link rel="stylesheet" href="{{ asset('css/main21.css') }}">
@section('content')

<div class="title1">
    <h1>Create Account</h1>    
</div>

<div class="user-details">

    <div class="form1">
        <label class="h1">FirstName</label>
        <div class="t1">
            <input type="text" class="form" name="firstname" value="{{ old('title') }}">
        </div>
    </div>

    <div class="form1">
        <label class="h1">FamilyName</label>
        <div class="t2">
            <input type="text" class="form" name="familyname" value="{{ old('title') }}">
        </div>
    </div>

    <div class="form1">
        <label class="h1">UserName</label>
        <div class="t3">
            <input type="text" class="form" name="username" value="{{ old('title') }}">
        </div>
    </div>

    <div class="form1">
        <label class="h1">E-Mail Address</label>
        <div class="t4">
            <input type="text" class="form" name="e-mail" value="{{ old('title') }}">
        </div>
    </div>

    <div class="form1">
        <label class="h1">Profile Image</label>
        <div class="t5">
            <input type="file" class="fromfile" name="image">
        </div>
    </div>
</div>



<div class="create">
    <div class="btn createbtn">
        <h2>Update!</h2>
    </div>
</div>

{{csrf_field()}}
@endsection
