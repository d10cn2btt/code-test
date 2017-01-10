<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
    @include('partials.user.sidebar_avatar')
    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="">
                <a href="/">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Manage User</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> List User</a></li>
                    <li><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> Create User</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>