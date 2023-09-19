@include('dashboard.guardian.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.guardian.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>DataTables</h1> --}}
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
                {{-- <h3 class="card-title" style="color: red"></h3> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                 
                  {{-- <h1>{{ $pay_fees->fname }}</h1> --}}
                    @foreach ($view_classpayments as $view_classpayment)
                    <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                        {{ csrf_field() }}
                        
                       

                        <div class="form-group">
                            <label for="">Class</label>
                            <select name="classname" class="form-control" id="">
                                <option value="{{ $view_classpayment->classname }}">{{ $view_classpayment->classname }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Term</label>
                            <select name="term" class="form-control" id="">
                                <option value="{{ $view_classpayment->term }}">{{ $view_classpayment->term }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tuition</label>
                            <input class="form-control" value="{{ $view_classpayment->tuition }}" name="tuition" placeholder="Name" />
                        </div>

                        <div class="form-group">
                          {{-- <label for="">Tuition</label> --}}
                          <input type="hidden" class="form-control" value="{{ $view_classpayment->amount }}" name="amount" placeholder="Name" />
                      </div>

                        <div class="form-group">
                            <label for="">Form Fee</label>
                            <input class="form-control" value="{{ $view_classpayment->form_amount }}" name="form_amount" placeholder="Name" />
                        </div>

                        <div class="form-group">
                            <label for="">Extra Curricular Activities</label>
                            <input class="form-control" value="{{ $view_classpayment->extracuri_fee }}" name="extracuri_fee" placeholder="Name" />
                        </div>

                        <div class="form-group">
                            <label for="">Medicals</label>
                            <input class="form-control" value="{{ $view_classpayment->medicals }}" name="medicals" placeholder="Name" />
                        </div>

                        <div class="form-group">
                            <label for="">Book & Worksheet</label>
                            <input class="form-control" value="{{ $view_classpayment->bookamount }}" name="bookamount" placeholder="Name" />
                        </div>
                        <div class="form-group">
                          {{-- <label for="">Feeding </label> --}}
                          <input type="hidden" class="form-control" value="{{ $view_classpayment->feeding }}" name="feeding" placeholder="Feeding" />
                      </div>

                        
                        <div class="form-group">
                            <label for="">PTA Fees</label>
                            <input class="form-control" value="{{ $view_classpayment->pta_amount }}" name="pta_amount" placeholder="Name" />
                        </div>
                        <div class="form-group">
                          <label for="">Uniform Fees</label>
                          <input class="form-control" value="{{ $view_classpayment->uniforms_amount }}" name="uniforms_amount" placeholder="Name" />
                      </div>
                       

                      <div class="form-group">
                        <label for="">Development Fees</label>
                        <input class="form-control" value="{{ $view_classpayment->dev_amount }}" name="dev_amount" placeholder="Name" />
                    </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="{{ Auth::guard('guardian')->user()->email }}" name="email" type="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" value="{{ Auth::guard('guardian')->user()->phone }}" name="phone" type="tel" placeholder="Phone number" />
                          <input type="hidden" class="form-control" value="{{ Auth::guard('guardian')->user()->id }}" name="guardian_id" type="number" placeholder="Phone number" />
                          {{-- <input class="form-control" value="{{ $view_classpayment->id }}" name="payment_id" type="tel" placeholder="Phone number" /> --}}
                        </div>
                        {{-- <a href="{{ url('guardian/payfinalefees/'.$view_classpayment->classname) }}" class="btn btn-primary">Pay</a> --}}
                        <input type="submit" class="btn btn-lg btn-primary" value="Pay" />
                        <input type="hidden" class="form-control" value="{{ $pay_fees->fname }}" name="fname" type="tel" placeholder="" />
                        <input type="hidden" class="form-control" value="{{ $pay_fees->middlename }}" name="middlename" type="text" placeholder="" />
                        <input type="hidden" class="form-control" value="{{ $pay_fees->surname }}" name="surname" type="text" placeholder="" />
                        <input type="hidden" class="form-control" value="{{ $pay_fees->id }}" name="student_id" type="text" placeholder="" />
                        <input type="hidden" class="form-control" value="{{ $pay_fees->section }}" name="section" type="text" placeholder="" />
                   
                    <h3>Total: N {{ $view_classpayment->amount + $view_classpayment->tuition + $view_classpayment->pta_amount + $view_classpayment->extracuri_fee + $view_classpayment->medicals + $view_classpayment->dev_amount + $view_classpayment->bookamount + $view_classpayment->uniforms_amount + $view_classpayment->form_amount}}</h3>
                    @endforeach
                  </form>
                    {{-- <h3>Buy Movie Tickets N500.00</h3> --}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <h3></h3>
                    </div>
                </div>
                
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
    <strong>Copyright &copy; 2023 <a href="https://goldenschools.com">Goldenschools.com</a>.</strong> All rights
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
