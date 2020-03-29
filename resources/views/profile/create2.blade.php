@extends('layouts.front2')
@section('title','createprofile')

@section('content')


<link rel="stylesheet" href="{{ asset('css/main21.css') }}">

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

    @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
        <input type="file" class="here" name="plus[]">
        <input type="submit" value="post">

        <div class="create">
            <div class="btn createbtn">
                <h2>Create!</h2>
            </div>
        </div>

    
                </form>
            </div>
        </div>
    </div>

</form>

  

</div>

@endsection