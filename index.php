<?php
include "includes/head.php";
?>

<body>

  <div class="site-wrap">
    <?php
    include "includes/header.php";
    ?>
    <div class="site-blocks-cover" style="background-image: url('images/landing-page1.png');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Kesehatan Anda, Prioritas Kami-Pesan Obat Online Sekarang!</h2>
              <h1>Selamat Datang Di ObatKu Store</h1>
              <p>
                <a href="#recoment" class="btn btn-primary px-5 py-3">Jelajahi</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="#" class="h-100">
                <h5>Gratis <br> Ongkos Kirim</h5>
                <p>
                  Biaya Rp 0 untuk semua pengiriman pesanan Anda
                  <strong>untuk Order diatas Rp 1.900.000.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="#" class="h-100">
                <h5>Season <br> Sale 50% Off</h5>
                <p>
                  Diskon hingga 80% untuk produk kesehatan.

                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="#" class="h-100">
                <h5>Produk <br> Baru</h5>
                <p>
                  Jelajahi lebih dari 10.000 produk.
                </p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase" id="recoment">Produk yang Mungkin Anda Suka</h2>
          </div>
        </div>

        <div class="row">
          <?php
          $data = all_products();
          $num = sizeof($data);
          for ($i = 0; $i < $num; $i++) {
          ?>
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"> <img class="rounded mx-auto d-block" style="max-width: 100%; height: auto;" src="images/<?php echo $data[$i]['item_image'] ?>" alt="Image"></a>
              <?php if (strlen($data[$i]['item_title']) <= 20) { ?>
                <h3 class="text-dark"><a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo $data[$i]['item_title'] ?></a></h3>
              <?php
              } else {
              ?>
                <h3 class="text-dark"><a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo substr($data[$i]['item_title'], 0, 20) . "..." ?></a></h3>
              <?php
              }
              ?>
              <p class="price">Rp <?php echo number_format($data[$i]['item_price'], 0, ',', '.') ?></p>
            </div>
          <?php
            if ($i == 5) {
              break;
            }
          }
          ?>
        </div>
        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="store.php" class="btn btn-primary px-4 py-3">Lihat Semua Produk</a>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Produk Baru</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              <?php
              $data = all_products_reverse();

              $num = sizeof($data);
              for ($i = 0; $i < $num; $i++) {
              ?>
                <!--  -->
                <div class="  text-center item mb-4">
                  <a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"> <img class="rounded mx-auto d-block" style="max-width: 100%; height: auto;" src="images/<?php echo $data[$i]['item_image'] ?>" alt="Image"></a>

                  <h3 class="text-dark"><a href="product.php?product_id=<?php echo $data[$i]['item_id'] ?>"><?php echo $data[$i]['item_title'] ?></a></h3>

                  <p class="price">Rp <?php echo number_format($data[$i]['item_price'], 0, ',', '.') ?></p>
                </div>
                <!--  -->
              <?php
                if ($i == 5) {
                  break;
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Testimonial</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 no-direction owl-carousel">

              <div class="testimony">
                <blockquote>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Pelayanan ObatKu selama COVID 19 luar biasa. Ini memberikan diskon yang bagus daripada
                    toko medis. Websitenya sangat mudah untuk dipilih dan layanannya sangat banyak
                    mahir dan cepat. Cukup puas dengan pelayanannya. Bagian baiknya adalah Anda tidak perlu
                    menghabiskan banyak uang di toko obat yang diresepkan oleh Dokter, yang merupakan bantuan besar lainnya.&rdquo;</p>
                </blockquote>

                <p>&mdash; Annisa Rachman</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Sebagai NRI bagi saya pribadi, ObatKu menawarkan kemudahan yang besar dalam mendapatkan obat-obatan
                    untuk keluarga saya dari ujung jari tanpa gangguan apa pun sepanjang waktu dengan timah yang sangat terbatas
                    waktu pada semua pesanan. sangat senang menjadi pelanggan dan pasti merekomendasikannya kepada semua orang
                    memerlukan obat-obatan dengan biaya wajar dan rutin.&rdquo;</p>
                </blockquote>

                <p>&mdash;Ghibran Andrian </p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Sekarang saya menjadi pelanggan ObatKu. Setiap saya memesan obat di ObatKu
                    . Ini adalah situs web yang sangat membantu dalam belanja online untuk produk kesehatan. Layanan pengirimannya adalah
                    sangat cepat, dan pengepakan juga sangat baik, jika tidak sengaja ada obat yang salah, kirimkan dengan mudah
                    kembali ke toko web ini. Layanan pelanggannya sangat baik.&rdquo;</p>
                </blockquote>

                <p>&mdash; Adriansyah</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Saya ingin mengucapkan terima kasih kepada ObatKu atas Layanan Pelanggan mereka yang brilian. Aku memerintahkan
                    obat-obatan dari ObatKu dan mereka mengirimkan obat-obatan saya dalam waktu 3 hari. Pertahankan
                    kerja bagus. ObatKu adalah aplikasi obat terbaik. Saya menyarankan semua orang untuk menggunakan ObatKu
                    Situs web.&rdquo;</p>
                </blockquote>

                <p>&mdash; Kania Astriani</p>
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


  <script>
    $(document).ready(function () {
      // Tambahkan smooth scroll untuk semua tautan dengan hash yang dimulai dengan "#"
      $('a[href^="#"]').on('click', function (event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
          event.preventDefault();
          $('html, body').stop().animate({
            scrollTop: target.offset().top
          }, 1000); // Waktu animasi dalam milidetik (1000ms = 1 detik)
        }
      });
    });
  </script>
</body>

</html>
