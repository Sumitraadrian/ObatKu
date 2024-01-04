<?php
include "includes/head.php";
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

        $semuadata = array(); // Initialize $semuadata as an empty array

        $tanggal_mulai = "-";
        $tanggal_selesai = "-";

        if (isset($_POST["kirim"])) {
            $tanggal_mulai = $_POST["tglm"];
            $tanggal_selesai = $_POST["tgls"];
            $ambil = $connection->query("SELECT * FROM orders WHERE order_date BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
            while ($pecah = $ambil->fetch_assoc()) {
                $semuadata[] = $pecah;
            }
        }
        ?>

        <div class="container">
            <div class="row align-items-start">
                <<div class="col">
                    <br>
                    <h2>Laporan Pembelian</h2>
                    <hr>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tglm" value="<?php echo $tanggal_mulai ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tgls" value="<?php echo $tanggal_selesai ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label><br>
                                <button class="btn btn-primary" name="kirim">Lihat Laporan</button>
                            </div>
                        </div>
                    </form>
                
                    <div class="col" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>User ID</th>
                                    <th>Product ID</th>
                                    <th>Product Quantity</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Order Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($semuadata as $key => $value) :
                                    $tanggal = $value['order_date'];
                                    $total += $value['order_total'];
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value["user_id"]; ?></td>
                                        <td><?php echo $value["item_id"]; ?></td>
                                        <td><?php echo $value["order_quantity"]; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($tanggal)); ?></td>
                                        <td><?php echo $value["order_status"] == 1 ? 'Shipped' : 'Pending'; ?></td>
                                        <td>Rp. <?php echo number_format($value["order_total"]); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>Rp. <?php echo number_format($total) ?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
                </div>

                <!-- ... (Bagian kedua dan bagian lainnya tetap sama) ... -->
            </div>
        </div>

    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>
