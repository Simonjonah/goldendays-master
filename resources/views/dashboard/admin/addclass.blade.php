@include('dashboard.admin.header')


  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Classes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Classes </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Class</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                  <form action="{{ route('admin.createclasses') }}" method="post" enctype="multipart/form-data">
                    {{-- <form action="{{ route('admin.creatprofessional') }}" method="post" enctype="multipart/form-data"> --}}
                    @csrf
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        </div>
                    @endif
                    
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Class Name</label>
                      <input type="text" name="classname" class="form-control" @error('classname')
                          
                      @enderror value="{{ old('classname') }}" id="exampleInputEmail1" placeholder="Class Name">
                    </div>
                    @error('classname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Section</label>
                      <select name="section" class="form-control" id="">
                        <option value="Pre-School">Pre-School</option>
                        <option value="Primary">Primary</option>
                        <option value="Secondary">Secondary</option>
                    </div>
                    @error('section')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Section</label>
                    <input type="hidden" type="text" value="" name="" class="form-control" @error('name')
                        
                    @enderror value="" id="exampleInputEmail1" placeholder="Name">
                  </div>
                  @error('section')
                  @enderror
                  
                </div>
               
                  </div>
                  <!-- /.card-body -->
    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
  
    @include('dashboard.admin.footer')