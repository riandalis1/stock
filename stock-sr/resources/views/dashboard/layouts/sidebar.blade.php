<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <i class="bi bi-house-door-fill"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <i class="bi bi-bag-fill"></i>
                    Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/stocks*') ? 'active' : '' }}" href="/dashboard/stocks">
                    <i class="bi bi-stack"></i>
                    Stock
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Categories
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
                    <i class="bi bi-person-fill"></i>
                    Admin
                </a>
            </li>
        </ul>
        @endcan

    </div>
</nav>