<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if(session('user.ref_role.nama') === \App\Helper\Constant::ROLE_ADMIN)
                    <a class="nav-link" href="{{url('/dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link" href="{{url('references')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        References
                    </a>
                    <a class="nav-link" href="{{url('users')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="{{url('barang')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                        Barang
                    </a>

                    <div class="sb-sidenav-menu-heading">Transaksi</div>
                    <a class="nav-link" href="{{url('penjualan/report')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                        Laporan Penjualan
                    </a>
                @endif

                @if(session('user.ref_role.nama') === \App\Helper\Constant::ROLE_KASIR)
                    <div class="sb-sidenav-menu-heading">Transaksi</div>
                    <a class="nav-link" href="{{url('penjualan')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div>
                        Penjualan
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{session('user.username')}}
        </div>
    </nav>
</div>
