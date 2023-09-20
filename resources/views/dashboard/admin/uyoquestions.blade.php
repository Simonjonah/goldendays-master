@include('dashboard.admin.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Subjects</th>
                    <th>Questions</th>
                    <th>Term</th>
                    <th>Centername</th>

                    <th>Option</th>

                    <th>Answers</th>
                    
                    <th>Status</th>
                    <th>Action</th>
                   
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
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
                    @foreach ($view_uyoquestions as $view_uyoquestion)
                      {{-- @if ($view_uyoquestion->status = 'teacher') --}}
                      <tr>
                        <td><a href="{{ url('admin/teachersquestion/'.$view_uyoquestion->user_id) }}"> {{ $view_uyoquestion->user['fname'] }}</a></td>

                        <td>{{ $view_uyoquestion->classname }}</td>
                        <td>{{ $view_uyoquestion->subjectname }}</td>
                        <td>{{ $view_uyoquestion->question }}</td>
                        <td>{{ $view_uyoquestion->term }}</td>
                        <td>{{ $view_uyoquestion->centername }}</td>
                        <td><select name="" id="" class="form-control">
                            <option value="">{{ $view_uyoquestion->option1 }}</option>
                            <option value="">{{ $view_uyoquestion->option2 }}</option>
                            <option value="">{{ $view_uyoquestion->option3 }}</option>
                        </select></td>
                        
                        <td>{{ $view_uyoquestion->is_correct }}</td>

                       
                       
                        <td>@if ($view_uyoquestion->status == null)
                          <span class="badge badge-secondary">In Review</span>
                          @elseif ($view_uyoquestion->status == 'unapproved')
                          <span class="badge badge-danger">Unapproved</span>
                          
                            @else
                            <span class="badge badge-success">Approved</span>
                          @endif</td>

                       <td> <div class="input-group-prepend">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="{{ url('admin/viewsinglequestionz/'.$view_uyoquestion->id) }}">View</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/editquestionzadmin/'.$view_uyoquestion->id) }}">Edit</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/questionzapprove/'.$view_uyoquestion->id) }}">Approved</a></li>
                          <li class="dropdown-item"><a href="{{ url('admin/questionzsunapprove/'.$view_uyoquestion->id) }}">Unapproved</a></li>
                        </ul>
                      </div></td>
                       
                     
                       <td><a href="{{ url('admin/questiondelete/'.$view_uyoquestion->ref_no) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                        
                     <td>{{ $view_uyoquestion->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                      {{-- @else
                        
                      @endif --}}
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Subjects</th>
                        <th>Questions</th>
                        <th>Term</th>
                        <th>Centername</th>
    
                        <th>Option</th>
    
                        <th>Answers</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                       
                        <th>Delete</th>
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
    <strong>Copyright &copy; 2023 <a href="httpS://BRIXTONNSCHOOLS.COM.NG">BRIXTONN SCHOOLS</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../assets/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../assets/dist/js/demo.js"></script>

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