<?php 

session_start();
if(!isset($_SESSION['login'])){
    header('location: index.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];

if(hapus($id)>0){
    echo "<script>
            alert('Berhasil menghapus produk');
            document.location.href='produk.php';
        </script>";
}else{
    echo "<script>
            alert('Gagal menghapus produk');
            document.location.href='produk.php';
        </script>";
}
?>