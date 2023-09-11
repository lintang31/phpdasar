<?php include 'connect.php'?> 
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
    <div class="card w-50 m-auto p-3"> 
        <h3 class="text-center">GURU</h3> 
        <table class="table table-striped table-hover"> 
            <thead> 
                <tr> 
                    <th>No</th> 
                    <th>Nama Guru</th> 
                    <th>nik</th> 
                    <th>Gender</th> 
                    <th>walikelas</th> 
                    <th>Guru mapel</th> 
                </tr> 
            </thead> 
            <tbody class="table-group-divider"> 
            <?php 
                $sql = "select * from guru 
                INNER JOIN kelas ON kelas.id_guru_walikelas = guru.id  
                INNER JOIN mapel ON guru.id_mapel = mapel.id"; 
                $result = mysqli_query($conn, $sql); 
                $no = 1; 
                foreach ($result as $row) { 
                ?> 
                    <tr> 
                        <td><?= $no++; ?></td> 
                        <td><?= $row['nama_guru']; ?></td> 
                        <td><?= $row['nik']; ?></td> 
                        <td><?= $row['gender']; ?></td> 
                        <td><?= $row['tingkat_kelas'] . ' ' . $row['jurusan_kelas'] ?></td> 
                        <td><?= $row['nama_mapel']; ?></td> 
                    </tr> 
                <?php 
                } 
            ?>
            </tbody> 
        </table> 
    </div> 
</body> 
</html>