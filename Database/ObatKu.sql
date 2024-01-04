-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 04, 2024 at 05:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_fname` varchar(20) NOT NULL,
  `admin_lname` varchar(20) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_fname`, `admin_lname`, `admin_password`) VALUES
(4, 'admin@gmail.com', 'Mohammed', 'Taha', 'admin'),
(6, 'admin1@gmail.com', 'MD', 'Faisal', 'admin'),
(8, 'admin2@gmail.com', 'NITISH', 'SINGH', 'admin'),
(9, 'admin3@gmail.com', 'NAVEEN', 'RAJ', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(5) NOT NULL,
  `item_title` varchar(250) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_cat` varchar(15) NOT NULL,
  `item_details` text NOT NULL,
  `item_tags` varchar(250) NOT NULL,
  `item_image` varchar(250) NOT NULL,
  `item_quantity` int(3) NOT NULL,
  `item_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_brand`, `item_cat`, `item_details`, `item_tags`, `item_image`, `item_quantity`, `item_price`) VALUES
(15, 'Accu-Chek Active Glucometer Test Strips Box Of 50', 'Accu-Chek', 'alat bantu', 'Kadar gula darah dalam tubuh Anda dapat diperiksa dengan mudah menggunakan Accu-Chek Active Strips. Ini diuji keakuratannya, mudah digunakan setiap hari dan tidak diperlukan pengkodean manual. Anda cukup memasukkan strip tes, mengumpulkan sedikit sampel darah di atasnya, membiarkannya terserap dan membaca hasil glukosa darah Anda dari layar. Strip Tes Glukometer Accu-Chek dapat digunakan oleh pasien yang menderita diabetes Tipe 1 dan Tipe 2. Anda tidak boleh menggunakan Strip Glukometer Instan Accu-Chek melebihi tanggal kadaluwarsa yang tertera pada kemasan. Accu-Chek Active memungkinkan Anda memeriksa ulang dan memverifikasi hasil yang ditampilkan setelah tes Anda.', 'Accu-Chek Active Glucometer Test Strips Box Of 50 , machine ,blood glucose test strips', 'Strips.jpg', 50, 80000),
(18, 'Omron Blood Pressure Monitor HEM-7121J', 'Omron', 'alat bantu', 'Omran B.P Monitor Hem-7121J merupakan alat pemantau Tekanan Darah otomatis yang dibuat dengan Teknologi IntelliSense untuk kenyamanan penggunaan pasien. Ini menunjukkan OK ketika pengguna membungkus manset, memastikan bahwa jumlah tekanan yang tepat diberikan untuk menghasilkan hasil yang akurat dan lebih cepat. Sekarang dapatkan pengukuran yang tepat dan konsisten di rumah Anda sehingga Anda dapat memantau kesehatan Anda dengan mudah.', 'Omron Blood Pressure Monitor HEM-7121J, check', 'Blood Pressure.jpg', 45, 17590),
(19, 'Omron Compressor Nebulizer Ne-C106', 'Omron', 'alat bantu', 'Kini bernapas lega dan nyaman dengan Omron Compressor Nebulizer Ne-C106 yang membantu Anda menghirup obat-obatan Anda. Ini dirancang khusus sehingga Anda dapat menggunakannya dengan mudah dan cocok untuk orang dewasa dan anak-anak.', 'Omron Compressor Nebulizer Ne-C106', 'Omron Compressor Nebulizer Ne-C106.jpeg', 45, 14920),
(20, 'OneTouch Select Plus Simple Glucometer (FREE 10 strips + lancing device + 10 lancets)', 'OneTouch', 'alat bantu', 'OneTouch Select Plus Simple adalah sistem pemantauan glukosa darah. Sistem pengukur OneTouch® Select Plus Simple®. Mudah digunakan, Akurat dan hampir bebas rasa sakit.', 'OneTouch Select Plus Simple Glucometer (FREE 10 strips + lancing device + 10 lancets), 1 Kit', 'OneTouch Select Plus Simple Glucometer (FREE 10 strips + lancing device + 10 lancets).jpeg', 47, 8710),
(21, 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips', 'Accu-Chek', 'alat bantu', 'Sistem Pemantauan Glukosa Darah Aktif Accu-Chek memungkinkan pengukuran glukosa akurat di rumah tanpa kerumitan. Ini adalah perangkat pengujian mandiri yang portabel dan lebih mudah dioperasikan. Dapatkan hasil tes lebih cepat dan mudah dipahami dengan perangkat pemantauan glukosa yang dipersonalisasi ini.', 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips', 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips.jpeg', 47, 13210),
(22, 'Apollo Pharmacy Digital Flexible Thermometer', 'Apollo', 'alat bantu', 'Respon cepat Termometer Digital Apollo memiliki tingkat akurasi yang tinggi (+- .20 F), memiliki layar LCD yang mudah dibaca dan dilengkapi dengan masa pakai baterai yang lama hingga 200 jam. Fitur Akurasi Tinggi (+- .2 derajat F) Cairan Memori Layar Kristal untuk menyimpan nilai pengukuran terakhir Daya Tahan Baterai: Sekitar 200 jam Waktu Respons Cepat (kira-kira 10-20 detik) Sinyal Alarm pada pengukuran suhu. Mati Otomatis.', 'Apollo Pharmacy Digital Flexible Thermometer', 'Apollo Pharmacy Digital Flexible Thermometer.jpeg', 50, 100000),
(23, 'Romsons Respirometer SH-6082', 'ROMSONS', 'alat bantu', 'Biarkan paru-paru Anda berolahraga secara sehat dan efisien dengan Romsons Respirometer SH-6082. Ia memiliki pengaturan tri-ball yang memungkinkan pasien melakukan latihan pernapasan secara bertahap. Desainnya yang ringan mudah dipegang dan hadir dengan bodi transparan sehingga Anda dapat terus memeriksa kinerja pernapasan Anda. Sekarang bawa pulang alat pernapasan dan paru-paru inovatif ini dan mulailah latihan pernapasan efisien Anda.', 'Romsons Respirometer SH-6082', 'Romsons Respirometer SH-6082.jpeg', 46, 275000),
(24, 'Prega News Pregnancy Test Card', 'Prega', 'alat bantu', 'Dapatkan hasil kehamilan hanya dalam 5 menit dengan Kartu Tes Kehamilan Prega News. Ini dirancang khusus untuk menilai hasil kehamilan dalam kenyamanan rumah Anda dengan 3 tetes sampel urin. Muncul dengan sumur sampel dan jendela hasil yang memudahkan penggunaan dan membaca hasilnya sehingga Anda dapat mendeteksi apakah Anda hamil atau tidak dengan sangat cepat.', 'Prega News Pregnancy Test Card', 'Prega News Pregnancy Test Card.jpeg', 47, 55000),
(26, 'Polymed Pulse Oximeter CMS50C', 'Polymed', 'alat bantu', 'Bawa pulang Polymed Pulse Oximeter CMS50C dan rasakan kenyamanan memantau tingkat saturasi oksigen Anda. Ini dirancang agar Anda dapat dengan mudah memantau SpO2 dan denyut nadi secara bersamaan.', 'Polymed Pulse Oximeter CMS50C', 'Polymed Pulse Oximeter CMS50C.jpeg', 45, 75000),
(27, 'Freestyle Libre Reader - Flash Glucose Monitoring System', 'ABBOTT', 'alat bantu', 'Sistem Pemantauan Glukosa FreeStyle Libre Reader - Sistem FreeStyle Libre memungkinkan Anda memeriksa glukosa dengan pemindaian satu detik tanpa rasa sakit, bukan hanya dengan tusukan jari.', 'Freestyle Libre Reader - Flash Glucose Monitoring System', 'Freestyle Libre Reader - Flash Glucose Monitoring System.jpeg', 45, 49990),
(28, 'Seni Air Classic Breathable Adult Diapers Medium', 'Seni Air', 'self-care', 'Seni adalah merek produk penyerap dan solusi perawatan kulit Eropa yang mendapat kepercayaan dari jutaan pasien dan perawat penderita inkontinensia di seluruh dunia. Pengetahuan mendalam dan segudang pengalaman memastikan kenyamanan penggunaan maksimal dan perlindungan spesialis terhadap kelainan kulit seperti luka baring.', 'Seni Air Classic Breathable Adult Diapers Medium', 'Seni Air Classic Breathable Adult Diapers Medium.jpeg', 44, 55000),
(29, 'Cipla Saslic DS Foaming Face Wash, 60 ml', 'Cipla', 'self-care', 'Saslic DS Face Wash adalah pembersih wajah berbusa yang mengandung kebaikan asam salisilat, mendorong siklus penggantian sel kulit', 'Cipla Saslic DS Foaming Face Wash, 60 ml', 'Cipla Saslic DS Foaming Face Wash, 60 ml.jpg', 45, 43500),
(30, 'Cetaphil Gentle Skin Cleanser, 250 ml', 'Cetaphil', 'self-care', 'Cetaphil Gentle Skin Cleanser adalah formulasi lembut bebas sabun yang membersihkan tanpa iritasi; membuat kulit Anda lembut dan halus', 'Cetaphil Gentle Skin Cleanser, 250 ml', 'Cetaphil Gentle Skin Cleanser, 250 ml.jpeg', 49, 56300),
(31, 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm', 'Colgate', 'self-care', 'Apa itu gigi sensitif? Sensitivitas gigi terjadi ketika enamel yang melindungi gigi kita menipis atau ketika terjadi resesi gusi, sehingga permukaan di bawahnya, yaitu dentin, terlihat, sehingga mengurangi perlindungan pada akar dan saraf. Ketika gigi tersebut bersentuhan dengan sesuatu yang panas, dingin, atau manis, sensasi dibawa langsung ke saraf sehingga menimbulkan sensasi nyeri. Penyebab kerusakan enamel: Menyikat gigi secara agresif, Menggeretakkan gigi, Erosi gigi Penyebab erosi gusi: Menyikat gigi secara agresif, penuaan, penyakit gusi Pasta gigi Colgate sensitif plus, dengan teknologi Pro-Argin™ eksklusifnya memberikan BANTUAN INSTAN dan TERAKHIR dari sensitivitas gigi secara teratur menggunakan. Ini BEKERJA SEJAK PENGGUNAAN PERTAMA* dengan membantu memblokir tubulus terbuka untuk melindungi gigi sensitif yang membangun PERLINDUNGAN TAHAN LAMA terhadap guncangan rasa sakit yang tiba-tiba. Gunakan dengan mengoleskan pasta gigi langsung pada gigi sensitif untuk BANTUAN INSTAN.', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm.png', 43, 65000),
(32, 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm', 'Patanjali', 'self-care', 'Sabun Pantajali Haldi Chandan Kanti ditujukan untuk wajah dan tubuh, hadir dengan kebaikan bahan alami seperti Haldi, Chandan yang membantu dalam meremajakan, menutrisi dan memberikan kilau pada kulit.', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm.jpeg', 50, 18000),
(33, 'Sri Sri Tattva Body Oil, 200 ml', 'Sri Sri', 'self-care', 'Perkaya kulit Anda dengan manfaat bahan alami dan minyak esensial yang membantu memperbaiki dan menutrisi kulit yang rusak. Sri Sri Tattva Body Oil diformulasikan menggunakan bahan-bahan yang menjadikan kulit sehat dan bercahaya. Campuran unik antara minyak dan herbal memperbaiki kondisi kulit dan secara efektif menghilangkan tanda-tanda penuaan. Memijat secara teratur memberikan manfaat ganda pada kulit. Dengan sentuhan alam yang lembut dan menutrisi, body oil ini membantu menenangkan kulit Anda.', 'Sri Sri Tattva Body Oil, 200 ml', 'Sri Sri Tattva Body Oil, 200 ml.jpeg', 48, 13000),
(34, 'Jiva Amla Shampoo, 200 ml', 'Jiva Amla ', 'self-care', 'Jiva Amla Shampoo adalah sampo yang tepat jika Anda ingin menjaga kulit kepala tetap segar dan sejuk sepanjang hari. Mencegah rambut rontok, uban prematur, dan ketombe. Amla (Emblica officinalis) adalah ramuan ajaib yang memiliki sifat Ayurveda bawaan yang menyeimbangkan Pitta dosha. Jatamansi, Bhringraj, Shikakai adalah beberapa dari sekian banyak ramuan bermanfaat dalam Jiva Alma Shampoo yang menjaga rambut Anda tetap sehat dan indah.', 'Jiva Amla Shampoo, 200 ml', 'Jiva Amla Shampoo, 200 ml.jpeg', 98, 17500),
(35, 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle', 'Sri Sri', 'self-care', 'Sri Sri Tattva Neem & Lemon Flavored Kleanup Hand Wash dirancang untuk membunuh kuman dan memberikan perawatan lembut serta pelembab pada tangan. Mengandung ekstrak Neem, Lemon dan Ushira yang melindungi kulit Anda dan meninggalkan keharuman yang menyegarkan setelah digunakan. Neem diketahui memiliki sifat antibakteri dan anti-inflamasi yang membantu menjauhkan kuman dan infeksi dari kulit. Lemon menambah kesegaran dan meningkatkan hidrasi kulit, sedangkan Ushira memiliki efek menenangkan dengan aroma yang menenangkan. Jaga kebersihan diri dan tetap terlindungi dengan tiga kekuatan bahan alami yang lembut di kulit dan keras terhadap kuman.', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle.jpeg', 47, 17100),
(36, 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml', 'Sri Sri', 'self-care', 'Dapatkan perlindungan efektif dari kuman dan mikroba dengan sentuhan alam yang menjaga tangan Anda tetap lembut dan lembab. Sri Sri Tattva Swaccha Rose Flavored Hand Sanitiser diformulasikan dengan bahan-bahan alami -Neem, Aloe Vera, dan Ushira- yang lembut di tangan dan tangguh terhadap kuman. Jaga tangan Anda bebas kuman dengan ramuan herbal yang bergizi dan harum.', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml.jpeg', 45, 6500),
(37, 'Kamasutra Urge Men Deodorant Spray, 150 ml', 'Kamasutra', 'self-care', 'Deodoran Kamasutra hadir dengan formula menarik yang membuat Anda menonjol di tengah keramaian', 'Kamasutra Urge Men Deodorant Spray, 150 ml', 'Kamasutra Urge Men Deodorant Spray, 150 ml.jpeg', 43, 10500),
(38, 'Himalaya Geriforte Syrup 200 ml', 'Himalaya', 'obat', 'Bahan-bahan alami dalam Geriforte bekerja secara sinergis untuk mencegah kerusakan oksidatif akibat radikal bebas pada berbagai organ.', 'Himalaya Geriforte Syrup 200 ml', 'Himalaya Geriforte Syrup 200 ml.jpeg', 46, 12500),
(43, 'Eno Regular Flavoured Powder, 5 gm', 'Eno', 'obat', 'Eno membantu menetralkan asam di perut Anda. Ini mulai bekerja dalam 6 detik.', 'Eno Regular Flavoured Powder, 5 gm', 'Eno Regular Flavoured Powder, 5 gm.jpeg', 46, 19000),
(44, 'Benadryl Cough Formula Syrup 150 ml', 'Benadryl', 'obat', 'Sirup Benadryl digunakan dalam pengobatan batuk, dan juga meredakan gejala alergi seperti pilek, hidung tersumbat, bersin, mata berair dan hidung tersumbat atau tersumbat.', 'Benadryl Cough Formula Syrup 150 ml', 'Benadryl Cough Formula Syrup 150 ml.jpeg', 45, 11500),
(45, 'Zinda Tilismath Unani Medicine, 5 ml', 'Zinda', 'obat', 'Zinda Tirismath adalah obat herbal 100% yang digunakan untuk mengobati berbagai penyakit umum seperti pilek, batuk, dan banyak lagi.', 'Zinda Tilismath Unani Medicine, 5 ml', 'Zinda Tilismath Unani Medicine, 5 ml.jpeg', 46, 119000),
(46, 'Dee Snor Anti Snoring Syrup 100 ml', 'Dee Snor', 'obat', 'Dee Snor adalah Sirup Anti Mendengkur terbaik yang tidak hanya mengontrol dengkuran tetapi juga meredakan Asma. Ini mengandung 100% bahan Alami dan Herbal seperti Kantakari, Vasa, Madu, Triphala, Aswagandha dan Sankabhasma dll. Produk tanpa efek samping. Petunjuk Penggunaan: Minum 10ml setiap hari (tanpa diencerkan dengan air) 30 menit sebelum tidur selama 60 hari.', 'Dee Snor Anti Snoring Syrup 100 ml', 'Dee Snor Anti Snoring Syrup 100 ml.jpeg', 45, 17400),
(47, 'Himalaya Himplasia, 30 Tablets', 'Himalaya', 'obat', 'Himalaya Himplasia Tablet is a formulation that promotes optimum prostate health, urogenital function, bladder function, and reproductive function. Himplasia is a non-hormonal herbal blend that helps maintain a healthy prostate and an effective reproductive function.', 'Himalaya Himplasia, 30 Tablets', 'Himalaya Himplasia, 30 Tablets.jpeg', 46, 25000),
(48, 'Himalaya Punarnava, 60 Capsules', 'Himalaya', 'obat', 'It is an ayurvedic medicine, containing punarnava as an active ingredient that helps to support the urinary system, protect the kidney, soothe and calm the urinary tract.', 'Himalaya Punarnava, 60 Capsules', 'Himalaya Punarnava, 60 Capsules.jpeg', 48, 35000),
(49, 'Himalaya Diabecon DS ,60 Tablets', 'Himalaya', '0bat', 'Himalaya diabecon DS tablet helps in the management of diabetes. It is a formulation of an ayurvedic medicine, which has antidiabetic properties. Gymnema, Indian kino tree, shilajeet plays a vital role.', 'Himalaya Diabecon DS ,60 Tablets', 'Himalaya Diabecon DS ,60 Tablets.jpeg', 42, 35000),
(50, 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit', 'Mylab', 'obat', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit is designed to assist you in taking a safe rapid antigen test easily at the comfort of your home. Get your and your family’s immediate COVID-19-19 Rapid Antigen test done quickly and hassle-free with this self-assessing kit. Now you can get tested for COVID-19 in just 15 minutes with this test kit.', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit.jpeg', 46, 40000),
(51, 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets', 'ABBOTT', 'obat', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets belongs to a class of medicines called nutritional supplements used to prevent and treat nutritional deficiencies and vitamin C deficiency. A nutritional deficiency occurs when the body does not absorb or get enough nutrients from food. Vitamins and minerals are necessary for body development and the prevention of diseases.', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets.jpeg', 46, 20000),
(52, 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules', 'PRO', 'obat', 'GNC PRO Performance L-Carnitine delivers 500 mg of important nutrients in each serving which helps in weight loss and facilitates muscle recovery. L-carnitine is a non-essential amino acid that can be synthesized in the body. Now get your daily dose of this essential nutrient and improve muscle growth and recovery as you consume these capsules.', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules.jpeg', 58, 10490),
(57, 'Bisoprolol Fumarate 5mg Tablet Novell (per Tablet)', 'Novell', 'obat', 'Bisoprolol Fumarate Novell adalah obat generik yang mengandung zat aktif Bisoprolol Fumarate dan digunakan untuk mengatasi hipertensi, angina pektoris akibat arteriosklerosis koroner, serangan jantung, dan penyakit gangguan kardiovaskular lainnya. Bisoprolol Fumarate termasuk golongan beta blocker yang bekerja dengan cara menghalangi respons dari stimulasi beta –adrenergik dan memiliki aktivitas sebagai antagonis reseptor beta1 selektif (kardioselektif) pada dosis rendah.', 'Bisoprolol Fumarate 5mg Tablet Novell (per Tablet)', 'Bisoprolol.jpg', 17, 10000),
(59, 'Abbotic 500mg Tablet (per Tablet)', 'Abbotic', 'obat', 'Abbotic 500mg merupakan antibiotik yang digunakan untuk mengatasi infeksi pada saluran nafas, kulit, dan otitis media. Beli Abbotic 500mg tablet di K24klik.com dan dapatkan manfaatnya.', 'antibiotik , anti infeksi , infeksi , otitis media , infeksi kulit , infeksi saluran nafas', 'abbotic.jpg', 19, 46000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_quantity` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_total` int(11) NOT NULL,
  `payment_status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `order_quantity`, `order_date`, `order_status`, `order_total`, `payment_status`) VALUES
