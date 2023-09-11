<?php 
include 'connect.php'; // Add a semicolon here
session_start(); // Pastikan Anda sudah memanggil session_start() di file lain yang memproses login 
 
if (!isset($_SESSION['email'])) { 
    // Jika pengguna belum login, tampilkan pesan kesalahan dan arahkan mereka kembali ke halaman login 
    echo "<script>alert('Maaf, Anda belum login!');</script>"; 
    echo "<script>window.location.href = 'login.php';</script>"; // Gantilah 'login.php' dengan nama halaman login Anda 
    exit; }
     ?>  
<!DOCTYPE html>  
<html lang="en">  
<head> 
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"   
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
  
</head>  
<body class="min-vh-100 d-flex align-items-center">  
    <div class= "card w-50 m-auto p-3">  
    <a class="btn btn-warning w-25 flex-end" href="create.php">create</a> 
        <h3 class="text-center">Read</h3>  
        <table class="table table-striped">  
  <thead>  
    <tr>  
      <th >Nama barang</th>  
      <th >jumlah</th>  
      <th >jenis</th>  
      <th >harga</th>  
      <th >Total</th>  
      <th class= "text-center">Aksi</th>  
    </tr>  
  </thead>  
  <tbody class="table-group-divider">  
    <?php   
    $sql = "select * from nama_barang";  
    $result = mysqli_query($conn, $sql);  
    if ($result) {  
        while($data =mysqli_fetch_assoc($result)) {  
            $id = $data['id'];  
            $nama = $data['nama'];  
            $jumlah = $data['jumlah'];  
            $jenis = $data['jenis'];  
            $harga = $data['harga'];  
            $total = $data['total'];  
            echo '  
            <tr>  
            <td>'.$nama.'</td>  
            <td>'.$jumlah.'</td>  
            <td>'.$jenis.'</td>  
            <td>'.$harga.'</td>  
            <td>'.$total.'</td>  
            <td class= "text-center">  
                <a href="update.php?id='.$id.'"class="btn btn-sm btn-primary"> Update </a>  
                <button onClick="hapus('.$id.')"class="btn btn-sm btn-danger">Delete</button>  
            </td>  
            </tr>  
            ';  
        }  
        }  
    ?>  
  </tbody>  
</table>  
<a class="btn btn-danger w-25 flex-end" href="logout.php">Log Out</a> 
    </div>  
    <script>  
        function hapus(id) {  
            var yes = confirm('Yakin di hapus?');  
            if (yes == true) {  
                window.location.href= "delete.php?id=" + id;  
            }  
        }  
    </script>  
</body>  
</html>