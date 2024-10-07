<footer class="footer">
    <div class="footer-info">
        <div class="footer-logo">
            <img src="{{ asset('images/logo_GA.PNG') }}" alt="Golden Activities Logo"> <!-- Path logo, sesuaikan dengan lokasi -->
            <p class="footer-description">Golden Activities, aplikasi yang dirancang<br> khusus untuk memudahkan lansia tetap aktif <br> dan terhubung!</p>
        </div>
        <div>
            <h3>Hubungi Kami</h3>
            <p><i class="fas fa-map-marker-alt"></i> Jl. Prof. DR. HR Boenyamin</p>
            <p>No.708, Dukuhbandong,</p>
            <p>Purwokerto Utara, Banyumas, Jawa</p>
            <p>Tengah 53122</p>
            <p><i class="fas fa-phone-alt"></i> Telepon/Fax: 0281-633014</p>
            <p><i class="fas fa-envelope"></i> Email: goldenactivities@gmail.com</p>
        </div>
        <div class="footer-social">
            <h3>Follow</h3>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</footer>

<!-- Footer Kedua -->
<footer class="footer-bottom">
    <p>&copy; 2024, GoldenActivities</p>
</footer>

<!-- CSS Footer -->
<style>
    /* Reset CSS untuk menghilangkan margin dan padding default */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        overflow-x: hidden;
        box-sizing: border-box;
    }

    * {
        box-sizing: border-box;
    }

    /* Footer Styles */
    .footer {
        background-color: #e8d9f4;
        color: #333;
        padding: 2rem 1rem;
        width: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    .footer-info {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 2rem;
        text-align: left;
    }

    .footer-info div {
        flex: 1;
        min-width: 200px;
    }

    .footer-info h3 {
        margin-bottom: 1rem;
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .footer-info p {
        line-height: 1.7;
        color: #333;
        font-weight: normal;
        margin-bottom: 0.5rem;
        transition: color 0.3s ease;
    }

    .footer-info p:hover {
        color: #6e5fe2;
    }

    .footer-logo {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .footer-logo img {
        height: 60px;
        width: 200px;
    }

    .footer-description {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #333;
        line-height: 1.6;
        font-style: italic;
        text-align: justify;
        padding-left: 50px;
    }

    /* Footer Bottom Bar */
    .footer-bottom {
        background-color: #6e5fe2;
        color: white;
        padding: 1rem 0;
        text-align: left;
        width: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    .footer-bottom p {
        margin: 0;
        padding-left: 50px;
    }

    .footer-social {
        margin-top: 1rem;
    }

    .footer-social a {
        color: #333;
        font-size: 1.5rem;
        margin: 0 0.5rem;
        text-decoration: none;
    }

    .footer-social a:hover {
        color: #6e5fe2;
    }
</style>
