<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fixes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
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
                    <a class="navbar-brand" href="{{ url('/bunch') }}">
                        {{ config('app.name', 'Laravel') }}
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
                            <li><a href="{{ url('/campaign') }}">Campaigns</a> </li>
                            <li><a href="{{ url('/template') }}">Templates</a> </li>
                            <li><a href="{{ url('/bunch') }}">Bunches</a> </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

    {{--<script>--}}
        {{--var mymymy = "hello";--}}
        {{--console.log((mymymy));--}}
    {{--</script>--}}

<script>
    $('#bunch').on('change',function (e) {
//        console.log(e);
        var cat_id = e.target.value;
        console.log(e.target.value);
//        document.getElementById('test').name = cat_id;
    });
</script>

    {{--<script>--}}
        {{--$('#template').on('change',function (e) {--}}
{{--//        console.log(e);--}}
            {{--var cat_id = e.target.value;--}}

            {{--document.getElementById('test1').value = cat_id;--}}
        {{--});--}}
    {{--</script>--}}


    {{--<script type="text/javascript">--}}
        {{--function a_value(o)--}}
        {{--{--}}
            {{--alert(o.value);--}}
        {{--}--}}
    {{--</script>--}}
<script>

//    $(".form-control_2").change(function() {
//        var b = 'test';
//        b= $(this).find('option:selected').text();
//        $("#metroDistance").css("display", "block");
//        $("#metroDistance .info__item").append(
//            "<span class='distance-option'><span class='metro-name'>"+ b +
//            " </span><input type='text' data-id='metro_distance'></span>");



//    });


//    $(document).ready(function (){
//        $('template_id').change(function (){
//            var val;
//            val=$(':selected',this).text();
//            alert(val);
//        });
//    });
</script>


</body>
</html>