(296, 19, 55, 1, '2023-12-11', 1, 1492, 1),
(297, 31, 55, 1, '2023-12-11', 0, 65, 1),
(298, 44, 55, 1, '2023-12-11', 1, 115, 1),
(299, 52, 55, 1, '2023-12-11', 1, 1049, 1),
(300, 21, 55, 2, '2023-12-11', 0, 2642, 0),
(301, 30, 55, 1, '2023-12-11', 0, 563, 1),
(302, 37, 55, 1, '2023-12-11', 0, 105, 0),
(303, 37, 62, 1, '2023-12-11', 0, 105, 0),
(304, 23, 88, 1, '2023-12-12', 0, 275000, 0),
(305, 31, 88, 1, '2023-12-12', 0, 65000, 0),
(306, 31, 88, 1, '2023-12-12', 0, 65000, 1),
(307, 59, 88, 1, '2023-12-12', 0, 46000, 0),
(308, 35, 88, 1, '2023-12-12', 0, 17100, 0),
(309, 18, 88, 1, '2023-12-12', 0, 17590, 0),
(310, 57, 88, 1, '2023-12-12', 0, 10000, 0),
(311, 29, 88, 1, '2023-12-12', 0, 43500, 0),
(312, 29, 88, 1, '2023-12-12', 0, 43500, 0),
(313, 43, 88, 1, '2023-12-12', 0, 19000, 1),
(314, 23, 88, 1, '2023-12-12', 0, 275000, 0),
(315, 49, 88, 1, '2023-12-12', 0, 35000, 0),
(316, 49, 55, 1, '2023-12-12', 0, 35000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(5) NOT NULL,
  `order_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `order_id`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`, `user_id`) VALUES
