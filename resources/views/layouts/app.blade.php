<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!--Fancybox CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!--Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif


                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} ({{Auth::user()->fname}})
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                @if( Auth::user()->role==="user")
                                    <a class="dropdown-item" target="_blank"
                                       href="{{ route('exportappform.generate', Auth::id()) }}">Export as PDF</a>
                                @endif


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<!--Jquery-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!--Fancy Box-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


@if (Auth::check())

    @if(Auth::user()->role==="user")
        <!--Custom Scripts-->
        <script src="{{asset('js/global.js')}}"></script>
        <script src="{{asset('js/wizard.js')}}"></script>
        <script src="{{asset('js/basic_info.js')}}"></script>
        <script src="{{asset('js/passport_info.js')}}"></script>
        <script src="{{asset('js/promotion_info.js')}}"></script>
        <script src="{{asset('js/meddeco_info.js')}}"></script>
        <script src="{{asset('js/service_info.js')}}"></script>
        <script src="{{asset('js/appointment_info.js')}}"></script>
        <script src="{{asset('js/contact_info.js')}}"></script>
        <script src="{{asset('js/higher_edu_info.js')}}"></script>
        <script src="{{asset('js/academic_edu_info.js')}}"></script>
        <script src="{{asset('js/military_course_info.js')}}"></script>
        <script src="{{asset('js/children_info.js')}}"></script>
        <script src="{{asset('js/hobbies_info.js')}}"></script>
        <script src="{{asset('js/lang_info.js')}}"></script>
        <script src="{{asset('js/food_info.js')}}"></script>
        <script src="{{asset('js/vaccination_info.js')}}"></script>
        <!--Custom Scripts-->
    @endif
    @if(Auth::user()->role==="admin")
        <script src="{{asset('js/admin.js')}}"></script>
    @endif
@endif


<script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
