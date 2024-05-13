<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Üye Giriş İşlemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.logo {
        width: 35%;
        border-radius: 50%;
        transition-duration: 1s;

    }

    body {
        background-color: #7AB3BF;

    }

    img.logo:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        transition: all 1s;
    }

    .btn {
        width: 100px;
        height: 45px;
        font-weight: bold;
        background: #4a708b;
        color: white;
        cursor: default;
        border: solid 1px grey;
        transition: all 1s;
    }

    .btn:hover {
        background: white;
        color: #4a708b;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<nav class="navbar navbar-expand-md navbar-light bg-light navbar-fixed-top"><!--Navbar bileşenini oluşturur. 
navbar-expand-md sınıfı, orta boyutlu ve daha büyük cihazlarda navbar'ın tam boyutta genişlemesini sağlar.
navbar-light ve bg-light sınıfları, navbar'ın arka plan rengini ve yazı rengini belirler.
navbar-fixed-top, navbar'ın sayfanın üst kısmına sabitlenmesini sağlar.-->


    <div class="container-fluid"><!--Navbar içeriğini bir konteyner içine alır.
     Bu, navbar içindeki öğelerin düzenini ve sınırlarını kontrol etmek için kullanılır.-->

        <a class="navbar-brand mt-2 mt-lg-0 order-0 order-md-0" href="anasayfa.php"><!--logoya tıklanınca anasayfa.php ye yönlendirir.-->
            <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
        </a>
        <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!--Küçük ekranlarda menüyü açıp kapatmak için kullanılan bir toggle butonudur.
         navbar-toggler sınıfı, düğmenin stilini belirler. order sınıfları, flex öğelerinin sıralamasını belirler.
         data-bs-toggle, data-bs-target, aria-controls, aria-expanded ve aria-label öznitelikleri
         navbar'ın açılıp kapanması için gerekli Bootstrap özelliklerini sağlar.-->
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse order-2" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--<ul class="navbar-nav me-auto mb-2 mb-lg-0">: Navbar'daki menü öğelerini içeren bir liste. 
                navbar-nav sınıfı, menü öğelerini düzenler.
                me-auto sınıfı, menüyü sağa yaslar. mb-2 ve mb-lg-0 sınıfları, üst ve alt boşlukları kontrol eder.-->
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
        </div>
</nav>

<?php
include("baglanti.php"); //baglanti.php sayfasını dahil eder.

$username_err = "";
$parola_err = "";


if (isset($_POST["giris"])) { /*Bu satır, formun giriş butonuna basıldığını kontrol eder. 
    Eğer form gönderildiyse (giris adında bir POST değişkeni varsa), içerideki kodlar çalışır.*/


    // Kullanıcı adı doğrulaması
    /*Kullanıcı form alanına bir kullanıcı adı girdi mi diye kontrol edilir. 
        Eğer kullanıcı adı boşsa, $username_err adlı bir değişkene "Kullanıcı Adı boş geçilemez." mesajı atanır. 
        Aksi takdirde, girilen kullanıcı adı $username değişkenine atanır.*/
    if (empty($_POST["kullaniciadi"])) {
        $username_err = "Kullanıcı Adı boş geçilemez.";
    } else {
        $username = $_POST["kullaniciadi"]; // Kullanıcı adını değişkene atayın
    }

    // Parola doğrulaması: 
    /*Parola doğrulaması: Parola alanı boş mu diye kontrol edilir. 
    Eğer parola boşsa, $parola_err adlı bir değişkene "Parola boş geçilemez." mesajı atanır. 
    Aksi takdirde, girilen parola $parola değişkenine atanır.*/
    if (empty($_POST["parola"])) {
        $parola_err = "Parola boş geçilemez.";
    } else {
        $parola = $_POST["parola"]; // Parolayı değişkene atayın
    }


    /*Kullanıcı adı ve parola varsa: Bu adımda, kullanıcı adı ve parolanın girilip girilmediği kontrol edilir. 
    Eğer her ikisi de girilmişse, veritabanından kullanıcı adına göre ilgili kaydı seçmek için bir SQL sorgusu çalıştırılır.*/
    if (isset($username) && isset($parola)) {
        $secim = "SELECT * FROM kullanicilar WHERE BINARY kullanici_adi = '$username'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir); //0 veya 1


        /*Kullanıcı kaydı var mı kontrolü: 
        SQL sorgusu sonucunda, kullanıcı adına göre kayıt bulunursa 
        ($kayitsayisi 1'den büyükse), ilgili kullanıcının şifresi alınır ve girilen parola ile karşılaştırılır.
         Eğer parola doğru ise, oturum başlatılır (session_start()), kullanıcı bilgileri oturum değişkenlerine atanır
        ($_SESSION["kullanici_adi"] ve $_SESSION["email"]), ve kullanıcı profil sayfasına yönlendirilir (header("location:profile.php")).
         Eğer parola yanlış ise, bir hata mesajı gösterilir.*/
        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre = $ilgilikayit["parola"];
            if (password_verify($parola, $hashlisifre)) {
                session_start();
                $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
                $_SESSION["email"] = $ilgilikayit["email"];
                header("location:profile.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">
                Parola yanlış.
               </div>';
            }

            /*Kullanıcı kaydı yoksa: Eğer kullanıcı adına göre kayıt bulunamazsa ($kayitsayisi 0 ise)
                 kullanıcı adının yanlış olduğunu belirten bir hata mesajı gösterilir.*/
        } else {
            echo '<div class="alert alert-danger" role="alert">
         Kullanıcı adı yanlış.
        </div>';
        }

        //Veritabanı bağlantısı kapatılır: İşlemler tamamlandıktan sonra, veritabanı bağlantısı kapatılır.
        mysqli_close($baglanti);
    }
}

?>
<!--PHP BİTİŞ-->


<!--HTML BAŞLANGICI-->

<div class="container p-5"> <!--container: Bootstrap tarafından sağlanan bir bileşendir ve içerisindeki öğeleri düzenlemek için kullanılır.-->

    <div class="row justify-content-center"><!--row justify-content-center: Bootstrap tarafından sağlanan bir 
    bileşendir ve içerisindeki öğeleri yatayda merkeze hizalamak için kullanılır.-->

        <div class="col-xl-6 col-md-8 col-sm-12"><!--col-xl-6 col-md-8 col-sm-12: Bootstrap tarafından sağlanan bir bileşendir ve ekran boyutlarına göre sıralı düzenleme yapar. 
        Büyük ekranlarda 6 sütun, orta boy ekranlarda 8 sütun ve küçük ekranlarda 12 sütun genişliğinde yer alır.-->

            <div class="card p-5"><!--card p-5: Bootstrap tarafından sağlanan bir bileşendir ve içeriğini bir kart şeklinde gösterir.
              p-5 sınıfı, kartın içerikten kenarlara olan uzaklığını belirler.-->

                <div class="imgcontainer pb-4"><!--imgcontainer pb-4: Bir resmin bulunduğu bir bölgedir. 
                pb-4 sınıfı, resmin altındaki boşluğun büyüklüğünü belirler.-->

                    <img src="resimler/logo2.png" alt="Avatar" class="logo">
                </div>

                <div class="embed-responsive embed-responsive-16by9">

                    <form action="login.php" method="POST"><!--form action="login.php" method="POST": Formun işlem yapacağı dosya ve işlem türünü belirtir. 
                    Bu form, kullanıcı girişi için tasarlanmıştır ve bilgiler login.php dosyasına POST yöntemiyle gönderilir.-->

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control <?php if (!empty($username_err)) {
                                                                        echo "is-invalid";
                                                                    } ?>" name="kullaniciadi">
                            <div class="invalid-feedback"><!--invalid-feedback: Geçersiz giriş durumunda kullanıcıya hata mesajı
                             göstermek için kullanılan bir bileşendir. Php kısmında girdiğimiz username_err burada çalışır-->
                                <?php
                                echo $username_err;
                                ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Parola</label>
                            <input type="password" class="form-control <?php if (!empty($parola_err)) {
                                                                            echo "is-invalid";
                                                                        } ?>" name="parola">
                            <div class="invalid-feedback">
                                <?php
                                echo $parola_err; //"Kullanıcı Adı boş geçilemez."
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="sifremi-unuttum.php">Şifremi Unuttum</a><!--linke basıldığında sifremi-unuttum.php sayfasına yönlendirir.-->
                        </div>

                        <div class="mb-3 pb-3">
                            <span>Hesabın yok mu? <a href="kayit.php">Kayıt Ol</a></span><!--linke basıldığında kayit.php sayfasına yönlendirir.-->
                        </div>
                        <button type="submit" class="btn btn-primary" name="giris">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>