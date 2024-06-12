<?php 
require_once('config/conn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Username</label>
        <input type="text" name="username">
        <br>
        <label for="">Password</label>
        <input type="text" name="password">
        <button name="submit">Login</button>
    </form>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($result) >= 1){
        $user = mysqli_fetch_assoc($result);
        if(md5($password) == $user['password']){
            $_SESSION['id_user'] = $user['user_id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Login berhasil!')</script>";
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Password salah!')</script>";
        }
    } else {
        echo "<script>alert('username tidak ditemukan!')</script>";
    }

}

