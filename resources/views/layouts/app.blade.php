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

     <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/bootstrap.js') }}" defer ></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Script To Setup AJAX -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Menu Toggle Script -->
    <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });

            // Show Create User Form Depending On Radio Value
            $("#student").prop("checked", true);
            $(".form").not("." + "student").hide();

            $('input[type="radio"]').click(function () {
                var inputValue = $(this).attr('value');
                var targetDiv = $("." + inputValue);
                $(".form").not(targetDiv).hide();
                $(targetDiv).show();
            })

            $("#supervisorSubmit").click(function(e){
                e.preventDefault();
        
                var _token = $("input[name=_token]").val();
                var name = $("input[name=supervisor_name]").val();
                var email = $("input[name=supervisor_email]").val();
                var department = $("select[name=supervisor_department]").val();
                var phone = $("input[name=supervisor_phone]").val();
                var office = $("input[name=supervisor_office]").val();
                var password = $("input[name=supervisor_password]").val();
                var password_confirmation = $("input[name=supervisor_confirmation]").val();

                $.ajax({
                    url: "{{ route('createSupervisor') }}",
                    type:'POST',
                    data: {_token:_token, name:name, email:email, department:department, phone:phone, office:office, password:password, password_confirmation:password_confirmation},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            $("#supervisorForm")[0].reset();
                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display','none');
                            printSuccessMsg();
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });
            }); 
        
            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }

            function printSuccessMsg () {
                $(".print-success-msg").show();
            }

            

            // fetch_users();

            // function fetch_users(query='') {
            //     $.ajax({
            //         type : 'get',
            //         url : '{{ route('search') }}',
            //         data:{query:query},
            //         success:function(data){
            //         $('tbody').html(data);
            //         }
            //     })
            // }

            // $('#search').on('keyup', function() {
            //     $query = $(this).val();
            //     fetch_users($query);
            // });

            $('#search').on('keyup',function(){
                $value=$(this).val();
                if ($value == '') {
                    $value = '';
                    $.ajax({
                        type : 'get',
                        url : '{{ route('search') }}',
                        data:{'search':$value},
                        success:function(data){
                        $('tbody').html(data);
                        }
                    });
                } else {
                    $.ajax({
                        type : 'get',
                        url : '{{ route('search') }}',
                        data:{'search':$value},
                        success:function(data){
                        $('tbody').html(data);
                        }
                    });
                }
            })

        })
    </script>

</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height: 70px; width: 320px;" class="img-fluid" alt="NUST Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                
                            @endif
                            
                            @if (Route::has('register'))
                                
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                        @else
                            <li class="nav-item dropdown" style="list-style-type: none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Edit Profile') }}
                                    </a>

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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
