<?php
// Veritabanı bağlantısı
$servername = "localhost";
$dbname = "shopping";

$conn = mysqli_connect($servername, "root", "", $dbname);

if (!$conn) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}

// Sepetteki ürünleri getir
$sql = "SELECT * FROM sepet INNER JOIN shopping_cart ON sepet.id = shopping_cart.id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Ürün Adı: " . $row["product_name"] . "<br>";
        echo "Fiyat: " . $row["price"] . "<br>";
        // Diğer bilgileri buraya ekleyebilirsiniz
        echo "<hr>";
    }
} else {
    echo "Sepetinizde henüz ürün yok.";
}

mysqli_close($conn);
?>
