<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard')? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <i class="bi bi-window-sidebar" style="font-size:1rem"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*')? 'active' : '' }}" href="/dashboard/posts">
                    <i class="bi bi-file-earmark-text" style="font-size: 1rem;"></i>
                    My Posts
                </a>
            </li>
        </ul>

        @can('isAdmin')
        <!--fitur authorization menggunakan Gate -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administration</span>
        </h6>
        <ul class="nav  flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*')? 'active' : '' }}" href="/dashboard/categories">
                    <i class="bi bi-grid-3x3-gap" style="font-size: 1rem;"> </i>
                    Post Categories
                </a>
            </li>
        </ul>
        @endcan

    </div>
</nav>