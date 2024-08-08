<?php 
    $conn = mysqli_connect('localhost','root','','db_aghnabatik');

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $motif = htmlspecialchars($data['motif']);
    $stok = htmlspecialchars($data['stok']);
    $size = htmlspecialchars($data['size']);
    $jeniskain = htmlspecialchars($data['jeniskain']);
    $jenisbatik = htmlspecialchars($data['jenisbatik']);
    $harga = htmlspecialchars($data['harga']);

    // upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $gambar2 = upload2();
    if(!$gambar){
        return false;
    }
    $gambar3 = upload3();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO produk (motif, stok, size, jeniskain, jenisbatik, gambar, gambar2, gambar3, harga) VALUES ('$motif', '$stok', '$size', '$jeniskain', '$jenisbatik', '$gambar', '$gambar2', '$gambar3','$harga')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

// function tambahpost($data){
//     global $conn;

//     $caption = htmlspecialchars($data['caption']);
//     $deskripsi = htmlspecialchars($data['deskripsi']);

//     // upload gambar
//     $foto = uploadfoto();
//     if(!$foto){
//         return false;
//     }

//     $query = "INSERT INTO galeri (foto, caption, deskripsi) VALUES ('$foto', '$caption', '$deskripsi')";
//     mysqli_query($conn, $query);
    
//     return mysqli_affected_rows($conn);
// }

// function uploadfoto(){
//     $namaFile = $_FILES['foto']['name'];
//     $ukuranFile = $_FILES['foto']['size'];
//     $error = $_FILES['foto']['error'];
//     $tmpName = $_FILES['foto']['tmp_name'];

//     // apakah ada gbr yg diuplod?
//     if($error === 4){
//         echo "<script>alert('Mohon masukan foto dulu.');</script>";
//         return false;
//     }

//     $ekstensifotorValid = ['jpg','jpeg','png','raw'];
//     $ekstensifoto = explode('.',$namaFile);
//     $ekstensifoto = strtolower(end($ekstensifoto));
//     if(!in_array($ekstensifoto,$ekstensifotorValid)){
//         echo "<script>alert('Silahkan upload dengan format jpg/jpeg/png.');</script>";
//         return false;
//     }

//     if($ukuranFile>1000000){
//         echo "<script>alert('Ukuran foto terlalu besar');</script>";
//         return false;
//     }

//     // generate nama
//     $namaFileBaru = uniqid();
//     $namaFileBaru.='.';
//     $namaFileBaru.=$ekstensifoto;

//     if(move_uploaded_file($tmpName,'img/post/' . $namaFileBaru)){
//         echo "<P>FILE UPLOADED TO OK</P>";
//     } else {
//         echo "<P>MOVE UPLOADED FILE FAILED!!</P>";
//         print_r(error_get_last());
    
//     }
//     return $namaFileBaru;

// }

// UPLOAD PRODUK
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // apakah ada gbr yg diuplod?
    if($error === 4){
        echo "<script>alert('Mohon masukan gambar dulu.');</script>";
        return false;
    }

    $ekstensiGambarrValid = ['jpg','jpeg','png','raw'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarrValid)){
        echo "<script>alert('Silahkan upload dengan format jpg/jpeg/png.');</script>";
        return false;
    }

    if($ukuranFile>1000000){
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    }

    // generate nama
    $namaFileBaru = uniqid();
    $namaFileBaru.='.';
    $namaFileBaru.=$ekstensiGambar;

    move_uploaded_file($tmpName,'img/produk/' . $namaFileBaru);
    return $namaFileBaru;

}
function upload2(){
    $namaFile = $_FILES['gambar2']['name'];
    $ukuranFile = $_FILES['gambar2']['size'];
    $error = $_FILES['gambar2']['error'];
    $tmpName = $_FILES['gambar2']['tmp_name'];

    // apakah ada gbr yg diuplod?
    if($error === 4){
        echo "<script>alert('Mohon masukan gambar dulu.');</script>";
        return false;
    }

    $ekstensiGambarrValid = ['jpg','jpeg','png','raw'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarrValid)){
        echo "<script>alert('Silahkan upload dengan format jpg/jpeg/png.');</script>";
        return false;
    }

    if($ukuranFile>1000000){
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    }

    // generate nama
    $namaFileBaru = uniqid();
    $namaFileBaru.='.';
    $namaFileBaru.=$ekstensiGambar;

    move_uploaded_file($tmpName,'img/produk1/' . $namaFileBaru);
    return $namaFileBaru;

}
function upload3(){
    $namaFile = $_FILES['gambar3']['name'];
    $ukuranFile = $_FILES['gambar3']['size'];
    $error = $_FILES['gambar3']['error'];
    $tmpName = $_FILES['gambar3']['tmp_name'];

    // apakah ada gbr yg diuplod?
    if($error === 4){
        echo "<script>alert('Mohon masukan gambar dulu.');</script>";
        return false;
    }

    $ekstensiGambarrValid = ['jpg','jpeg','png','raw'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarrValid)){
        echo "<script>alert('Silahkan upload dengan format jpg/jpeg/png.');</script>";
        return false;
    }

    if($ukuranFile>1000000){
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    }

    // generate nama
    $namaFileBaru = uniqid();
    $namaFileBaru.='.';
    $namaFileBaru.=$ekstensiGambar;

    move_uploaded_file($tmpName,'img/produk2/' . $namaFileBaru);
    return $namaFileBaru;

}

