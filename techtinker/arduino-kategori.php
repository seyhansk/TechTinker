<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Kayıt İşlemi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
     <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #FBF2ED;
        }
       
        #filtreleme h5 {
            margin-top: 20px;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        #filtreleme .col-md-6 {
            transition: transform 2s;
            
        }

        #filtreleme .form-control {
            width: 100%;
            text-align: center;
           
        }

        
    </style>
</head>
<body>
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
                    <a class="nav-link" href="deneme.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kayit.php">Kayıt Ol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Giriş Yap</a>
                </li>
                <!-- Kategori Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategoriler
                    </a>
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
                    <a class="nav-link dropdown-toggle" href="sepet.php" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sepetiniz
                    </a>
                </div>
        <form class="d-flex me-3">
        <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search" style="margin-left: 20px;">
        <button class="btn btn-outline-primary" type="submit">Ara</button>
        </form>
        </div>
        </div>
        </div>
        </nav>
    <div id="banner2-container">
    <img src="resimler/set2.gif" alt="Banner3 Görseli" style="margin-top: 100px;">
    </div>

     <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <div id="filtreleme" class="col-md-6">
    <h5>Ürün Filtrele</h5>
    <form id="filters">
        <div class="mb-3">
            <label for="priceRange" class="form-label">Fiyat Aralığı:</label>
            <input type="range" class="form-range" min="0" max="10000" id="priceRange">
            <span id="priceOutput">0</span>₺ - <span id="priceOutputMax">10000</span>₺
        </div>
        <button id="filterBtn" type="button" class="btn btn-primary" style=" margin-bottom: 70px;">Filtrele</button>
    </form>
    </div>
    </div>
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
$sql = "SELECT id, product_name, price, img_url FROM shopping_cart WHERE category = 'arduino'";
$result = $conn->query($sql);
?>

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

    <script>
        $(document).ready(function () {
            // Fiyat Aralığı Değişiminde Listeyi Filtrele
            $('#priceRange').on('input', function () {
                var min = $(this).val();
                var max = $(this).attr('max');
                $('#priceOutput').text(min);
                $('#priceOutputMax').text(max);
            });

            // Filtrele Butonuna Tıklama
            $('#filterBtn').on('click', function() {
                var min = $('#priceRange').val();
                var max = $('#priceRange').attr('max');
                filterProductsByPrice(min, max);
            });

            // Fiyata Göre Ürünleri Filtrele
            function filterProductsByPrice(minPrice, maxPrice) {
                $('.product').each(function () {
                    var price = parseInt($(this).data('price'));
                    if (price >= minPrice && price <= maxPrice) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>

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
            <li><a href="deneme.php" class="footer-link text-white">Anasayfa</a></li><br>
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
