<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar bg-black text-white " id="sidebar">
    <div class="sidebar-header py-4">
        <h4>Menu</h4>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img src="{{ asset('images/download.png') }}" alt="Profile" class="rounded-circle" width="30" height="30">
                        Profile
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li>
                                <a class="list-group-item {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                                <i class="fa-solid fa-user"></i> Profile
                                </a>
                            </li>
                            <li class="logout">
                                <a class="list-group-item" href="#">
                                    <i class="fa-solid fa-door-open"></i> 
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav flex-column px-3">
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
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('Postbox') ? 'active' : '' }}" href="{{ route('Postbox') }}">
                <i class="fas fa-inbox me-2"></i> PostBox
            </a>
        </li>
    </ul>
</div>