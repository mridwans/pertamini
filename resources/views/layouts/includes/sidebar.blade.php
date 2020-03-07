  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('adminlte/img/logo2.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-9"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">Pertamina</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          @if(auth()->user()->role == 'admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Agen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/agen/tambah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Agen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/transaksi/transagen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi Agen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/agen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Agen</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->role == 'agen')
              <li class="nav-item">
                <a href="/sales/tambah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/transaksi/transsales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi Sales</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Sales</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Konsumen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->role == 'sales' || auth()->user()->role == 'agen')
              <li class="nav-item">
                <a href="/konsumen/tambah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Konsumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/transaksi/transkons" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi Konsumen</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="/konsumen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Konsumen</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>