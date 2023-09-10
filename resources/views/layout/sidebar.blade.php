<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Master</div>
                <a class="nav-link" href="{{url('references')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    References
                </a>
                <a class="nav-link" href="{{url('user')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    User
                </a>
                <a class="nav-link" href="{{url('barang')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Barang
                </a>

                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link" href="{{url('penjualan')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Penjualan
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
