<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="#"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Header</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href=""><i class="icon fa fa-user"></i>My Acount</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('site.products.customers.order') }}"> <i class="icon fa fa-cart-plus"></i>My order</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('site.products.customers.item') }}"><i class="icon fa fa-heart-o"></i> My OrderItem</a>
                </li>
                <li>
                    <a class="treeview-item" href=""><i class="icon fa fa-heart-o"></i> My Favorites</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('site.products.customers.payment')}}"><i class="icon fa fa-eur"></i> My Payments</a>
                </li>
                <li>
                    <a class="treeview-item" href=""><i class="icon fa fa-address-card-o"></i> Blling Adress</a>
                </li>
                <li>
                    <a class="treeview-item" href=""><i class="icon fa fa-area-chart"></i> Feedback</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>

