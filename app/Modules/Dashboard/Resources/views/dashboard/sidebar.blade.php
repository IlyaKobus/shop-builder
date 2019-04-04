<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['users', 'user-groups'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-user-circle"></i> <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'users') active @endif">
                        <a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Users</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'user-groups') active @endif">
                        <a href="{{ route('user-groups.index') }}"><i class="fa fa-circle-o"></i>User Groups</a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['customers', 'customer-groups'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Customers</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'customers') active @endif"><a
                                href="{{ route('customers.index') }}"><i class="fa fa-circle-o"></i>
                            Customers</a></li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'customer-groups') active @endif">
                        <a href="{{ route('customer-groups.index') }}"><i class="fa fa-circle-o"></i> Customer
                            Groups</a></li>
                </ul>
            </li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['extensions', 'modules'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-rocket"></i> <span>Extensions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'extensions') active @endif">
                        <a href="{{ route('extensions.index') }}"><i class="fa fa-circle-o"></i>Extensions</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'modules') active @endif">
                        <a href="{{ route('modules.index') }}"><i class="fa fa-circle-o"></i>Modules</a>
                    </li>
                </ul>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'layouts') active @endif">
                <a href="{{ route('layouts.index') }}">
                    <i class="fa fa-file-text-o"></i> <span>Layouts</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'pages') active @endif">
                <a href="{{ route('pages.index') }}">
                    <i class="fa fa-code"></i> <span>Pages</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'categories') active @endif">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-th"></i> <span>Categories</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'products') active @endif">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-file"></i> <span>Products</span>
                </a>
            </li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['attributes', 'attribute-groups'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-list-alt"></i> <span>Attributes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'attributes') active @endif">
                        <a href="{{ route('attributes.index') }}"><i class="fa fa-circle-o"></i>Attributes</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'attribute-groups') active @endif">
                        <a href="{{ route('attribute-groups.index') }}"><i class="fa fa-circle-o"></i>Attribute
                            Groups</a>
                    </li>
                </ul>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'options') active @endif">
                <a href="{{ route('options.index') }}">
                    <i class="fa fa-file"></i> <span>Options</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'languages') active @endif">
                <a href="{{ route('languages.index') }}">
                    <i class="fa fa-language"></i> <span>Languages</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'manufacturers') active @endif">
                <a href="{{ route('manufacturers.index') }}">
                    <i class="fa fa-legal"></i> <span>Manufacturers</span>
                </a>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'information') active @endif">
                <a href="{{ route('information.index') }}">
                    <i class="fa fa-info-circle"></i> <span>Information</span>
                </a>
            </li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['blog-posts', 'blog-categories'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-feed"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'blog-posts') active @endif">
                        <a href="{{ route('blog-posts.index') }}"><i class="fa fa-circle-o"></i>Blog Posts</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'blog-categories') active @endif">
                        <a href="{{ route('blog-categories.index') }}"><i class="fa fa-circle-o"></i>Blog Categories</a>
                    </li>
                </ul>
            </li>

            <li class="@if(explode('.', Route::currentRouteName())[0] === 'currencies') active @endif">
                <a href="{{ route('currencies.index') }}">
                    <i class="fa fa-dollar"></i> <span>Currencies</span>
                </a>
            </li>

            <li class="treeview @if(in_array(explode('.', Route::currentRouteName())[0], ['payments', 'orders', 'shipments'])) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Sales</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'orders') active @endif">
                        <a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i>Orders</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'order-statuses') active @endif">
                        <a href="{{ route('order-statuses.index') }}"><i class="fa fa-circle-o"></i>Order Statuses</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'payments') active @endif">
                        <a href="{{ route('payments.index') }}"><i class="fa fa-circle-o"></i>Payments</a>
                    </li>
                    <li class="@if(explode('.', Route::currentRouteName())[0] === 'shipments') active @endif">
                        <a href="{{ route('shipments.index') }}"><i class="fa fa-circle-o"></i>Shipments</a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>