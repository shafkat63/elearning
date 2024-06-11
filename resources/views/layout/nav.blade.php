<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="/assets/images/faces/face12.jpg" alt="profile">
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
          <span class="text-secondary text-small">Root Admin</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/Dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    @role(['Super Admin', 'Admin'])
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">User Config</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-account-key menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('roles')}}">User Roles</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('Permission')}}">User Permission</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('User')}}">User Info</a></li>
        </ul>
      </div>
    </li>
    @endrole
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#questions" aria-expanded="false" aria-controls="questions">
        <span class="menu-title">Question Setup</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-settings menu-icon"></i>
      </a>
      <div class="collapse" id="questions">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('Subject')}}">Subject</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('Paper')}}">Paper</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('Chapter')}}">Chapter</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('Question')}}">Questions</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('Content')}}">Content</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
