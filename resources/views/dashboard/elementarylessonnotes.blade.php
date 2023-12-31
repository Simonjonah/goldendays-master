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
            @if (Auth::guard('web')->user()->promotion == 'Primary Head')
            @foreach ($view_classess as $view_classes)
            <ol class="breadcrumb float-sm-right">
              Class
              
                  <a href="{{ url('web/classes/'.$view_classes->classname) }}">{{ $view_classes->classname }}</a>
              
            </ol>
            @endforeach
            @else
              
            @endif
           

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
                <h3 class="card-title" style="color: red">Your {{ Auth::guard('web')->user()->section }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Section</th>
                      <th>Images</th>
                      
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Subject</th>
                    
                      
                      <th>Title</th>
                      <th>Section</th>

  
                      <th>Date</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
  
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    @endif
                  @if (Auth::guard('web')->user()->promotion == 'Primary Head')
                    @foreach ($view_primarystudents as $view_primarystudent)
                    @if ($view_primarystudent->section == Auth::guard('web')->user()->section )

                    {{-- @if ($view_primarystudent->section == Auth::guard('web')->user()->section = 'Primary' && $view_primarystudent->status == null) --}}
                      <tr>
                        <td>{{ $view_primarystudent->classname }}</td>
                        <td>{{ $view_primarystudent->user['middlename'] }}</td>
                        <td>{{ $view_primarystudent->user['fname'] }}</td>
                        <td>{{ $view_primarystudent->term }}</td>
                        <td>{{ $view_primarystudent->section }}
                        <small style="color: red">Administrator</small>
                        </td>
  
                        <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_primarystudent->images")}}" alt=""></td>

                        <td>@if ($view_primarystudent->status == null)
                          <span class="badge badge-secondary"> In progress</span>
                        @elseif($view_primarystudent->status == 'suspend')
                        <span class="badge badge-warning"> Suspended</span>
                        @elseif($view_primarystudent->status == 'reject')
                        <span class="badge badge-danger"> Rejected</span>
                        @elseif($view_primarystudent->status == 'approved')
                        <span class="badge badge-info"> Approved</span>
                        @elseif($view_primarystudent->status == 'admitted')
                        
                        <span class="badge badge-success">Admitted</span>
                        @endif</td>
                        
                      
                      <td><button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Action
                      </button>
                      <ul class="dropdown-menu">
                        
                        <li class="dropdown-item"><a href="{{ url('web/viewlessonnotesteacher/'.$view_primarystudent->slug) }}">View</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/editlessonteacher/'.$view_primarystudent->id) }}">Edit</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/approvelesssons/'.$view_primarystudent->id) }}">Approved</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/rejectlesssons/'.$view_primarystudent->id) }}">Reject</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/suspendlesssons/'.$view_primarystudent->id) }}">Suspend</a></li>
                        <li class="dropdown-item"><a href="{{ url('web/deletelesons/'.$view_primarystudent->id) }}">Delete</a></li>
                      </ul>
                    </div></td>
                    <td>{{ $view_primarystudent->subjectname }}</td>
                    <td>{{ $view_primarystudent->title }}</td>
                    <td>{{ $view_primarystudent->academic_session }}</td>
  
                   
                    
                    <td>{{ $view_primarystudent->created_at->format('D d, M Y, H:i')}}</td>
  
                      </tr>
                      @else
                        
                      @endif  
                    
                  @endforeach
                        @else
                        
                      @endif
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes</th>
                      <th>Subjects</th>
                      <th>Lastname</th>
                      <th>Term</th>
                      <th>Section</th>
                      <th>Images</th>
                      
                      <th>Status</th>
                      <th>Actions</th>
  
                      <th>Subject</th>
                     
                      <th>Title</th>
                      <th>Section</th>
                    
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
    <strong>Copyright &copy; 2023 <a href="https://golderndayschools.com">golderndays.com</a>.</strong> All rights
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

<script src="{{  asset('assets/dist/js/weblte.min.js?v=3.2.0')}}"></script>

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
