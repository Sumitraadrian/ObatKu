<?php
include "includes/head.php";
include "includes/header.php";
include "includes/sidebar.php";

// Assume $koneksi is your database connection

// Fetch distinct categories from the database
$query = "SELECT DISTINCT item_cat FROM item";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die("Database query failed.");
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h2>Data Kategori</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($categories as $pecah) :
                ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['item_cat']; ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include "includes/footer.php";
?>
