@include('dashboard.guardian.header')

  @include('dashboard.guardian.sidebar')
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
l            <ol class="breadcrumb float-sm-right">
              {{-- <li cass="breadcrumb-item"><a href="{{ route('guardian.addnidnetsem2leve200l') }}" class="btn btn-success">Add Semester Courses</a></li> --}}
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
                <h3 class="card-title">Register Child</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('guardian/updatebyparent/'.$editby_parent->ref_no1) }}" method="post" enctype="multipart/form-data">
                  @csrf
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
                        {{-- <input type="hidden" name="academic_session" value="{{ $add_childtoparents->academic_session }}" id=""> --}}
                        {{-- <input type="hidden" name="guardian_id" value="{{ $add_childtoparents->id }}" id=""> --}}
                        {{-- <input type="hidden" name="section" value="{{ $add_childtoparents->section }}" id=""> --}}
                        {{-- <input type="hidden" name="ref_no" value="{{ $add_childtoparents->ref_no }}" id=""> --}}
                        {{-- <input type="text" name="email" value="{{ $add_childtoparents->email }}" id=""> --}}
                        <input type="text"  value="{{ $editby_parent->fname }}" class="form-control" name="fname" placeholder="fname">

                      </div>

                      
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                       <input type="text" value="{{ $editby_parent->middlename }}" required name="middlename" class="form-control" placeholder="Middle Name">
                      </div>
                     
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" value="{{ $editby_parent->surname }}" required name="surname" class="form-control" placeholder="Surname">

                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="{{ $editby_parent->age }}" required class="form-control" placeholder="Age">

                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="{{ $editby_parent->dob }}" required class="form-control" placeholder="Date of Birth">

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" id="">
                            <option value="{{ $editby_parent->gender }}">{{ $editby_parent->gender }}</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Term</label>
                        <select name="term" class="form-control" id="">
                          <option value="{{ $editby_parent->term }}">{{ $editby_parent->term }}</option>
                          <option value="First Term">First Term</option>
                          <option value="Second Term">Second Term</option>
                          <option value="Third Term">Third Term</option>
                        </select>
                    
                      </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Section</label>
                          <select name="section" class="form-control" id="">
                            <option value="{{ $editby_parent->section }}">{{ $editby_parent->section }}</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                          </select>
                      
                        </div>
                      </div>
  

                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>BLood Group</label>
                        <input type="text" name="bloodgroup" @error('bloodgroup')
                        @enderror  value="{{ $editby_parent->bloodgroup }}" class="form-control" placeholder="Blood Group">
                         
                        </div>
                        @error('bloodgroup')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Genotype</label>
                        <input type="text" name="genotype" @error('genotype')
                        @enderror  value="{{ $editby_parent->genotype }}" class="form-control" placeholder="Genotype">
                         
                        </div>
                        @error('genotype')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>presvious School Name</label>
                        <input type="text" name="previouschoolname" @error('previouschoolname')
                        @enderror  value="{{ $editby_parent->previouschoolname }}" class="form-control" placeholder="presvious School Name">
                         
                        </div>
                        @error('previouschoolname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Present Class Name</label>
                        <input type="text" name="preclassname" @error('preclassname')
                        @enderror  value="{{ $editby_parent->preclassname }}" class="form-control" placeholder="Previous School Name">
                         
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
                        <td><img style="width: 10%; height: 60px;" src="{{ URL::asset("/public/../$editby_parent->images")}}" alt=""></td>

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
                        @enderror  value="{{ $editby_parent->lastschooladdress }}" class="form-control" placeholder="Previous School Address">
                         
                        </div>
                        @error('lastschooladdress')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Allegies/Physical Disability</label>
                        <input type="text" name="disability" @error('disability')
                        @enderror  value="{{ $editby_parent->disability }}" class="form-control" placeholder="Allegies/Physical Disability">
                         
                        </div>
                        @error('disability')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      

                     
                      <div class="col-sm-6">
                        <div class="form-group">
                            {{-- <a href="{{ url('guardian/viewparents') }}" class="btn btn-primary">Back</a> --}}
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

    @include('dashboard.guardian.footer')
