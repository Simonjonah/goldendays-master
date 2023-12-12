@include('dashboard.header')
@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result of {{ $edit_result->fname }} {{ $edit_result->middlename }} {{ $edit_result->surname }} in {{ $edit_result->classname }} {{ $edit_result->term }} {{ $edit_result->section }}  {{ $edit_result->regnumber }} Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
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
                    <h2 class="page-header">
                        {{-- <small class="float-right">{{ $edit_result->created_at->format('D d, M Y, H:i')}}</small> --}}
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 80px; height: 80px;" src="{{ asset('images/sch14.png') }}" alt=""> <br>

                
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col">
                 
                  <h1><strong>GOLDEN DESTINY ACADEMY</strong></h1>
                  
                  Golden Destiny Academy Road.
                  Off Senator Akon Eyakenyi Street,
                  Off General Edet Akpan Ave, 520101, Uyo
                </div>
                <!-- /.col -->
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$edit_result->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                    <div class="col-12 table-responsive">
                      <form action="{{ url('web/createresultsedit/'.$edit_result->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
      
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        @endif
      
                        <table class="table table-striped">
                            <thead>
                            <tr>
                              {{-- <th>S/N</th> --}}
                              <th>Subjects</th>
                              <th>Continus Assessment Test 1</th>
                              <th>Continus Assessment Test 2</th>
                              <th>Continus Assessment Test 3</th>
                              <th>Exams Scores</th>
                              
                            </tr>
                            </thead>
                            <tbody>
      
                                
                                  <tr>
                                      <td>{{ $edit_result->subjectname }}<input type="hidden" value="{{ $edit_result->subjectname }}" name="subjectname" id=""></td>

                                      
                                      <td><input type="number" value="{{ $edit_result->test_1 }}" class="form-control" name="test_1" placeholder="Test 1"></td>
                                      <td><input type="number" value="{{ $edit_result->test_2 }}" class="form-control" name="test_2" placeholder="Test 2"></td>
                                      <td><input type="number" value="{{ $edit_result->test_3 }}" class="form-control" name="test_3" placeholder="Test 3"></td>
                                      <td><input type="number" value="{{ $edit_result->exams }}" class="form-control" name="exams" placeholder="Exams"></td>
                                        
                                    </tr>
                               
                            </tbody>
                          </table>
                      
                        {{-- @else
                            
                      @endif --}}
                </div>
                <!-- /.col -->
              </div>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
        <div class="row">
          
        
              </div>
           

                </form>
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





  
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')