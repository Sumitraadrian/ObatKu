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
                    <h2>Detail Customer</h2>
                    <br>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="customers.php">
                        <input class="form-control me-2 col" type="search" name="search_user_email" placeholder="Search for user (email)" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_user" value="search">Cari</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <?php

        if (isset($_GET['edit'])) {
            $_SESSION['id'] = $_GET['edit'];
            $data = get_user($_SESSION['id']);

        ?>
            <br>
            <h2>Edit Detail Customer</h2>
            <form action="customers.php" method="POST">
                <div class="form-group">
                    <label>Nama Awal</label>
                    <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="<?php echo $data[0]['user_fname'] ?>" name="fname">
                    <div class="form-text">Silakan masukkan nama depan dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="validationTooltip01">Nama Akhir</label>
                    <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="<?php echo $data[0]['user_lname'] ?>" name="lname">
                    <div class="form-text">Silakan masukkan nama belakang dalam rentang (1-30) karakter / s, karakter khusus &; angka tidak diperbolehkan!</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $data[0]['email'] ?>" name="email">
                    <div class="form-text">Silakan masukkan email dalam format : example@gmail.com.</div>
                </div>
                <br>
                <div class="form-group">
                    <label for="inputAddress2">Alamat</label>
                    <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" id="inputAddress2" placeholder="<?php echo $data[0]['user_address'] ?>" name="address">
                </div>
                <div class="form-text">silakan masukkan email dalam format: #1, Cianjur, Jawa Barat.</div>
                <br>
                <button type="submit" class="btn btn-outline-success" value="update" name="update">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>

        <?php
         }
         if (isset($_SESSION['id'])) {
             edit_user($_SESSION['id']);
         }

        ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Awal</th>
                        <th scope="col">Nama Akhir</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>

                </thead>

                <tbody>
                    <?php
                    $data = all_users();
                    delete_user();
                    if (isset($_GET['search_user'])) {
                        $query = search_user();
                        if (isset($query)) {
                            $data = $query;
                        } else {
                            get_redirect("customers.php");
                        }
                    } elseif (isset($_GET['id'])) {
                        $data = get_user_details();
                    }
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <tr>
                            <td><?php echo $data[$i]['user_id'] ?></td>
                            <td><?php echo $data[$i]['user_fname'] ?></td>
                            <td><?php echo $data[$i]['user_lname'] ?></td>
                            <td><?php echo $data[$i]['email'] ?></td>
                            <td><?php echo $data[$i]['user_address'] ?></td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-warning"><a style="text-decoration: none; color:black;" href="customers.php?edit=<?php echo $data[$i]['user_id'] ?>">Edit</a></button>
                            </td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="customers.php?delete=<?php echo $data[$i]['user_id'] ?>">Hapus</a></button>
                            </td>
                        </tr>
                    <?php  }
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