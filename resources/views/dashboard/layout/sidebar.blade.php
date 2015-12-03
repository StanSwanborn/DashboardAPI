 <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar sidebar-fixed compact responsive">

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>
                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>
                <!-- #section:basics/sidebar.layout.shortcuts -->
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>
                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
                <!-- /section:basics/sidebar.layout.shortcuts -->
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>
                <span class="btn btn-info"></span>
                <span class="btn btn-warning"></span>
                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="@if(on_route('dashboard', true)) active @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="@if(on_route('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}">
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

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>