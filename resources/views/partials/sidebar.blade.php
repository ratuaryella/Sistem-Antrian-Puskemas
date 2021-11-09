<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Menu</div>
        <i class='fa fa-bars' id="btn" style="color: white;"></i>
    </div>
    <ul class="nav-lists">

        <!-- Dokter -->

        <!-- Admin -->
        <li class="">
            <a href="/admin" class="{{ Request::path() ==  'admin' ? 'active' : ''  }}">
                <i class='fas fa-portrait me-2'></i>
                <span class="links_name">Antrian</span>
            </a>
            <span class="tooltip">Antrian</span>
        </li>
        <li class="">
            <a href="/kelola-dokter" class="{{ Request::path() ==  'kelola-dokter' ? 'active' : ''  }}">
                <i class='fas fa-user-md me-2'></i>
                <span class="links_name">Dokter</span>
            </a>
            <span class="tooltip">Kelola Dokter</span>
        </li>
        <li class="">
            <a href="/kelola-poli" class="{{ Request::path() ==  'kelola-poli' ? 'active' : ''  }}">
                <i class='fas fa-clinic-medical me-2'></i>
                <span class="links_name">Poli</span>
            </a>
            <span class="tooltip">Kelola Poli</span>
        </li>

    </ul>
</div>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

    {{-- <div class="logo_name"><img width="230" height="60" src="images/logo/lokasi-city-02.png" alt="1"></div>--}}
    <div class="logo_name">
        <h3>Puskesmas</h3>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <div class="wrap">
                <a href="{{ route('/logout') }}" class="button-login" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
            </div>
            <form id="logout-form" action="{{ route('/logout') }}" method="POST" class="d-none">
                {{ csrf_field() }}
            </form>
        </ul>
        {{-- <% } %>--}}
    </div>
</nav>
