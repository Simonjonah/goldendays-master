
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
  
    <h2 class="text-center">Fee Schedules</h2>

    <div class="row" style="margin-top: 60px;">
      <!-- accepted payments column -->
      <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tuition Fee</th>
                    <th>Medicals</th>
                    <th>Extra Curricular </th>
                    <th>Term </th>
                    <th>Books & Worksheet</th>
      
                    <th>Class</th>
                    <th>Development Fee</th>
                    <th>Uniforms Amount</th>
                    <th>PTA FEE</th>
                    <th>Form Amount</th>
                    <th>Date</th>
      
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($print_allfees as $print_allfee)
                  <tr>
                      <td>₦{{ $print_allfee->amount}}</td>
                      <td>₦{{ $print_allfee->medicals }}</td>
          
                      <td>₦{{ $print_allfee->extracuri_fee}}</td>
                      <td>{{ $print_allfee->term  }}</td>
                      <td>₦{{ $print_allfee->bookamount }}</td>
                      <td>{{ $print_allfee->classname }}</td>
                      
                    
                      <td>₦{{ $print_allfee->dev_amount }}</td>
                      <td>₦{{ $print_allfee->uniforms_amount }}</td>
                      <td> ₦{{ $print_allfee->pta_amount }}</td>
                      <td>₦ {{ $print_allfee->form_amount }}</td>
                      <td>{{ $print_allfee->created_at->format('D d, M Y, H:i') }}</td>
                    </tr>
                  @endforeach
                
                
                </tbody>
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
