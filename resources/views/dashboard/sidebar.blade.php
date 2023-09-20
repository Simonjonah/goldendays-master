<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('web/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light">GoldenDestiny Sch.</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('web/profile/'.Auth::guard('web')->user()->ref_no11) }}" class="d-block">{{ Auth::guard('web')->user()->fname }}</a>
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pay Fees {{ Auth::guard('web')->user()->classname }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pioneer Term</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pensulate Term</p>
                </a>
              </li> --}}

              <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Premium Term</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay All Term</p>
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
                <a href="{{ url('web.paymenthistory') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments History</p>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pay Fees {{ Auth::guard('web')->user()->classname }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('web/payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pioneer Term</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('web/payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pensulate Term</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Premium Term</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay All Term</p>
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
                <a href="{{ url('web.paymenthistory') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments History</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          
          <li class="nav-header">ADMIMISSION</li>
          <li class="nav-item">
            <a href="{{ url('web/admisionletter') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Admission Letter</p>
            </a>
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
                  <p>Your Results</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                My Teacher 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('web/myprogram') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Teacher</p>
                  </a>
                </li>
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
                My Assigned Subjects 
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
                <li class="nav-item">
                  <a href="{{ url('web/primaryheads') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Primary Head</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('web/addrults') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Upload Result</p>
                  </a>
                </li>
                @else
                <li class="nav-item">
                  <a href="{{ url('web/highschools') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Secondary Schools</p>
                  </a>

                  <li class="nav-item">
                    <a href="{{ url('web/viewaddresults') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Upload Result</p>
                    </a>
                  </li>
                </li>
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