<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
    @include('_partials.user.sidebar_avatar')
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
                    <i class="fa fa-user"></i> <span>{{trans('admin.user.title')}}</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.user.pages.index')}}</a></li>
                    <li><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> {{trans('admin.user.pages.create')}}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>{{trans('admin.notes.title')}}</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('notes.index')}}"><i class="fa fa-circle-o"></i> {{trans('admin.notes.pages.index')}}</a></li>
                    <li><a href="{{route('notes.create')}}"><i class="fa fa-circle-o"></i> {{trans('admin.notes.pages.create')}}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{route('sort.cate')}}">
                    <i class="fa fa-arrows"></i> <span>Sort</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>