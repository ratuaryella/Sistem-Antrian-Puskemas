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
            <a href="/" class="{{ Request::path() ==  'admin' ? 'active' : ''  }}">
                <i class='fas fa-portrait me-2' ></i>
                <span class="links_name">Antrian</span>
            </a>
            <span class="tooltip">Antrian</span>
        </li>
        <li class="<% if(typeof role != 'undefined') { %> hide <% }  %>">
            <a href="/berita-guest" class="<% if(typeof active != 'undefined') { if (active == 'berita') { %> active <% } } %> <% if(typeof role != 'undefined') %> ">
                <i class='fas fa-newspaper me-2' ></i>
                <span class="links_name">Berita</span>
            </a>
            <span class="tooltip">Berita</span>
        </li>
        <li class="">
            <a href="/kegiatan-guest" class="">
                <i class='fas fa-user-md me-2' ></i>
                <span class="links_name">Dokter</span>
            </a>
            <span class="tooltip">Kelola Dokter</span>
        </li>
        <li class="">
            <a href="/kelola-lokasi" class="">
                <i class='fas fa-clinic-medical me-2' ></i>
                <span class="links_name">Poli</span>
            </a>
            <span class="tooltip">Kelola Poli</span>
        </li>

    </ul>
</div>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

{{--    <div class="logo_name"><img width="230" height="60" src="images/logo/lokasi-city-02.png" alt="1"></div>--}}
    <div class="logo_name"><h3>Puskesmas</h3></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <a class="button-login" href="/login">Log In</a>
{{--            <% }else{ %>--}}
{{--            <li class="nav-item dropdown" >--}}
{{--                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"--}}
{{--                   role="button" data-bs-toggle="dropdown" aria-expanded="false" >--}}
{{--                    <i class="fas fa-user me-2"></i><%= username || '' %>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <li><a class="dropdown-item" href="/profile-petugas">Profile</a></li>--}}
{{--                    <li>--}}
{{--                        <form method="POST" action="/logout">--}}
{{--                            <button class="dropdown-item" type="submit">Logout</button>--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
{{--        <% } %>--}}
    </div>
</nav>

