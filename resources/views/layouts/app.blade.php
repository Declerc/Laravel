<?php use Illuminate\Support\Facades\Route; ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Livres') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Livres', 'Livres') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>


@if (Request::getRequestUri() == "/search" || Request::getRequestUri() == "/searchA" || Request::getRequestUri() == "/livres" || Request::getRequestUri() == "/" || Request::getRequestUri() == "/searchF")

<form action="/searchA" method="post" role="search">
    {{ csrf_field() }}
    <input type="search" placeholder="Entrez un auteur" name="the_search">
    <input id="search-btn" type="submit" value="Rechercher" />
</form>
<!--@show <div class="container"> @yield('content') </div> </body> </html>-->
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <select name="request">
            <option value="rien"></option>
            @foreach($genres as $key => $value)
                @foreach($genres[$key] as $key => $value)
                    @if ($key === 'gen_libelle')
                        <option value="{{$value}}">{{$value}}</option>
                    @endif
                @endforeach
            @endforeach
        </select>
        <input type="submit" class="btn btn-default">
        </input>
        </span>
    </div>
</form>
<form action="/searchF" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <select name="searchF">
            <option value="rien"></option>
            @foreach($formats as $key => $value)
                @foreach($formats[$key] as $key => $value)
                    @if ($key === 'for_libelle')
                        <option value="{{$value}}">{{$value}}</option>
                    @endif
                @endforeach
            @endforeach
        </select>
        <input type="submit" class="btn btn-default">
        </input>
        </span>
    </div>
</form>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@yield('listeLivre')
@endif


