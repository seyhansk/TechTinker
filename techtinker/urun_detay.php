<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alışveriş Sepeti</title>
 <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
     <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .product-card {
      border: none; /* Kartın kenarlığını kaldır */
    }
    
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.shopping-cart-list{
    position: absolute;
    width: 25rem;
    right: -0.75rem;
    top: 2.9rem;
    padding: 1rem;
    z-index: 1;
}

.shopping-cart-list .list-item{
    margin-top: 1rem;
}

  </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="deneme.php">Anasayfa</a></li>
                <li class="nav-item"><a class="nav-link" href="kayit.php">Kayıt Ol</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Giriş Yap</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="arduino-kategori.php">Arduino</a></li>
                        <li><a class="dropdown-item" href="raspberry-kategori.php">Raspberry Pi</a></li>
                        <li><a class="dropdown-item" href="elektronik-kart-kategori.php">Elektronik Kart</a></li>
                        <li><a class="dropdown-item" href="motor-kategori.php">Motor</a></li>
                        <li><a class="dropdown-item" href="sensor-kategori.php">Sensör</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="blog.html">TechTinker Blog</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="sepet.php" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sepetiniz</a>
                </div>
                <form class="d-flex me-3">
                    <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search" style="margin-left: 20px;">
                    <button class="btn btn-outline-primary" type="submit">Ara</button>
                </form>
            </div>
        </div>
    </div>
</nav>
<style>
    .card img {
        max-width: 100%; /* Resmin maksimum genişliği ekrana sığacak şekilde ayarlanacak */
        height: auto; /* Yükseklik otomatik olarak ayarlanacak, orijinal oranı koruyacak */
    }
    .lead{
        width: 450px;
    }
</style>

<br><br><br>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                var navbarToggler = document.querySelector(".navbar-toggler");
                var navbarMenu = document.querySelector(".navbar-collapse");
                navbarToggler.addEventListener("click", function () {
                    navbarMenu.classList.toggle("show");
                });
                var kategoriDropdown = document.querySelector('.nav-item.dropdown');
                kategoriDropdown.addEventListener('click', function () {
                    var dropdownMenu = kategoriDropdown.querySelector('.dropdown-menu');
                    dropdownMenu.classList.toggle('show');
                });
                });
            </script>
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $sql = "SELECT product_name, price, img_url, description FROM shopping_cart WHERE id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row["product_name"];
        $price = $row["price"];
        $img_url = $row["img_url"];
        $description = $row["description"]; // Yeni eklenen satır
        
        echo '
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-5">
                        <img class="card-img-top mb-5 mb-md-0 mt-5" src="resimler/' . $img_url . '" alt="' . $product_name . '" style="width: 500px; height: 400px;" />
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">' . $product_name . '</h1>
                        <div class="fs-5 mb-5">
                            <span>Fiyat: ' . $price . '₺</span>
                        </div>
                        <p class="lead">' . $description . '</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Sepete Ekle
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        ';
    } else {
        echo "Ürün bulunamadı";
    }
} else {
    echo "Ürün ID'si belirtilmedi";
}
$conn->close();
?>
     
     <div class="container" style="text-align: center; margin-top: 150px;">
    <h3 class="fw-bolder link-hover">İlginizi Çekebilecek Diğer Ürünler</h3>
    </div>
<?php

// Veritabanı bağlantısı
$servername = "localhost";
$dbname = "shopping";

$conn = new mysqli($servername, "root", "", $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Ürünleri sorgula
$sql = "SELECT id, product_name, price, img_url FROM shopping_cart WHERE category = 'urun_detay'";
$result = $conn->query($sql);
?>

    <div class="container px-4 px-lg-5 mt-5">
    <div class="row justify-content-center">

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen ürün bilgilerini al
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];

    // Eğer sepette bir ürün listesi yoksa, yeni bir dizi oluştur
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Yeni eklenen ürünü sepete ekle
    $item = array("productName" => $productName, "price" => $price);
    array_push($_SESSION["cart"], $item);
    }
    
    if ($result->num_rows > 0) {
    // Her bir ürün için kart oluştur
    while($row = $result->fetch_assoc()) {
    // Resmin tam yolunu oluştur
    $img_path = "resimler/" . $row["img_url"];
    echo '<div class="col-md-3 mb-5 product" data-price="'.$row["price"].'">
            <div class="card h-100 ">
                <!-- Product image-->
                <a href="urun_detay.php?product_id='.$row["id"].'"><img class="card-img-top" src="'.$img_path.'" name="'.$row["product_name"].'" /></a> <!-- Ürün detay sayfasına yönlendir -->
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <a href="urun_detay.php?product_id='.$row["id"].'" style="text-decoration: none; color: inherit;">
                        <h5 class="fw-bolder link-hover">'.$row["product_name"].'</h5>
                        </a>
                        <!-- Product price-->
                        <span>'.$row["price"].'₺</span>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <button class="btn btn-outline-dark mt-auto add-to-cart" data-product="'.$row["product_name"].'" data-price="'.$row["price"].'">Sepete Ekle</button>
                        <button class="btn btn-secondary btn-sm" onclick="incrementItem(\''.$row["product_name"].'\')">+</button>
                        <button class="btn btn-secondary btn-sm" onclick="decrementItem(\''.$row["product_name"].'\')">-</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    } else {
    echo "0 sonuç";
    }

    $conn->close();
    ?>
    </div>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <!-- Hakkımızda -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <a href=""><h5 class="text-uppercase mb-4">Hakkımızda</h5></a>
                <p class="text-white">TechTinker, elektronik ve teknoloji alanındaki son trendleri ve ürünleri takip eden bir platformdur. Amacımız, teknoloji tutkunlarına en yeni ürünleri sunmak ve bilgiyi paylaşmaktır.</p>
            </div>
            <!-- İletişim -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <a href="#"><h5 class="text-uppercase mb-4">İletişim</h5></a>
         <p class="text-white">E-posta: info@techtinker.com</p>
        <p class="text-white">Telefon: 555-555-5555</p>
        <p class="text-white">Adres: Teknoloji Cad. No: 123, İstanbul, Türkiye</p>
        <ul class="list-unstyled mb-0">
        <li><a href="kayit.php" class="footer-link text-white">Yeni Üyelik</a></li><br>
        <li><a href="login.php" class="footer-link text-white">Üye Girişi</a></li><br>
        <li><a href="sifremi-unuttum.php" class="footer-link text-white">Şifremi Unuttum</a></li><br>
        <li><a href="iletisim.php" class="footer-link text-white">İletişim Formu</a></li>
        </ul>
        </div>

            <!-- Alışveriş -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <a href="#"><h5 class="text-uppercase mb-4">Alışveriş</h5></a>
             <ul class="list-unstyled mb-0">
            <li><a href="anasayfa.php" class="footer-link text-white">Anasayfa</a></li><br>
             <li><a href="kayit.php" class="footer-link text-white">Kayıt Ol</a></li><br>
             <li><a href="login.php" class="footer-link text-white">Giriş Yap</a></li><br>
            <li><a href="blog.html" class="footer-link text-white">TechTinker Blog</a></li>
            </ul>
            </div>

        </div>
        <p class="m-0 text-center text-white mt-5">Copyright &copy; TechTinker 2024</p>
    </div>
    
</footer>
</body>
</html>
