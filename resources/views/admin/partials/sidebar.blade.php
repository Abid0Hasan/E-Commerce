<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"></p>
            <p class="app-sidebar__user-designation">{{ Auth::user()->name }}</p>
        </div>
    </div>

        @if(Request::is('admin*'))
        <ul class="app-menu">
            <li><a class="app-menu__item {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span></a>
            </li>

            <li><a class="app-menu__item {{ Request::is('admin/home') ? 'active' : '' }}"
                   href="{{ route('admin.home') }}">
                    <i class="app-menu__icon fa fa-home" aria-hidden="true"></i>
                    <span class="app-menu__label">Home</span></a>
            </li>


            <li><a class="app-menu__item {{ Request::is('admin/product') ? 'active' : '' }}"
                   href="{{ route('admin.products.index') }}">
                    <i class="app-menu__icon fa fa-gift"></i>
                    <span class="app-menu__label">Product</span></a>
            </li>

            <li><a class="app-menu__item {{ Request::is('admin/order') ? 'active' : '' }}"
                   href="{{ route('admin.order.index') }}">
                    <i class="app-menu__icon fa fa-shopping-basket"></i>

                    <span class="app-menu__label">Order</span></a>
            </li>

       </ul>
       @endif
</aside>
