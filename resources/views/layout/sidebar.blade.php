  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="{{asset('image/logo.png')}}" alt="logo" class="img-fluid logo">
      </div>
      <div class="sidebar-brand-text mx-3 text-left">Inderapura Barat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- PROFILE -->
    <li class="nav-item">
      <a class="nav-link" href="{{url('profile')}}">
        <i class="fa-solid fa-house"></i>
        <span>PROFILE NAGARI</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        DATA MASTER
    </div>
    <!-- USER -->
    <li class="nav-item {{Request::is('datauser') ? 'active' : ''}}">
      <a class="nav-link {{Request::is('datauser') ? 'active' : ''}}" href="{{url('datauser')}}">
        <i class="fa-solid fa-user-large"></i>
        <span>Data User</span>
      </a>
    </li>
    @if (session()->get('role')=='Pimpinan')
    <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
      <a class="nav-link {{Request::is('admin') ? 'active' : ''}}" href="{{url('admin')}}">
        <i class="fa-solid fa-user-large"></i>
        <span>Admin/Pimpinan</span>
      </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <li class="nav-item {{Request::is('laporan-penduduk') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-penduduk')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penduduk</span></a>
    </li>
    <li class="nav-item {{Request::is('laporan-penerima*') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-penerima')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penerima Bantuan</span></a>
    </li>
    <li class="nav-item {{Request::is('laporan-perangkat') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-perangkat')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Perangkat Nagari</span></a>
    </li>
    @elseif(session()->get('role')=='Admin')
    <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
      <a class="nav-link {{Request::is('admin') ? 'active' : ''}}" href="{{url('admin')}}">
        <i class="fa-solid fa-user-large"></i>
        <span>Admin/Pimpinan</span>
      </a>
    </li>
    <!-- PERANGKAT -->
    <li class="nav-item {{Request::is('perangkat') ? 'active' : ''}}">
      <a class="nav-link {{Request::is('perangkat') ? 'active' : ''}}" href="{{url('perangkat')}}">
        <i class="fa-solid fa-network-wired"></i>
        <span>Data Perangkat</span>
      </a>
    </li>
    <!-- PENDUDUK -->
    <li class="nav-item {{Request::is('penduduk') ? 'active' : ''}}">
      <a class="nav-link {{Request::is('penduduk') ? 'active' : ''}}" href="{{url('penduduk')}}">
        <i class="fa-solid fa-users"></i>
        <span>Data Penduduk</span>
      </a>
    </li>
    <!-- BANTUAN -->
    <li class="nav-item {{Request::is('bantuan', 'penerima') ? 'active' : ''}}">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseBantuan" aria-expanded="true" aria-controls="collapseBantuan">
        <i class="fa-solid fa-hand-holding-heart"></i>
        <span>Bantuan</span>
      </a>
      <div id="collapseBantuan" class="collapse {{Request::is('bantuan', 'penerima') ? 'show' : ''}}" aria-labelledby="headingBantuan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item {{Request::is('bantuan') ? 'active' : ''}}" href="{{url('bantuan')}}">Data Bantuan</a>
          <a class="collapse-item {{Request::is('penerima') ? 'active' : ''}}" href="{{url('penerima')}}">Penerima Bantuan</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <li class="nav-item {{Request::is('laporan-penduduk') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-penduduk')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penduduk</span></a>
    </li>
    <li class="nav-item {{Request::is('laporan-penerima*') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-penerima')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penerima Bantuan</span></a>
    </li>
    <li class="nav-item {{Request::is('laporan-perangkat') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-perangkat')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Perangkat Nagari</span></a>
    </li>
    @elseif(session()->get('role')=='Penduduk')
    <!-- BANTUAN -->
    <li class="nav-item {{Request::is('bantuan', 'penerima') ? 'active' : ''}}">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseBantuan" aria-expanded="true" aria-controls="collapseBantuan">
        <i class="fa-solid fa-hand-holding-heart"></i>
        <span>Bantuan</span>
      </a>
      <div id="collapseBantuan" class="collapse {{Request::is('bantuan', 'penerima') ? 'show' : ''}}" aria-labelledby="headingBantuan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item {{Request::is('bantuan') ? 'active' : ''}}" href="{{url('bantuan')}}">Data Bantuan</a>
          <a class="collapse-item {{Request::is('penerima') ? 'active' : ''}}" href="{{url('penerima')}}">Penerima Bantuan</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>
    <li class="nav-item {{Request::is('laporan-penerima*') ? 'active' : ''}}">
      <a class="nav-link" href="{{url('laporan-penerima')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Penerima Bantuan</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->