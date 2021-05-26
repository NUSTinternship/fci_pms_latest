@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Administrator Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('student-home')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{route('admin-create')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-users"
                        id="icons" aria-hidden="true"></i>Users</a>
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
                                <h5 class="card-header">{{ $user->name }}</h4><br>
                                    @if ($user->user_type == "Student")
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                        <li> {{ session('error') }} </li>
                                        </div>
                                        @endif
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                            <li> {{ session('success') }} </li>
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    <form method="POST" action="/admin/edit/{{ $user->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                
                                            <div class="col-md-6">
                                                <input id="name" value="{{ $user->name }}" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>
                
                                            <div class="col-md-6">
                                                <input id="email" value="{{ $user->email }}" type="email" class="form-control" name="email" autocomplete="email">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="program" class="col-md-4 col-form-label text-md-right">Program</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="program" name="program">
                                                    @if ($student->program == "Masters")
                                                    <option value="Masters" selected>Masters</option>
                                                    <option value="PhD">PhD</option>
                                                    @else
                                                    <option value="Masters">Masters</option>
                                                    <option value="PhD" selected>PhD</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="department" name="department">
                                                    @if ($student->department == "Computer Science")
                                                    <option value="Computer Science" selected>Computer Science</option>
                                                    <option value="Informatics">Informatics</option>
                                                    @else
                                                    <option value="Computer Science">Computer Science</option>
                                                    <option value="Informatics" selected>Informatics</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>          
                                        <div class="row text center" style="text-align: center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-header">Change Password</h4><br>
                                    <form method="POST" action="/admin/editPassword/{{ $user->id }}" enctype="multipart/form-data">
                                        @csrf
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                               <li> {{ session('error') }} </li>
                                            </div>
                                        @endif
                                        @if (session('message'))
                                            <div class="alert alert-success">
                                               <li> {{ session('message') }} </li>
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                
                                            <div class="col-md-6">
                                                <input id="current_password" type="password" class="form-control" name="current_password" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                
                                            <div class="col-md-6">
                                                <input id="new_password" type="password" class="form-control" name="new_password" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
                
                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
    
                                            
                                        <div class="row text center" style="text-align: center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
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