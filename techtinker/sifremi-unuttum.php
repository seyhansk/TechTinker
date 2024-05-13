<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Sıfırlama</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            width: 150px;
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
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light navbar-fixed-top"><!--Navbar bileşenini oluşturur. 
navbar-expand-md sınıfı, orta boyutlu ve daha büyük cihazlarda navbar'ın tam boyutta genişlemesini sağlar.
navbar-light ve bg-light sınıfları, navbar'ın arka plan rengini ve yazı rengini belirler.
navbar-fixed-top, navbar'ın sayfanın üst kısmına sabitlenmesini sağlar.-->

        <div class="container-fluid"><!--Navbar içeriğini bir konteyner içine alır.
     Bu, navbar içindeki öğelerin düzenini ve sınırlarını kontrol etmek için kullanılır.-->

            <a class="navbar-brand mt-2 mt-lg-0 order-0 order-md-0" href="anasayfa.php"><!--logoya tıklanınca anasayfa.php ye yönlendirir.-->
                <img src="resimler/navlogo.png" height="50" alt="Logo" loading="lazy" />
            </a>
            <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><!--Küçük ekranlarda menüyü açıp kapatmak için kullanılan bir toggle butonudur.
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
                <div class="d-flex align-items-center">
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    // Veritabanı bağlantısı
    include("baglanti.php");

    // Hata mesajlarını saklamak için değişkenler
    $email_err = "";
    $new_password = "";
    $new_password_err = "";
    $new_password_confirm_err = "";
    /*Hata mesajlarını saklamak için değişkenler tanımlanır:
     $email_err, $new_password, $new_password_err, $new_password_confirm_err.
     Bunlar, e-posta, yeni şifre ve şifre tekrarı gibi alanlardaki olası hata mesajlarını saklar.
     Başlangıçta bu değişkenler boş olarak tanımlanır.*/

    // POST isteği kontrolü
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //POST isteği kontrolü: $_SERVER["REQUEST_METHOD"] == "POST" ile formun POST isteği ile gönderilip gönderilmediği kontrol edilir.

        // Formdan e-posta adresi alınması ve kontrol edilmesi
        if (empty(trim($_POST["email"]))) {
            $email_err = "Lütfen e-posta adresinizi girin.";
        } else {
            $email = trim($_POST["email"]);
        } // Eğer e-posta alanı boşsa veya geçerli bir e-posta adresi değilse, ilgili hata mesajı atanır.

        // Formdan yeni şifre alınması ve kontrol edilmesi
        if (empty(trim($_POST["new_password"]))) {
            $new_password_err = "Lütfen yeni şifrenizi girin.";
        } elseif (strlen(trim($_POST["new_password"])) < 6) {
            $new_password_err = "Yeni şifre en az 6 karakterden oluşmalıdır.";
            //Eğer yeni şifre alanı boşsa veya en az 6 karakterden oluşmuyorsa, ilgili hata mesajı atanır.
        } else {
            $new_password = trim($_POST["new_password"]);
        }

        // Formdan yeni şifrenin tekrar alınması ve kontrol edilmesi
        // Eğer yeni şifre tekrar alanı boşsa veya yeni şifre ile eşleşmiyorsa, ilgili hata mesajı atanır.
        if (empty(trim($_POST["new_password_confirm"]))) {
            $new_password_confirm_err = "Lütfen yeni şifrenizi tekrar girin.";
        } else {
            $new_password_confirm = trim($_POST["new_password_confirm"]);
            if ($new_password != $new_password_confirm) {
                $new_password_confirm_err = "Şifreler eşleşmiyor.";
            }
        }

        // Hata olmadığı durumda şifre sıfırlama işleminin yapılması
        /* Eğer herhangi bir hata mesajı yoksa, veritabanında kullanıcının e-posta adresine göre sorgulanır. 
        Eğer e-posta adresi kayıtlı ise, yeni şifre hashlenir ve veritabanında güncellenir. İlgili bildirimler kullanıcıya gösterilir.*/
        if (empty($email_err) && empty($new_password_err) && empty($new_password_confirm_err)) {

            // Kullanıcıyı e-posta adresine göre sorgulama
            $query = "SELECT id FROM kullanicilar WHERE email = ?";

            if ($stmt = $baglanti->prepare($query)) {
                $stmt->bind_param("s", $param_email);
                $param_email = $email;
                if ($stmt->execute()) {
                    $stmt->store_result();

                    // Eğer e-posta adresi kayıtlı ise
                    if ($stmt->num_rows == 1) {

                        // Yeni şifrenin hash olarak güncellenmesi
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        // Veritabanında şifrenin güncellenmesi
                        $query = "UPDATE kullanicilar SET parola = ? WHERE email = ?";

                        if ($stmt = $baglanti->prepare($query)) {
                            $stmt->bind_param("ss", $param_password, $param_email);
                            $param_password = $password_hash;
                            $param_email = $email;

                            // Şifrenin güncellenmesi ve başarılı bir şekilde bildirilmesi
                            if ($stmt->execute()) {
                                echo '<div class="alert alert-success" role="alert">Şifreniz başarıyla güncellendi.</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Bir hata oluştu, lütfen daha sonra tekrar deneyin.</div>';
                            }
                            // Bağlantı kapatma
                            $stmt->close();
                        }
                    } else {
                        // Eğer e-posta adresi kayıtlı değilse
                        echo '<div class="alert alert-danger" role="alert">Bu e-posta adresi ile ilişkili bir hesap bulunamadı.</div>';
                    }
                } else {
                    // Sorgu başarısız olduğunda bildirim
                    echo '<div class="alert alert-danger" role="alert">Sorgu başarısız oldu. Lütfen daha sonra tekrar deneyin.</div>';
                }
                // Bağlantı kapatma

            }
        }
        // Veritabanı bağlantısının kapatılması
        $baglanti->close();
    }
    ?>

    <div class="container p-5"><!--Bootstrap ile oluşturulmuş bir container 
    içerisindeki içeriğin düzenli bir şekilde yerleştirilmesini sağlar. 
    p-5 sınıfı ise padding (kenar boşluğu) değerini belirler.-->

        <div class="row justify-content-center"><!--İçerisindeki içeriğin yatay olarak ortalanmasını sağlayan bir satır.-->

            <div class="col-xl-6 col-md-8 col-sm-12"><!--İçerisindeki içeriğin farklı cihazlarda farklı boyutlarda görüntülenmesini sağlayan bir sütun. 
            Bu örnekte, büyük ekranlarda 6 sütun genişliği, orta boy ekranlarda 8 sütun genişliği ve küçük ekranlarda tam genişlik alır.-->

                <div class="card p-5"><!-- Bootstrap kart bileşeni, içerisindeki içeriği bir kart şeklinde düzenler.
            p-5 sınıfı ile içeriğin etrafına padding (kenar boşluğu) ekler.-->

                    <div class="imgcontainer pb-4"><!--Resmin yer alacağı kısım. pb-4 sınıfı, alt kenara padding (kenar boşluğu) ekler.-->
                        <img src="resimler/logo2.png" alt="Avatar" class="logo">
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <!--Form öğesi, verilerin sunucuya gönderilmesini sağlar. action özelliği, formun verilerinin gönderileceği URL'yi belirtir. 
                    method özelliği ise verilerin nasıl gönderileceğini belirtir.-->
                        <div class="form-group"><!--Form öğelerini gruplandıran bir bileşen.-->
                            <label for="email">E-posta Adresi:</label>
                            <input type="email" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="">
                            <!--E-posta adresinin girileceği alan. type="email" ile tarayıcının geçerli bir e-posta adresi girmesini sağlar. form-control sınıfı
                            Bootstrap tarafından sağlanan bir stil ve düzen sağlar. is-invalid sınıfı, hata durumunda alanın kırmızı renkte vurgulanmasını sağlar.-->
                            <span class="invalid-feedback"><?php echo $email_err; ?></span><!--E-posta alanı için hata mesajını gösterecek bir span öğesi.-->
                        </div>
                        <div class="form-group">
                            <label for="new_password">Yeni Şifre:</label>
                            <input type="password" name="new_password" id="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="">
                            <!-- Yeni şifrenin girileceği alan. type="password" ile kullanıcının girdiği metnin gizli kalmasını sağlar. form-control sınıfı
                             Bootstrap tarafından sağlanan bir stil ve düzen sağlar. is-invalid sınıfı, hata durumunda alanın kırmızı renkte vurgulanmasını sağlar.-->
                            <span class="invalid-feedback"><?php echo $new_password_err; ?></span><!--Yeni şifre alanı için hata mesajını gösterecek bir span öğesi.-->
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirm">Yeni Şifre Tekrar:</label>
                            <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-control <?php echo (!empty($new_password_confirm_err)) ? 'is-invalid' : ''; ?>" value="">
                            <!-- Yeni şifrenin girileceği alan. type="password" ile kullanıcının girdiği metnin gizli kalmasını sağlar. form-control sınıfı
                             Bootstrap tarafından sağlanan bir stil ve düzen sağlar. is-invalid sınıfı, hata durumunda alanın kırmızı renkte vurgulanmasını sağlar.-->
                            <span class="invalid-feedback"><?php echo $new_password_confirm_err; ?></span><!--Yeni şifre alanı için hata mesajını gösterecek bir span öğesi.-->
                        </div>
                        <div class="form-group pt-3">
                            <input type="submit" value="Şifreyi Sıfırla" class="btn btn-primary"><!--Formun gönderilmesini sağlayan bir gönderme butonu.-->
                        </div>
                        <div class="mb-3 pb-3">
                            <span><a href="login.php">Giriş Sayfasına Dön</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>