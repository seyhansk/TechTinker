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

        @media (min-width: 768px) {
            #filtreleme .col-md-6 {
                max-width: 500px;
                margin: 0 auto;

            }
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
            <a class="navbar-brand" href="">
                <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategoriler
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="arduino-kategori.php">Arduino</a></li>
                            <li><a class="dropdown-item" href="#">Raspberry Pi</a></li>
                            <li><a class="dropdown-item" href="#">3D</a></li>
                            <li><a class="dropdown-item" href="#">Eğitici Setler</a></li>
                            <li><a class="dropdown-item" href="#">Çocuklar İçin</a></li>
                            <li><a class="dropdown-item" href="#">Geliştirme Kartı</a></li>
                            <li><a class="dropdown-item" href="#">Elektronik Kart</a></li>
                            <li><a class="dropdown-item" href="#">Motor</a></li>
                            <li><a class="dropdown-item" href="#">Sensör</a></li>
                            <li><a class="dropdown-item" href="#">Güç Kaynağı - Batarya</a></li>
                            <li><a class="dropdown-item" href="#">Prototipleme / Lehimleme</a></li>
                            <li><a class="dropdown-item" href="#">Tekerlek</a></li>
                            <li><a class="dropdown-item" href="#">Araç - Gereç</a></li>
                            <li><a class="dropdown-item" href="#">Drone</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">TechTinker Blog</a>
                    </li>
                    <!-- /Kategori Dropdown -->
                </ul>
                <div class="d-flex align-items-center">
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Ara</button>
                    </form>
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart" id="cart-icon" style="cursor:pointer;"></i>
                        <span id="cart-counter" class="badge bg-secondary">0</span>
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="cart-content" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="resimler/pngwing.com.png" alt="" width="30px" height="30px">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = new mysqli($servername, "root", "", $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Ürünleri sorgula
$sql = "SELECT product_name, price, img_url FROM shopping_cart_arduino";
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
                    <a href="#"><img class="card-img-top" src="'.$img_path.'" name="'.$row["product_name"].'" /></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="#" style="text-decoration: none; color: inherit;">
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

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <div id="filtreleme" class="col-md-6">
    <h5>Ürün Filtreleme</h5>
    <form id="filters">
        <div class="mb-3">
            <label for="priceRange" class="form-label">Fiyat Aralığı:</label>
            <input type="range" class="form-range" min="0" max="10000" id="priceRange">
            <span id="priceOutput">0</span>₺ - <span id="priceOutputMax">10000</span>₺
        </div>
        <button id="filterBtn" type="button" class="btn btn-primary">Filtrele</button>
    </form>
    </div>
    </div>
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="productList">
                        <div class="col mb-5 product" data-price="120">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="arduino-r3.php"><img class="card-img-top" src="resimler/arduino-uno-r3-klon.jpg" alt="arduino-uno"/></a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="arduino-r3.php" style="text-decoration: none; color: inherit;">
                                    <h5 class="fw-bolder link-hover">Arduino UNO R3 Klon</h5>
                                </a>

                                <div class="d-flex justify-content-center small text-warning mt-2 mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                
                                    <span class="text-muted text-decoration-line-through">150₺</span>
                                    <span>120₺</span>
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart"
                                    href="#">Sepete Ekle</a></div>
                        </div>
                    </div>
                </div>
                        <div class="col mb-5 product"  data-price="90">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="resimler/arduino-nano-klon.jpg" alt="arduino-nano" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                            <h5 class="fw-bolder link-hover pb-4">Arduino Nano</h5>
                                        </a>


                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">100₺</span>
                                        90₺
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col mb-5 product"  data-price="380">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="resimler/arduino-mega-io-io-genisletme-se.jpg" alt="arduino-mega" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                            <h5 class="fw-bolder link-hover pb-4">Arduino Mega</h5>
                                        </a>

                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">400</span>
                                        380₺
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5 product"  data-price="110">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="resimler/arduino-pro-mini-atmega328p-5v16.jpg" alt="arduino-promini" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                            <h5 class="fw-bolder link-hover">Arduino Pro Mini Atmega</h5>
                                        </a>

                                
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">130₺</span>
                                        110₺
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col mb-5 product" data-price="797,61">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/orjinal-arduino-uno-r3-yeni-vers.jpg" alt="arduino-orijinal" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Orijinal Arduino UNO R3</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">957,14₺</span>
                                    <span>797,61₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product" data-price="2795,15">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/orijinal-arduino-giga-r1-wifi-46.jpg" alt="arduino-orijinal-giga" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Orijinal Arduino Giga R1 Wifi</h5>
                                    </a>                               
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">3.354₺</span>
                                    <span>2.795,15₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col mb-5 product" data-price="1800,25">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/arduino-due-33v-klon-usb-kablo-d.jpg" alt="arduino-due" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Arduino Due 3.3V (Klon) </h5>
                                    </a>                               
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">2225,20₺</span>
                                    <span>1800,25₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product" data-price="998,78">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/orijinal-arduino-uno-r4-wifi-460.jpg" alt="arduino-wifi" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Orijinal Arduino Uno R4 WiFi</h5>
                                    </a>                               
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">1.198,54 ₺</span>
                                    <span>998,78₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </section>


    
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
    <!-- Footer-->
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
