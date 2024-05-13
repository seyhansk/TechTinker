document.addEventListener("DOMContentLoaded", function () {
  var myCarousel = document.getElementById("carouselExampleCaptions");
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 5000,
    pause: "hover",
    keyboard: true,
    wrap: true,
    touch: false, // Touch kaydırma desteğini devre dışı bırakır
  });

  // Carousel geçişlerinin pürüzsüz olması için transitionend olayını dinleyelim
  myCarousel.addEventListener("transitionend", function () {
    // Aktif slaydın transition'ı tamamlandığında, Carousel'ın geçişleri tamamlandı demektir
    myCarousel.classList.remove("carousel-sliding");
  });

  // Carousel geçiş başladığında, geçiş işlemi devam ederken bir sınıf ekleyelim
  myCarousel.addEventListener("slide.bs.carousel", function () {
    myCarousel.classList.add("carousel-sliding");
  });
});




