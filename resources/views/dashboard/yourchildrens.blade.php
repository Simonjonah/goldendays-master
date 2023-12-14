@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            {{-- @foreach ($view_classess as $view_classes) --}}
            <ol class="breadcrumb float-sm-right">
              Class
              
               
                  {{-- <a href="{{ url('web/classes/'.$view_classes->classname) }}">{{ $view_classes->classname }}</a> --}}
               
           
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> --}}
            </ol>
            {{-- @endforeach --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red">Your Wards</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>First Name   </th>
                      <th>MiddleName</th>
                      <th>Lastname</th>
                      <th>Classes</th>
                      <th>Term</th>
                      <th>Images</th>
                      <th>View</th>
  
                      <th>Reg. No</th>
                      <th>Edit</th>
                      <th>Print</th>
                      
                      {{-- <th>View Result</th> --}}
  
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($viewyour_childrens as $viewyour_children)
                    {{-- @if ($viewyour_children->centername == Auth::guard('web')->user()->centername && $viewyour_children->status == null) --}}
                      <tr>
                        <td>{{ $viewyour_children->fname }} <br><small>ID: {{ $viewyour_children->ref_no1 }}</small></td>
                        <td>{{ $viewyour_children->middlename }}
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                            Check Terminal Result
                          </button>
                        </td>
                        <td>{{ $viewyour_children->surname }}</td>
                        <td>{{ $viewyour_children->classname }}</td>
                        <td>{{ $viewyour_children->term }}
                        
                        <small>{{ $viewyour_children->section }}</small>
                        </td>
                       
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$viewyour_children->images")}}" alt=""></td>
                        <td><a href="{{ url('web/parentviewstudent/'.$viewyour_children->ref_no1) }}"
                            class='btn btn-default'>
                            <i class="far fa-eye"></i>
                        </a></td>
                      
                      <td style="color: green">{{ $viewyour_children->regnumber }}</td>
                        <td><a href="{{ url('web/parenteditstudent/'.$viewyour_children->ref_no1) }}"
                          class='btn btn-info'>
                          <i class="far fa-edit"></i>
                      </a></td>  
                 
                 
                         
                        <td><a href="{{ url('web/printstudents/'.$viewyour_children->ref_no1) }}"
                          class='btn btn-info'>Print
                          <i class="far fa-print"></i>
                      </a></td>  
                      {{-- <td><a href="{{ url('web/printstudents/'.$viewyour_children->ref_no1) }}"
                        class='btn btn-info'>Check Result
                        <i class="far fa-print"></i>
                    </a></td>   --}}
                    
                    <td>{{ $viewyour_children->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                 
                    
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>MiddleName</th>
                        <th>Lastname</th>
                        <th>Classes</th>
                        <th>Term</th>
                        <th>Images</th>
                        <th>View</th>
    
                        <th>Reg. No</th>
                        <th>Edit</th>
                        <th>Print</th>
                        
                        {{-- <th>View Result</th> --}}
    
                        <th>Date</th>
    
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>



    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2023 <a href="https://goldendayschools.com">Goldendayschools.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{  asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{  asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{  asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

<script src="{{  asset('assets/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




</body>
</html>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Please Check Terminal Result here</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('web.generatePDF') }}" method="post" enctype="multipart/form-data">
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

        <div class="form-group">
            <label for="regnumber">Please Select Registration Number</label>
            <select name="regnumber" required class="form-control">
              <option value="">Select Registration Number</option>

              @foreach ($viewyour_childrens as $viewyour_children)
              <option value="{{ $viewyour_children->regnumber }}">{{ $viewyour_children->fname }} {{ $viewyour_children->regnumber }}</option>
                
              @endforeach
            </select>
        </div>
        <div class="form-group">
        <label for="term">Please Select Term</label>
            <select name="term" required class="form-control">
              <option value="">Select Term</option>
              @foreach ($viewyour_childrens as $viewyour_children)
              <option value="{{ $viewyour_children->term }}">{{ $viewyour_children->term }}</option>
                
              @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="classname">Select Class</label>
              <select name="classname" required class="form-control">
                <option value="">Select Class</option>
                @foreach ($viewyour_childrens as $viewyour_children)
                <option value="{{ $viewyour_children->classname }}">{{ $viewyour_children->classname }}</option>
                  
                @endforeach
              </select>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" >Select Section</label>
            <select name="section" class="form-control">
                <option value="">Select Section</option>
                <option value="Pre-School">Pre-School</option>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
            </select>
          </div>
          @error('section')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        <div class="form-group">
        <label for="academic_session">Please Select Year</label>
            <select name="academic_session" required class="form-control">
              <option value="">Select Academic Session</option>
              @foreach ($acas as $aca)
              <option value="{{ $aca->academic_session }}">{{ $aca->academic_session }}</option>
                
              @endforeach
            </select>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Check Result</button>
        </div>

        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->