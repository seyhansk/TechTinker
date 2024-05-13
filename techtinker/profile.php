<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Üye Kayıt İşlemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: #7AB3BF;
    }
</style>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light navbar-fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mt-2 mt-lg-0 order-0 order-md-0" href="#">
            <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
        </a>
        <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse order-2" id="navbarSupportedContent">
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
            </ul>
            <div class="d-flex align-items-center">
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

</body>

</html>
<?php

session_start();
if (isset($_SESSION["kullanici_adi"])) {
    echo "<h5>" . $_SESSION["kullanici_adi"] . " HOŞGELDİN</h3>";
    echo "<h5>" . $_SESSION["email"] . "</h3>";
    echo "<a href = 'cikis.php' style='color:red; background-color:yellow; border:1px; solid red; padding:5px 5px;'>ÇIKIŞ YAP</a>";
} else {
    echo "Bu sayfayı görüntüleme yetkiniz yoktur";
}
?>