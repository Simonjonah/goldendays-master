<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light"><br>GOLDENDESTINY SCHOOLS </span>
    </a>
    
     
    <?php
    use App\Models\Classname;
      $view_clesses = Classname::all();
  ?>


    @if (Auth::guard('admin')->user()->role == '0')
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('admin')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
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
                <a href="{{ route('admin.home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addclass') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewclassestables') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Classes</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>


         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Class Activities
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addclassactivitiesad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class Activities</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewclassactivitiesads') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Class Activities</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> 



          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Gallery</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Galleries</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.addfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Facility</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.viewfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Facilities</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addparent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Parents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewparents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Parents</p>
                </a>
              </li>

              <li class="nav-item">
               

              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/preschoolad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
              <li class="nav-item">
                <a href="{{ route('admin.allstudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Students</p>
                </a>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ route('admin.adminprogress') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Elementary Pupils</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="{{ route('admin.admittedstudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>High Sch. Students</p>
                </a>
              </li>
              --}}
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes Manage
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Classes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($view_clesses as $view_clesse)
                  <li class="nav-item">
                    <a href="{{ url('admin/classrooms/'.$view_clesse->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_clesse->classname }}</p>
                    </a>
                  </li>
                  @endforeach
                  
                 
                </ul>
              </li>
            </ul>
             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.preschoolsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Pre-School Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.nurserysubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Elementary Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Secondary School Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.teachertosubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher to Subject</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.allsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subject</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Session
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Session</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Session</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teachers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.viewteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.approveteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approve Teachers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.suspendedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Suspended Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.sackedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Sacked Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.queriedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Queried Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.queriedteachersreply') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Query Replied </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.allteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Teachers </p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="{{ route('admin.primaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primary Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.secondaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Secondary Teachers </p>
                </a>
              </li>
              
            </ul>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/viewallpaymentsad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Payments</p>
                </a>
              </li>

              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/classpaymentad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Generate Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ route('admin.addschoolfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add School Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addbusfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addfeedingfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Feeding Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addpartyfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Party Fees</p>
                </a>
              </li>
              
             

              <li class="nav-item">
                <a href="{{ url('admin/viewallfees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Fees</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ route('admin.addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Result Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/viewclassresults/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
              
              <li class="nav-item">
             
                <a href="{{ route('admin.viewresultbyadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Results</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewapproveresultsbyad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approved Results</p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Result 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/addresultsad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
               
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lesson Note Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <li class="nav-item">
                  <a href="{{ route('admin.viewlessonnotesad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Lesson Notes</p>
                  </a>
                </li>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ route('admin.viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li> --}}
            </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Controls
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
                <li class="nav-item">
                  <a href="{{ route('admin.viewroles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Role</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.viewadminstrator') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admin Control</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewaccountant') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Account Control</p>
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
                <a href="{{ route('admin.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @elseif (Auth::guard('admin')->user()->role == 'sacked')
    <li class="nav-item">
      <a href="{{ url('admin/logout') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Logout</p>
      </a>
    </li>
    <h1 style="color: white">Have Been sacked</h1>

    @elseif (Auth::guard('admin')->user()->role == 'sub')
        <h1 style="color: white">Please wait for Approval</h1>

        <li class="nav-item">
          <a href="{{ url('admin/logout') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
    @else



     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/public/../'.Auth::guard('admin')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
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
                <a href="{{ route('admin.home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addclass') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewclassestables') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Classes</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>


         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Class Activities
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addclassactivitiesad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class Activities</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewclassactivitiesads') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Class Activities</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> 



          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('admin.addgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Gallery</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.viewgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Galleries</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.addfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Facility</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.viewfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Facilities</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ route('admin.viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addparent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Parents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewparents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Parents</p>
                </a>
              </li>

              <li class="nav-item">
               

              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/preschoolad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
              

              {{-- <li class="nav-item">
                <a href="{{ route('admin.adminprogress') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Elementary Pupils</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="{{ route('admin.admittedstudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>High Sch. Students</p>
                </a>
              </li>
              --}}
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes Manage
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Classes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($view_clesses as $view_clesse)
                  <li class="nav-item">
                    <a href="{{ url('admin/classrooms/'.$view_clesse->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_clesse->classname }}</p>
                    </a>
                  </li>
                  @endforeach
                  
                  <li class="nav-item">
                    <a href="{{ route('admin.allstudents') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Students</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.preschoolsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Pre-School Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.nurserysubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Elementary Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Secondary School Sub</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.teachertosubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher to Subject</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.allsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subject</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Session
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.addsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Session</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Session</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teachers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.viewteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.approveteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approve Teachers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.suspendedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Suspended Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.sackedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Sacked Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.queriedteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Queried Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.queriedteachersreply') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View  Query Replied </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.allteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Teachers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.preschoolteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pre-School Teachers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.primaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Elementary Teachers </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.secondaryteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>High Sch. Teachers </p>
                </a>
              </li>
              
            </ul>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/viewallpaymentsad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Payments</p>
                </a>
              </li>

              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/classpaymentad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Generate Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ route('admin.addschoolfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add School Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addbusfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addfeedingfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Feeding Fees</p>
                </a>
              </li>

              <li class="nav-item">
             
                <a href="{{ route('admin.addpartyfeespaymentad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Party Fees</p>
                </a>
              </li>
              
             

              <li class="nav-item">
                <a href="{{ url('admin/viewallfees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Fees</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ route('admin.addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Result Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/viewclassresults/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
              
              <li class="nav-item">
             
                <a href="{{ route('admin.viewresultbyadmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Results</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewapproveresultsbyad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approved Results</p>
                </a>
              </li>
               
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Result 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/addresultsad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
               
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lesson Note Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <li class="nav-item">
                  <a href="{{ route('admin.viewlessonnotesad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Lesson Notes</p>
                  </a>
                </li>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ route('admin.viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li> --}}
            </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
                <li class="nav-item">
                  <a href="{{ route('admin.viewroles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Role</p>
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
                <a href="{{ route('admin.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->  
    

    
    @endif


    
  </aside>
