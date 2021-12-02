<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Самоучитель немецкого языка для начинающих' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcat icon" type="image/png" href="{{ asset('favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css')}}/app.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('comments/css')}}/comments.css" />
    <script type="text/javascript" src="{{asset('js')}}/app.js" /></script>
    <script type="text/javascript" src="{{asset('comments/js')}}/comment-reply.js" /></script>
    <script type="text/javascript" src="{{asset('comments/js')}}/comment-scripts.js" /></script>
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"  type="text/javascript" charset="utf-8" ></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">Самоучитель немецкого языка для начинающих</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
{{--<li class="nav-item">
    <a class="nav-link" href="#">Авторы</a>
</li>--}}
{{--}}<li class="nav-item">
    <a class="nav-link" href="#">Контакты</a>
</li>--}}
</ul>
<form class="form-inline my-2 my-lg-0" action="{{ route('post.search') }}">
<input class="form-control mr-sm-2" type="search" name="search"
       placeholder="Найти..." aria-label="Поиск">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
</form>
<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
<!-- Authentication Links -->
@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @auth
                @if (auth()->id() == 1)
                    <a  class="dropdown-item" href="{{ route('post.create') }}">Создать статью</a>
                @endif
            @endauth
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </li>
@endguest
</ul>
</div>
</nav>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible mt-4" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
<span aria-hidden="true">&times;</span>
</button>
{{ $message }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible mt-4" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
<span aria-hidden="true">&times;</span>
</button>
<ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@yield('content')
@yield('comments')
</div>
</body>
<script>
    var editor = CKEDITOR.replace( 'ckeditor_ed' );
</script>
</html>
