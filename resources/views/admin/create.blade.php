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
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="createUser" value="student" id="createStudent" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Student
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="createUser" value="supervisor" id="createSupervisor">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Supervisor
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="createUser" value="HOD" id="createHOD">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    HOD
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="createUser" value="FHDC" id="createHDC">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    FHDC
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row student form">
                                    <div class="col-sm-12">
                                        <br>
                                        <hr>
                                        <h5 style="text-align: center">Create Student</h5>
                                        <div class="alert alert-danger print-std-error-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                <ul></ul>
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="alert alert-success print-std-success-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                Student Successfully Added.
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif --}}
                                            <form id="studentForm">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="student_name" required
                                                            autofocus>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail
                                                        Address <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="student_email"
                                                            required>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="program"
                                                        class="col-md-4 col-form-label text-md-right">Program <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="program" name="student_program">
                                                            <option value="Masters" selected>Masters</option>
                                                            <option value="PhD">PhD</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="department"
                                                        class="col-md-4 col-form-label text-md-right">Department <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="department" name="student_department">
                                                            <option value="Masters" selected>Computer Science
                                                            </option>
                                                            <option value="PhD">Informatics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password"
                                                        class="col-md-4 col-form-label text-md-right">Password <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control"
                                                            name="student_password" required>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-right">Confirm
                                                        Password <span id="required">*</span></label>
    
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="student_confirmation" required>
                                                    </div>
                                                </div>
                                                <div class="row text center" style="text-align: center">
                                                    <div class="col-sm-12">
                                                        <button type="submit" id="studentSubmit" class="btn btn-primary">
                                                            Create Student
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                                <div class="row supervisor form">
                                    <div class="col-sm-12">
                                        <br>
                                        <hr>
                                        <h5 class="card-title">Create Supervisor</h5>

                                        <div class="alert alert-danger print-super-error-msg" role="alert" style="display:none">
                                            <strong>
                                                <ul></ul>
                                            </strong>
                                        </div>

                                        <div class="alert alert-success print-super-success-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                Supervisor Successfully Added.
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif --}}
                                        <!--<span class="alert a success-text"></span>-->

                                        <form id="supervisorForm">
                                            @csrf
                                            <div class="form-group row required">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="supervisor_name" required autofocus>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="supervisor_email" required>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="department" class="col-md-4 col-form-label text-md-right">Department <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <select class="form-control" id="department" name="supervisor_department" required>
                                                        <option value="Computer Science" selected>Computer Science</option>
                                                        <option value="Informatics">Informatics</option>
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="office" class="col-md-4 col-form-label text-md-right">Office Location <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="office" type="text" class="form-control" name="supervisor_office" required autofocus>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="phone" type="tel" placeholder="E.g +264611234567" class="form-control" name="supervisor_phone" required autofocus>
                                                    <small class="form-text text-muted">Must Start With +26461. No Whitespaces</small>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="supervisor_password" required>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="supervisor_confirmation" required>
                                                </div>
                                            </div>          
                                            <div class="row text center" style="text-align: center">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="supervisorSubmit" class="btn btn-primary">
                                                        Create Supervisor
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row HOD form">
                                    <div class="col-sm-12">
                                        <br>
                                        <hr>
                                        <h5 class="card-title">Create HOD</h5>

                                        <div class="alert alert-danger print-hod-error-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                <ul></ul>
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="alert alert-success print-hod-success-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                HOD Successfully Added.
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif --}}
                                        <!--<span class="alert a success-text"></span>-->

                                        <form id="hodForm">
                                            @csrf
                                            <div class="form-group row required">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="hod_name" required autofocus>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="hod_email" required>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="hod_password" required>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="hod_confirmation" required>
                                                </div>
                                            </div>          
                                            <div class="row text center" style="text-align: center">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="hodSubmit" class="btn btn-primary">
                                                        Create HOD
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row FHDC form">
                                    <div class="col-sm-12">
                                        <br>
                                        <hr>
                                        <h5 class="card-title">Create FHDC</h5>

                                        <div class="alert alert-danger print-fhdc-error-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                <ul></ul>
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="alert alert-success print-fhdc-success-msg alert-dismissible fade show" role="alert" style="display:none">
                                            <strong>
                                                FHDC Successfully Added.
                                            </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif --}}
                                        <!--<span class="alert a success-text"></span>-->

                                        <form id="hodForm">
                                            @csrf
                                            <div class="form-group row required">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="fhdc_name" required autofocus>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="fhdc_email" required>
                                                </div>
                                            </div>
        
                                            <div class="form-group row required">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="fhdc_password" required>
                                                </div>
                                            </div>
                    
                                            <div class="form-group row required">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password <span id="required">*</span></label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="fhdc_confirmation" required>
                                                </div>
                                            </div>          
                                            <div class="row text center" style="text-align: center">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="fhdcSubmit" class="btn btn-primary">
                                                        Create FHDC
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
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
