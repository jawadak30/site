<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo d-flex align-items-center justify-content-center">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('frontend/img/dlms.png') }}" width="50" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Buku -->
        @if (auth()->user()->isUser())
            <li class="menu-item">
                <a href="{{ url('buku') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-open"></i>
                    <div data-i18n="Analytics">reservations</div>
                </a>
            </li>
        @endif
        @if (auth()->user()->isAdmin())
        <!-- kategori -->
        <li class="menu-item">
            <a href="{{ url('buku') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Analytics">books</div>
            </a>
        </li>
    @endif

        @if (auth()->user()->isAdmin())
            <!-- kategori -->
            <li class="menu-item">
                <a href="{{ url('kategori') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Layouts">categories</div>
                </a>
            </li>
        @endif
        @if (auth()->user()->isAdmin())
        <!-- kategori -->
        <li class="menu-item">
            <a href="{{ route('reservations.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Layouts">reservations</div>
            </a>
        </li>
    @endif

        @if (auth()->user()->isAdmin())
            <!-- User/Profile -->
            <li class="menu-item">
                <a href="{{ url('user') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Layouts">Users</div>
                </a>
            </li>
        @elseif (auth()->user()->isUser())
            <!-- User/Profile -->
            <li class="menu-item">
                <a href="{{ route('profile') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Layouts">Profile</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('library') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Layouts">library</div>
                </a>
            </li>
        @endif



        <li class="menu-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">{{ __('Logout') }}</div>
            </a>
        </li>
    </ul>
</aside>
