<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<forrm method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
  Nama: <input type="text" name="fname"> 
  <br> 
  Umur: <input type="text" name="umur"> 
  <br> 
  <br> 
  Nama: <label for="lakiLaki"><input type="checkbox" id="lakiLaki" name="gender[]" value="Laki-Laki">Laki-laki</label>
 <label for="perempuan"><input type="checkbox" id="perempuan" name="gender[]" value="perempuan">perempuan</label>
 <br>
 <br>
 Makanan kesukaan: <label for="rendang"><input type="checkbox" id="rendang" name="makanan[]" value="rendang">rendang</label>
 <label for="soto"><input type="checkbox" id="soto" name="makanan[]" value="soto">soto</label>
 <label for="gule"><input type="checkbox" id="gule" name="makanan[]" value="gule">gule</label>
 <br>
  <input type="submit"> 
</form> 
 
<br> 
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Mengambil nilai dari input field 
    $name = $_POST['fname']; 
    $umur = $_POST['umur']; 
     
    // Validasi data 
    if (empty($name) && empty($umur)) { 
      echo "Nama dan umur kosong"; 
    } else { 
      // Menampilkan hasil 
      if (!empty($name)) { 
        echo "Nama saya" . " " . $name; 
      } 
      if (!empty($umur)) { 
        echo " dan umur ku" . " " . $umur . "Tahun"; 
      } 
    } 
  } 
  ?>  
  <br>
  <br>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari kotak centang menggunakan $_POST
    if (isset($_POST["gender"])) {
        $genders = $_POST["gender"];

        // Loop melalui nilai-nilai yang dipilih
        foreach ($genders as $gender) {
            echo "Saya Seorang: " . $gender;
        }
    } else {
        echo "Tidak ada gender yang dipilih.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari kotak centang menggunakan $_POST
    if (isset($_POST["makanan"])) {
        $makanann = $_POST["makanan"];

        // Loop melalui nilai-nilai yang dipilih
        foreach ($makanann as $makanan) {
            echo "Dan makanan yang saya suka adalah " . $makanan;
        }
    } else {
        echo "Tidak ada makanan yang dipilih.";
    }
}
?>

</body>
</html>