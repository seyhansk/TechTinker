<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Üye Kayıt İşlemi</title>
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
</head>
<body>
    <style>
        body {
    background-color: #fbf2ed;
    z-index: 0;
    }
    </style>  
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="cart-content" style="display: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="resimler/pngwing.com.png" alt="" width="30px" height="30px">
                        </a>
                    </li>
                </ul>
            </div>
             <div class="shopping-cart position-relative">

          <button type="button" class="btn-cart btn btn-primary position-relative">
    <i class="fas fa-shopping-cart"></i>
    <span id="item-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
    </button>


          <div class="shopping-cart-list bg-primary d-none">
            <b class="fs-5 text-white my-3">Shopping Cart</b>
          </div>
        </div>
    </div>
</nav>
<style>
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


        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-4">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5 product" data-price="120">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="arduino-r3.php"><img class="card-img-top" src="resimler/arduino-uno-r3-klon.jpg" alt="arduino-uno" /></a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="arduino-r3.php" style="text-decoration: none; color: inherit;">
                                    <h5 class="fw-bolder link-hover">Arduino UNO R3 Klon</h5>
                                </a>

                                <div class="d-flex justify-content-center small text-warning mb-2">
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
                                    href="">Sepete Ekle</a></div>
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
                                        <h5 class="fw-bolder link-hover">Arduino Nano</h5>
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
                                    <span>90₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product"  data-price="330">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/arduino-motor-surucu-shield-ardu.jpg" alt="arduino-motor-surucu" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Arduino Motor Sürücü Shield</h5>
                                    </a>

                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">76,87₺</span>
                                    <span>64,06₺</span>
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
                                        <h5 class="fw-bolder link-hover">Arduino Mega</h5>
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
                                    <span>380₺</span>
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
                                    <span>110₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product"  data-price="65">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/rj45-ethernet-to-rs232-ttl-donus.jpg" alt="arduino-rj45" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">RJ45 Ethernet Modülü</h5>
                                    </a>


                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">70₺</span>
                                    <span>65₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product"  data-price="70">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/pr_01_187.jpg" alt="arduino-tb66" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">TB6612FNG Çift Motor Sürücü Devresi</h5>
                                    </a>

                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">80₺</span>
                                    <span>70₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5 product"  data-price="100">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/pr_01_1572.hpg.jpg" alt="arduino-dcmotor" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">12V 3000 Rpm DC Motor</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">110₺</span>
                                    <span>100₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                     <div class="col mb-5 product"  data-price="335">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/28-arduino-dokunmatik-lcd-shield.jpg" alt="arduino-lcdekran" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">WaveShare 2.8 Inch Arduino Dokunmatik LCD Shield'i</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">350₺</span>
                                    <span>335₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                     <div class="col mb-5 product"  data-price="190">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/qtr-8rc-kizilotesi-sensor-31407-.jpg" alt="arduino-kizilotesi" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">QTR-8RC Kızılötesi Sensör - PL-961</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">200₺</span>
                                    <span>190₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                     <div class="col mb-5 product" data-price="1.862,36">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/arduino-due-33v-klon-usb-kablo-d.jpg" alt="arduino-due" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">Arduino Due 3.3V (Klon)</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">2.234,83₺</span>
                                    <span>1.862,36₺</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                            </div>
                        </div>
                    </div>
                     <div class="col mb-5 product" data-price="45">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="resimler/hc-sr04-ultrasonik-mesafe-sensor.jpg" alt="arduino-usensor" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                        <h5 class="fw-bolder link-hover">HC-SR04 Ultrasonik Mesafe Sensörü</h5>
                                    </a>
                                
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">60₺</span>
                                    <span>45₺</span>
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
        
        <div id="banner2-container">
    <img src="resimler/set1.gif" alt="Banner3 Görseli">
    </div>

                         
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5 product" data-price="985,65">
                    <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="resimler/arduino-baslangic-seti-b476.jpg" alt="arduino-uno-kit" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                <h5 class="fw-bolder link-hover">Arduino Başlangıç Seti Uno Rev3 (Klon) </h5>
                            </a>
                            
                            <div class="d-flex justify-content-center small text-warning mb-2"><br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">1.269,00₺</span>
                            <span>985,65₺</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                    </div>
                </div>
                
            </div>
            <div class="col mb-5 product" data-price="1980,25">
                    <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="resimler/arduino-mega-proje-gelistirme-ki.jpg" alt="arduino-mega-kit" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                <h5 class="fw-bolder link-hover">Arduino Mega Proje Geliştirme Kiti</h5>
                            </a>
                            
                            <div class="d-flex justify-content-center small text-warning mb-2"><br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">2.030,41</span>
                            <span>1980,25₺</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                    </div>
                </div>
                
            </div>
            <div class="col mb-5 product" data-price="1600,85">
                    <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="resimler/arduino-ile-robotik-kodlama-teme.jpg" alt="arduino-temel-set" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                <h5 class="fw-bolder link-hover">Arduino ile Robotik Kodlama Temel Seviye Seti</h5>
                            </a>
                            
                            <div class="d-flex justify-content-center small text-warning mb-2"><br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">1.749,24₺</span>
                            <span>1600,85₺</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-5 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto add-to-cart" href="#">Sepete Ekle</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5 product" data-price="1200">
                    <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="resimler/arduino-bluetooth-robot-kiti-398.jpg" alt="arduino-robot-kit" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="hedef_url" style="text-decoration: none; color: inherit;">
                                <h5 class="fw-bolder link-hover">REX Discovery Serisi 4WD Arduino Araba Kiti - Bluetooth Robot Araç Seti</h5>
                            </a>
                            
                            <div class="d-flex justify-content-center small text-warning mb-2"><br>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">1.229,35₺</span>
                            <span>1200₺</span>
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
</section>

   

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
