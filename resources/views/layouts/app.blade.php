<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/masonry-docs.css') }}" rel="stylesheet">
    <link rel=stylesheet href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="{{asset('css/croppie.css')}}"/>
    <link href="{{ asset('css/rita_style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/masonry-docs.min.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/bootstrap-waterfall.js') }}"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="{{asset('js/croppie.js')}}"></script>
    <script src="http://desandro.github.io/imagesloaded/imagesloaded.pkgd.min.js">
        
    </script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body style="background-image: url(img/farm.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top;
            background-size: cover;">
<div>
    <div id="app" style="margin-top: 80px;">
         <nav class="navbar navbar-default navbar-fixed-top" style="background-color:rgb(140, 189, 158); padding: 10px">
            <div class="container">
                <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}" style="font-size: 30px;color: #FFFFFF">
                        管理系統
                    </a>

                     </div>
                     <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right"
                        style="background-color:rgb(140, 189, 158) ;font-size: 17px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li style="background-image: url(img/cloud.png);width: 90px;height: 55px"><a
                                        href="{{ route('login') }}" style="color: #FFFFFF;padding:17px 23px">Login</a>
                            </li>
                    </ul>
                 </nav>
                 @else
             <!-- S
                 <a href="/post">貼文</a>
                    <a href="/todo">上傳圖片</a>
                    <a href="/Real-time-data">即時資料</a>
                    <a href="/history">歷史資料</a>
                    <a href="/profile">個人資訊</a> -->

            <li><a a href="{{ url('/home') }}" style="color: #FFFFFF">查看留言</a></li>
            <li><a a href="{{ url('/post') }}" style="color: #FFFFFF">上傳圖片</a></li>
            <li><a a href="{{ url('instant')}}" style="color: #FFFFFF" name="exec" >即時資料</a></li>
            <li><a a href="{{ url('history') }}" style="color: #FFFFFF">歷史資料</a></li>
            <li class="nav-item"><a href="{{ url('vnc') }}" style="color: #FFFFFF">Vnc操作手冊</a></li>
            <li class="nav-item"><a href="{{ url('/profile') }}" style="color: #FFFFFF">個人資料</a></li>
            <li class="nav-item"><a href="#" style="color: #FFFFFF">{{ Auth::user()->name }} </a></li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" style="color: #FFFFFF" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    登出</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display:none; color: #FFFFFF">
                    {{ csrf_field() }}
                </form>
            </li>

            </ul>
            </li>

            </ul>
       
 </div>
@endif

</div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
