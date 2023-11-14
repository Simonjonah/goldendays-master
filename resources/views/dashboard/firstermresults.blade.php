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
                <h3 class="card-title">Your Students Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Admission No</th>
                    <th>Search</th>
                    <th>Psycomotor</th>
                    {{-- <th>Ref. No</th> --}}
                    <th>CA 1</th>
                    <th>CA 2</th>
                    <th>CA 3</th>
                    <th>Exams</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>View</th>

              
                    {{-- <th>Date</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        
                      //  $total_score = 0;
                    @endphp
                    @foreach ($view_myresults as $view_myresult)
                      @php
                         // $total_score +=$view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams;
                          
                      @endphp
                      <tr>
                        <td>{{ $view_myresult->user['surname'] }}</td>
                        <td>{{ $view_myresult->user['fname'] }}</td>
                        <td>{{ $view_myresult->user['middlename'] }}</td>
                        <td>{{ $view_myresult->user['regnumber'] }}
                        <small>{{ $view_myresult->user['section'] }}</small>
                        </td>
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                          Search Pupils/Students Results
                         </button></td>
                        <td><a href="{{ url('web/addpsychomotor/'.$view_myresult->id) }}"
                          class='btn btn-default'>
                          Add Psycomotor
                           <i class="far fa-eye"></i>

                       

                      {{-- <td>{{ $view_myresult->user['ref_no'] }}</td> --}}
                      <td>{{ $view_myresult->test_1 }}</td>
                      <td>{{ $view_myresult->test_2 }}</td>
                      <td>{{ $view_myresult->test_3 }}</td>
                      <td>{{ $view_myresult->exams }}</td>
                      <td>{{ $view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams }}</td>
                      <td>@if ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 79)
                        <p>A</p>
                       
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 69)
                        <p>B</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 59)
                        <p>C</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 49)
                        <p>D</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 40)
                        <p>E</p>
                        @elseif ($view_myresult->test_1 + $view_myresult->test_2 + $view_myresult->test_3 + $view_myresult->exams > 39)
                        <p>F</p>
                        @else
                        <p>F</p>
                      @endif</td>

                      <td>@if ($view_myresult->status == null)
                        <span class="badge badge-secondary"> In progress</span>
                    @elseif($view_myresult->status == 'suspend')
                    <span class="badge badge-warning"> Suspended</span>
                    @elseif($view_myresult->status == 'reject')
                    <span class="badge badge-danger"> Rejected</span>
                    @elseif($view_myresult->status == 'approved')
                    <span class="badge badge-info"> Approved</span>
                    @elseif($view_myresult->status == 'admitted')
                    
                    <span class="badge badge-success">Admitted</span>
                    @endif</td>
                    
                      
                     
                         <td><a href="{{ url('web/teacherviewresults/'.$view_myresult->user_id)}}"
                          class='btn btn-default'>
                           <i class="far fa-eye"></i>
                       </a></td>
                       
                  

                      </tr>
                     
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Surname</th>
                      <th>Firstname</th>
                      <th>Middlename</th>
                      <th>Admission No</th>
                    <th>Search</th>

                      <th>Psycomotor</th>

                      {{-- <th>Ref. No</th> --}}
                      <th>CA 1</th>
                      <th>CA 2</th>
                      <th>CA 3</th>
                      <th>Exams</th>
                      <th>Total</th>
                      <th>Grade</th>
                      <th>Status</th>

                      <th>View</th>
                
                      {{-- <th>Date</th> --}}
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
    <strong>Copyright &copy; 2023 <a href="https://goldendestinyacademyschools.com">Goldendestinyschools</a>.</strong> All rights
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


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Search for Pupils/Students results here</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ url('web/searchresultbyteacher') }}" method="post">
        @csrf
        
        <div class="form-group">
          <label for="">Reg Number</label>
          <select name="regnumber" class="form-control" id="">
           @foreach ($view_myresults as $view_myresult)
             <option value="{{ $view_myresult->regnumber }}">{{ $view_myresult->regnumber }}</option>
           @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="">Select Term</label>
          <select name="term" class="form-control" id="">
           @foreach ($view_myresults as $view_myresult)
             <option value="{{ $view_myresult->term }}">{{ $view_myresult->term }}</option>
           @endforeach
          </select>
        </div>
  
        <div class="form-group">
          <label for="">Select Academic Session</label>
          <select name="academic_session" class="form-control" id="">
           @foreach ($academic_sessions as $academic_session)
             <option value="{{ $academic_session->academic_session }}">{{ $academic_session->academic_session }}</option>
           @endforeach
          </select>
        </div>
      
       

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->