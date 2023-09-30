<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('account/home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light"> Golden Schools </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('account')->user()->name }}</a>
        </div>
      </div>
<?php
    
    use App\Models\Classname;
    $view_classes = Classname::latest()->get();
?>
      <!-- Sidebar Menu -->
      @if (Auth::guard('account')->user()->role == null)
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Please Wait for Approval
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('account.logout') }}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout </p>
            </a>
          </li>
          
        </ul>
      </li>

      @elseif(Auth::guard('account')->user()->role == 'reject')
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            You have been suspended
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('account.logout') }}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout </p>
            </a>
          </li>
          
        </ul>
      </li>

      @else

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
                <a href="{{ route('account.home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-chart-pie"></i> --}}
              <i class="nav-icon fas fa-copy"></i>

              <p>
                Add Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('account/addpayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Payments</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account/addfeedingpayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Feeding</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account/addbuspayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Bus Fee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account/addpartypayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Party Fee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account/viewpartypayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Party Fee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account/viewfeedinfees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Feeding</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('account/viewbusfees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Bus Fees</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('account/viewfees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Fees</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('account/viewallpayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Payments</p>
                </a>
              </li>

              @foreach ($view_classes as $view_classe)
              <li class="nav-item">
                <a href="{{ url('account/classpayments/'.$view_classe->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View {{ $view_classe->classname }} </p>
                </a>
              </li>
              @endforeach
              {{-- <li class="nav-item">
                <a href="{{ url('account.approvelecturersacc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approve Lecturers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('account.suspendedlecturersacc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approve Suspended </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('account.lecturersacc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all Lecturers </p>
                </a>
              </li> --}}
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
                <a href="{{ route('account.logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>

      

      
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
