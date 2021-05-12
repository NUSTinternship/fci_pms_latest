@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Supervisor Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('supervisor')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="progress.html" class="list-group-item list-group-item-action text-white"><i class="fa fa-tasks"
                        id="icons" aria-hidden="true"></i>Progress</a>
                <a href="{{ route('superProposal') }}" class="list-group-item list-group-item-action text-white"><i class="fa fa-sticky-note"
                        id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('superThesis') }}" class="list-group-item list-group-item-action text-white"><i
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
                  <h5 class="card-title font-weight-bold">MY STUDENTS</h5>
                  <table class="table">
                    <thead class="thead-blue">
                      <tr>
                        <th scope="col" style="color: white;">Student</th>
                        <th scope="col" style="color: white;">Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Peter Jonas</td>
                        <td>
                          Proposal
                        </td>
                      </tr>
                      <tr>
  
                        <td>Jonas Peter</td>
                        <td>
                          Thesis
                        </td>
                      </tr>
                      <tr>
                        <td>Tangeni Samuel</td>
                        <td>
                          Exam
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="text-center">
                    <a href="all-students.html" type="button" class="btn btn-primary">See All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-secondary">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">GRADUATED STUDENTS</h5>
                  <table class="table">
                    <thead class="thead-blue">
                      <tr>
                        <th scope="col" style="color: white;">Student</th>
                        <th scope="col" style="color: white;">Proposal</th>
                        <th scope="col" style="color: white;">Summary</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Peter Jonas</td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                      </tr>
                      <tr>
                        <td>Jonas Peter</td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                      </tr>
                      <tr>
                        <td>Tangeni Samuel</td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                        <td>
                          <i class="fa fa-download"></i>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="text-center">
                    <a href="all-graduates.html" type="button" class="btn btn-primary">See All</a>
                  </div>
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
      <!-- /#page-content-wrapper -->
    </div>
    @endsection
