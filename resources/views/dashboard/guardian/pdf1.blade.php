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
            @if ($getyour_result->status == 'approved')
                
            @else
                
            @endif

        @endforeach
  
  
    <table class="table">

        <tr>
            <th style="text-align: center; width: 120px; height: 100px; padding: 0px">
                {{-- <img src="{{ public_path('public/assets/dist/img/AdminLTELogo.png') }}"> --}}
            </th>

            <th style="text-align: center; width: 450px;"><h1>GOLDEN SCHOOL ACADEMY</h1>
                <p style="font-weight: normal; margin-bottom: -8px;">Golden Destiny Academy Street
                    Housing extention Uyo, Akwa Ibom State, Nigeria</p>
                <p  style="font-weight: normal; font-style:italic">Motor: Fostering Creativity and Development</p> 
            </th>
                
            <th style="text-align: center; width: 120px;">
                Student Image
            </th>
        </tr>
       

            <tr>
                <th colspan="2" style="text-align: center; text-transform: uppercase;">{{ $getyour_result->term }} REPORT FOR {{ $getyour_result->academic_session }} <br>
                   UDO SIMON UDO
                </th>
                <th>-</th>
            </tr>
    </table>

        
        

        <table id="myTable">
            <tr>
              <th>AFFECTIVE DOMAIN (UBJECT OFFERED) </th>
              <th>CA 1</th>
              <th>CA 2</th>
              <th>CA 3</th>
              <th>EXAMS</th>
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

            </tr>
       
            @foreach ($getyour_results as $getyour_result)
            <tr>
                <td>{{ $getyour_result->subjectname }}</td>
                <td>{{ $getyour_result->test_1 }}</td>
                <td>{{ $getyour_result->test_2 }}</td>
                <td>{{ $getyour_result->test_3 }}</td>
                <td>{{ $getyour_result->exams }}</td>
                <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams}}</td>
                <td>@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 79)
                    <td>a</td>
                
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 69)
                    <td>a</td>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                    <td>a</td>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <td>a</td>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <td>a</td>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                    <td>a</td>
                    @else
                    <td>a</td>
                @endif</td>

            </tr>
            @endforeach

                {{-- @if ($getyour_result->status == 'approved')
                    @php
                    $total_score +=$getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams;
                @endphp --}}
            {{-- <tr> --}}
                {{-- <td>{{ $getyour_result->subjectname }}</td>
                <td>{{ $getyour_result->test_1 }}</td>
                <td>{{ $getyour_result->test_2 }}</td>
                <td>{{ $getyour_result->test_3 }}</td>
                <td>{{ $getyour_result->exams }}</td>
                <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams}}</td>
                <td>@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 79)
                    <p>A</p>
                
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 69)
                    <p>B</p>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                    <p>c</p>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <p>D</p>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                    <p>E</p>
                    @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                    <p>F</p>
                    @else
                    <p>F</p>
                @endif</td> --}}
                {{-- <td>{{ $totalaverage / 2 }}</td> --}}
                {{-- <td>{{ round($getyour_result['test_1'] + $getyour_result['test_2'] + $getyour_result['test_3'] + $getyour_result['exams'] / 2)  }}</td> --}}
                {{-- round( ($row['result1'] + $row['result2']) /2) ; --}}
            {{-- </tr> --}}
                {{-- @else
                    
                @endif --}}
           
            {{-- @endforeach


              <tr> --}}
                <td>Total</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><b>TOTAL SCORE</b></td>
                <td>-</td>
                <td><b>687.9</b></td>
              </tr>

          </table>


          {{-- <table  style="margin-top: 20px;">
            <tr>
              <th>AFFECTIVE DOMAIN</th>
              <th colspan="5">GRADE</th>
              <th>PSYCOMOTOR DOMAIN</th>
              <th colspan="4">GRADE</th>
              <th></th>
              <th colspan="5">GRADING AND KEY</th>
             
              
              
            </tr>
            <tr>
              <td>-</td>
              <td>4</td>
              <td>3</td>
              <td>2</td>
              <td>1</td>

              <td></td>
              <td>-</td>
              
              <td>4</td>
              <td>3</td>
              <td>2</td>
              <td>1</td>


              <td></td>
              <td>0</td>
              <td>-</td>
              <td>39</td>
              <td>F</td>
              <td>FAIL</td>
            </tr>
            
            <tr>
                <td>Responsibility</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td>Club & Society</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>40</td>
                <td>-</td>
                <td>49</td>
                <td>E</td>
                <td>FAIR</td>
            </tr>

            <tr>
                <td>Punctuality</td>
                <td></td>
                <td>Yes</td>
                <td></td>
                <td></td>


                <td></td>
                <td>Handwriting</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>50</td>
                <td>-</td>
                <td>59</td>
                <td>D</td>
                <td>PASS</td>
            </tr>

            <tr>
                <td>Politeness</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td>Technical Works</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Yes</td>



                <td></td>
                <td>60</td>
                <td>-</td>
                <td>69</td>
                <td>C</td>
                <td>GOOD</td>
            </tr>
            <tr>
                <td>Corporation</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Yes</td>



                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>70</td>
                <td>-</td>
                <td>79</td>
                <td>B </td>
                <td>VERY GOOD</td>
            </tr>

            <tr>
                <td>Attentiveness</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>Handling Tools</td>
                <td></td>
                <td>Yes</td>
                <td></td>
                <td></td>


                <td></td>
                <td>80</td>
                <td>-</td>
                <td>100</td>
                <td>A</td>
                <td>EXCELLENCE</td>
            </tr>

            <tr>
                <td>Initiative</td>
                <td></td>
                <td></td>
                <td>Yes</td>
                <td></td>


                <td></td>
                <td>Practical Works</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td colspan="5" style="text-align: center">AFFECTIVE/PSYCOMOTOR DOMAIN</td>
               
            </tr>

            <tr>
                <td>Organisation</td>
                <td></td>
                <td>Yes</td>
                <td></td>
                <td></td>


                <td></td>
                <td>Craftmanship</td>
                <td></td>
                <td></td>
                <td>Yes</td>
                <td></td>


                <td></td>
                <td>4</td>
                <td style="text-align: center" colspan="5">Exellence</td>
            </tr>
            
            <tr>
                <td>Neatness</td>
                <td></td>
                <td>Yes</td>
                <td></td>
                <td></td>



                <td></td>
                <td>Music Skills</td>
                <td></td>
                <td></td>
                <td>Yes</td>
                <td></td>



                <td></td>
                <td>3</td>
                <td style="text-align: center" colspan="5">Very Good</td>
            </tr>

            <tr>
                <td>Perseverance</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>Computer Skills</td>
                <td></td>
                <td>Yes</td>
                <td></td>
                <td></td>


                <td></td>
                <td>2</td>
                <td style="text-align: center" colspan="5"> Good</td>
            </tr>

            <tr>
                <td>Attitude to Work</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>Sports</td>
                <td>Yes</td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>1</td>
                <td style="text-align: center" colspan="5"> Fair</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


                <td></td>
                <td>Drawing/Painting</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Yes</td>
            </tr>
          </table> --}}


          <table>
            <tr>
                <td>REG CODE:</td>
                <td>{{ $getyour_result->regnumber }}</td>
                <td>SEX:</td>
                <td>{{ $getyour_result->user['gender'] }}</td>
                <td>TOTAL SCORE OBTAINABLE:</td>
                {{-- <td>{{ $total_subject * 100 }}</td> --}}
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
                <td class="von">120</td>
                <td class="von">No of Days Present:</td>
                <td class="von">120</td>
                <td class="von">Next Term Begins:</td>
                <td class="von">28th January, 2023</td>
            </tr>

           
            </table>

            <table style="margin-top: 2px;">
                <tr>
                    <td>Class Teacher's Comment</td>
                    <td>Precious is an intelligent and active class participant. She has shown 								
                        improvement in some of her subjects .There is still lots of room for  								
                       growth and improvement. We are working on improving her focus and 								
                       drive in the coming term.								
                    </td>
                    <td>Signature: TOT SUBJECT</td>
                </tr>

                <tr>
                    <td>Head Teacher's Comment</td>
                    <td>Precious is an intelligent and active class participant. She has shown 								
                        improvement in some of her subjects .There is still lots of room for  								
                       growth and improvement. We are working on improving her focus and 								
                       drive in the coming term.								
                    </td>
                    <td>Signature: </td>
                </tr>
        
        
            </table>


         
  
</body>
</html>
