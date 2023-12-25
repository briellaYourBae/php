<?php
require_once "config.php";
$nama = "";
$username = "";
$password = "";

$namerr = "";
$usernamerr = "";
$passworderr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = trim($_POST['nama']);
    if(empty($nama)){
        $namerr = "Silahkan isi kolom nama";
    }
    $username = trim($_POST['username']);
    if(empty($username)){
        $usernamerr = "Silahkan isi kolom username";
    }
    $password = trim($_POST['password']);
    if(empty($password)){
        $passworderr = "Silahkan isi kolom password";
    }
    if(empty($namerr) && empty($usernamerr) && empty($passworderr)){
         // Prepare an insert statement
         $sql = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";

         if($statement = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($statement, "sss", $paramname, $paramusername, $parampassword);
            //set param
            $paramname = $nama;
            $paramusername = $username;
            $parampassword = $password;

             // Attempt to execute the prepared statement
             if(mysqli_stmt_execute($statement)){
                //if insert success
                header("location: index.php");
                (exit);
             }
         }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah | Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah data user</h2>
                    </div>
                    <p>Silahkan isi form dibawah ini !</p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?= (!empty($namerr)) ? 'has-error' : ''; ?>" method="post">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" 
                            id="nama">
                            <span class="help-block"><?= $namerr; ?></span>
                        </div>
                        <div class="form-group <?= (!empty($usernamerr)) ? 'has-error' : ''?>">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" 
                            id="username">
                            <span class="help-block"><?= $usernamerr; ?></span>
                        </div>
                        <div class="form-group <?= (!empty($passworderr)) ? 'has-error' : ''?>">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" 
                            id="password">
                            <span class="help-block"><?= $passworderr; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>                   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>