@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Administrator Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('student-home')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{route('student-proposal')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-sticky-note"
                        id="icons" aria-hidden="true"></i>Proposal</a>
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
                    <div class="col-sm-6">
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
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-secondary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">SUPERVISOR DETAILS</h5>
                                <p>Name: Nasimane Ekandjo</p>
                                <hr>
                                <p>Email: nekandjo@nust.na</p>
                                <hr>
                                <p>Office: Poly Heights Room 508</p>
                                <hr>
                                <p>Phone: +264 61 12345</p>
                                <!--<a href="#" class="btn btn-primary">Contact Supervisor</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid content-row">
                <div class="row" style="padding-top: 3%;">
                  <div class="col-sm-6">
                    <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-success" style="height: 24rem;">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">TEMPLATES</h5>
                        <ul>
                          <li><a href="#">Application Form</a></li>
                          <li><a href="#">Report Template</a></li>
                          <li><a href="#">Checklist</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-danger" style="height: 24rem;">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">CALENDER</h5>
                          <div class="row d-flex align-items-stretch">
                            <div class="col-sm-12">
                                  <table class="table table-sm table-bordered table-striped">
                                        <thead style="text-align: center;">
                                            <tr>
                                              <th colspan="7" >
                                                <a class="btn"><i class="fa fa-chevron-left"></i></a>
                                                <a class="btn">February 2012</a>
                                                <a class="btn"><i class="fa fa-chevron-right"></i></a>
                                              </th>
                                            </tr>
                                            <tr>
                                                <th>Su</th>
                                                <th>Mo</th>
                                                <th>Tu</th>
                                                <th>We</th>
                                                <th>Th</th>
                                                <th>Fr</th>
                                                <th>Sa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="muted">29</td>
                                                <td class="muted">30</td>
                                                <td class="muted">31</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>13</td>
                                                <td>14</td>
                                                <td>15</td>
                                                <td>16</td>
                                                <td>17</td>
                                                <td>18</td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td><strong>20</strong></td>
                                                <td>21</td>
                                                <td>22</td>
                                                <td>23</td>
                                                <td>24</td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td>26</td>
                                                <td>27</td>
                                                <td>28</td>
                                                <td>29</td>
                                                <td class="muted">1</td>
                                                <td class="muted">2</td>
                                                <td class="muted">3</td>
                                            </tr>
                                        </tbody>
                                    </table>    
                            </div>
                          </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    @endsection
