@include('dashboard.guardian.header')


  @include('dashboard.guardian.sidebar')
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
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header yourresult-->
            <!-- form start generatePdf-->
            <form action="{{ route('guardian.generatePDF') }}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Reg Number</label>
                      <input required type="text" name="regnumber" class="form-control" @error('regnumber')
                        @enderror value="{{ old('regnumber') }}" id="exampleInputEmail1" placeholder="Reg number">
                    </div>
                    @error('regnumber')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
              
                    <div class="form-group">
                      <h5>Term</h5>
                      <select name="term" class="form-control"  id="">
                        <option value="First Term">First Term</option>
                        <option value="Second Term">Second Term</option>
                        <option value="Third Term">Third Term</option>
                      </select>
                    </div>

                  {{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pin</label>
                    <input required type="number" name="pins" class="form-control" @error('pins')
                      @enderror value="{{ old('pins') }}" id="exampleInputEmail1" placeholder="Pins">
                  </div>
                  @error('pins')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror  --}}

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Year</label>
                    <select name="academic_session" class="form-control" id="">
                      @foreach ($the_results as $the_result)
                      <option value="{{ $the_result->academic_session }}">{{ $the_result->academic_session }}</option>
                      @endforeach
                    </select>
                    
                  </div>
                 
                  <div class="form-group">
                    <div class="form-check">
                        <button type="submit" class="btn btn-info">Sign in</button>
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
  @include('dashboard.guardian.footer')
