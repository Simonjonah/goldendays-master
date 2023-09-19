@include('dashboard.guardian.header')

  @include('dashboard.guardian.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark" style="text-transform: capitalize">{{ Auth::guard('guardian')->user()->fathername }}  
              @foreach ($view_notice as $view_notic)
                <marquee behavior="" direction="">{!! $view_notic->messages !!}</marquee> </h1>
                
              @endforeach
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- @elseif (Auth::guard('guardian')->user()->status == null) --}}
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $countstudents }}</h3>

                <p>Your Children</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $sumpayments }}</h3>

                {{-- <h3><sup style="font-size: 20px"></sup></h3> --}}

                <p>School  Fees</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('guardian/paymenthistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $countclassactivity }}</h3>

                <p>Class Activities</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('guardian/viewclassactivitypare') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $viewoursreplyactivity }}</h3>

                <p>My Results NID</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('guardian.viewclassactivityparespecial') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            {{-- <div class="small-box bg-secondary">
              <div class="inner">
                <h3>33</h3>

                <p>Results</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>

              </div> --}}
              {{-- <a href="{{ route('guardian.viewpersonnel') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       <!-- TABLE: LATEST ORDERS -->
       <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Student</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>Student ID</th>
                <th>Surname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Admit Number</th>
                <th>Class</th>
                <th>Picture</th>
              </tr>
              
              </thead>
              <tbody>
                @foreach ($viewourstudents as $viewourstudent)
              <tr>
                
                <td><a href="{{ url('guardian/parentviewstudent/'.$viewourstudent->ref_no1)  }}">{{ Auth::guard('guardian')->user()->ref_no  }}</a></td>
                <td>{{ $viewourstudent->surname  }}</td>
                <td>{{ $viewourstudent->fname  }}</td>
                <td>{{ $viewourstudent->middlename  }}</td>
                <td>{{ $viewourstudent->ref_no  }}</td>
                <td>{{ $viewourstudent->classname  }}</td>
                <td><img style="width: 50px; height: 50px;" src="{{ URL::asset("/public/../$viewourstudent->images")}}" alt=""></td>
                {{-- <img style="width: 10%; height: 30px;" src="{{ URL::asset("/public/../$registration->images")}}" alt=""> --}}
                
               </td>
              </tr>
                @endforeach
                
             
             
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{ url('guardian/profile/'.Auth::guard('guardian')->user()->ref_no)  }}" class="btn btn-sm btn-info float-left">View Profile</a>
          {{-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->


      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  @include('dashboard.guardian.footer')