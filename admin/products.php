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
                    <h2>Detail Produk</h2>
                    <br>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="products.php">
                        <input class="form-control me-2 col" type="search" name="search_item_name" placeholder="Search for product" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_item" value="search">Cari</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['id'])) {
            edit_item($_SESSION['id']);
        }

        if (isset($_GET['edit'])) {
            $itemID = $_GET['edit'];
            $data = get_item($itemID);
            if (!$data) {
                echo "Product not found!";
                // Handle error or redirect as needed
                exit;
            }
        ?>
            <br>
            <h2>Edit Detail Produk</h2>
            <form action="products.php" method="POST">
                <div class=" form-group mb-3">
                    <label>Nama Produk</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" id="exampleInputText1" type="text" class="form-control" placeholder="<?php echo $data[0]['item_title'] ?>" name="name">
                    <div class="form-text">silakan masukkan nama produk dalam rentang (1-25) karakter, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="form-group">
                    <label>Nama Merk</label>
                    <input pattern="[A-Za-z0-9_]{1,25}" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['item_brand'] ?>" name="brand">
                    <div class="form-text">silakan masukkan nama merk dalam rentang (1-25) karakter, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <label class="input-group-text" for="inputGroupSelect01">kategori</label>
                    <select name="cat" class="form-select" id="inputGroupSelect01">
                        <option selected>Pilih...</option>
                        <option value="medicine">obat</option>
                        <option value="self-care">self-care</option>
                        <option value="machine">alat bantu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product tags</label>
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['item_tags'] ?>" name="tags">
                    <div class="form-text">silakan masukkan tags dalam rentang (1-25) karakter, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" accept="images/*" class="form-control" placeholder="<?php echo $data[0]['item_image'] ?>" name="image">
                    <div class="form-text">silakan masukkan gambar untuk produk.</div>
                </div>
                <div class="form-group">
                    <label>Banyak Produk</label>
                    <input type="number" class="form-control" placeholder="<?php echo $data[0]['item_quantity'] ?>" name="quantity" min="1" max="999">
                    <div class="form-text">silakan masukkan jumlah produk dalam kisaran (1-999).</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <span class="input-group-text">Rp</span>
                    <input pattern="[0-9]+" id="validationTooltip01" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" placeholder="<?php echo 'Rp ' . number_format($data[0]['item_price'], 0, ',', '.') ?>">
                    <span class="input-group-text">.00</span>
                </div>

                <div class="form-text">silakan masukkan harga produk .</div>
                <div class="form-group">
                    <label for="inputAddress2">Detail Produk</label>
                    <input type="text" class="form-control" placeholder="<?php echo $data[0]['item_details'] ?>" name="details">
                </div>
                <div class="form-text">silakan masukkan detail produk .</div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="update">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>
            </form>
        <?php
        }
        ?>
        <?php
        add_item();
        if (isset($_GET['add'])) {
        ?>
            <br>
            <h2>Tambah Product</h2>
            <form action="products.php" method="POST">
                <!-- ... (form fields for adding a new product) ... -->
                <form action="products.php" method="POST">
                <div class=" form-group mb-3">
                    <label>Nama Produk</label>
                    <input id="exampleInputText1" type="text" class="form-control" placeholder="product name" name="name">
                    <div class="form-text">Silakan masukkan nama produk dalam rentang (1-25) karakter / s, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="form-group">
                    <label>Nama Merk</label>
                    <input id="validationTooltip01" type="text" class="form-control" placeholder="product brand" name="brand">
                    <div class="form-text">Silakan masukkan nama merek dalam rentang (1-25) karakter / s, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <label class="input-group-text" for="inputGroupSelect01">kategori</label>
                    <select name="cat" class="form-select" id="inputGroupSelect01">
                        <option value="" selected>Pilih...</option>
                        <option value="medicine">Obat</option>
                        <option value="self-care">self-care</option>
                        <option value="machine">Alat Bantu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product tags</label>
                    <input id="validationTooltip01" type="text" class="form-control" placeholder="product tags" name="tags">
                    <div class="form-text">Silakan masukkan tag untuk produk dalam rentang (1-250) karakter, karakter khusus tidak diperbolehkan!</div>
                </div>
                <div class="form-group">
                    <label>Foto Produk</label>
                    <input type="file" accept="image/*" class="form-control" placeholder="image" name="image">
                    <div class="form-text">Silakan masukkan gambar untuk produk.</div>
                </div>
                <div class="form-group">
                    <label>Jumlah Produk</label>
                    <input type="number" class="form-control" placeholder="product quantity" name="quantity" min="1" max="999">
                    <div class="form-text">Silakan masukkan jumlah produk dalam kisaran (1-999).</div>
                </div>
                <div class="input-group mb-3 form-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" id="priceInput" placeholder="product price">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="form-text">Silakan masukkan harga produk.</div>
                <div class="form-group">
                    <label for="inputAddress2">Detail Produk</label>
                    <input type="text" class="form-control" placeholder="product details" name="details">
                </div>
                <div class="form-text">Silakan masukkan detail produk.</div>
                <br>
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_item">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>
            </form>
        <?php
        }
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Detail</th>
                        <th></th>
                        <th>
                            <button type="button" class="btn btn-outline-primary"><a style="text-decoration: none; color:black;" href="products.php?add=1"> &nbsp;&nbsp;Add&nbsp;&nbsp;</a></button>
                        </th>
                        </th>
                </thead>
                <tbody>
                    <?php
                    $data = all_items();
                    delete_item();
                    if (isset($_GET['search_item'])) {
                        $query = search_item();
                        if (isset($query)) {
                            $data = $query;
                        } else {
                            get_redirect("products.php");
                        }
                    } elseif (isset($_GET['id'])) {
                        $data = get_item_details();
                    }
                    if (isset($data)) {
                        $num = sizeof($data);
                        for ($i = 0; $i < $num; $i++) {
                    ?>
                            <tr>
                                <!-- ... (table rows for displaying products) ... -->
                                <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data[$i]['item_id'] ?></td>
                                <td><?php echo $data[$i]['item_title'] ?></td>
                                <td><?php echo $data[$i]['item_brand'] ?></td>
                                <td><?php echo $data[$i]['item_cat'] ?></td>
                                <td><?php echo $data[$i]['item_tags'] ?></td>
                                <td><?php echo $data[$i]['item_image'] ?></td>
                                <td><?php echo $data[$i]['item_quantity'] ?></td>
                                <td><?php echo $data[$i]['item_price'] ?></td>
                                <td><?php echo $data[$i]['item_details'] ?></td>
                                <td>
                                    <button type="button" class="btn pull-left btn-outline-warning"><a style="text-decoration: none; color:black;" href="products.php?edit=<?php echo $data[$i]['item_id'] ?>">Edit</a></button>
                                </td>
                                <td>
                                    <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="products.php?delete=<?php echo $data[$i]['item_id'] ?>">Delete</a></button>
                                </td>
                            </tr>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>
