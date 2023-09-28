
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      {{-- <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> AdminLTE, Inc.
          <small class="float-right">Date: 2/10/2014</small>
        </h2>
      </div> --}}
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-2 invoice-col">
        <img style="width: 100px; height: 100px;" src="{{ asset('images/sch14.png') }}" alt=""> <br>

      </div>
      <!-- /.col -->
      <div class="col-sm-8 invoice-col">
        <h1><strong>GOLDERN DESTINY SCHOOLS</strong></h1>
                  
        Golden Destiny Academy Road.
        Off Senator Akon Eyakenyi Street,
        Off General Edet Akpan Ave, 520101, Uyo
      </div>
      <!-- /.col -->
      <div class="col-sm-2 invoice-col">
        <img style="width: 70%; height: 150px;" src="{{ URL::asset("/public/../$printyouchild->images")}}" alt="">

      </div>
      <!-- /.col -->
    </div>
  
    <h2 class="text-center">Bio Data</h2>

    <div class="row" style="margin-top: 60px;">
      <!-- accepted payments column -->
      <div class="col-6">
        <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">First Name</th>
                <td>{{ $printyouchild->fname }}</td>
              </tr>
              <tr>
                <th>Middlename</th>
                <td>{{ $printyouchild->middlename }}</td>
              </tr>
              <tr>
                <th>Surname</th>
                <td>{{ $printyouchild->surname }}</td>
              </tr>
              <tr>
                <th>Class</th>
                <td>{{ $printyouchild->classname }}</td>
              </tr>

              <tr>
                <th>Gender</th>
                <td>{{ $printyouchild->gender }}</td>
              </tr>

              <tr>
                <th>Age</th>
                <td>{{ $printyouchild->age }}</td>
              </tr>

              

              <tr>
                <th>Section</th>
                <td>{{ $printyouchild->section }}</td>
              </tr>
              <tr>
                <th>Academic Session</th>
                <td>{{ $printyouchild->academic_session }}</td>
              </tr>

              
            </table>
          </div>
      </div>
      <!-- /.col -->
      <div class="col-6">
        
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Blood Group</th>
              <td>{{ $printyouchild->bloodgroup }}</td>
            </tr>
            <tr>
              <th>Genotype</th>
              <td>{{ $printyouchild->genotype }}</td>
            </tr>
            <tr>
              <th>Present Class</th>
              <td>{{ $printyouchild->preclassname }}</td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td>{{ $printyouchild->dob }}</td>
            </tr>

            <tr>
              <th>Term</th>
              <td>{{ $printyouchild->term }}</td>
            </tr>

            <tr>
              <th>Previous School Name</th>
              <td>{{ $printyouchild->previouschoolname }}</td>
            </tr>
            <tr>
              <th>Disability</th>
              <td>{{ $printyouchild->disability }}</td>
            </tr>
            <tr>
              <th>Date Registered</th>
              <td>{{ $printyouchild->created_at->format('D d, M Y, H:i')}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
