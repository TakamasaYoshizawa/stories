<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/main2.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>


<body>
<header>
    <div class="header">
        <div class="titletitle">
            <h1><a href="{{ url('/')}}" class="titlea"><i class="fas fa-hat-wizard"></i> |Title</a></h1>
        </div>
        <div class="titleicon">

            <a href="{{ url('/stories/create') }}"><i class="far fa-images"></i></a>
            <a href="{{ url('/register') }}"><i class="far fa-user-edit"></i></a>
            <a href="{{ url('/profile/create3') }} "><i class="far fa-user"></i></a>


            <ul class="navbar-nav">
                            @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                            @else
                            <li class="nav-item dropdown">

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
        </div>


    </div>


</header>
        <!--Profile-->
@yield('content')

<footer>
        <div class="footer">
            <div class="titlefooter"><h1>Title</h1></div>
        </div>
</footer>
    </body>

</html>
