<?php
session_start();
// mendapatkan id_produk dari url

$id_produk = $_GET['id'];




//jika sudah ada produk tu di kernjang maka produk itu jumlah nya +1
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}


// selain itu belum ada di keranjang, maka produk itu dianggap beli 1

else
{
    $_SESSION['keranjang'][$id_produk]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";

?>