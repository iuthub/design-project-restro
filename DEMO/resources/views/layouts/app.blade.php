<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
        
        <title>Restaurant reservation</title>
        <link rel="shortcut icon" href="{{asset('data/images/logo.png')}}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('data/fonts/all.min.css')}}">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
        
        <link rel="stylesheet" href="{{asset('data/css/style.css')}}">
    </head>
    <body>
        @include('inc.navbar')
            <div class="messages">
                @include('inc.messages')
                @yield('content')
                    @php
                    $lk = '';
                        if(Route::getCurrentRoute()->uri() != '/')
                    $lk = 'position: fixed; bottom: 0; width: 100%';
                @endphp
                <footer class="footer" style="{{$lk}}">
                    <h5>© Copyright 2019 Tashkent, Inha University</h5>
                </footer>
            </div>

    </body>    
        {{-- <script src="{{asset('js/app.js')}}"></script> --}}
        
        <script src="{{asset('/data/js/index.js')}}"></script>
</html>
