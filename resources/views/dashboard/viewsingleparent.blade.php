@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Parents </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Parents  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <!-- right column -->
          <div class="col-md-12">
            
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Register Parents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {{-- <form action="{{ route('admin.createparent') }}" method="post" enctype="multipart/form-data">
                  @csrf
                   --}}
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> Sections</label>
                        
                        <select name="section" class="form-control">
                          <option value="{{ $view_singleparent->section }}">{{ $view_singleparent->section }}</option>
                          <option value="Pre-School">Pre-School</option>
                          <option value="Primary">Elementary</option>
                          <option value="Secondary">High School</option>

                        </select>
                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Father's Name</label>
                       <input type="text" value="{{ $view_singleparent->fathername }}" required name="fathername" class="form-control" placeholder="Father's Name">
                      </div>
                     
                    </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Father's Occupation</label>
                        <input type="text" value="{{ $view_singleparent->fatheroccupation }}" required name="fatheroccupation" class="form-control" placeholder="father's Occupation">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="text" name="mothername" value="{{ $view_singleparent->mothername }}" required class="form-control" placeholder="Mother's Name">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mother's Occupation</label>
                        <input type="text" name="motheroccupation" value="{{ $view_singleparent->motheroccupation }}" required class="form-control" placeholder="Mother's Occupation">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telephone</label>
                        <input type="number" required name="phone" value="{{ $view_singleparent->phone }}" class="form-control" placeholder="Telephone">
                    
                      </div>
                    </div>

                       <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                        <input type="email" name="email" @error('email')
                        @enderror  value="{{ $view_singleparent->email }}" class="form-control" placeholder="Email">
                         
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Academic Session</label>
                        <select name="academic_session" class="form-control">
                            <option value="{{ $view_singleparent->academic_session }}">{{ $view_singleparent->academic_session }}</option>
                        </select>
                      </div>
                    </div>

                 <div class="col-sm-6">
                        <div class="form-group">
                          <label>Marital Status</label>
                          <select name="maritalstatus" class="form-control">
                            <option value="{{ $view_singleparent->maritalstatus }}">{{ $view_singleparent->maritalstatus }}</option>
                            <option value="Single">Single</option>
                            <option value="Maried">Maried</option>
                            <option value="Divorced">Divorced</option>
                          </select>
                        </div>
                      </div>

                   <div class="col-sm-6">
                        <div class="form-group">
                          <label>Home Address</label>
                          <input type="text" value="{{ $view_singleparent->homeaddress }}" name="homeaddress" class="form-control" placeholder="Home address">
                        </div>
                      </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Office Address</label>
                          <input type="text" value="{{ $view_singleparent->officeaddress }}" name="officeaddress" class="form-control" placeholder="Office address">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>State of Origin</label>
                          <input type="text" value="{{ $view_singleparent->stateoforigin }}" name="stateoforigin" class="form-control" placeholder="State of Origin">

                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Doctor's Name</label>
                          <input type="text" name="doctorname" value="{{ $view_singleparent->doctorname }}" class="form-control" placeholder="Doctor's Name">

                        </div>
                      </div>
                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Doctor's Phone</label>
                          <input type="text" name="doctorphone" value="{{ $view_singleparent->doctorphone }}" class="form-control" placeholder="Doctor's Phone">

                        </div>
                      </div>

                       <div class="col-sm-6">
                        <div class="form-group">
                          <label>Emergency's Phone</label>
                          <input type="text" name="emergencyphone" value="{{ $view_singleparent->emergencyphone }}" class="form-control" placeholder="Emergency's Phone">

                        </div>
                      </div>

                       <div class="col-sm-6">
                        <div class="form-group">
                          <label>Emergency's Address</label>
                          <input type="text" value="{{ $view_singleparent->emergencyaddress }}" name="emergencyaddress" class="form-control" placeholder="Emergency's Address">

                        </div>
                      </div>

                      

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Who Introduced to G.D.A</label>
                          <input type="text" name="whointro" value="{{ $view_singleparent->whointro }}" class="form-control" placeholder="Doctor's Phone">

                        </div>
                      </div>
                      

                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{ url('web/viewparenteacher') }}" class="btn btn-primary">Back</a>
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                        </div>
                      </div>
                      

                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



    @include('dashboard.footer')

