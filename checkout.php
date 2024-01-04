<?php
// Include necessary files
include "includes/head.php";
include "includes/rajaongkir.php"; 

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user submitted the form to fetch shipping services
    if (isset($_POST["fetch_services"])) {
        // Handle fetching shipping services
        $destinationCity = $_POST["destination_city"];
        $originCity = 'bandung'; // Ganti dengan kota asal yang sesuai
        $weight = 1000; // Ganti dengan berat sesuai kebutuhan

        // Panggil fungsi untuk mendapatkan layanan pengiriman dari file rajaongkir.php
        $shippingServices = getShippingServices();

        if ($shippingServices !== false) {
            echo '<h2 class="h3 mb-3 text-black">Daftar Layanan Pengiriman</h2>';
            echo '<div class="p-3 p-lg-5 border">';
            echo '<form action="" method="post">';
            echo '<div class="form-group">';
            echo '<label for="shipping_type">Pilih Jenis Pengiriman:</label>';
            echo '<select class="form-control" name="shipping_type" id="shipping_type">';

            foreach ($shippingServices as $service) {
                $serviceName = $service['code'];
                $serviceDescription = $service['name'];
                echo "<option value='$serviceName'>$serviceDescription</option>";
            }

            echo '</select>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary btn-lg btn-block">Hitung Ongkos Kirim</button>';
            echo '</form>';
            echo '</div>';
        } else {
            // Handle the case where fetching shipping services failed
            echo "<p>Error fetching shipping services</p>";
        }
    } else {
        // Handle the form submission to calculate shipping cost
        $destinationCity = $_POST["destination_city"];
        $shippingType = $_POST["shipping_type"];
        $originCity = 'bandung'; // Ganti dengan kota asal yang sesuai
        $weight = 1000; // Ganti dengan berat sesuai kebutuhan

        // Panggil fungsi untuk menghitung ongkos kirim dari file rajaongkir.php
        $shippingCost = calculateShippingCost($originCity, $destinationCity, $weight, $shippingType);

        if ($shippingCost !== false) {
            echo "<p>Ongkos Kirim ke $destinationCity dengan $shippingType adalah: Rp " . number_format($shippingCost, 0, ',', '.') . "</p>";
        } else {
            echo "<p>Error calculating shipping cost</p>";
        }
    }
}

// The rest of your HTML and PHP code...
?>

<!-- The rest of your HTML and PHP code... -->

<body>

  <div class="site-wrap">
    <?php
    include "includes/header.php";
    $data = get_user($_SESSION['user_id']);
    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Checkout</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Detail Pengiriman</h2>
                <div class="p-3 p-lg-5 border">
                  <!-- Display customer details -->
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Detail Customer</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Nama Awal </td>
                        <td><?php echo $data[0]['user_fname'] ?></td>
                      </tr>
                      <tr>
                        <td>Nama Akhir </td>
                        <td><?php echo $data[0]['user_lname'] ?></td>
                      </tr>
                      <tr>
                        <td>Email </td>
                        <td><?php echo $data[0]['email'] ?></td>
                      </tr>
                      <tr>
                        <td>Alamat </td>
                        <td><?php echo $data[0]['user_address'] ?></td>
                      </tr>
                    </tbody>
                  </table>

                  <!-- Form for selecting destination city -->
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="destination_city">Pilih Kota Tujuan:</label>
                      <select class="form-control" name="destination_city" id="destination_city">
                        <?php
                        // Mendapatkan daftar kota dari RajaOngkir
                        $cityList = getCityList();
                        foreach ($cityList as $city) {
                          echo "<option value='{$city['city_name']}'>{$city['city_name']}</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <!-- Form for fetching shipping services -->
                    <div class="form-group">
                      <button type="submit" name="fetch_services" class="btn btn-primary btn-lg btn-block">Cek Layanan Pengiriman</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Display order details -->
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Pesanan Anda</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Produk</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($_SESSION['cart'])) {
                        $data = get_cart();
                        $num = sizeof($data);
                        for ($i = 0; $i < $num; $i++) {
                          if (isset($data[$i])) {
                      ?>
                            <tr>
                              <td><?php echo $data[$i][0]['item_title'] ?><strong class="mx-2">x</strong><?php echo $_SESSION['cart'][$i]['quantity'] ?></td>
                              <td>Rp <?php echo number_format(($data[$i][0]['item_price'] * $_SESSION['cart'][$i]['quantity']), 0, ',', '.') ?></td>
                            </tr>
                      <?php
                          }
                        }
                      }
                      ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Subtotal Harga</strong></td>
                        <td class="text-black">Rp <?php echo number_format(total_price($data), 0, ',', '.') ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Ongkos Kirim</strong></td>
                        <td class="text-black">Rp <?php echo number_format(delivery_fees($data), 0, ',', '.') ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total Pesanan</strong></td>
                        <td class="text-black font-weight-bold"><strong>Rp <?php echo number_format(delivery_fees($data) + total_price($data), 0, ',', '.') ?></strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <!-- Button to complete the order -->
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.php?order=done'">Tambah Pesanan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include "includes/footer.php";
    ?>
  </div>

  <!-- Handle form submission for calculating shipping cost -->
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["shipping_type"])) {
    // Ambil data dari form
    $destinationCity = $_POST["destination_city"];
    $shippingType = $_POST["shipping_type"];
    $originCity = 'bandung'; // Ganti dengan kota asal yang sesuai
    $weight = 1000; // Ganti dengan berat sesuai kebutuhan

    // Panggil fungsi untuk menghitung ongkos kirim dari file rajaongkir.php
    $shippingCost = calculateShippingCost($originCity, $destinationCity, $weight, $shippingType);

    // Output ongkos kirim (Anda bisa menampilkan ini di tempat yang sesuai dalam halaman)
    echo "<script>alert('Ongkos Kirim ke $destinationCity dengan $shippingType adalah: Rp " . number_format($shippingCost, 0, ',', '.') . "');</script>";
  }
  ?>
</body>

</html>

