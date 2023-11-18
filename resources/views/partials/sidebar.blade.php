<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tw" aria-expanded="false" aria-controls="tw">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tw">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('wisata.index')}}">Data Destinasi</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('tour.index')}}">Data Tour Guide</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('translator.index')}}">Data Translator</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#p" aria-expanded="false" aria-controls="p">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Pesanan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="p">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('pesanan.index')}}">Pesanan Tiket Tour</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>