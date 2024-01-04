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
        ?>
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <h2>Detail Pesanan</h2>
                    <br>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="orders.php">
                        <input class="form-control me-2 col" type="search" name="search_order_id" placeholder="Search for order (ID)" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_order" value="search">Cari</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">ID User</th>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Order status</th>
                    <th scope="col">Aksi</th> <!-- Tambahkan kolom aksi di sini -->
                </tr>
            </thead>

            <tbody>
            <?php
            $data = all_orders();
            delete_order();
            if (isset($_GET['search_order'])) {
                $query = search_order();
                if (!empty($query)) {
                    $data = $query;
                } else {
                    get_redirect("orders.php");
                }
            }
            $num = sizeof($data);
            for ($i = 0; $i < $num; $i++) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data[$i]['order_id'] ?></td>
                    <td><?php echo $data[$i]['user_id'] ?></td>
                    <td><?php echo $data[$i]['item_id'] ?></td>
                    <td><?php echo $data[$i]['order_quantity'] ?></td>
                    <td><?php echo $data[$i]['order_date'] ?></td>
                    <?php if ($data[$i]['order_status'] == 1) { ?>
                        <td style="color: green;">
                            Dikirim
                        </td>
                    <?php } else { ?>
                        <td style="color: red;">
                            Tertunda
                        </td>
                    <?php } ?>
                    <td>
                        <button type="button" class="btn btn-outline-danger"><a style="text-decoration: none; color:black;" href="orders.php?delete=<?php echo $data[$i]['order_id'] ?>">Hapus</a></button>
                    </td>
                    <?php if ($data[$i]['order_status'] == 1) { ?>
                        <td>
                            <button type="button" class="btn btn-outline-danger"><a style="text-decoration: none; color:black;" href="orders.php?undo=<?php echo $data[$i]['order_id'] ?>">&nbsp;Batal&nbsp;</a></button>
                        </td>
                    <?php } else { ?>
                        <td>
                            <button type="button" class="btn btn-outline-success"><a style="text-decoration: none; color:black;" href="orders.php?done=<?php echo $data[$i]['order_id'] ?>">&nbsp;Berhasil&nbsp;</a></button>
                        </td>
                    <?php } ?>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-info"><a style="text-decoration: none; color:black;" href="customers.php?id=<?php echo $data[$i]['user_id'] ?>"> &nbsp;Detail User&nbsp; </a></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-info"><a style="text-decoration: none; color:black;" href="products.php?id=<?php echo $data[$i]['item_id'] ?>">Detail Produk</a></button>
                    </td>
                    <!-- Tambahkan tombol "Lihat Pembayaran" -->
                    <td>
                        <button type="button" class="btn btn-outline-primary"><a style="text-decoration: none; color:black;" href="lihat_pembayaran.php?id=<?php echo $data[$i]['order_id'] ?>">Lihat Pembayaran</a></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary">
                            <a style="text-decoration: none; color: black;" href="detail.php?halaman=pembayaran&id=<?php echo $data[$i]['order_id'] ?>">Nota</a>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
            </table>
        </div>
        <br><br>
        <?php
        edit_admin($_SESSION['admin_id']);
        if (isset($_GET['edit'])) {
            $_SESSION['admin_id'] = $_GET['edit'];
            $data = get_admin($_SESSION['admin_id']);

        ?>
            <br>
            <h2>Edit Detail Admin</h2>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label>Nama Awal</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_fname'] ?>" name="admin_fname">
                    <div class="form-text">Silakan masukkan nama depan dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Nama Akhir</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['admin_lname'] ?>" name="admin_lname">
                    <div class="form-text">Silakan masukkan nama belakang dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $data[0]['admin_email'] ?>" name="admin_email">
                    <div class="form-text">Silakan masukkan email dalam format : example@gmail.com.</div>
                </div>
                <button type="submit" class="btn btn-outline-primary" value="update" name="admin_update">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Cancel</button>
                <br> <br>
            </form>

        <?php
        }
        add_admin();
        if (isset($_GET['add'])) {

        ?>
            <h2>Tambah Admin Baru </h2>
            <form action="admin.php" method="POST">
                <div class="form-group">
                    <label>Nama Awal</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="First name" name="admin_fname">
                    <div class="form-text">Silakan masukkan nama depan dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Nama Akhir</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="Last name" name="admin_lname">
                    <div class="form-text">Silakan masukkan nama akhir dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" name="admin_email">
                    <div class="form-text">Silakan masukkan email dalam format : example@gmail.com.</div>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" class="form-control" placeholder="Password" name="admin_password">
                    <div class="form-text">
                        <ul>
                            <li>Harus minimal 8 karakter</li>
                            <li>Harus berisi minimal 1 angka</li>
                            <li>Harus berisi setidaknya satu karakter huruf besar</li>
                            <li>Harus berisi setidaknya satu karakter huruf kecil</li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_admin">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="admin_cancel">Cancel</button>
                <br> <br>
            </form>

        <?php
        }

        ?>
    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>