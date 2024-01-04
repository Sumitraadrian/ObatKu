<?php
include "includes/head.php";
include "includes/header.php";

$userData = get_user($_SESSION['user_id']);

if (isset($_POST['submit_payment'])) {
    // Your payment processing logic here

    // Insert payment data into the database
    $user_id = $userData['user_id']; // Assuming you have a user_id in your user data
    $order_id = $_POST['order_id']; // Assuming you have the order_id available
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d H:i:s'); // Current timestamp

    // Insert payment data into the payment table
    $connection->query("INSERT INTO payment (user_id, order_id, nama, bank, jumlah, tanggal) VALUES ('$user_id', '$order_id', '$nama', '$bank', '$jumlah', '$tanggal')");

    // Update the order status to "PAID" or something similar
    $connection->query("UPDATE orders SET payment_status = '1' WHERE order_id = '$order_id'");

    // Redirect to the order history page
    header("Location: history.php");
    exit();
}
?>

<!-- Your existing payment form goes here -->

<!-- Add your existing script includes here -->


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Thank You</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php
        // Add the adapted code from the original file
        if (!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])) {
            echo "<script>alert('Silahkan Login !!!');</script>";
            echo "<script>location='login.php';</script>";
        }

        $idpem = $_GET["id"];
        $ambil = $connection->query("SELECT * FROM orders WHERE order_id='$idpem'");
        if ($ambil) {
            $detpem = $ambil->fetch_assoc();
        } else {
            // Handle the error, such as echoing an error message or redirecting
            echo "Error executing query: " . $connection->error;
            exit(); // or take appropriate action
        }

        $id_pelanggan_beli = $detpem["user_id"];
        $id_pelanggan_login = $_SESSION["user_id"];

        if ($id_pelanggan_login !== $id_pelanggan_beli) {
            echo "<script> alert('Your Page Error!');</script>";
            echo "<script>location='history.php';</script>";
            exit();
        }

        // Check if the form is submitted
        if (isset($_POST['kirim'])) {
            $namabukti = $_FILES['bukti']['name'];
            $lokasibukti = $_FILES['bukti']['tmp_name'];
            $namafiks = date("YmdHis") . $namabukti;
            move_uploaded_file($lokasibukti, "bukti_bayar/$namafiks");

            $nama = $_POST['nama'];
            $bank = $_POST['bank'];
            $jumlah = $_POST['jumlah'];
            $tanggal = date("y-m-d");

            // Insert payment data into the payment table
            $connection->query("INSERT INTO payment (order_id, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

            // Update payment status in the orders table
            $connection->query("UPDATE orders SET payment_status = 1 WHERE order_id='$idpem'");

            // Menampilkan pesan setelah pembayaran sukses
            echo "<script> alert('Pembayaran Sukses! Anda sudah membayar.');</script>";
            echo "<script>location='history.php';</script>";
        }
        ?>

<h2 class="h3 mb-3 text-black">Konfirmasi Pembayaran</h2>
        <p>Kirim bukti pembayaran anda disini</p>
        <div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem["order_total"]) ?> </strong>Bayarkan Ke rekening -------- A/N ------</div>

        <?php
        // Check if payment status is 1 (paid)
        if ($detpem['payment_status'] == 1) {
            echo "<p class='text-danger'>Anda sudah membayar. Tombol pembayaran tidak aktif.</p>";
        } else {
        ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Penyetor</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" class="form-control" name="bank">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="form-group">
                    <label>Foto Bukti</label>
                    <input type="file" class="form-control" name="bukti">
                    <p class="text-danger">Upload Bukti Disini</p>
                </div>
                <button class="btn btn-primary" name="kirim"> Kirim</button>
                <a href="history.php" class="btn btn-primary"> Batal</a>
            </form>
        <?php
        }
        ?>
    </div>
</div>

<footer class="site-footer">
    <!-- Add your existing footer code here -->
</footer>

<!-- Add your existing script includes here -->
