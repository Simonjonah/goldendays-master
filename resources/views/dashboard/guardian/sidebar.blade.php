<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('guardian/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="guardianLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light"> Golden Schools</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('guardian/profile/'.Auth::guard('guardian')->user()->ref_no1) }}" class="d-block">{{ Auth::guard('guardian')->user()->fathername }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if (Auth::guard('guardian')->user()->status == null)
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
                <a href="{{ url('guardian/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('guardian/profile/'.Auth::guard('guardian')->user()->ref_no) }}" class="nav-link">
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
                <a href="{{ url('guardian/yourchildren') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Child</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('guardian/addyourchild') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Another Child</p>
                </a>
              </li>
              
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
                <a href="{{ url('guardian/payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay School Fees</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('guardian.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seccond Term</p>
                </a>
              </li>

               {{-- <li class="nav-item">
                <a href="{{ url('guardian.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Third Term</p>
                </a>
              </li> --}}

              {{-- <li class="nav-item">
                <a href="{{ url('guardian.payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay All Term</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('guardian/feedingpaypayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Feeding</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('guardian/buspayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('guardian/partypayment') }}" class="nav-link">
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
                <a href="{{ url('guardian/paymenthistory') }}" class="nav-link">
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
                <a href="{{ url('guardian/viewclassactivitypare') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Activities</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('guardian/viewclassactivityparespecial') }}" class="nav-link">
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
                <a href="{{ url('guardian/checkresult') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Results</p>
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
                <a href="{{ route('guardian.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      @elseif (Auth::guard('guardian')->user()->status == 'reject')
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
                <a href="{{ route('guardian.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
        {{-- <h1>Dear {{ Auth::guard('guardian')->user()->fname }}, You have been rejected</h1> --}}
      @elseif (Auth::guard('guardian')->user()->status == 'suspend')
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
                <a href="{{ route('guardian.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>
      {{-- <h1>Dear {{ Auth::guard('guardian')->user()->fname }}, You have been suspended</h1> --}} 
     @else
     
      <h1>no</h1>
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
