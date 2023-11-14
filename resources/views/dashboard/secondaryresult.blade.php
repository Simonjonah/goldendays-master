<!DOCTYPE html>
<html>
<head>
    <title>Golden Destiny Academy Terminal Result</title>
</head>
<style>
    /* table{
    width:200px;
    height:auto;
    table-layout:fixed;
} */
td {
  height: 3px; /* Adjust the height as per your requirements */
}
tr {
  height: 3px; /* Adjust the height as per your requirements */
}

td {
    margin: 0px;
  padding-top: 0px;
  padding-bottom: 0px;
}
table, th {
    border: 1px solid black;
  border-collapse: collapse;
}
table, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-size: 12px;
  text-align: center;
  /* height:10px;
  padding: 0px;
  margin: 0px; */
}
table .b{
    border-style: none;
}
/* .dayopen, .von{
    font-size: 15px;
} */
table, tr, td{
    margin: 0;
    padding: 0;
}

</style>
<body>

   
        

        
             
   @php
   $total_score = 0;
@endphp
    
    @foreach ($getyour_results as $getyour_result)
        @if ($getyour_result->status == 'approved' && $getyour_result->type == null)
            
        @else
            
        @endif
    @endforeach



<table class="table">

    <tr>
        <th style="text-align: center; width: 120px; height: 100px; padding: 0px">
            <img style="width: 100%; height: 10%;" src="{{ public_path('assets/dist/img/AdminLTELogo.png')}}">
        </th>

        <th style="text-align: center; width: 450px;"><h1>GOLDEN SCHOOL ACADEMY</h1>
            <p style="font-weight: normal; margin-bottom: -8px;">Golden Destiny Academy Street
                Housing extention Uyo, Akwa Ibom State, Nigeria</p>
            <p  style="font-weight: normal; font-style:italic">Motor: Fostering Creativity and Development</p> 
        </th>
            
        <th style="text-align: center">
            <img style="width: 100%; height: 10%;" src="{{ public_path('public/../'.$getyour_result->images) }}">
        </th>
    </tr>
   

        <tr>
            <th colspan="2" style="text-align: center; text-transform: uppercase;">{{ $getyour_result->term }} REPORT FOR {{ $getyour_result->academic_session }} <br>
                {{ $getyour_result->surname }}, {{ $getyour_result->middlename }} {{ $getyour_result->surname }}
            </th>
            <th>-</th>
        </tr>