(14, 292, 'Sumitra Adriansyah', 'BRI', 152, '2023-12-10', '20231210215235Accu-Chek Softclix Lancing Device.jpeg', 0),
(15, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210215328Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(16, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210221916Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(17, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210221916Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(18, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210222059Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(19, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210222059Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(20, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210222122bg_1.jpg', 0),
(21, 263, 'Sumitra Adriansyah', 'BRI', 105, '2023-12-10', '20231210222122bg_1.jpg', 0),
(22, 268, 'Sumitra Adriansyah', 'BRI', 174, '2023-12-10', '20231210222235Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(23, 268, 'Sumitra Adriansyah', 'BRI', 174, '2023-12-10', '20231210222235Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(24, 283, 'Akulaku', 'BSI', 1759, '2023-12-10', '20231210222429amazon-pay.png', 0),
(25, 283, 'Akulaku', 'BSI', 1759, '2023-12-10', '20231210222429amazon-pay.png', 0),
(26, 288, 'Cinta', 'BCA', 435, '2023-12-10', '20231210223126Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(27, 288, 'Cinta', 'BCA', 435, '2023-12-10', '20231210223126Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(28, 297, 'Cinta', 'BCA', 435, '2023-12-11', '20231211025856Dee Snor Anti Snoring Syrup 100 ml.jpeg', 0),
(29, 297, 'Cinta', 'BCA', 435, '2023-12-11', '20231211025856Dee Snor Anti Snoring Syrup 100 ml.jpeg', 0),
(30, 298, 'Cinta', 'BSI', 115, '2023-12-11', '20231211031613bg_1.jpg', 0),
(31, 298, 'Cinta', 'BSI', 115, '2023-12-11', '20231211031613bg_1.jpg', 0),
(32, 297, 'Sumitra', 'BSI', 65, '2023-12-11', '20231211031845bg_1.jpg', 0),
(33, 297, 'Sumitra', 'BSI', 65, '2023-12-11', '20231211032358bg_1.jpg', 0),
(34, 297, 'Sumitra Adriansyah', 'BCA', 65, '2023-12-11', '20231211032425Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(35, 299, 'Sumitra', 'BCA', 1049, '2023-12-11', '20231211033029Apollo Pharmacy Digital Flexible Thermometer.jpeg', 0),
(36, 298, 'Cinta', 'BSI', 115, '2023-12-11', '20231211033404Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(37, 296, 'Cinta', 'BSI', 115, '2023-12-11', '20231211080556Benadryl Cough Formula Syrup 150 ml.jpeg', 0),
(38, 297, 'Akulaku', 'BCA', 65, '2023-12-11', '202312111153031.gif', 0),
(39, 301, 'Sumitra Adriansyah', 'BCA', 563, '2023-12-11', '20231211115856Himalaya Himplasia, 30 Tablets.jpeg', 0),
(40, 306, 'Cinta', 'BCA', 65000, '2023-12-12', '20231212084805cari.png', 0),
(41, 313, 'Sumitra Adriansyah', 'BCA', 65000, '2023-12-12', '20231212100624edit.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_id` int(3) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `nohp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_lname`, `email`, `user_password`, `user_id`, `user_fname`, `user_address`, `city`, `nohp`) VALUES
('user', 'user@gmail.com', 'user', 55, 'user', 'Kp. Lio, RT.01/RW.08, Desa Jamali, Kec. Mande, Kab. Cianjur-43682, Jawa Barat', '', 0),
('Sudirman', 'kaniaa@gmail.com', '5Kalinda', 62, 'Kania', 'Jl. A.H. Nasution No. 105A, Cibiru, Bandung, Jawa Barat, Indonesia-40614', '', 0),
('Adriansyah', 'adriansyahsumitra@gmail.com', 'sumitra123', 87, 'Sumitra', 'Jl. A.H. Nasution No. 105A, Cibiru, Bandung, Jawa Barat, Indonesia-40614', '', 0),
('Hidayat', 'adrianhidayat@gmail.com', 'adrian1234', 88, 'Adrian', 'Jl. A.H. Nasution No. 105A, Cibiru, Bandung, Jawa Barat, Indonesia-40614', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
