<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('location: index.php');
    exit;
}
require 'functions.php';

//ambil id di url
    $id = $_GET["id"];
    // var_dump($id);
    //queri berdasarkan id
    $target = query("SELECT*FROM produk WHERE id = $id")[0];
    // var_dump($target);

if(isset($_POST["submit"])){
    if(edit($_POST) > 0){
        echo "<script>
            alert('Berhasil mengedit produk');
            document.location.href='produk.php';
        </script>";
    }else{
        echo "<script>
            alert('Gagal mengedit produk');
            document.location.href='produk.php';
        </script>";
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin SIM - Detail Pengumuman</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
    .product-card {
      display: flex;
      flex-wrap: wrap;
      background: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: .25rem;
      padding: 10px;
      margin: 20px;
    }
    .product-image {
      flex: 1 1 300px;
      display: flex;
      justify-content: center;
      /* border-radius: .25rem; */
      /* overflow: hidden; */
      align-items: center;
      position: relative;
      overflow: hidden;
    }
    .product-image img {
        width: 350px;
        height: 350px;
        object-fit: cover;
        border-radius:7px;
        transition: opacity 0.3s ease;
    }

    .product-image img:hover {
        opacity: 0.7; 
        cursor: pointer; 
    }

    .square {
      width: 100%;
      padding-bottom: 100%; /* 1:1 Aspect Ratio */
      position: relative;
    }
    .content {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
    }

    .subinfo {
            border-collapse: collapse;
        }
    .subinfo td {
            padding: 5px;
        }

    .product-info {
      flex: 1 1 300px;
      padding: 13px;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .product-info h2 {
      font-size: 1.5rem;
      font-weight: 600;
      word-break: break-word; /* Ensures long words break to the next line */
      
    }
    .product-info p {
        
      margin-bottom: .5rem;
      
    }
    .product-info .price {
      font-size: 1.25rem;
      font-weight: 700;
      color: #28a745;
    }
    @media (max-width: 576px) {
      .product-info h2 {
        width: 100%;
      }
    }
  </style>

</head>
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-text mx-3">Aghna Batik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> -->


    <li class="nav-item">
        <a class="nav-link" href="produk.php">
            <i class="fas fa-fw fa-cube"></i>
            <span>Produk</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar --> 

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
                    </div>
                    <div class="product-card shadow mb-4">
                                <div class="product-image">
                                    <img src="img/produk/<?= $target['gambar'] ?>" alt="Product Image" onclick="openImageInNewTab('img/produk/<?= $target['gambar'] ?>')">
                                </div>
                                <div class="product-info">
                                    <table class="subinfo" >
                                        
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><h2><?= $target['motif'] ?></h2></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kain</td>
                                                <td>: <?= $target['jeniskain'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Batik</td>
                                                <td>: <?= $target['jenisbatik'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Size</td>
                                                <td>: <?= $target['size'] ?></p></td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>: <?= $target['stok'] ?></p></td>
                                            </tr>
                                            <tr>
                                                <td>Diupload</td>
                                                <td>: <?= $target['tanggal'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <div class="d-flex">
                                    <a href="editproduk.php?id=<?= $target['id'] ?>"" class="btn btn-outline-primary mr-2">Edit</a>
                                    <a href="produk.php" class="btn btn-outline-secondary">Kembali</a>
                                </div>
                                </div>
                            </div>


                </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aghna Batik 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- img newtab -->
    <script>
        function openImageInNewTab(imageSrc) {
            window.open(imageSrc, '_blank');
        }
    </script>

</body>

</html>