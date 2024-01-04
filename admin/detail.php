<?php
include "includes/head.php";
$userData = get_user($_SESSION['user_id']);
?>

<body>
    <?php
    include "includes/header.php"
    ?>

    <?php
    include "includes/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php
        message();
        ?>
        <div class="site-section">
            <div class="container">
                <h2>Nota Pembelian</h2>

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
                    <div class="col-md-4 ">
                        <h3>Pembeli</h3>
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

                
            </div>
        </div>
    </main>
    <style>
    .container {
        margin-top: 20px; /* Adjust this value to increase or decrease the space */
    }
</style>
    <?php
    include "includes/footer.php"
    ?>
</body>
