@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
          <div class="sidebar-heading">Student Portal</div>
          <div class="list-group list-group-flush">
              <a href="{{ route('student-home') }}" class="list-group-item list-group-item-action text-white"><i
                      class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
              <a href="{{ route('student-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                      class="fa fa-table" id="icons" aria-hidden="true"></i>Proposal</a>
              <a href="{{ route('student-thesis') }}" class="list-group-item list-group-item-action text-white active"><i
                      class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
          </div>
      </div>
      <!-- End Of Sidebar -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
          <!-- If Student Hasn't Submitted Proposal Yet -->
          <div class="container-fluid">
              <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                          aria-hidden="true"></i></span></button>
              <div class="row" style="padding-top: 3%;">
                  <div class="col-sm-12">
                      <!--Monthly Progress Reports-->
                      <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                          <h5 class="card-header">Monthly Progress Reports</h5>
                          <div class="card-body">
                              <hr>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="card-rectangle" style="width: 18rem;">
                                          <div class="card-body">
                                              <h5 class="card-title">Outstanding</h5>
                                              <a href="#" class="card-link" data-toggle="modal"
                                                  data-target="#outstanding">
                                                  <p class="card-text" style="font-size: 50px;">5</p>
                                              </a>
                                              <!-- Outstanding Reports Modal -->
                                              <div class="modal fade" id="outstanding" tabindex="-1" role="dialog"
                                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Outstanding
                                                                  Reports</h5>
                                                              <button type="button" class="close" style="color: white;"
                                                                  data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <ul>
                                                                  <li>April Progress Report</li>
                                                                  <li>May Progress Report</li>
                                                                  <li>June Progress Report</li>
                                                              </ul>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary"
                                                                  data-dismiss="modal">Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="card-rectangle" style="width: 18rem;">
                                          <div class="card-body">
                                              <h5 class="card-title">Late</h5>
                                              <a href="#" class="card-link" data-toggle="modal" data-target="#late">
                                                  <p class="card-text" style="font-size: 50px;">5</p>
                                              </a>
                                              <!-- Late Reports Modal -->
                                              <div class="modal fade" id="late" tabindex="-1" role="dialog"
                                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Late
                                                                  Submissions</h5>
                                                              <button type="button" class="close" style="color: white;"
                                                                  data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <ul>
                                                                  <li>April Progress Report</li>
                                                              </ul>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary"
                                                                  data-dismiss="modal">Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="card-rectangle" style="width: 18rem;">
                                          <div class="card-body">
                                              <h5 class="card-title">On Time</h5>
                                              <a href="#" class="card-link" data-toggle="modal" data-target="#ontime">
                                                  <p class="card-text" style="font-size: 50px;">5</p>
                                              </a>
                                              <!-- On Time Reports Modal -->
                                              <div class="modal fade" id="ontime" tabindex="-1" role="dialog"
                                                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Reports
                                                                  Submitted On Time</h5>
                                                              <button type="button" class="close" style="color: white;"
                                                                  data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <ul>
                                                                  <li>April Progress Report</li>
                                                                  <li>May Progress Report</li>
                                                              </ul>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary"
                                                                  data-dismiss="modal">Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="card-rectangle" style="width: 18rem; float: left;">
                                          <div class="card-body">
                                              <a href="#" class="card-link" data-toggle="modal"
                                                  data-target="#submitReport">
                                                  <p class="card-text" style="font-size: 37px;">Submit <br> Report</p>
                                              </a>
                                          </div>
                                      </div>
                                      <!--Modal To Submit Report-->
                                      <div class="modal fade" id="submitReport" tabindex="-1" role="dialog"
                                          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Submit Monthly
                                                          Progress Reports</h5>
                                                      <button type="button" class="close" style="color: white;"
                                                          data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <b>Current Month</b>
                                                      <form>
                                                          <div class="form-group">
                                                              <label for="exampleFormControlFile1">April Progress
                                                                  Report</label>
                                                              <input type="file" class="form-control-file"
                                                                  id="exampleFormControlFile1">
                                                          </div>
                                                      </form>

                                                      <b>Outstanding Monthly Reports</b>
                                                      <form>
                                                          <div class="form-group">
                                                              <label for="exampleFormControlFile1">January Progress
                                                                  Report</label>
                                                              <input type="file" class="form-control-file"
                                                                  id="exampleFormControlFile1">
                                                          </div>
                                                      </form>

                                                      <form>
                                                          <div class="form-group">
                                                              <label for="exampleFormControlFile1">February Progress
                                                                  Report</label>
                                                              <input type="file" class="form-control-file"
                                                                  id="exampleFormControlFile1">
                                                          </div>
                                                      </form>

                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary"
                                                          data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Submit</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                          </div>
                      </div>
                      <div class="card shadow p-3 mb-5 bg-white rounded">
                          <h5 class="card-header">Final Thesis</h5>
                          <hr>
                          <p style="color: black;">Please submit the following documents:</p>
                          <ul>
                              <li>Intention To Submit Thesis</li>
                              <li>Thesis Abstract</li>
                              <li>Final Thesis</li>
                          </ul>
                          <!-- Button trigger modal -->
                          <div class="text-center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#final">
                                  Submit
                              </button>
                          </div>
                          <!--Modal To Submit Final Proposal Documents-->
                          <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis Documents</h5>
                                          <button type="button" class="close" style="color: white;" data-dismiss="modal"
                                              aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form id="thesis_documents">
                                              <div class="form-group">
                                                  <label for="intention" id="intention" style="color: black;">Intention To
                                                      Submit</label>
                                                  <input type="file" class="form-control-file"
                                                      id="exampleFormControlFile1">

                                                  <label for="exampleFormControlFile1" style="color: black;">Thesis
                                                      Abstract</label>
                                                  <input type="file" class="form-control-file"
                                                      id="exampleFormControlFile1">

                                                  <label for="exampleFormControlFile1" style="color: black;">Final
                                                      Thesis</label>
                                                  <input type="file" class="form-control-file"
                                                      id="exampleFormControlFile1">
                                              </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                              data-dismiss="modal">Close</button>
                                          <button type="button" id="thesisDocumentsSubmit" class="btn btn-primary">Submit</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <hr>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Of Page Content -->
  @endsection
