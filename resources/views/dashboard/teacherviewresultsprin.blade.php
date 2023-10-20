@include('dashboard.header')
@include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Subjects </h1> --}}
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
                        {{-- <small class="float-right">{{ $view_student->created_at->format('D d, M Y, H:i')}}</small> --}}
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              @foreach ($view_myresult_results as $view_myresult_result)

              @endforeach
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
                    <img style="width: 70%; height: 100px;" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="webLTE Logo" class="brand-image ">

                 
                </div> 
                <!-- /.col -->
               <div class="col-sm-8 invoice-col">
                   <h1>GOLDEN DESTINY ACADEMY</h1>
                   <address>
                    Golden Destiny Academy Road.
                    Off Senator Akon Eyakenyi Street,
                    Off General Edet Akpan Ave, 520101, Uyo
                  </address>

                  <address>
                    Name: {{ $view_myresult_result->surname }}, {{ $view_myresult_result->fname }} {{ $view_myresult_result->middlename }}
                   
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                    <img style="width: 70%; height: 100px;" src="{{ URL::asset("/public/../$view_myresult_result->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
              
                  <table class="table table-striped">
                      <thead>
                      <tr>
                        {{-- <th>S/N</th> --}}
                        {{-- <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Surname</th> --}}
                        <th>Subjects</th>
                        <th>Summative</th>
                        <th>Formative</th>
                       
                        <th>Exams</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Subject Average</th>
                        <th>Teacher Name</th>

                        
                      </tr>
                      </thead>
                      <tbody>
                        @php
                            $total_score = 0;
                            // $totalsubject_score = 0;
                        @endphp
                          @foreach ($view_myresult_results as $view_myresult_result)
                          @php
                          $total_score +=$view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams;
                          // $totalsubject_score +=$view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams                            
                          @endphp
                          <tr>
                              {{-- <td>{{ $view_myresult_result->user['fname'] }}</td>
                              <td>{{ $view_myresult_result->user['middlename'] }}</td>
                              <td>{{ $view_myresult_result->user['surname'] }}</td> --}}
                              <td>{{ $view_myresult_result->subjectname }}</td>
                              <td>{{ $view_myresult_result->test_1 }}</td>
                              <td>{{ $view_myresult_result->test_2 }}</td>
                              {{-- <td>{{ $view_myresult_result->test_3 }}</td> --}}
                              <td>{{ $view_myresult_result->exams }}</td>
                              <td>{{ $view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams }}</td>
                              <td>@if ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 69)
                                <p>A</p>
                               
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 59)
                                <p>B</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 49)
                                <p>C</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 44)
                                <p>D</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 40)
                                <p>E</p>
                                @elseif ($view_myresult_result->test_1 + $view_myresult_result->test_2 + $view_myresult_result->test_3 + $view_myresult_result->exams > 39)
                                <p>F</p>
                                @else
                                <p>F</p>
                              @endif</td>
                              <td>{{ $view_myresult_result->test_1  + $view_myresult_result->test_2  + $view_myresult_result->test_3  + $view_myresult_result->exams / 2}}</td>
                                
                              {{-- <td>{{ $total_score / 2 }}</td> --}}
                            </td>
                            <td>{{ $view_myresult_result->surname }}</td>

                            </tr>
                          @endforeach
                      
                            {{-- <td>{{ $total_score }}</td> --}}
                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          
        
          {{-- @endif --}}
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                    Submit 
                  </button>
                 --}}
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}

                </form>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



















    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <div class="table-responsive">
              {{-- <p class="lead">Behaviour</p> --}}

              {{-- <form action="{{ url('web/createpsychomotor/'.$view_student->ref_no) }}" method="post">
                @csrf --}}
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:50%">BEHAVIOUR:</th>
                      <th style="width:50%">4</th>
                      <th style="width:50%">3</th>
                      <th style="width:50%">2</th>
                      <th style="width:50%">1</th>
                    </tr>
                    {{-- <td><input type="hidden" name="user_id" value="{{ $view_student->id }}" id=""></td> --}}

                    <tr>
                      <th>Punctuality</th>
                      
                       @if ($view_results->punt1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="punt1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->punt2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="punt2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->punt3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="punt3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->punt4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="punt3" value="Yes" id=""></td>
                      @endif

                     
                    
                    </tr>

                    <tr>
                      <th>Politeness</th>

                      @if ($view_results->polite1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="polite1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->polite2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="polite2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->polite3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="polite3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->polite4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="polite3" value="Yes" id=""></td>
                      @endif

                     
                    
                    </tr>
                    <tr>
                      <th>Responsiblity</th>
                      
                      @if ($view_results->respond1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="respond1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->respond2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="respond2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->respond3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="respond3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->respond4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="respond3" value="Yes" id=""></td>
                      @endif

                     

                    </tr>
                    <tr>
                      <th>Neatness</th>
                      
                      @if ($view_results->neat1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="neat1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->neat2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="neat2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->neat3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="neat3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->neat4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="neat3" value="Yes" id=""></td>
                      @endif

                     

                    </tr>


                    <tr>
                      <th>Coorporate</th>
                      
                      @if ($view_results->neat1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="corporate1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->corporate2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="corporate2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->corporate3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="corporate3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->corporate4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="corporate3" value="Yes" id=""></td>
                      @endif

                      
                    </tr>
                    <tr>
                      <th>Attentiveness</th>


                      @if ($view_results->attentive1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="attentive1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->attentive2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="attentive2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->attentive3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="attentive3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->attentive4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="attentive3" value="Yes" id=""></td>
                      @endif
{{-- 
                      @if ($view_results->attentive5 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="attentive5" value="Yes" id=""></td>
                      @endif --}}
              
                     
                    </tr>

                    <tr>
                      <th>Initiative</th>

                      @if ($view_results->init1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="init1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->init2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="init2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->init3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="init3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->init4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="init3" value="Yes" id=""></td>
                      @endif

                      
                      
                      
                    
                    </tr>
                    <tr>
                      <th>Organisation</th>

                      @if ($view_results->organ1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="organ1" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->organ2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="organ2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->organ3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="organ3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->organ4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="organ3" value="Yes" id=""></td>
                      @endif

                     
                      
                    </tr>
                    <tr>
                      <th>Perseverance</th>
                      @if ($view_results->pers1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="organ1" value="Yes" id=""></td>
                      @endif
                      

                      @if ($view_results->pers2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="pers2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->pers3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="pers3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->pers4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="pers4" value="Yes" id=""></td>
                      @endif

                    </tr>
                    <tr>
                      <th>Attitude to Work</th>
                      @if ($view_results->atti1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="atti1" value="Yes" id=""></td>
                      @endif
                      

                      @if ($view_results->atti2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="atti2" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->atti3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="atti3" value="Yes" id=""></td>
                      @endif

                      @if ($view_results->atti4 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="atti4" value="Yes" id=""></td>
                      @endif

                      {{-- @if ($view_results->atti5 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="atti5" value="Yes" id=""></td>
                      @endif --}}
                    </tr>

                  </table>
                  <div class="form-group">
                      <textarea class="form-control" name="teacher_comment" id="" cols="10" rows="2" placeholder="Teacher's Comment">{{ $view_results->teacher_comment }}</textarea>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" name="headteach_comment" id="" cols="10" rows="2" placeholder="Teacher's Comment">{{ $view_results->headteach_comment }}</textarea>
                </div>

                <td>Next Term Begin: <input class="form-control" type="text" name="atti5" value="{{ $view_results->next_term }}" id=""></td>
                <td>No of Days School Open: <input class="form-control" type="text" name="atti5" value="{{ $view_results->dayschopen }}" id=""></td>
                <td>Next Term Begin: <input class="form-control" type="text" name="atti5" value="{{ $view_results->dayspresent }}" id=""></td>

            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            {{-- <p class="lead">PSYCHOMOTOR SKILLS</p> --}}

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">PSYCHOMOTOR SKILLS:</th>
                  <th style="width:50%">A</th>
                  <th style="width:50%">B</th>
                  <th style="width:50%">C</th>
                  <th style="width:50%">D</th>
                  <th style="width:50%">E</th>
                </tr>
                <tr>
                  <th>Club & Society</th>
                  @if ($view_results->club1 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="club1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->club2 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="club2" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->club3 == 'Yes')
                      <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                        @else
                      <td><input type="checkbox" name="club3" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->club4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="club3" value="Yes" id=""></td>
              @endif
             
                 
                </tr>
                <tr>
                  <th>Sports</th>
                  @if ($view_results->sports1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->sports2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->sports3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->sports4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif

                 


                </tr>


                <tr>
                  <th>Hand Writing</th>
                  @if ($view_results->hand1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->hand2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->hand3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->hand4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="verbal3" value="Yes" id=""></td>
                  @endif

                </tr>


                <tr>
                  <th>Handling Tools</th>

                  @if ($view_results->tool1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tool1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->tool2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tool1" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->tool3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tool1" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->tool4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tool1" value="Yes" id=""></td>
                  @endif

                 
                </tr>


                
                <tr>
                  <th>Technical Works</th>

                  @if ($view_results->tech1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tech1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->tech2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tech1" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->tech3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tech1" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->tech4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="tech1" value="Yes" id=""></td>
                  @endif

                </tr>

                <tr>
                  <th>Practical Works</th>
                  @if ($view_results->pract1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif

                 
                </tr>


                <tr>
                  <th>Craftmanship</th>
                  @if ($view_results->craft1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->craft2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->craft3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->craft4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif

                 
                </tr>


                <tr>
                  <th>Music Skills</th>
                  @if ($view_results->music1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="music1" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->music2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="music2" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->music3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="music3" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->music4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="music4" value="Yes" id=""></td>
                  @endif
                 
                 
                </tr>

                <tr>
                  <th>Drawing & Painting</th>
                  @if ($view_results->paint1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="paint1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->paint2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="paint2" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->paint3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="paint3" value="Yes" id=""></td>
                  @endif

                  @if ($view_results->paint4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="paint4" value="Yes" id=""></td>
                  @endif

                 
                </tr>

                <tr>
                  <th>Practical Works</th>
                  @if ($view_results->pract1 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract2 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract3 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif
                  @if ($view_results->pract4 == 'Yes')
                  <td><h5><i style="color: green" class="icon fas fa-check"></i> </h5> </td>
                    @else
                  <td><input type="checkbox" name="arts1" value="Yes" id=""></td>
                  @endif

                 
                </tr>

              
              </table>


           
            </div>



            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th style="width:50%">AFFECTIVE/PSYCOMOTIVE </th>
                  <th style="width:50%">DOMAIN</th>
                  
                </tr>
                <tr>
                  <th>1</th>
                  <td>Excellence</td>
                </tr>
                <tr>
                  <th>2</th>
                  <td>Very Good</td>
                </tr>

                <tr>
                  <th>3</th>
                  <td>Good</td>
                </tr>
                <tr>
                  <th>1</th>
                  <td>Fair</td>
                </tr>

                
                
               
               
              </table>

              <a href="{{ url('web/addcomment/'.$view_myresult_result->id) }}" class="btn btn-primary">Add Comment</a>
             
            </div>

      
          </div>
          <!-- /.col -->         
     
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  {{-- <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                    Submit 
                  </button> --}}
                
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> --}}

                </form>
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')