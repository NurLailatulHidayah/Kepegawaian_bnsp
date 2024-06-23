<header class="main-header">
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top pl-30">
    <!-- Sidebar toggle button-->
    <div>
      <ul class="nav">
        <li class="btn-group nav-item">
          <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
            <i class="nav-link-icon mdi mdi-menu"></i>
          </a>
        </li>
      </ul>
    </div>

    <div class="navbar-custom-menu r-side">
      <ul class="nav navbar-nav">
        <!-- User Account-->
        <li class="dropdown user user-menu">
          <!-- <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
            <img src="..assets/images/avatar/woman.png" alt="">
          </a> -->
          <ul class="animated flipInX ">
            <li class="user-body">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-center" type="submit">Logout</button>
              </form>
              <!-- <a action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
              </a> -->
              <!-- <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
              <div class="dropdown-divider"></div>
              @csrf
              @method('DELETE')
              <a class="dropdown-item" href="{{ route('logout') }}" method="POST"><i class="ti-lock text-muted mr-2"></i> Logout</a> -->
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>