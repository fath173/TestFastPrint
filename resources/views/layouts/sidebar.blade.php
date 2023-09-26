<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('admin/images/avatar-4.jpg') }}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">admin <i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="ti-layout-sidebar-left"></i>Logout</a>
                        <form action="#" method="POST" id="logout-form">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Menu Utama</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('produk') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>P</b></span>
                    <span class="pcoded-mtext">Produk</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('produk-json') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>A</b></span>
                    <span class="pcoded-mtext">Clone Data API</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
