
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brixtonn Schools</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    
    <div class="row invoice-info">
      <div class="col-sm-2 invoice-col">
       
        <address>
          <img style="width: 70px; height: 70px;" src="{{ asset('images/sch14.png') }}" alt=""> <br>

        </address>
      </div>

      <div class="col-sm-8 invoice-col" style="text-align: center">
       
        <address>
          <h1> GOLDEN SCHOOL ACADEMY</h1><br>
         
            Golden Destiny Academy Street Housing extention Uyo, Akwa Ibom State, Nigeria
            Motor: Fostering Creativity and Development
          <br>
         
        </address>
      </div>
     
      </div>
     
      <div class="col-sm-4 invoice-col">
        {{-- <img style="width: 70%; height: 200px;" src="{{ URL::asset("/public/../$print_students->images")}}" alt=""> --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
       
        <div class="col-12 table-responsive">
            <h3 style="text-align: center">All Primary Pupils</h3>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Surname</th>
              <th>First Name</th>
              <th>Middlename</th>
              <th>Class</th>
              <th>Gender</th>
              <th>Section</th>
              <th>Form No</th>
              <th>Reg No</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($printallPrimary_students as $printallPrimary_student)
            <tr>
                <td>{{ $printallPrimary_student->surname }}</td>
                <td>{{ $printallPrimary_student->fname }}</td>
                <td>{{ $printallPrimary_student->middlename }}</td>
                <td>{{ $printallPrimary_student->classname }}</td>
                <td>{{ $printallPrimary_student->gender }}</td>
                <td>{{ $printallPrimary_student->section }}</td>
                <td>{{ $printallPrimary_student->ref_no }}</td>
                <td>{{ $printallPrimary_student->regnumber }}</td>
                <td>{{ $printallPrimary_student->created_at->format('D d, M Y, H:i')}}</td>
              </tr>
            @endforeach
            
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
