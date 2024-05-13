<?php
session_start();
// Veritabanı bağlantısı
$servername = "localhost";
$dbname = "shopping";

$conn = new mysqli($servername, "root", "", $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Ürünleri sorgula
$sql = "SELECT id, product_name, price, img_url FROM shopping_cart WHERE category = 'Anasayfa'";
$result = $conn->query($sql);
// Ürünü sepete ekle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = "INSERT INTO sepet (id) VALUES ('id')";
    if (mysqli_query($conn, $sql)) {
        echo "Ürün sepete eklendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
 
    <style>
         body {
    background-color: #fbf2ed;
    z-index: 0;
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

 .dropdown-menu-left {
    left: auto;
    right: 0;
    }

.dropdown-menu .dropdown-item {
    padding: 10px 10px; /* Ürünler arasındaki boşluğu artırmak için */
}

.dropdown-menu .dropdown-item .btn-danger {
    margin-top: 5px; /* "Sil" butonlarının üst boşluğunu artırmak için */
    margin-left: 10px;
}
   
</style>   

<div id="banner-container">
        <img src="resimler/1250x20-ince-banner-1-tr.jpg" alt="Banner Görseli">
    </div>
    
    <div id="carousel-container" class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <img src="resimler/TECHTİNKER AYIN KAMPANYALARI.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item">
                    <img src="resimler/1.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item">
                    <img src="resimler/resim2.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
   
      <div id="banner2-container">
        <img src="resimler/çok satanlar.png" alt="Banner2 Görseli" style="margin-top: 40px;">
      </div>

<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="anasayfa.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kayit.php">Kayıt Ol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Giriş Yap</a>
                </li>
                <!-- Kategori Dropdown -->
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
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">TechTinker Blog</a>
                </li>
                <!-- /Kategori Dropdown -->
            </ul>
            <!-- Arama kutusu ve sepet -->
    <div class="d-flex align-items-center">
    <!-- Sepet içeriği dropdown menüsü -->
    <div class="nav-item dropdown">
       <button class="btn btn-outline-primary" type="submit">
    <i class="fas fa-shopping-cart"></i> 
    </button>



        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="cartDropdown">
            <h6 class="dropdown-header">Alışveriş Sepeti</h6>
            <div id="cart-items" class="dropdown-item"></div>
            <div class="dropdown-divider"></div>
            <button class="btn btn-danger dropdown-item" onclick="clearCart()">Sepeti Temizle</button>
            <a class="btn btn-primary dropdown-item" href="sepet.html">Sepete Git</a> <!-- Sepete Git butonu -->
        </div>
    </div>
    <form class="d-flex me-3">
    <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search" style="margin-left: 8px;">
    <button class="btn btn-outline-primary" type="submit">
        <i class="fas fa-search"></i> <!-- Font Awesome ikonunu ekleyin -->
    </button>
    </form>

    </div>

        </div>
    </div>
    </nav>
    
   
    
        <script>
        document.addEventListener("DOMContentLoaded", function () {
        var navbarToggler = document.querySelector(".navbar-toggler");
        var navbarMenu = document.querySelector(".navbar-collapse");

        navbarToggler.addEventListener("click", function () {
            navbarMenu.classList.toggle("show");
        });

        // Kategoriler dropdown'u için event ekleme
        var kategoriDropdown = document.querySelector('.nav-item.dropdown');
        kategoriDropdown.addEventListener('click', function () {
            var dropdownMenu = kategoriDropdown.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
        });
    });
</script>
    
    <div class="container px-4 px-lg-5 mt-4">
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
    $item = array("product-name" => $product_name, "price" => $price);
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
                        <button class="btn btn-outline-dark mt-auto addToCart" data-product="'.$row["product_name"].'" data-price="'.$row["price"].'" onclick="addToCart('.$row["id"].', \''.$row["product_name"].'\', '.$row["price"].')">Sepete Ekle</button>
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
    <div id="container-fluid">
        <img src="resimler/footer-banner2.png" alt="Banner Görseli" style="margin-top: 50px;">
    </div>
     <!-- Footer -->
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
