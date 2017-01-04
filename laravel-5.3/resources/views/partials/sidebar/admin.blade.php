<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
    @include('partials.user.sidebar_avatar')
    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class=""><a href="#">Dashboard</a></li>

            <li class="">
                <a href="#">Manager Cart
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('cart.index')}}"><i class="fa fa-circle-o"></i> List Cart</a></li>
                    <li><a href="{{route('cart.create')}}"><i class="fa fa-circle-o"></i> Create Cart</a></li>
                </ul>
            </li>

            <li class="">
                <a href="#">Manager Category
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> List Category</a></li>
                    <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Create Category</a></li>
                </ul>
            </li>

            <li class="">
                <a href="#">Manager Product
                    <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i> List Product</a></li>
                    <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i> Create Product</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>