</table>

    
    

    <table id="myTable">
        <tr>
          <th>AFFECTIVE DOMAIN (UBJECT OFFERED) </th>
          <th>CAT 1</th>
          <th>CAT 2</th>
          <th>CAT 3</th>
          <th>EXAMS</th>
          <th>TOTAL</th>
          <th>TOTAL</th>
          <th>GRADE</th>
          <th>SUBJECT AVERAGE</th>
          
        </tr>
        <tr>

          <td>-</td>
          <td>20</td>
          <td>20</td>
          <td>10</td>
          <td>50</td>
          <td>100</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>

        </tr>
   
        @foreach ($getyour_results as $getyour_result)
            @if ($getyour_result->status == 'approved' && $getyour_result->type == null)
                @php
                $total_score +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
            @endphp
        <tr>
            <td>{{ $getyour_result->subjectname }}</td>
            <td>{{ $getyour_result->test_1 }}</td>
            <td>{{ $getyour_result->test_2 }}</td>
            <td>{{ $getyour_result->test_3 }}</td>
            <td>{{ $getyour_result->exams }}</td>
            <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams}}</td>
            <td>@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 79)
               
                <td>A</td>
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 69)
                <td>B</td>

                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                <td>C</td>

                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                <td>D</td>

                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                <td>E</td>

                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                <td>F</td>

                @else
                <td>F</td>

            @endif</td>
            {{-- <td>{{ $totalaverage / 2 }}</td> --}}
            <td>{{ round($getyour_result['test_1'] + $getyour_result['test_2'] + $getyour_result['test_3'] + $getyour_result['exams'] / 2)  }}</td>
            {{-- round( ($row['result1'] + $row['result2']) /2) ; --}}
        </tr>
            @else
                
            @endif
       
        @endforeach

    

          <tr>
            <td>Total</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            {{-- <td>-</td> --}}
            <td><b>{{ $total_score }}</b></td>
            <td><b>-</b></td>
            <td>-</td>
            <td>Grade</td>
            <td>Subject Average</td>

          </tr>

      </table>



      <style>
        .container .row .col .psy{
            width: 230px;
            display: inline-block;
        }

      </style>
      
      <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col">
                <div class="psy">
                    <table class="table">
                        <tr>
                            <th>AFFECTIVE DOMAIN</th>
                            <th colspan="4">GRADE</th>
                        </tr>
                         
                        <tr>
                            <td>-</td>
                            <td>4</td>
                            <td>3</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                          <tr>
                            <td>Responsibility</td>
                                @if ($view_results->respond1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->respond2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->respond3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->respond4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                                
                          </tr>
        
                          <td>Punctuality</td>
                                @if ($view_results->punt1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->punt2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->punt3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->punt4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
                          <tr>
                              <td>Politeness</td>
                              @if ($view_results->polite1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->polite2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->polite3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->polite4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
                              
                          </tr>
              
                          <tr>
                              <td>Corporation</td>
                              @if ($view_results->corporate1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->corporate2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->corporate3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->corporate4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
                          </tr>
                              <td>Attentive</td>
                              @if ($view_results->attentive1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->attentive2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->attentive3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->attentive4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
                            
                          </tr>
              
                          <tr>
                              <td>Initiative</td>
                              @if ($view_results->init1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->init2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->init3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->init4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
                          <tr>
                              <td>Organisation</td>
                              @if ($view_results->organ1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->organ2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->organ3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->organ4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
              
                          <tr>
                              <td>Neatness</td>
                              @if ($view_results->neat1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->neat2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->neat3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->neat4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
              
                          <tr>
                              <td>Perseverance</td>
                              @if ($view_results->pers1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pers2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pers3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pers4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
              
                          <tr>
                              <td>Attitude to Work</td>
                              @if ($view_results->atti1 == 'Yes')
                              <td>Yes </td>
                              @else
                              <td></td>
                              @endif
        
                              @if ($view_results->atti2 == 'Yes')
                              <td>Yes </td>
                              @else
                              <td></td>
                              @endif
        
                              @if ($view_results->atti3 == 'Yes')
                              <td>Yes </td>
                              @else
                              <td></td>
                              @endif
        
                              @if ($view_results->atti4 == 'Yes')
                              <td>Yes </td>
                              @else
                              <td></td>
                              @endif
                          </tr>
                        
                       
                      </table>
                </div>

                <div class="psy">
                    <table class="table"  style="margin-top: 50px;">
                        <tr>
                            <th>PSYCOMOTIVE DOMAIN</th>
                            <th colspan="4">GRADE</th>
                          </tr>
                         
                          <tr>
                            <td>-</td>
                            <td>4</td>
                            <td>3</td>
                            <td>2</td>
                            <td>1</td>
                          </tr>
                          <tr>
                            <td>Club & Society</td>
                                @if ($view_results->club1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->club2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->club3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->club4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
        
                          <td>Handwriting</td>
                                @if ($view_results->hand1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->hand2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->hand3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->hand4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                               
                          </tr>
                          <tr>
                              <td>Technical Work</td>
                              @if ($view_results->tech1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tech2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tech3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tech4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
                              
                          </tr>
        
                          <td>Handling Tools</td>
                                @if ($view_results->tool1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tool2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tool3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->tool4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td> </td>

                                @endif
                          </tr>
                          <tr>
                              <td>Practical Works</td>
                              @if ($view_results->pract1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pract2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pract3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->pract4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td> </td>

                                @endif
              
                              
                          </tr>
              
                          <tr>
                              <td>Craftmanship</td>
                              @if ($view_results->craft1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->craft2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->craft3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->craft4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
              
                          </tr>
                              <td>Music</td>
                              @if ($view_results->music1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->music2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->music3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->music4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
              
                            
                          </tr>
              
                          <tr>
                              <td>Computer</td>
                              @if ($view_results->comp1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->comp2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->comp3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->comp4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
                          <tr>
                              <td>Sports</td>
                              @if ($view_results->sport1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->sport2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->sport3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->sport4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
              
                          <tr>
                              <td>Drawing/Painting</td>
                              @if ($view_results->paint1 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->paint2 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->paint3 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
        
                                @if ($view_results->paint4 == 'Yes')
                                <td>Yes </td>
                                @else
                                <td></td>
                                @endif
                          </tr>
              
                          
                       
                      </table>
                </div>


                <div class="psy">
                    <table class="table">
                        <tr>
                
                          <th colspan="4">GRADING AND KEY</th>
                        </tr>
                        <tr>

                          <td>4</td>
                          <td>3</td>
                          <td>2</td>
                          <td>1</td>
            
                        </tr> 

                        <tr>
                            <td> Exellence</td>
                            <td> Very Good</td>
                            <td> Good</td>
                            <td> Fair</td>
                        </tr>
                       
                      </table>
                </div>
            </div>
        </div>
      </div>
      

      </table>

     

    


      <table>
        <tr>
            <td>REG CODE:</td>
            <td>{{ $getyour_result->regnumber }}</td>
            <td>SEX:</td>
            <td>{{ $getyour_result->user['gender'] }}</td>
            <td>TOTAL SCORE OBTAINABLE:</td>
            <td>{{ $total_subject * 100 }}</td>
            <td>NO. OF DISTINGTIONS (A-B):</td>
            <td>7A's, 3B's</td>
        </tr>

        <tr>
            <td>CLASS:</td>
            <td>{{ $getyour_result->classname }}</td>
            <td>TERM:</td>
            <td>{{ $getyour_result->term }} </td>
            <td>SCORE OBTAINED:</td>
            <td>{{ $total_score }}</td>

            <td>NO. OF CREDITS (C-D):</td>
            <td>6C's 3D's</td>
        </tr>
        <tr>
            <td>AGE:</td>
            <td>{{ $getyour_result->user['dob'] }}</td>
            <td colspan="2"></td>
           
            <td>PERCENTAGE:</td>
            <td>{{ $total_score/100 }}</td>
            <td>PUPIL'S GRADE IN CLASS:</td>
            <td>B</td>
        </tr>
        
    

     </table>

      
      
    <table class="dayopen" style="margin-top: 10px; " >
        <tr>
            <td class="von">Days School Opens:</td>
            <td class="von">{{ $getyour_result->dayschopen }}</td>
            <td class="von">No of Days Present:</td>
            <td class="von">{{ $getyour_result->dayspresent }}</td>
            <td class="von">Next Term Begins:</td>
            <td class="von">{{ $getyour_result->next_term }}</td>
        </tr>

       
        </table>

        <table style="margin-top: 2px;">
            <tr>
                <td>Class Teacher's Comment</td>
                <td>{{ $getyour_result->teacher_comment}}								
                </td>
                <td>Signature: </td>
            </tr>

            <tr>
                <td>Head Teacher's Comment</td>
                <td>{{ $getyour_result->headteach_comment}}								
                </td>
            <td>Signature: <img style="width: 100%; height: 2%;" src="{{ public_path('assets/dist/img/signature.png')}}"></td>
            </tr>
    
    
        </table> 

{{-- 
        @else

        @endif
    @endforeach
   --}}

         
  
</body>
</html>
