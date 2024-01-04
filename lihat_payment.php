<?php
include "includes/head.php";
include "includes/header.php";

$id_pembelian = isset($_GET["id"]) ? $_GET["id"] : null;

$ambil = $connection->query("SELECT * FROM payment 
    LEFT JOIN orders ON payment.order_id = orders.order_id 
    WHERE orders.order_id='$id_pembelian'");
$detbay = $ambil->fetch_assoc();
$tanggal = $detbay['order_date'];

if (empty($detbay)) {
    echo "<script>alert('Data Pembayaran Belum Terverifikasi!')</script>";
    // echo "<script>location='riwayat.php'</script>";
    exit();
}

// Check if the session key "pelanggan" is set and not null
// Also, check if the user_id in the session matches the user_id in the database
if (isset($_SESSION["pelanggan"]) && isset($_SESSION["pelanggan"]['user_id']) && $_SESSION["pelanggan"]['user_id'] !== $detbay["user_id"]) {
    echo "<script>alert('Halaman Error!')</script>";
    // echo "<script>location='riwayat.php'</script>";
    exit();
}
?>
<div class="site-section">
    <div class="container">
          <h2 class="h3 mb-3 text-black">Lihat Pembayaran</h2>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detbay["nama"]; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detbay["bank"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo date('d-m-Y', strtotime($tanggal)); ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($detbay["jumlah"]); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti_bayar/<?php echo $detbay["bukti"] ?>" alt="" style="width:180px;">
            </div>
        </div>
    </div>
</div>


<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                <div class="block-7">
                    <h3 class="footer-heading mb-4">Tentang Kami</h3>
                    <p>ObatKu, Toko Medis Online, dipersembahkan oleh ObatKu Pharmacy – salah satu
                        Apotek paling tepercaya di Indonesia, dengan pengalaman lebih dari 10 tahun dalam penyaluran
                        obat-obatan berkualitas. </p>
                </div>

            </div>
            <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Quick Links</h3>
                <ul class="list-unstyled">
                    <li><a href="store.php?cat=medicine">Obat</a></li>
                    <li><a href="store.php?cat=mself-care">Self Care</a></li>
                    <li><a href="store.php?cat=machine">Mesin</a></li>
                    
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Info Kontak</h3>
                    <ul class="list-unstyled">
                        <li class="address">Jl. A.H. Nasution No. 105A, Cibiru, Bandung, Jawa Barat, Indonesia-40614</li>
                        <li class="phone"><a href="tel://">+6281930593694</a></li>
                        <li class="email">sumitraadriansyah@gmail.com</li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This website was made
                    with by <a href="https://sumitradrian.online" target="_blank" class="text-primary">Sumitra Adriansyah</a>
                </p>
            </div>

        </div>
    </div>
</footer>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
