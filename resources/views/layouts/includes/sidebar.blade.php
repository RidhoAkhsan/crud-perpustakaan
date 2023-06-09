<!-- Sidebar -->

<aside class="sidebar-nav" id="sidebar-nav">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Library Admin<sup>id</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @if(Auth::user()->roles == 'ADMIN')

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Category -->

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard.category.index') }}">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Category</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Book -->

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard.book.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>List Book</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Book -->

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard.user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        @else

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        @endif

    </ul>

</aside>

<!-- End of Sidebar -->