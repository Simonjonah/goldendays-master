@include('dashboard.header')


  @include('dashboard.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
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
              <h3 class="card-title">Change Class or Term of a Student/Pupil</h3>
            </div>
            <!-- /.card-header yourresult-->
            <!-- form start generatePdf-->
            <form action="{{ url('web/updateclassterm/'.$edit_students->ref_no1) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                      <h5>Term</h5>
                      <select name="term" class="form-control"  id="">
                        
                        <option value="{{ $edit_students->term }}">{{ $edit_students->term }}</option>
                        <option value="First Term">First Term</option>
                        <option value="Second Term">Second Term</option>
                        <option value="Third Term">Third Term</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <h5>Select Class</h5>
                      <select name="classname" class="form-control"  id="">
                        @foreach ($add_class as $add_class)
                        <option value="{{ $add_class->classname }}">{{ $add_class->classname }}</option>
                          
                        @endforeach
                        
                      </select>
                    </div>

                 
                 
                  <div class="form-group">
                    <div class="form-check">
                        <button type="submit" class="btn btn-info">Change</button>
                    </div>
                  </div>
                </div>
             
                  
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
  @include('dashboard.footer')
