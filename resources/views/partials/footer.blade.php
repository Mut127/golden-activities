<footer class="footer">
    <div class="footer-info">
        <div class="footer-logo">
            <img src="{{ asset('images/logo_GA.PNG') }}" alt="Golden Activities Logo"> <!-- Path logo, sesuaikan dengan lokasi -->
            <p class="footer-description">
                <i> Activities, aplikasi yang dirancang <br>khusus untuk memudahkan lansia tetap <br>aktif dan terhubung!</i></p>
        </div>
        <div>
            <h3>Hubungi Kami</h3>
            <p><i class="fas fa-map-marker-alt"></i> Jl. Prof. DR. HR Boenyamin</p>
            <p>No.708, Dukuhbandong, Purwokerto Utara</p>
            <p>Banyumas, Jawa Tengah 53122</p>
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
        background-color: #DEC8FE;
        color: #333;
        padding: 1rem 1rem; /* Mengurangi padding untuk memperpendek ukuran footer */
        width: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    .footer-info {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 1rem; /* Mengurangi jarak antar elemen */
        text-align: left;
    }

    .footer-info div {
        flex: 1;
        min-width: 180px; /* Memperkecil minimum lebar elemen */
    }

    .footer-info h3 {
        margin-bottom: 0.5rem; /* Mengurangi margin bawah heading */
        font-size: 1.2rem; /* Memperkecil ukuran font heading */
        font-weight: bold;
        color: #333;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .footer-info p {
        line-height: 1.5; /* Menyesuaikan jarak antar baris */
        color: #333;
        font-size: 0.8rem; /* Memperkecil ukuran font */
        margin-bottom: 0.3rem; /* Mengurangi margin bawah pada paragraf */
    }

    .footer-logo {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .footer-logo img {
        height: 50px; /* Memperkecil ukuran logo */
        width: 170px; /* Memperkecil lebar logo */
    }

    .footer-description {
        margin-top: 0.rem; /* Mengurangi margin atas */
        font-size: 0.4rem; /* Memperkecil ukuran font deskripsi */
        color: #333;
        line-height: 1.4; /* Mengurangi jarak antar baris */
        text-align: justify;
        font-weight: 600;
    }

    /* Footer Bottom Bar */
    .footer-bottom {
        background-color: #6e5fe2;
        color: white;
        padding: 0.8rem 0; /* Mengurangi padding agar lebih pendek */
        text-align: left;
        width: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    .footer-bottom p {
        margin: 0;
        padding-left: 50px;
        font-size: 0.85rem; /* Memperkecil ukuran font pada footer bawah */
    }

    .footer-social {
        margin-top: 0.5rem; /* Mengurangi margin atas */
    }

    .footer-social a {
        color: #333;
        font-size: 1.2rem; /* Memperkecil ukuran ikon */
        margin: 0 0.3rem; /* Mengurangi jarak antara ikon */
        text-decoration: none;
    }

    .footer-social a:hover {
        color: #6e5fe2;
    }
</style>
