<?php include 'config.php'; ?>
<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
    OR deskripsi_produk LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc())
{
    $semuadata[]=$pecah;
}

//echo "<pre>";
//print_r ($semuadata);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
    <title>Pencarian</title>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <link href="./assets/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Gidugu&family=Nunito:wght@700;800&family=Oswald&family=Outfit&family=Roboto&family=Roboto+Condensed&family=Spectral:wght@500&display=swap"
        rel="stylesheet">

    <title>Lepas Hijab</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

    <!-- ***** Preloader Start **** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="" style="background-color: #3f5a5e;">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Lepas <em style="color:#FF6366">Hijab</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>
                        <!-- Jika sudah login -->
                        <?php if (isset ($_SESSION["pelanggan"])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <!--jika belum login -->
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar.php">Daftar</a>
                        </li>
                        <?php endif ?>
                    </ul>
                        <form action="pencarian.php" method="get" class="navbar-form navbar-right">
                            <input type="text" class="form-control" name="keyword">
                            <button class="btn btn-primary">Cari</button>
                        </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner header-text"></div>
        <div class="container">
            <h3>Hasil Pencarian : <?php echo $keyword ?></h3>

            <?php if (empty($semuadata)): ?>
                <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong>tidak ditemukan</div>
            <?php endif ?>

            <div class="row">

                <?php foreach ($semuadata as $key => $value): ?>

                <div class="row">
                <div class="col-md-4">
                <div class="product-item">
                        <img src="foto_produk/<?php echo $value["foto_produk"] ?>" alt="" class="img-responsive">
                        <div class="caption">
                            <h3><?php echo $value["nama_produk"] ?></h3>
                            <h5>Rp. <?php echo number_format($value['harga_produk']) ?></h5>
                            <a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Beli</a>
                            <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-default">Detail</a>
                        
                    </div>
                </div>
                </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        

    <footer class="pt-4 pb-4 text-center bg-light">
        <div class="container">
            <div class="my-3">
                <div style="font-family: 'Nunito', sans-serif;font-size:27px;font-weight:800;color:#3f5a5e;">PETSHOPQU
                </div>
                <p>Belanja & retail</p>
                <div class="social-nav">
                    <nav role="navigation">
                        <ul class="nav justify-content-center">

                            <li class="nav-item"><a class="nav-link" href=""
                                    title="Instagram"><i class="fab fa-instagram fa-2x"></i><span
                                        class="menu-title sr-only">Instagram</span></a></li>
                            <li class="nav-item"><a class="nav-link" href=""
                                    title="LinkedIn"><i class="fab fa-whatsapp fa-2x"></i><span
                                        class="menu-title sr-only">LinkedIn</span></a></li>
                    </nav>
                </div>
            </div>
            <div class="text-small text-secondary">
                <div class="mb-1">&copy; All rights reserved.</div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
    </script>


</body>

</html>