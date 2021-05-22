@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Administrator Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('admin-home')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{route('admin-create')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-users"
                        id="icons" aria-hidden="true"></i>Create Users</a>
                <a href="{{route('student-thesis')}}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                            aria-hidden="true"></i></span></button>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CREATE STUDENT</h5>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="program" class="col-md-4 col-form-label text-md-right">{{ __('Program') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="program" name="program">
                                                    <option value="Masters" selected>Masters</option>
                                                    <option value="PhD">PhD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="department" name="department">
                                                    <option value="Masters" selected>Computer Science</option>
                                                    <option value="PhD">Informatics</option>
                                                </select>
                                            </div>
                                        </div>

                                            <!--<div class="form-group row">
                                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="user_type" name="user_type">
                                                    <option value="Student" selected>Student</option>
                                                    <option value="Supervisor">Superviser</option>
                                                    <option value="HOD">Head of Department</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="FHDC">FHDC</option>
                                                </select>
                                            </div>
                                        </div>-->
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>          
                                        <div class="row text center" style="text-align: center">
                                            <div class="col-sm-12">
                                                <button type="submit" id="create-student" class="btn btn-primary">
                                                    {{ __('Create Student') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CREATE STUDENT</h5>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="program" class="col-md-4 col-form-label text-md-right">{{ __('Program') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="program" name="program">
                                                    <option value="Masters" selected>Masters</option>
                                                    <option value="PhD">PhD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="department" name="department">
                                                    <option value="Masters" selected>Computer Science</option>
                                                    <option value="PhD">Informatics</option>
                                                </select>
                                            </div>
                                        </div>

                                            <!--<div class="form-group row">
                                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="user_type" name="user_type">
                                                    <option value="Student" selected>Student</option>
                                                    <option value="Supervisor">Superviser</option>
                                                    <option value="HOD">Head of Department</option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="FHDC">FHDC</option>
                                                </select>
                                            </div>
                                        </div>-->
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>          
                                        <div class="row text center" style="text-align: center">
                                            <div class="col-sm-12">
                                                <button type="submit" id="create-student" class="btn btn-primary">
                                                    {{ __('Create Student') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
