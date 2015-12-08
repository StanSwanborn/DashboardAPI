 <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar sidebar-fixed compact responsive">
        <ul class="nav nav-list">
            <li class="@if(on_route('dashboard', true)) active @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="@if(on_route('dashboard.model')) active @endif">
                <a href="{{ route('dashboard.model') }}">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Models </span>
                </a>
            </li>
            <li class="@if(on_route('dashboard.client')) active @endif">
                <a href="{{ route('dashboard.client') }}">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Clients </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Documentation </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>
            </li>
        </ul><!-- /.nav-list -->
    </div>