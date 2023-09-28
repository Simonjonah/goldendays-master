@include('dashboard.account.header')

  @include('dashboard.account.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              {{-- cog --}}
              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ url('account.viewfees') }}">Fees</a></span>
                <span class="info-box-number">
                  {{ $fees }}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
              {{-- thumbs-up --}}
              <div class="info-box-content">
                <span class="info-box-text"><a href="">Transactions</a></span>
                <span class="info-box-number">{{ $countspayment }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          {{-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><a href="">Programs</a></span>
                <span class="info-box-number">{{ $count_programs }}</span>
              </div>
            </div>
          </div> --}}
          <!-- /.col -->
          {{-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('account.coursesforcert') }}">Certificate in Data Courses</a> </span>
                <span class="info-box-number">{{ $count_certificate }}</span>
              </div>
            </div>
          </div> --}}


          {{-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('account.coursesford1') }}">D1 Courses</a> </span>
                <span class="info-box-number">{{ $count_d1 }}</span>
              </div>
            </div>
          </div> --}}
        </div>
        <!-- /.row -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">

        

             <!-- TABLE: LATEST ORDERS -->
             <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Payments</h3>

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
                      <th>First Name</th>
                      {{-- <th>Middlename</th> --}}
                      {{-- <th>Period</th> --}}

                      <th>Status</th>
                      <th>Amount</th>
                      <th>View</th>
                      {{-- <th>Semester</th>
                      <th>Period</th> --}}
                      <th>Date</th>


                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($getyour_payments as $getyour_payment)
                        
                        <tr>
                          <td><a href="viewsinglepayment/{{ $getyour_payment->ref_no }}">{{ $getyour_payment->ref_no }}</a></td>
                          <td>{{ $getyour_payment->surname }}</td>
                          <td>{{ $getyour_payment->fname }}</td>

                          <td>@if ($getyour_payment->status == null)
                            <span class="badge badge-secondary"> pending</span>
                           @elseif($getyour_payment->status == 'suspend')
                           <span class="badge badge-warning"> Suspended</span>
                           @elseif($getyour_payment->status == 'reject')
                           <span class="badge badge-danger"> Rejected</span>
                           @elseif($getyour_payment->status == 'approved')
                           <span class="badge badge-info"> Approved</span>
                           @elseif($getyour_payment->status == 'admitted')
                           
                           <span class="badge badge-success">Admitted</span>
                           @endif</td>
                          <td>{{ $getyour_payment->amount }}</td>
                          <td><a href="{{ url('account/viewsinglepayment/'.$getyour_payment->ref_no) }}" class="btn btn-sm btn-success float-left">View </a></td>

                           <td>{{ $getyour_payment->created_at->format('D d, M Y, H:i') }}</td>

                        </tr>
                       
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer clearfix">
                <a href="allthestudents" class="btn btn-sm btn-info float-left">View Students</a>
              </div> --}}
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->








          
          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Results</span>
                {{-- <span class="info-box-number">{{ $count_results }}</span> --}}
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

        

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>

    
    <!-- /.content -->
    <!-- /.content -->
  </div>
  @include('dashboard.account.footer')