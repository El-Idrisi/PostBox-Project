<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar bg-black text-white" id="sidebar">
    <div class="sidebar-header text-center py-4">
        <h4>Menu</h4>
        <button class="btn btn-outline-light position-absolute top-0 end-0 m-2" id="closeSidebarButton">
            <i class="fas fa-times"></i>
        </button>
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/download.png') }}" alt="Profile" class="rounded-circle" width="30" height="30">
                        Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                </li>
    </div>
    <ul class="nav flex-column p-1">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('Home') ? 'active' : '' }}" href="{{ route('Home') }}">
                <i class="fas fa-home me-2"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('fresh') ? 'active' : '' }}" href="{{ route('fresh') }}">
                <i class="fas fa-fire me-2"></i> Fresh
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('notification') ? 'active' : '' }}" href="{{ route('notification') }}">
                <i class="fas fa-bell me-2"></i> Notifications
            </a>
        </li>
    </ul>
</div>
