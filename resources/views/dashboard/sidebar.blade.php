<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light">GoldenDestiny Sch.</span>
    </a>

    @php
        use App\Models\Classname;
        
        $classnames = Classname::where('section', 'Secondary')->get();
        $classnamespreschools = Classname::where('section', 'Pre-School')->get();
        $classnameselementarys = Classname::where('section', 'Primary')->get();
        
    @endphp

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="d-block">{{ Auth::guard('web')->user()->fname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::guard('web')->user()->status == null)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      @elseif (Auth::guard('web')->user()->status == 'reject')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
        {{-- <h1>Dear {{ Auth::guard('web')->user()->fname }}, You have been rejected</h1> --}}
      @elseif (Auth::guard('web')->user()->status == 'suspend')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      {{-- <h1>Dear {{ Auth::guard('web')->user()->fname }}, You have been suspended</h1> --}} 
      @elseif (Auth::guard('web')->user()->status == 'admitted')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('web/parentprofile/'.Auth::guard('web')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Parent Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Your Child
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/yourchildrens') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Child</p>
                </a>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ url('web/addyourchild') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Another Child</p>
                </a>
              </li>
               --}}
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pay Fees 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay School Fees</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('web.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seccond Term</p>
                </a>
              </li>

               {{-- <li class="nav-item">
                <a href="{{ url('web.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Third Term</p>
                </a>
              </li> --}}

              {{-- <li class="nav-item">
                <a href="{{ url('web.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay All Term</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('web/feedingpaypayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Feeding</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('web/buspayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('web/partypayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Party Fees</p>
                </a>
              </li>
             
            </ul>
          </li>          


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Payments History
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/paymenthistory') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments History</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Class Activities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/viewclassactivitypare') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Activities</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewclassactivityparespecial') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Special Activity</p>
                </a>
              </li>
            
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Check Result
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              
              <li class="nav-item">
                <a href="{{ url('web/checkresult') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terminal Results</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/checkresult') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Midterm Results</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
     
   

      @elseif (Auth::guard('web')->user()->status == 'teacher' && Auth::guard('web')->user()->role == 'approved')
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Teacher
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/web/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('/web/addparenteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Parents</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/web/viewparenteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Your Parents</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/viewyourstudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Your Students</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/firsterm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>First Term</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/secondterm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Second Term</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/web/thirdterm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Third Term</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Results Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/firstermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>First Term Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/secondtermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Second Term Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/thirdtermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Third Term Result</p>
                </a>
              </li>
            
            </ul>
          </li>
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Midterm Results 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/firstmidtermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>First Midterm Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/secondmidtermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Second Midterm Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/thirdmidtermresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Third Midterm Result</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Query
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/checkyourquery') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Query</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/queryrepliedview') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Query Replied</p>
                </a>
              </li>
              
            </ul>
          </li>


            
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Lesson Notes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/addlessonnotes') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Lesson Notes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/lessonnoteview') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Lesson Notes</p>
                </a>
              </li>
              
            </ul>
          </li>



                    
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Class Activities
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/addaclassctivities') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class Activities</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewclassactivities') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Activities</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('web/sendtospecificparent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class Activities to Spec</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('web/viewspecific') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Activities to Spec</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                My Assigned Duties 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('web/mysubjects') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Subjects</p>
                  </a>
                </li>

                @if (Auth::guard('web')->user()->promotion == 'Primary Head')
                

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Pre-School Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  
                    <li class="nav-item">
                      <a href="{{ url('web/preschoolshead') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Pre-Schools</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('web/preschoollessonnotes') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pre-School Lesson Notes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('web/viewqueriespreschool') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pre-School Query</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('web/queryrepliedviewbypreheads') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pre-School Query Replied</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('web/preschoollesonnotes') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pre-School Lesson Notes</p>
                      </a>
                    </li>
    
                    <li class="nav-item">
                      <a href="{{ url('web/preschoolheadparents') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pre-School Parents</p>
                      </a>
                    </li>
    
                    <li class="nav-item">
                      <a href="{{ url('web/preschoolclassactivities') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Class Activities</p>
                      </a>
                    </li>

                    @foreach ($classnamespreschools as $classnamespreschool)
                    <li class="nav-item">
                      <a href="{{ url('web/preschoolresult/'.$classnamespreschool->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Results in {{ $classnamespreschool->classname }}</p>
                      </a>
                    </li>
                    @endforeach
                   
                    
                  </ul>
                </li>




                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Elementary Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  
                   
                    <li class="nav-item">
                      <a href="{{ url('web/viewquerieselementary1') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Elementary Query</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('web/queryrepliedviewbyelementheads') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Elementary Query Replied</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('web/elementarylessonnotes') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Elementary Lesson Notes</p>
                      </a>
                    </li>
    
                    <li class="nav-item">
                      <a href="{{ url('web/elementaryheadparents') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Elementary Parents</p>
                      </a>
                    </li>
    
                    <li class="nav-item">
                      <a href="{{ url('web/elementaryclassactivities') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Elementary Class Activities</p>
                      </a>
                    </li>

                    @foreach ($classnameselementarys as $classnameselementary)
                    <li class="nav-item">
                      <a href="{{ url('web/elementresults/'.$classnameselementary->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Results in {{ $classnameselementary->classname }}</p>
                      </a>
                    </li>
                    @endforeach
                   
                    <li class="nav-item">
                      <a href="{{ url('web/primaryheads') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Primary Head</p>
                      </a>
                    </li>
    
                    <li class="nav-item">
                      <a href="{{ url('web/elementarylessonnotes') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Lesson Notes</p>
                      </a>
                    </li>
                  </ul>
                </li>


              
                
                @elseif(Auth::guard('web')->user()->promotion == 'Secondary')

                  
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Query Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('web/viewqueries') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Query</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{ url('web/queryrepliedviewbyheads') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Query Replied</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Subjects Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <a href="{{ url('web/addsubjectbyhead') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Subject</p>
                    </a>
                    <li class="nav-item">
                      <a href="{{ url('web/viewsubjectsbyhead') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Subjects</p>
                      </a>
                    </li>
  
                    <li class="nav-item">
                      <a href="{{ url('web/viewassignteachers') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Subjects Teacher</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Students Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    @foreach ($classnames as $classname)
                    <li class="nav-item">
                      <a href="{{ url('web/highschools/'.$classname->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> {{ $classname->classname }} Students</p>
                      </a>
                    </li>
                    @endforeach
                  
                    {{-- <li class="nav-item">
                      <a href="{{ url('web/viewassignteachers') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Subjects Teacher</p>
                      </a>
                    </li> --}}
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Midterm Results Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    @foreach ($classnames as $classname)
                    <li class="nav-item">
                      <a href="{{ url('web/highschoolmidtermresult/'.$classname->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Results in {{ $classname->classname }}</p>
                      </a>
                    </li>
                    @endforeach
                    
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Teachers Section
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    
                    <li class="nav-item">
                      <a href="{{ url('web/highschoolteachersheads') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Teachers</p>
                      </a>
                    </li>
                    
                    
                  </ul>
                </li>

               

                

                <li class="nav-item">
                  <a href="{{ url('web/highschoolessonnotes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Lesson Notes</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/highschoolparents') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Parents</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/classactivities') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Class Activities</p>
                  </a>
                </li>

                
      

                @foreach ($classnames as $classname)
                <li class="nav-item">
                  <a href="{{ url('web/highschoolresult/'.$classname->classname) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Results in {{ $classname->classname }}</p>
                  </a>
                </li>
                @endforeach
              
                

                </li>
                
              </li>

              @elseif(Auth::guard('web')->user()->promotion == 'Pre-School Head')

              <li class="nav-item">
                <a href="{{ url('web/preschoolshead') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Pre-Schools</p>
                </a>
                <li class="nav-item">
                  <a href="{{ url('web/preschoollessonnotes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Lesson Notes</p>
                  </a>
                </li>
               
              </li>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Pre-School Section
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="{{ url('web/preschoolshead') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Pre-Schools</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('web/preschoollessonnotes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pre-School Lesson Notes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('web/viewqueriespreschool') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pre-School Query</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/queryrepliedviewbypreheads') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pre-School Query Replied</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/preschoollesonnotes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pre-School Lesson Notes</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/preschoolheadparents') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pre-School Parents</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('web/preschoolclassactivities') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Class Activities</p>
                  </a>
                </li>

                @foreach ($classnamespreschools as $classnamespreschool)
                <li class="nav-item">
                  <a href="{{ url('web/preschoolresult/'.$classnamespreschool->classname) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Results in {{ $classnamespreschool->classname }}</p>
                  </a>
                </li>
                @endforeach
               
                
              </ul>
            </li>



            @else
            <li class="nav-item">
              <a href="{{ url('web/viewaddresults') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload Result</p>
              </a>
          </li>

            @endif
                

            </ul>
          </li>

          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('web.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav> 
      @else

      <h1>no</h1>
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
