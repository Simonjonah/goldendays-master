@include('dashboard.header')

  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ediit </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('admin.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Ediit  </li>
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
                <h3 class="card-title">Edit Child</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('web/updateadmissionteacher/'.$edit_students->ref_no1) }}" method="post" enctype="multipart/form-data">
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

                  @method('PUT')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label> Sections</label>
                        <select name="section" class="form-control" id="">
                          <option value="{{  $edit_students->section }}">{{ $edit_students->section }}</option>
                          <option value="Pre-School">Pre-School</option>
                          <option value="Primary">Elementary</option>
                          <option value="Secondary">High School</option>
                        </select>

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                       <input type="text" value="{{  $edit_students->middlename }}" required name="middlename" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" value="{{  $edit_students->surname }}" required name="surname" class="form-control" placeholder="Surname">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" value="{{  $edit_students->fname }}" required name="fname" class="form-control" placeholder="First Name">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="{{  $edit_students->age }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{  $edit_students->dob }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" id="">
                          <option value="{{  $edit_students->gender }}">{{  $edit_students->gender }}</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Term</label>
                        <select name="term" class="form-control" id="">
                          <option value="{{  $edit_students->term }}">{{  $edit_students->term }}</option>
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
                        @enderror  value="{{  $edit_students->bloodgroup }}" class="form-control" placeholder="Blood Group">
                         
                        </div>
                        @error('bloodgroup')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Genotype</label>
                        <input type="text" name="genotype" @error('genotype')
                        @enderror  value="{{  $edit_students->genotype }}" class="form-control" placeholder="Genotype">
                         
                        </div>
                        @error('genotype')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>presvious School Name</label>
                        <input type="text" name="previouschoolname" @error('previouschoolname')
                        @enderror  value="{{  $edit_students->previouschoolname }}" class="form-control" placeholder="presvious School Name">
                         
                        </div>
                        @error('previouschoolname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Present Class Name</label>
                        <input type="text" name="preclassname" @error('preclassname')
                        @enderror  value="{{  $edit_students->preclassname }}" class="form-control" placeholder="Previous School Name">
                         
                        </div>
                        @error('preclassname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Class Addmitted To</label>
                          <select name="classname" class="form-control" id="">
                            @foreach ($add_class as $add_clas)
                            <option value="{{ $add_clas->classname }}">{{ $add_clas->classname }}</option>
                            @endforeach
                          </select>
                        
                        </div>
                        @error('classname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                    <div class="col-sm-6">
                      <td><img style="width: 30%; height: 30%;" class="profile-user-img img-fluid"
                        src="{{ URL::asset("/public/../$edit_students->images")}}"
                        alt="User profile picture"></td>
                
                        <div class="form-group">
                          <label>Passport </label>
                        <input type="file" name="images" @error('images')
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
                        @enderror  value="{{ $edit_students->lastschooladdress }}" class="form-control" placeholder="Previous School Address">
                         
                        </div>
                        @error('lastschooladdress')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Allegies/Physical Disability</label>
                        <input type="text" name="disability" @error('disability')
                        @enderror  value="{{ $edit_students->disability }}" class="form-control" placeholder="Allegies/Physical Disability">
                         
                        </div>
                        @error('disability')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
    <!-- /.content -->
  </div>


    @include('dashboard.footer')

