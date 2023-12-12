




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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: red">Students/Pupils</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Section</th>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Reg Number</th>
                      <th>Admited Class</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Add Reg Number</th>
                      <th>Delete</th>
                     
                      <th>Date</th>
  
                    </tr>
                    </thead>
                    <tbody>
  
                      @foreach ($view_preschools as $view_preschool)
                        {{-- @if ($view_preschool->status == null) --}}
                        <tr>
                          <td>{{ $view_preschool->section }}</td>
  
                          <td>{{ $view_preschool->surname }}</td>
                          <td>{{ $view_preschool->fname }}</td>
                          <td>{{ $view_preschool->middlename }}</td>
                          <td>{{ $view_preschool->regnumber }}
                         <small><a href="{{ url('admin/parentall/'.$view_preschool->user_id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user">View Chilren P1 ID</i> 
                          </a></small>
                          </td>
                          <td>{{ $view_preschool->classname }} </small></td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_preschool->images")}}" alt=""></td>
                          <td><a href="{{ url('admin/viewstudent/'.$view_preschool->ref_no1) }}"
                              class='btn btn-default'>
                               <i class="far fa-eye"></i>
                           </a></td>
                           <td><a href="{{ url('admin/editstudent/'.$view_preschool->ref_no1) }}"
                            class='btn btn-info'>
                             <i class="far fa-edit"></i>
                         </a></td>
                     
                         <td><a href="{{ url('admin/addregno/'.$view_preschool->ref_no1) }}"
                          class='btn btn-warning'>Add Reg Number</i>
                       </a></td>
  
                       <td><a href="{{ url('admin/deletestudent/'.$view_preschool->id) }}"
                        class='btn btn-danger'>Delete</i>
                     </a></td>
                         
                          
                       <td>{{ $view_preschool->created_at->format('D d, M Y, H:i')}}</td>
  
                        </tr>
                        {{-- @else
                          
                        @endif --}}
                      @endforeach
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Section</th>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Reg Number</th>
                      <th>Admited Class</th>
                      <th>Images</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Add Reg Number</th>
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
    <strong>Copyright &copy; 2023 <a href="https://goldendayschools.com">goldendayschools.com</a>.</strong> All rights
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
