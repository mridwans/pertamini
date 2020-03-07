  <nav class="main-header navbar navbar-expand navbar-primary navbar-maroon">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color: #ffffff; "></i></a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
              <ion-icon name="settings-outline" style="color: #ffffff; "></ion-icon>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow dropdown-menu-lg dropdown-menu-right">
              <li><a href="#" class="dropdown-item">{{auth()->user()->name}} </a></li>
              <div class="dropdown-divider"></div>
              <li><a href="#" class="dropdown-item">Ganti Password </a></li>
              <li><a href="/logout" class="dropdown-item">Logout</a></li>
            </ul>
        </li>
    </ul>
  </nav>