// UPLOAD POSTINGAN GALERI
function uploadpost(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // apakah ada gbr yg diuplod?
    if($error === 4){
        echo "<script>alert('Mohon masukan gambar dulu.');</script>";
        return false;
    }

    $ekstensiGambarrValid = ['jpg','jpeg','png','raw'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarrValid)){
        echo "<script>alert('Silahkan upload dengan format jpg/jpeg/png.');</script>";
        return false;
    }

    if($ukuranFile>1000000){
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    }

    // generate nama
    $namaFileBaru = uniqid();
    $namaFileBaru.='.';
    $namaFileBaru.=$ekstensiGambar;

    move_uploaded_file($tmpName,'img/produk/' . $namaFileBaru);
    return $namaFileBaru;

}
// ===========================================================================================
function hapus($id) {
    // Koneksi ke database
    global $conn;

    // Ambil nama file gambar yang terkait dengan produk yang akan dihapus
    $query = "SELECT gambar, gambar2, gambar3 FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $produk = mysqli_fetch_assoc($result);

    // Debugging: Pastikan bahwa produk ditemukan
    if (!$produk) {
        echo "Produk tidak ditemukan.";
        return 0;
    }

    // Hapus file gambar dari folder img/produk
    if ($produk) {
        $paths = [
            'img/produk/' . $produk['gambar'],
            'img/produk1/' . $produk['gambar2'],
            'img/produk2/' . $produk['gambar3'],
        ];
        
        foreach ($paths as $path) {
            if (file_exists($path)) {
                if (unlink($path)) {
                    // echo "File $path berhasil dihapus.<br>";
                } else {
                    echo "Gagal menghapus file $path.<br>";
                }
            } else {
                echo "File $path tidak ditemukan.<br>";
            }
        }
    }

    // Hapus data produk dari database
    $query = "DELETE FROM produk WHERE id = $id";
    mysqli_query($conn, $query);

    // Periksa apakah query berhasil
    return mysqli_affected_rows($conn);
}



function edit($data){
    global $conn;
    $id = ($data['id']);

    $motif = htmlspecialchars($data['motif']);
    $stok = htmlspecialchars($data['stok']);
    $size = htmlspecialchars($data['size']);
    $jeniskain = htmlspecialchars($data['jeniskain']);
    $jenisbatik = htmlspecialchars($data['jenisbatik']);
    $harga = htmlspecialchars($data['harga']);

    // cek apakah insert gbr baru?
    $gambarlama = htmlspecialchars($data['gambarlama']);
    $gambarlama2 = htmlspecialchars($data['gambarlama2']);
    $gambarlama3 = htmlspecialchars($data['gambarlama3']);

    if($_FILES['gambar']['error']===4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();
    }
    if($_FILES['gambar2']['error']===4){
        $gambar2 = $gambarlama2;
    }else{
        $gambar2 = upload2();
    }
    if($_FILES['gambar3']['error']===4){
        $gambar3 = $gambarlama3;
    }else{
        $gambar3 = upload3();
    }


    $query = "UPDATE produk SET
                motif = '$motif',
                stok = '$stok',
                size = '$size',
                jeniskain = '$jeniskain',
                jenisbatik = '$jenisbatik',
                gambar = '$gambar',
                gambar2 = '$gambar2',
                gambar3 = '$gambar3',
                harga = '$harga'
                
                
                WHERE id = $id;
                ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}




function signup($data){
    global $conn;

    $namaDepan = ucfirst($data['namadepan']);
    $namaBelakang = ucfirst($data['namabelakang']);
    $namaLengkap = $namaDepan . ' ' . $namaBelakang;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);
    $password2 = mysqli_real_escape_string($conn,$data['password2']);


    // cek user sudah ada atw blm
    $hasil = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($hasil)){
         echo "<script>
                alert('User sudah terdaftar.');
            </script>";
            return false;
    }

    // cek konfirm
    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai.');
            </script>";
            return false;
    }

    // enkripsi psw
    $password = password_hash($password,PASSWORD_DEFAULT);

    // insert ke database
    mysqli_query($conn,"INSERT INTO users
    VALUES('','$namaLengkap','$username','$password')");
    return mysqli_affected_rows($conn);

    
}
?>