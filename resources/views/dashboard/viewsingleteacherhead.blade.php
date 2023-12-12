@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <img style="width: 200px; height: 80px;" class="fas fa-globe float-left" src="{{ asset('assets/dist/img/AdminLTELogo.jpg') }}" alt="">

              <h2 class="page-header text-center">
                 Golden Academy Schools
              </h2>
            </div>
            <!-- /.col -->
          </div>
          
      </div><!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 100%; height: 200px;" class="profile-user-img img-fluid"
                       src="{{ asset('/public/../'.$view_teachersingle->images)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $view_teachersingle->fname }} {{ $view_teachersingle->middlename }}  {{ $view_teachersingle->surname }}</h3>

                <p class="text-muted text-center"> {{ $view_teachersingle->email }}</p>

                <span class="badge badge-secondary">{{$view_teachersingle->status}}</span>
                @if ($view_teachersingle->role == 'teacher')
                <span class="badge badge-secondary">In Progress</span>
                @elseif ($view_teachersingle->role == 'sacked')
                <span class="badge badge-danger">Sacked</span>
                @elseif ($view_teachersingle->role == 'suspend')
                <span class="badge badge-warning">Suspended</span>
                  @else
                  <span class="badge badge-success">Employed</span>
                @endif
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Bio Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Set Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#sponsor" data-toggle="tab">Sponsor</a></li>
                  <li class="nav-item"><a class="nav-link" href="#quali" data-toggle="tab">Qualifications</a></li> --}}

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" action="{{ url('web/settingsupdate/'.$view_teachersingle->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    @method('PUT')

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label"> First Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="fname" value="{{ $view_teachersingle->fname }}" class="form-control" id="inputName" placeholder="First Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label"> Middle Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" value="{{ $view_teachersingle->middlename }}" class="form-control" id="inputName" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label"> Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="lname" value="{{ $view_teachersingle->surname }}" class="form-control" id="inputName" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" value="{{ $view_teachersingle->email }}" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" value="" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $view_teachersingle->phone }}" name="phone" id="inputName2" placeholder="phone">
                      </div>
                    </div>
                    {{-- <img class="image rounded-circle" src="{{ asset('/public/../'.$view_teachersingle->profileimage)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; "> --}}

                    <div class="form-group row">
                      <label for="inputName2"  class="col-sm-2 col-form-label">Centername</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $view_teachersingle->centername }}" name="profileimage" id="inputName2" placeholder="profileimage">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Class</label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" value="{{ $view_teachersingle->classname }}" class="form-control" id="inputSkills" placeholder="Phone">

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="number" name="phone" value="{{ $view_teachersingle->phone }}" class="form-control" id="inputSkills" placeholder="Phone">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Section</label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" value="{{ $view_teachersingle->section }}" class="form-control" id="inputSkills" placeholder="Section">
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <a class="btn btn-primary" href="../lecturersprint/{{ $view_teachersingle->ref_no1 }}">Print</a>
                        <a href="{{ url('web/viewsingleteacherhead/'.$view_teachersingle->ref_no1) }}" class="btn btn-default"><i class="fas fa-eye"></i>View</a>
                        <a href="{{ url('web/editteacherhead/'.$view_teachersingle->ref_no1) }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                        <a href="{{ url('web/teacherapprovehead/'.$view_teachersingle->ref_no1) }}" class="btn btn-success"><i class="fas fa-user"></i>Approved</a>
                        <a href="{{ url('web/teachersuspendhead/'.$view_teachersingle->ref_no1) }}" class="btn btn-secondary"><i class="fas fa-user"></i>Suspend</a>
                        <a href="{{ url('web/teachersackedhead/'.$view_teachersingle->ref_no1) }}" class="btn btn-danger"><i class="fas fa-user"></i>Sacked</a>
                        <a href="{{ url('web/teacherqueryhead/'.$view_teachersingle->ref_no1) }}" class="btn btn-warning"><i class="fas fa-user"></i>Query</a>
                       
                        <th><a href="{{ url('web/teachersprinthead/'.$view_teachersingle->ref_no1) }}" class="btn btn-primary"><i class="fas fa-print"></i></a></th>
                         <td><a href="#"
                          class='btn btn-danger'>
                           <i class="far fa-trash-alt"></i>
                       </a></td>
                        {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                      </div>
                    </div>
                  </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 </div>
    @include('dashboard.footer')