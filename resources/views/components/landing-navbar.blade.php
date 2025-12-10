<!-- resources/views/components/landing-navbar.blade.php -->
<nav class="landing-navbar">
    <div class="container">
        <div class="navbar-content">
            <!-- Logo -->
            <div class="navbar-logo">
                <img src="{{ asset('storage/'.$navbar->image) }}" alt="Alfamart">
            </div>
            
            <!-- Menu -->
            <div class="navbar-menu">
                <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">HOME</a>
                <a href="#" class="nav-link" >OUR CONCERN</a>
                <a href="#" class="nav-link">VACANCIES</a>
                <a href="#" class="nav-link">LOGIN</a>
            </div>
            <!-- Right Side -->
            <div class="navbar-right">
                <a href="{{ url('/register') }}" class="btn-daftar">Daftar</a>
                <div class="language-switcher">
                    <span class="active">EN</span> / <span>ID</span>
                </div>
            </div>
        </div>
    </div>
</nav>