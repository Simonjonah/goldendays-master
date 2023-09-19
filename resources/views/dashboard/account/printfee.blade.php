
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
        {{-- <img style="width: 70%; height: 150px;" src="{{ URL::asset("/public/../$print_fee->images")}}" alt=""> --}}

      </div>
      <!-- /.col -->
    </div>
  
    <h2 class="text-center">Fee Schedule in  {{ $print_fee->classname }} for {{ $print_fee->term }}</h2>

    <div class="row" style="margin-top: 60px;">
      <!-- accepted payments column -->
      <div class="col-6">
        <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Tuition Fee</th>
                <td>{{ $print_fee->amount }}</td>
              </tr>
              <tr>
                <th>Medicals</th>
                <td>{{ $print_fee->medicals }}</td>
              </tr>
              <tr>
                <th>Extra Curricular Actitvities</th>
                <td>{{ $print_fee->extracuri_fee }}</td>
              </tr>
              <tr>
                <th>Class</th>
                <td>{{ $print_fee->classname }}</td>
              </tr>

              <tr>
                <th>Books & Worksheet</th>
                <td>{{ $print_fee->bookamount }}</td>
              </tr>

             
              

              
            </table>
          </div>
      </div>
      <!-- /.col -->
      <div class="col-6">
        
        <div class="table-responsive">
          <table class="table">
            
            <tr>
                <th>Development Fee</th>
                <td>{{ $print_fee->dev_amount }}</td>
              </tr>
              <tr>
                <th>Uniforms Amount</th>
                <td>{{ $print_fee->uniforms_amount }}</td>
              </tr>

            <tr>
              <th style="width:50%">PTA Fee</th>
              <td>{{ $print_fee->pta_amount }}</td>
            </tr>
            <tr>
              <th>Form Amount</th>
              <td>{{ $print_fee->form_amount }}</td>
            </tr>
         

            <tr>
              <th>Term</th>
              <td>{{ $print_fee->term }}</td>
            </tr>

{{--        
            <tr>
              <th>Date Registered</th>
              <td>{{ $print_fee->created_at->format('D d, M Y, H:i')}}</td>
            </tr> --}}
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
