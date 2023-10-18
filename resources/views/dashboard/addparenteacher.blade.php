@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Add Parents </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active"> Add Parents  </li>
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
                  <h3 class="card-title">Register Parent/Child First Time</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ url('/web/addchildbyparent1') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> First Name</label>
                         {{-- <input type="text" name="email" value="{{ $add_childtoparents->email }}" id=""> --}}
                          <input type="text"  value="" class="form-control" name="fname" placeholder="fname">
                        </div>
                      </div>
  
  
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label> Sections</label>
                            <select name="section" class="form-control" id="">
                              <option value="Pre-School">Pre-School</option>
                              <option value="Primary">Elementary</option>
                              <option value="Secondary">High School</option>
                            </select>
                           
                          </div>
                        </div>
  
                        
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label> Session</label>
                            <select name="academic_session" class="form-control" id="">
                              @foreach ($acas as $aca)
                              <option value="{{ $aca->academic_session}}">{{ $aca->academic_session }}</option>
                              @endforeach
                            </select>
                            {{-- <input type="hidden" name="academic_session" value="{{ Auth::guard('guardian')->user()->academic_session }}" id=""> --}}
                          </div>
                        </div>
  
                        
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Middle Name</label>
                         <input type="text" value="" required name="middlename" class="form-control" placeholder="Middle Name">
                        </div>
                       
                      </div>
                   <div class="col-sm-6">
                        <div class="form-group">
                          <label>Surname</label>
                          <input type="text" value="" required name="surname" class="form-control" placeholder="Surname">
  
                        </div>
                      </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Age</label>
                          <input type="text" name="age" value="" required class="form-control" placeholder="Age">
  
                        </div>
                      </div>
  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="dob" value="" required class="form-control" placeholder="Date of Birth">
  
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                      
                        </div>
                      </div>
  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Term</label>
                          <select name="term" class="form-control" id="">
                            <option value="First Term">First Term</option>
                            <option value="Second Term">Second Term</option>
                            <option value="Third Term">Third Term</option>
                          </select>
                      
                        </div>
                      </div>
  
  
                       <div class="col-sm-6">
                          <div class="form-group">
                            <label>BLood Group</label>
                          <input type="text" name="bloodgroup" @error('bloodgroup')
                          @enderror  value="" class="form-control" placeholder="Blood Group">
                           
                          </div>
                          @error('bloodgroup')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Genotype</label>
                          <input type="text" name="genotype" @error('genotype')
                          @enderror  value="" class="form-control" placeholder="Genotype">
                           
                          </div>
                          @error('genotype')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                       <div class="col-sm-6">
                          <div class="form-group">
                            <label>Previous School Name</label>
                          <input type="text" name="previouschoolname" @error('previouschoolname')
                          @enderror  value="" class="form-control" placeholder="Previous School Name">
                           
                          </div>
                          @error('previouschoolname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                       <div class="col-sm-6">
                          <div class="form-group">
                            <label>Present Class Name</label>
                          <input type="text" name="preclassname" @error('preclassname')
                          @enderror  value="" class="form-control" placeholder="Previous School Name">
                           
                          </div>
                          @error('preclassname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Class Addmitted To</label>
                            <select name="classname" class="form-control" id="">
                              @foreach ($view_classes as $view_classe)
                              <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                              @endforeach
                            </select>
                          
                          </div>
                          @error('classname')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Passport </label>
                          <input type="file"  name="images" @error('images')
                          @enderror  value="" class="form-control" >
                           
                          </div>
                          @error('images')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                         <div class="col-sm-6">
                          <div class="form-group">
                            <label>Previous School Address</label>
                          <input type="text" name="lastschooladdress" @error('lastschooladdress')
                          @enderror  value="" class="form-control" placeholder="Previous School Address">
                           
                          </div>
                          @error('lastschooladdress')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Allegies/Physical Disability</label>
                          <input type="text" name="disability" @error('disability')
                          @enderror  value="" class="form-control" placeholder="Allegies/Physical Disability">
                           
                          </div>
                          @error('disability')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
  
                        
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Father's Name</label>
                         <input type="text" required name="fathername" class="form-control" placeholder="Father's Name">
                        </div>
                       
                      </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Father's Occupation</label>
                          <input type="text" required name="fatheroccupation" class="form-control" placeholder="father's Occupation">
  
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mother's Name</label>
                          <input type="text" name="mothername" required class="form-control" placeholder="Mother's Name">
  
                        </div>
                      </div>
  
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mother's Occupation</label>
                          <input type="text" name="motheroccupation" required class="form-control" placeholder="Mother's Occupation">
  
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="number" required name="phone" class="form-control"@error('phone')
                          @enderror value="{{ old('phone') }}" class="form-control" placeholder="Phone">
                      
                        </div>
                        @error('phone')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      
  
                         <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email</label>
                          <input type="email" name="email" @error('email')
                          @enderror value="{{ old('email') }}" class="form-control" placeholder="Email">
                           
                          </div>
                          @error('email')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
  
                      
  
                   <div class="col-sm-6">
                          <div class="form-group">
                            <label>Marital Status</label>
                            <select name="maritalstatus" class="form-control">
                              <option value="Single">Single</option>
                              <option value="Maried">Maried</option>
                              <option value="Divorced">Divorced</option>
                            </select>
                          </div>
                        </div>
  
                     <div class="col-sm-6">
                          <div class="form-group">
                            <label>Home Address</label>
                            <input type="text" name="homeaddress" class="form-control" placeholder="Home address">
                          </div>
                        </div>
  
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Office Address</label>
                            <input type="text" name="officeaddress" class="form-control" placeholder="Office address">
                          </div>
                        </div>
  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>State of Origin</label>
                            <input type="text" name="stateoforigin" class="form-control" placeholder="State of Origin">
  
                          </div>
                        </div>
  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Doctor's Name</label>
                            <input type="text" name="doctorname" class="form-control" placeholder="Doctor's Name">
  
                          </div>
                        </div>
                      
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Doctor's Phone</label>
                            <input type="text" name="doctorphone" class="form-control" placeholder="Doctor's Phone">
  
                          </div>
                        </div>
  
                         <div class="col-sm-6">
                          <div class="form-group">
                            <label>Emergency's Phone</label>
                            <input type="text" name="emergencyphone" class="form-control" placeholder="Emergency's Phone">
  
                          </div>
                        </div>
  
                         <div class="col-sm-6">
                          <div class="form-group">
                            <label>Emergency's Address</label>
                            <input type="text" name="emergencyaddress" class="form-control" placeholder="Emergency's Address">
  
                          </div>
                        </div>
  
                        
  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Who Introduced to G.D.A</label>
                            <input type="text" name="whointro" class="form-control" placeholder="Doctor's Phone">
  
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Use Phone As Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Use Phone Number as Password">
  
                          </div>
                        </div>
  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Already have A Child Login</label>
                            <a href="{{ url('login') }}" class="btn-btn-primary">Login</a>
  
                          </div>
                        </div>
                       
                        <div class="col-sm-6">
                          <div class="form-group">
                              {{-- <a href="{{ url('admin/viewparents') }}" class="btn btn-primary">Back</a> --}}
                          <button type="submit" class="btn btn-primary">Submit</button>
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
  </div>


    @include('dashboard.footer')

