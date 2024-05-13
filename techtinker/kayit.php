<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Üye Kayıt İşlemi</title>
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

  img.logo:hover {
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    transition: all 1s;
  }


  body {
    background-color: #7AB3BF;
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
  include("baglanti.php");
  $username_err = "";
  $email_err = "";
  $parola_err = "";
  $parolatkr_err = "";
  /*$username_err, $email_err, $parola_err, $parolatkr_err: 
  Bu değişkenler, kullanıcının giriş bilgilerini doğrularken olası hata mesajlarını tutar. 
  Başlangıçta bu değişkenler boş olarak tanımlanır.*/

  if (isset($_POST["kaydet"])) {/*Bu blok, formun kaydet adında bir gönder butonuna basılıp basılmadığını kontrol eder. 
  Eğer basıldıysa, form verilerini işlemeye başlar.*/

    // Kullanıcı adı doğrulaması
    /*Kullanıcı adı boş olup olmadığı, 
    en az 5 karakterden oluşup oluşmadığı ve belirli bir desene uygun olup olmadığı kontrol edilir. 
    Hatalar varsa, ilgili hata mesajları atanır.*/
    if (empty($_POST["kullaniciadi"])) {
      $username_err = "Kullanıcı Adı boş geçilemez.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*\d)[a-z\d_]{5,}$/i', $_POST["kullaniciadi"]) || !preg_match('/[A-Z]/', $_POST["kullaniciadi"])) {
      $username_err = "Kullanıcı adı en az 5 karakterden oluşmalı, en az bir büyük harf, bir küçük harf ve bir rakam içermelidir.";
    } else {
      $username = $_POST["kullaniciadi"]; // Kullanıcı adını değişkene atayın
    }

    // E-posta doğrulaması
    /* E-posta adresinin boş olup olmadığı
     ve geçerli bir e-posta adresi formatına sahip olup olmadığı kontrol edilir. 
     Hatalar varsa, ilgili hata mesajları atanır.*/
    if (empty($_POST["email"])) {
      $email_err = "E-posta adresi boş geçilemez.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $email_err = "Geçersiz e-posta adresi formatı.";
    } else {
      $email = $_POST["email"]; // E-posta adresini değişkene atayın
    }

    // Parola doğrulaması
    //Parola boş olup olmadığı kontrol edilir. Eğer boşsa, ilgili hata mesajı atanır.
    if (empty($_POST["parola"])) {
      $parola_err = "Parola boş geçilemez.";
    }

    // Parolatkr doğrulama
    //Parola tekrar alanının boş olup olmadığı ve ilk parola ile eşleşip eşleşmediği kontrol edilir. Hatalar varsa, ilgili hata mesajları atanır.
    if (empty($_POST["parolatkr"])) {
      $parolatkr_err = "Parola Tekrar Kısmı Boş geçilemez";
    } elseif ($_POST["parola"] != $_POST["parolatkr"]) {
      $parolatkr_err = "Parolalar eşleşmiyor!";
    }

    // Eğer kullanıcı adı, e-posta ve parola doğrulandıysa
    if (empty($username_err) && empty($email_err) && empty($parola_err) && empty($parolatkr_err)) {
      $password = password_hash($_POST["parola"], PASSWORD_DEFAULT);
      //Kullanıcı adı, e-posta ve parola doğrulandıysa ve herhangi bir hata mesajı yoksa
      //kullanıcının parolası hashlenir

      // Kullanıcı adının veritabanında mevcut olup olmadığını kontrol et
      $kontrol = mysqli_query($baglanti, "SELECT * FROM kullanicilar WHERE kullanici_adi = '$username'");
      if ($kontrol === false) {
        echo "Veritabanı sorgusu başarısız: " . mysqli_error($baglanti);
      } elseif (mysqli_num_rows($kontrol) > 0) {
        echo '<div class="alert alert-danger" role="alert">
                Bu kullanıcı adı zaten kullanılıyor. Lütfen farklı bir kullanıcı adı seçin.
                </div>';
      } else {
        // E-posta adresinin veritabanında mevcut olup olmadığını kontrol et
        $kontrol = mysqli_query($baglanti, "SELECT * FROM kullanicilar WHERE email = '$email'");
        if ($kontrol === false) {
          echo "Veritabanı sorgusu başarısız: " . mysqli_error($baglanti);
        } elseif (mysqli_num_rows($kontrol) > 0) {
          echo '<div class="alert alert-danger" role="alert">
                    Bu e-posta adresi zaten kullanılıyor. Lütfen farklı bir e-posta adresi girin.
                    </div>';
        } else {
          // Kullanıcı adı ve e-posta adresi mevcut değilse, yeni kullanıcıyı ekleyin
          $ekle = "INSERT INTO kullanicilar(kullanici_adi, email, parola) VALUES ('$username','$email','$password')";
          $calistirekle = mysqli_query($baglanti, $ekle);
          if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">
                    Kayıt başarılı bir şekilde eklendi.
                    </div>';
          } else {
            echo '<div class="alert alert-danger" role="alert">
                    Kayıt eklenirken bir problem oluştu.
                    </div>';
          }
        }
      }
    }
  }
  ?>
  <div class="container p-5"><!--container: Bootstrap tarafından sağlanan bir bileşendir ve içerisindeki öğeleri düzenlemek için kullanılır.-->
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
            <form action="kayit.php" method="POST"><!--form action="kayit.php" method="POST": Formun işlem yapacağı dosya ve işlem türünü belirtir. 
                    Bu form, kullanıcı kaydı için tasarlanmıştır ve bilgiler kayit.php dosyasına POST yöntemiyle gönderilir.-->
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
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control <?php if (!empty($email_err)) {
                                                          echo "is-invalid";
                                                        } ?>" name="email">
                <!--Bu satır, bir HTML form elemanının sınıf özelliğini kontrol eder.
                                                        Eğer $email_err değişkeni boş değilse
                                                        "is-invalid" sınıfını form elemanına ekler.
                                                        Bu sınıf, kullanıcıya geçersiz girişleri göstermek için genellikle kullanılır.-->
                <div class="invalid-feedback">
                  <?php
                  echo $email_err; //Php kısmında girdiğimiz email_err burada çalışır.
                  ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Parola</label>
                <input type="password" class="form-control <?php if (!empty($parola_err)) {
                                                              echo "is-invalid";
                                                            } ?>" name="parola"><!--Bu satır, bir HTML form elemanının sınıf özelliğini kontrol eder.
                                                            Eğer $parola_err değişkeni boş değilse
                                                            "is-invalid" sınıfını form elemanına ekler.
                                                            Bu sınıf, kullanıcıya geçersiz girişleri göstermek için genellikle kullanılır.-->
                <div class="invalid-feedback">
                  <?php
                  echo $parola_err; //Php kısmında girdiğimiz parola_err burada çalışır.
                  ?>
                </div>
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Parola Tekrarı</label>
                <input type="password" class="form-control <?php if (!empty($parolatkr_err)) {
                                                              echo "is-invalid";
                                                            } ?>" name="parolatkr"><!--Bu satır, bir HTML form elemanının sınıf özelliğini kontrol eder.
                                                            Eğer $parolatkr_err değişkeni boş değilse
                                                            "is-invalid" sınıfını form elemanına ekler.
                                                            Bu sınıf, kullanıcıya geçersiz girişleri göstermek için genellikle kullanılır.-->
                <div class="invalid-feedback">
                  <?php
                  echo $parolatkr_err; //Php kısmında girdiğimiz parolatkr_err burada çalışır.
                  ?>
                </div>
              </div>

              <div class="mb-3">
                <span>Zaten hesabın mı var? <a href="login.php">Giriş yap</a></span><!--linke basıldığında login.php sayfasına yönlendirir.-->
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="kaydet">Kayıt Ol</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>