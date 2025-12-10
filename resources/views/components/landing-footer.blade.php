<!-- resources/views/components/landing-footer.blade.php -->
<footer class="landing-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Logo & Company Info -->
            <div class="footer-section">
                <img src="{{ asset('images/logo_footer.png') }}" alt="Alfamart" class="footer-logo">
                <div class="company-info">
                    <h5>PT Sumber Alfaria Trijaya TBK</h5>
                    <p>Alfa Tower 19th Floor</p>
                    <p>Jl. Jalur Sutera barat Kav. 9</p>
                    <p>Kota Tangerang banten, 15143</p>
                </div>
            </div>
            
            <!-- Social Media Links -->
            <div class="footer-section">
    <h5>Terhubung Dengan Kami</h5>
    <div class="social-links">
        <a href="{{ $footer->firstWhere('sub_section', 'Instagram')?->url ?? '#' }}" class="social-link" target="_blank">
            <i class="fab fa-instagram"></i>
            <span>Instagram</span>
        </a>

        <a href="{{ $footer->firstWhere('sub_section', 'LinkedIn')?->url ?? '#' }}" class="social-link" target="_blank">
            <i class="fab fa-linkedin"></i>
            <span>LinkedIn</span>
        </a>

        <a href="{{ $footer->firstWhere('sub_section', 'Tiktok')?->url ?? '#' }}" class="social-link" target="_blank">
            <i class="fab fa-tiktok"></i>
            <span>Tiktok</span>
        </a>
    </div>
</div>

            
            <!-- Support -->
            <div class="footer-section">
                <h5>Pusat Bantuan Kandidat</h5>
                <p class="support-email">support@example.company</p>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="footer-copyright">
            <p>Copyright©2025 PT Sumber Alfaria Trijaya, Tbk.</p>
        </div>
    </div>
</footer>