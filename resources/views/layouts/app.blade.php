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
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

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
        jQuery(document).ready(function($) {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).data('value')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(this.Counter.toFixed(0));
                    }
                });
            });

            // Show Create User Form Depending On Radio Value
            $("#student").prop("checked", true);
            $(".form").not("." + "student").hide();

            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr('value');
                var targetDiv = $("." + inputValue);
                $(".form").not(targetDiv).hide();
                $(targetDiv).show();
            })

            $("#supervisorSubmit").click(function(e) {
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
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        department: department,
                        phone: phone,
                        office: office,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#supervisorForm")[0].reset();
                            $(".print-super-error-msg").find("ul").html('');
                            $(".print-super-error-msg").css('display', 'none');
                            printSuccessMsg("supervisor");
                        } else {
                            printErrorMsg(data.error, "supervisor")
                        }
                    }
                });
            });

            $("#hodSubmit").click(function(e) {
                e.preventDefault();

                var _token = $("input[name=_token]").val();
                var name = $("input[name=hod_name]").val();
                var email = $("input[name=hod_email]").val();
                var password = $("input[name=hod_password]").val();
                var password_confirmation = $("input[name=hod_confirmation]").val();

                $.ajax({
                    url: "{{ route('createHOD') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodForm")[0].reset();
                            $(".print-hod-error-msg").find("ul").html('');
                            $(".print-hod-error-msg").css('display', 'none');
                            printSuccessMsg("hod");
                        } else {
                            printErrorMsg(data.error, "hod");
                        }
                    }
                });
            });

            $("#fhdcSubmit").click(function(e) {
                e.preventDefault();

                var _token = $("input[name=_token]").val();
                var name = $("input[name=fhdc_name]").val();
                var email = $("input[name=fhdc_email]").val();
                var password = $("input[name=fhdc_password]").val();
                var password_confirmation = $("input[name=fhdc_confirmation]").val();

                $.ajax({
                    url: "{{ route('createFHDC') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#fhdcForm")[0].reset();
                            $(".print-fhdc-error-msg").find("ul").html('');
                            $(".print-fhdc-error-msg").css('display', 'none');
                            $(".print-fhdc-success-msg").show();
                        } else {
                            printErrorMsg(data.error, "fhdc");
                        }
                    }
                });
            });
            
            $("#proposalDocumentsSubmit").click(function(e) {
                e.preventDefault();
                $("#proposalDocumentsSubmit").html('Processing...');

                var postData = new FormData($('#proposal_documents')[0]);

                $.ajax({
                    url: "{{ route('uploadProposalDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-documents-error-msg").find("ul").html('');
                            $(".print-documents-error-msg").css('display', 'none');
                            $(".print-documents-success-msg").show();
                            $("#proposalDocumentsSubmit").html('Submit');
                            $("#proposalDocumentsSubmit").attr('disabled', true);
                            $("#proposal_summary").attr('disabled', true);
                            $("#plagiarism_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                        } else {
                            $("#proposalDocumentsSubmit").html('Submit');
                            printErrorMsg(data.error, "proposal_documents");
                        }
                    }
                });
            });

            $("#thesisDocumentsSubmit").click(function(e) {
                e.preventDefault();
                $("#thesisDocumentsSubmit").html('Processing...');

                var postData = new FormData($('#thesis_documents')[0]);

                $.ajax({
                    url: "{{ route('uploadThesisDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-thesis-error-msg").find("ul").html('');
                            $(".print-thesis-error-msg").css('display', 'none');
                            $(".print-thesis-success-msg").show();
                            $("#thesisDocumentsSubmit").html('Submit');
                            $("#thesisDocumentsSubmit").attr('disabled', true);
                            $("#thesis_summary").attr('disabled', true);
                            $("#plagiarism_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                        } else {
                            $("#proposalDocumentsSubmit").html('Submit');
                            printErrorMsg(data.error, "thesis_documents");
                        }
                    }
                });
            });

            $("#studentSubmit").click(function(e) {
                e.preventDefault();

                var _token = $("input[name=_token]").val();
                var name = $("input[name=student_name]").val();
                var email = $("input[name=student_email]").val();
                var program = $("select[name=student_program]").val();
                var department = $("select[name=student_department]").val();
                var password = $("input[name=student_password]").val();
                var password_confirmation = $("input[name=student_confirmation]").val();

                $.ajax({
                    url: "{{ route('createStudent') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        department: department,
                        program: program,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#studentForm")[0].reset();
                            $(".print-std-error-msg").find("ul").html('');
                            $(".print-std-error-msg").css('display', 'none');
                            printSuccessMsg("student");
                        } else {
                            printErrorMsg(data.error, "student");
                        }
                    }
                });
            });

            function printErrorMsg(msg, role) {
                switch (role) {
                    case "student":
                        $(".print-std-error-msg").find("ul").html('');
                        $(".print-std-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-std-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "supervisor":
                        $(".print-super-error-msg").find("ul").html('');
                        $(".print-super-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-super-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hod":
                        $(".print-hod-error-msg").find("ul").html('');
                        $(".print-hod-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-hod-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "fhdc":
                        $(".print-fhdc-error-msg").find("ul").html('');
                        $(".print-fhdc-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-fhdc-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "proposal_documents":
                        $(".print-documents-error-msg").find("ul").html('');
                        $(".print-documents-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-documents-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "thesis_documents":
                        $(".print-thesis-error-msg").find("ul").html('');
                        $(".print-thesis-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesis-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    default:
                        break;
                }
                // $(".print-std-error-msg").find("ul").html('');
                // $(".print-std-error-msg").css('display', 'block');
                // $.each(msg, function(key, value) {
                //     $(".print-std-error-msg").find("ul").append('<li>' + value + '</li>');
                // });
            }

            function printSuccessMsg(role) {
                switch (role) {
                    case "student":
                    $(".print-std-success-msg").show();
                        break;
                    case "supervisor":
                    $(".print-super-success-msg").show();
                    break;
                    case "hod":
                    $(".print-hod-success-msg").show();
                    break;
                    case "fhdc":
                    $(".print-fhdc-success-msg").show();
                    break;
                    default:
                        break;
                }
                // $(".print-std-success-msg").show();
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

            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value == '') {
                    $value = '';
                    $.ajax({
                        type: 'get',
                        url: '{{ route('search') }}',
                        data: {
                            'search': $value
                        },
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    });
                } else {
                    $.ajax({
                        type: 'get',
                        url: '{{ route('search') }}',
                        data: {
                            'search': $value
                        },
                        success: function(data) {
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
                    <img src="{{ asset('images/logo.png') }}" style="height: 70px; width: 320px;" class="img-fluid"
                        alt="NUST Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
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

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @endif

                            @if (Route::has('register'))

                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif
                        @else
                            <li class="nav-item dropdown" style="list-style-type: none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Edit Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
