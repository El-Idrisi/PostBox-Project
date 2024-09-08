<!-- resources/views/components/sidebar.blade.php -->
<div class="overflow-x-hidden text-white bg-black sidebar" id="sidebar">
    <div class="py-4 sidebar-header">
        <h4>Menu</h4>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img src="{{ asset('storage/' . $img) }}" alt="Profile" class="rounded-circle" width="30"
                            height="30">
                        <span style="margin-left: 5px">
                            {{ $nama }}
                        </span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li>
                                <a class="list-group-item {{ request()->routeIs('profile') ? 'active' : '' }}"
                                    href="{{ route('profile.show', $nama) }}">
                                    <i class="fa-solid fa-user"></i> {{ $nama }}
                                </a>
                            </li>
                            <li class="logout">
                                <a class="list-group-item logout">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fa-solid fa-door-open"></i>
                                            Log Out
                                        </button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="px-3 nav flex-column">
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
            <a class="nav-link {{ request()->routeIs('search') || request()->routeIs('search.result') ? 'active' : '' }}"
                href="{{ route('search') }} ">
                <i class="fas fa-search me-2"></i> Search
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link position-relative {{ request()->routeIs('notification') ? 'active' : '' }}"
                href="{{ route('notification') }}">
                <i class="fas fa-bell me-2"></i> Notifications
                @if(auth()->user()->notifications()->where('is_read', false)->count() > 0)
                <span class="top-0 badge bg-danger position-absolute start-100 translate-middle rounded-pill">
                    {{ auth()->user()->notifications()->where('is_read', false)->count() }}
                </span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('Postbox') ? 'active' : '' }}" href="{{ route('Postbox') }}">
                <i class="fas fa-inbox me-2"></i> PostBox
            </a>
        </li>
    </ul>
</div>
