@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Administrator Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('admin-create') }}" class="list-group-item list-group-item-action text-white active"><i
                        class="fa fa-users" id="icons" aria-hidden="true"></i>Users</a>
                <a href="{{ route('student-thesis') }}" class="list-group-item list-group-item-action text-white"><i
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
                                <h5 class="card-title font-weight-bold">USERS</h5>
                                <div class="input-group rounded">
                                    <input type="search" id="search" class="form-control rounded" placeholder="Search"
                                        aria-label="Search" aria-describedby="search-addon" />
                                    <span class="input-group-text border-0" id="search-addon">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <br>
                                <table class="table table-hover">
                                    <thead class="thead-blue">
                                        <tr>
                                            <th scope="col" style="color: white;">Name</th>
                                            <th scope="col" style="color: white;">User Type</th>
                                            <th scope="col" style="color: white;">Edit</th>
                                            <th scope="col" style="color: white;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CREATE USERS</h5>
                                <div class="col-sm-6">
                                    <h5 style="text-align: center">Create Student</h4>
                                        @if (session('student_created'))
                                            <div class="alert alert-success">
                                               <li> {{ session('student_created') }} </li>
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
                                        <form method="POST" action="createStudent" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" required
                                                        autocomplete="name" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail
                                                    Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email"
                                                        required autocomplete="email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="program"
                                                    class="col-md-4 col-form-label text-md-right">Program</label>

                                                <div class="col-md-6">
                                                    <select class="form-control" id="program" name="program">
                                                        <option value="Masters" selected>Masters</option>
                                                        <option value="PhD">PhD</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="department"
                                                    class="col-md-4 col-form-label text-md-right">Department</label>

                                                <div class="col-md-6">
                                                    <select class="form-control" id="department" name="department">
                                                        <option value="Masters" selected>Computer Science
                                                        </option>
                                                        <option value="PhD">Informatics</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control"
                                                        name="password" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">Confirm
                                                    Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="row text center" style="text-align: center">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="create-student" class="btn btn-primary">
                                                        Create Student
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            <hr>
                        </div>

                        {{-- <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CREATE STUDENT</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="createStudent" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="program" class="col-md-4 col-form-label text-md-right">Program</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" id="program" name="program">
                                                <option value="Masters" selected>Masters</option>
                                                <option value="PhD">PhD</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" id="department" name="department">
                                                <option value="Masters" selected>Computer Science</option>
                                                <option value="PhD">Informatics</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>          
                                    <div class="row text center" style="text-align: center">
                                        <div class="col-sm-12">
                                            <button type="submit" id="create-student" class="btn btn-primary">
                                                Create Student
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Create Supervisor Form -->
                {{-- <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CREATE SUPERVISOR</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="createSupervisor" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" id="department" name="department" required>
                                                <option value="Computer Science" selected>Computer Science</option>
                                                <option value="Informatics">Informatics</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="office" class="col-md-4 col-form-label text-md-right">Office Location</label>
            
                                        <div class="col-md-6">
                                            <input id="office" type="text" class="form-control" name="office" required autocomplete="office" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="tel" placeholder="E.g +264611234567" class="form-control" name="phone" required autocomplete="phone" autofocus>
                                            <small class="form-text text-muted">Must Start With +26461. No Whitespace</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>          
                                    <div class="row text center" style="text-align: center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">
                                                Create Supervisor
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End of Create Supervisor Form -->
            </div>
        </div>
    </div>
@endsection
