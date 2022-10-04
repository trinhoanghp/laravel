<nav class=" main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    {{-- <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.index')}}" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Website</a>
      </li>
    </ul> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto m-2">
      <li class="nav-item dropdown user user-menu">
        <div href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">{{ auth()->user()->name}}</span>
        </div>
        <ul class="dropdown-menu">

          <li class="user-header">
              <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                {{ auth()->user()->name}} - Web Developer
                  <small>Member since May. 2022</small>
              </p>
          </li>
  
  
          <li class="user-footer row">
              <div class="col-md-6 ">
                  <a href="#" class="btn btn-default ">Profile</a>
              </div>
              <div class=" col-md-6">
                  <a href="{{ route('admin.logout')}}" class="btn btn-default float-right ">Sign out</a>
              </div>
          </li>
      </ul>
      </li>
       

    </ul>
  </nav>
  