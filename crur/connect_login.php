<?php   
$servername = "localhost:3306";   
$username_db = "root";   
$password_db = "";   
$database_name = "db_sekolah";   
   
$email = isset($_POST['email'])?$_POST['email']: '';   
$password = isset($_POST['password'])?$_POST['password']: '';   
   
$conn = new mysqli($servername, $username_db, $password_db,$database_name);   
   
if ($conn->connect_error) {   
    die("koneksi database gagal: " . $conn->connect_error);   
}else {  
    $stmt = $conn->prepare("select * from admin where email = ?");   
    $stmt->bind_param("s", $email);   
    $stmt->execute();   
    $stmt_result = $stmt->get_result();   
    if ($stmt_result ->num_rows > 0) {   
        $data = $stmt_result->fetch_assoc();   
        $cek_password = $data['password']; 
        if($cek_password === md5($password)) {    
            $_SESSION['login'] = true;  
            $_SESSION['email'] = $email; 
            header("Location: reaed.php"); 
        } else { 
            echo "<h2>Email Atau Password salah</h2>"; 
        } 
        } else {   
            echo "<h2>email atau password salah</h2>";   
        }   
    }  
?>