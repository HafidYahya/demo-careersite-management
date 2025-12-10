<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar">
    <div class="sidebar-logo text-center">
        <span class="text-light h2 fst-italic">ATS</span><img src="{{ asset('images/ats-alfamart-logo.png') }}" alt="ATS Alfamart">
    </div>
    
    <ul class="sidebar-menu">
        <!-- Master -->
        <li class="menu-item">
            <a href="#" class="menu-link collapsed">
                <span>MASTER</span>
                <i class="fas fa-chevron-left float-end"></i>
            </a>
        </li>
        
        <!-- Transaksi -->
        <li class="menu-item">
            <a href="#" class="menu-link collapsed">
                <span>TRANSAKSI</span>
                <i class="fas fa-chevron-left float-end"></i>
            </a>
        </li>
        
        <!-- Careersite Management -->
        <li class="menu-item">
            <a href="#careerSiteSubmenu" class="menu-link" data-bs-toggle="collapse">
                <span>CAREERSITE MANAGEMENT</span>
                <i class="fas fa-chevron-down float-end"></i>
            </a>
            <ul class="collapse submenu show" id="careerSiteSubmenu">
                <li>
                    <a href="{{ route('all') }}" class="submenu-link {{ Route::is('all') ? 'active' : '' }}">
                        <i class="fas fa-tv"></i> All
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.index') }}" class="submenu-link">
                        <i class="fas fa-home"></i> HOME
                    </a>
                </li>
                <li>
                    <a href="#" class="submenu-link">
                        <i class="fas fa-building"></i> OUR CONCERN
                    </a>
                </li>
                <li>
                    <a href="#" class="submenu-link">
                        <i class="fas fa-briefcase"></i> VACANCIES
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>