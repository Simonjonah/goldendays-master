

@include('dashboard.header')
@include('dashboard.sidebar')
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
                    <th>Date</th>
                    {{-- <th> Amount</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach ($view_specialactivities as $view_specialactivitie)
                    {{-- @if ($view_specialactivitie->status == 'approved') --}}
                    <td>{{ $view_specialactivitie->subject}}</td>
                    <td>{{ $view_specialactivitie->topic}}</td>
                    <td><a href="{{ $view_specialactivitie->youtube}}">Youtube</a></td>
                    <td>@if ($view_specialactivitie->status == null)
                        <span class="badge badge-secondary"> In Review</span>
                       @elseif($view_specialactivitie->status == 'approved')
                       <span class="badge badge-success"> Approved</span>
                       @elseif($view_specialactivitie->status == 'susend')
                       <span class="badge badge-danger"> Suspend</span>
                       @endif</td>

                       {{-- <td>{{ $viewyour_children->ref_no1 }}</td> --}}
                       <td><a href="{{ url('guardian/parentviewsingleactivity/'.$view_specialactivitie->slug) }}"
                         class='btn btn-info'>
                         <i class="far fa-eye"></i>
                     </a></td>  
                    <td>{{ $view_specialactivitie->created_at->format('D d, M Y, H:i')}}</td>

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
@include('dashboard.footer')
