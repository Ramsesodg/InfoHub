<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">InfoHub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image" id="avatar1" >
            <img src="assets/img/avatar3.png" class="img-circle elevation-2" alt="User Image" id="avatar2">

        </div>

            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <!--input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"-->
          <div class="input-group-append">
            <!--button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button-->
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/" class="nav-link {{ $elementActive == 'profils' ? 'active' : '' }}">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Profils
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/fiches" class="nav-link  {{ $elementActive == 'fiches' ? 'active' : '' }}">
            <i class="nav-icon fas fa fa-window-maximize"></i>
              <p>
                Fiches
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
