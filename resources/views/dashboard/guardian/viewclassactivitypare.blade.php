

@include('dashboard.guardian.header')
@include('dashboard.guardian.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Activities</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Activities</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
               
              </div>
              <!-- /.col -->
            </div>
            

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Topic</th>
                    <th>Youtube</th>
        
                    <th>Status</th>
                    <th>View</th>
                    <th>Date</th>
                    {{-- <th> Amount</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach ($vieew_clasactivities as $vieew_clasactivitie)
                    {{-- @if ($vieew_clasactivitie->status == 'approved') --}}
                    <td>{{ $vieew_clasactivitie->subject}}</td>
                    <td>{{ $vieew_clasactivitie->topic}}</td>
                    <td><a href="{{ $vieew_clasactivitie->youtube}}">Youtube</a></td>
                    <td>@if ($vieew_clasactivitie->status == null)
                        <span class="badge badge-secondary"> In Review</span>
                       @elseif($vieew_clasactivitie->status == 'approved')
                       <span class="badge badge-success"> Approved</span>
                       @elseif($vieew_clasactivitie->status == 'susend')
                       <span class="badge badge-danger"> Suspend</span>
                       @endif</td>
                       <td><a href="{{ url('guardian/parentviewsingleactivity/'.$vieew_clasactivitie->slug) }}"
                        class='btn btn-info'>
                        <i class="far fa-eye"></i>
                    </a></td>  
                    <td>{{ $vieew_clasactivitie->created_at->format('D d, M Y, H:i')}}</td>

                    @endforeach
                     
                   
                    
                  </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        
            
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@include('dashboard.guardian.footer')
