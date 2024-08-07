<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('location: index.php');
    exit;
}
require 'functions.php';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';


    $id = $_GET["id"];
    $target = query("SELECT*FROM produk WHERE id = $id")[0];

if(isset($_POST["submit"])){
    // var_dump($_POST); die;

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

    <title>Edit Produk | Aghna Batik</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .imgpreview{
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius:7px;
            transition: opacity 0.3s ease;
            position: relative;
        }

        .imgpreview:hover {
            opacity: 0.7;
            cursor: pointer;
        }

        .imgpreview:hover::after {
            content: 'Upload';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="file"] {
            display: none; /* Sembunyikan input file default */
        }

        .exs{
            display: flex;
            flex-wrap: wrap;
        }

        .prevvgrup{
            display: flex;
            flex-wrap: wrap;
            column-gap: 20px;
        }

        @media screen and (min-width:768px){
        .exparent{
            display:flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .ex{
            padding: 0px 20px 0px 0px;

            width:50%;
            display: flex;
            flex-direction: column;
        }
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">Aghna Batik</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="produk.php">
                    <i class="fas fa-fw fa-cube"></i>
                    <span>Produk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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

                

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="exparent">
                                    <div class="ex">
                                        <input type="hidden" name="id" value="<?=$target['id'];?>">
                                        <input type="hidden" name="gambarlama" value="<?=$target['gambar'];?>">
                                        <input type="hidden" name="gambarlama2" value="<?=$target['gambar2'];?>">
                                        <input type="hidden" name="gambarlama3" value="<?=$target['gambar3'];?>">
                                        <div class="form-group">
                                            <label for="motif">Motif :</label>
                                            <input type="text" name="motif" class="form-control" id="motif" autocomplete="off"  value="<?=$target['motif'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok" >Stok :</label>
                                            <input type="number" name="stok" class="form-control" id="stok" autocomplete="off" value="<?=$target['stok'];?>">
                                        </div>
                                        <div class="form-group" >
                                            <label for="size">Ukuran :</label>
                                            <input type="text" name="size" class="form-control" id="size" autocomplete="off" value="<?=$target['size'];?>">
                                        </div>                               
                                    </div>

                                <div class="ex">
                                        <div class="form-group" >
                                            <label for="jeniskain">Jenis Kain :</label><br> 
                                            <select name="jeniskain" id="jeniskain" class="custom-select">
                                                <option  selected style="background-color:#e0e0e6;"><?=$target['jeniskain'];?></option><hr>
                                                <option value="Mori">Mori</option>
                                                <option value="Sutra" >Sutra</option>
                                                <option value="Katun">Katun</option>
                                            </select>
                                        </div>
                                    <div class="form-group" >
                                            <label for="jenisbatik">Jenis Batik :</label><br> 
                                            <select name="jenisbatik" id="jenisbatik" class="custom-select">
                                                <option  selected  style="background-color:#e0e0e6;"><?=$target['jenisbatik'];?></option><hr>
                                                <option value="Tulis">Tulis</Tption>
                                                <option value="Cap" >Cap</option>
                                            </select>
                                        </div> 
                                    <div class="form-group">
                                            <label for="harga">Harga (Rp.):</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" name="harga" class="form-control" id="harga" autocomplete="off" min="0" step="5000" value="<?= isset($target['harga']) ? $target['harga'] : '' ?>">
                                            </div>
                                            </div>
                                    
                                </div>

                                <div class="exs">
                                    <div class="prevv">
                                        <p>Preview</p>
                                        <div class="prevvgrup">
                                            <div class="form-group">
                                                <img class="imgpreview" src="img/produk/<?= $target['gambar'] ?>" alt="Product Image" onclick="document.getElementById('gambar').click()">
                                                <input type="file" name="gambar" id="gambar" class="large-red-text" autocomplete="off" onchange="previewImage(event, 'imgpreview')">
                                            </div>
                                            <div class="form-group">
                                                <img class="imgpreview" src="img/produk1/<?= $target['gambar2'] ?>" alt="Product Image" onclick="document.getElementById('gambar2').click()">
                                                <input type="file" name="gambar2" id="gambar2" class="large-red-text" autocomplete="off" onchange="previewImage(event, 'imgpreview')">
                                            </div>
                                            <div class="form-group">
                                                <img class="imgpreview" src="img/produk2/<?= $target['gambar3'] ?>" alt="Product Image" onclick="document.getElementById('gambar3').click()">
                                                <input type="file" name="gambar3" id="gambar3" class="large-red-text" autocomplete="off" onchange="previewImage(event, 'imgpreview')">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                    
                            </div>
                            

                                    
                                <!-- </div> -->
                                <BR>                                            
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-danger"><a href="produk.php" class="text-white text-decoration-none">Batal</a></button>
                            </form>
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

    <script>
        // Optional: You can add this script if you want to show the selected file name or perform other actions
        document.getElementById('gambar').addEventListener('change', function() {
            // Perform actions after file is selected
        });
    </script>

    <script>
        function previewImage(event, className) {
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = event.target.previousElementSibling;
                imgElement.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>