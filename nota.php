<?php
include "includes/head.php";
include "includes/header.php";

$userData = get_user($_SESSION['user_id']);


?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Nota</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <h2 class="h3 mb-3 text-black">Informasi Pembelian</h2>

        <?php
        $order_id = isset($_GET['id']) ? $_GET['id'] : null;
        $query = "SELECT orders.order_id, orders.order_date, orders.order_total, orders.order_status, user.user_fname, user.user_lname, user.email, user.user_address, user.city, user.nohp
                  FROM orders
                  JOIN user ON orders.user_id = user.user_id
                  WHERE orders.order_id = ?";

        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $detail = $result->fetch_assoc();
            $tanggal = $detail['order_date'];
        } else {
            echo "No order found";
            exit();
        }
        ?>

        <?php
        $idpelbeli = isset($detail["user_id"]) ? $detail["user_id"] : null;
        $idpellogin = isset($_SESSION["user"]["user_id"]) ? $_SESSION["user"]["user_id"] : null;

        if ($idpelbeli !== $idpellogin) {
            echo "<script>alert('Your Page Error!');</script>";
            echo "<script>location='riwayat.php'</script>";
            exit();
        }
        ?>

        <div class="row">
            <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong>No.Pembelian: <?= $detail['order_id'] ?></strong><br>
                Tanggal Pembelian : <?php echo date('d-m-Y', strtotime($tanggal)); ?><br>
                Total Pembayaran : Rp. <?= number_format($detail['order_total']) ?>
            </div>
            <div class="col-md-4">
                <h3>User</h3>
                <strong><?= $detail['user_fname']; ?></strong> <br>
                <strong><?= $detail['user_lname']; ?></strong> <br>
                Email : <?= $detail['email']; ?> <br>
            </div>
            <div class="col-md-4">
                <h3>Pengiriman</h3>
                <strong><?= $detail['city']; ?></strong><br>
                Ongkos Kirim: Rp. <?= delivery_fees($detail) ?><br>
                Alamat Pengiriman: <?= $detail['user_address']; ?><br>
               
            </div>
        </div>
        <hr>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $query = "SELECT item.item_title, item.item_price, orders.order_quantity, item.item_price * orders.order_quantity AS subharga
                          FROM orders
                          JOIN item ON orders.item_id = item.item_id
                          WHERE orders.order_id = ?";

                $stmt = $connection->prepare($query);

                if (!$stmt) {
                    // Error handling: Output the error message and terminate the script
                    die('Error in preparing statement: ' . $connection->error);
                }

                $stmt->bind_param("i", $order_id);
                $stmt->execute();

                if ($stmt->error) {
                    // Error handling: Output the error message and terminate the script
                    die('Error in execution: ' . $stmt->error);
                }

                $result = $stmt->get_result();

                while ($pecah = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td>
                            <center><?php echo $nomor; ?></center>
                        </td>
                        <td><?php echo $pecah['item_title']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['item_price']); ?></td>
                        <td><?php echo $pecah['order_quantity']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['subharga']) ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    Note : <strong>Abaikan Jika Sudah Melakukan Pembayaran!</strong>
                    <p>
                        Silahkan melakukan pembayaran Rp. <?= number_format($detail['order_total']); ?> <br> <strong> BANK BRI 0105 0110 7030 502  AN. Sumitra Adriansyah</strong>
                    </p>
                    <p>Info Lebih Lanjut: <a href="https://api.whatsapp.com/send?phone=6281930593694&text=Hallo%2C%20ObatKu%20siap%20melayani%20Anda.%20Ada%20yang%20dapat%20dibantu%3F">+6281930593694</a></p>
                </div>
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