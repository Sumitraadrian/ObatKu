<?php include "includes/head.php"; ?>
<?php include "includes/header.php"; ?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Riwayat</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <h2 class="h3 mb-3 text-black">Riwayat Belanja Anda</h2>
        <div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Status Pembayaran</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status Order</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Mendapatkan id_pelanggan yang login dari session
                            $id_pelanggan = $_SESSION["user_id"];

                            $ambil = $connection->query("SELECT * FROM orders WHERE user_id='$id_pelanggan'");
                            while ($pecah = $ambil->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center"><?php echo $pecah["order_date"]; ?></td>
                                    <td class="text-center">
                                        <span style="font-weight:bold;">
                                            <?php
                                            // Change the display text based on order status
                                            if ($pecah['payment_status'] == "0") {
                                                echo "Belum Pembayaran";
                                            } elseif ($pecah['payment_status'] == "1") {
                                                echo "Pembayaran Berhasil";
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="text-center">Rp. <?php echo number_format($pecah["order_total"]); ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($pecah['order_status'] == 0) {
                                            echo '<span style="color: red;">Belum Dikirim</span>';
                                        } elseif ($pecah['order_status'] == 1) {
                                            echo '<span style="color: green;">Dikirim</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($pecah['payment_status'] == "0") {
                                        ?>
                                            <a href="payment.php?id=<?php echo $pecah["order_id"]; ?>" class="btn btn-primary btn-sm">Bayar</a>
                                            <a href="nota.php?id=<?php echo $pecah["order_id"]; ?>" class="btn btn-info btn-sm">Nota</a>
                                        <?php
                                        } elseif ($pecah['payment_status'] == "1") {
                                        ?>
                                            <a href="lihat_payment.php?id=<?php echo $pecah["order_id"]; ?>" class="btn btn-success btn-sm">Lihat Pembayaran</a>
                                            <a href="nota.php?id=<?php echo $pecah["order_id"]; ?>" class="btn btn-info btn-sm">Nota</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
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