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
                <h2>Data Pembayaran</h2>

                <?php
                $id_pembelian = $_GET['id'];

                // Check if the data exists in the database
                $check_query = $connection->query("SELECT * FROM payment WHERE order_id='$id_pembelian'");

                if ($check_query->num_rows > 0) {
                    // Data exists, fetch and display
                    $detail = $check_query->fetch_assoc();
                    $tanggal = $detail['tanggal'];
                ?>

                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $detail['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?php echo $detail['bank'] ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?php echo date('d-m-Y', strtotime($tanggal)); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="../bukti_bayar/<?php echo $detail['bukti'] ?>" alt="" class="mr-2" style="width:200px;">
                    </div>
                </div>

                <div class="text-center mb-2">
                    <div class="row">
                        <div class="col-md-1 ml-auto">
                            <a href="orders.php?halaman=pembelian" class="btn btn-<?php echo $check_query->num_rows > 0 ? 'success' : 'danger'; ?> btn-sm" type="button">Kembali</a>
                        </div>
                    </div>
                </div>

                <?php
                } else {
                    // Data does not exist, display a warning message
                    echo '<div class="alert alert-warning" role="alert">User belum melakukan pembayaran.</div>';
                }
                ?>
            </div>
        </div>
    </main>

    <?php
    include "includes/footer.php"
    ?>
</body>
