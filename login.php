<?php

include 'db.php';

error_reporting(0);

session_start();
$conn = mysqli_connect("localhost", "root", "", "kpkp") or die("koneksi gagal");
if (isset($_SESSION['login'])) {
    header("Location: dashbrot.php");
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM masuk WHERE user='$user' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['user'];
        $_SESSION['login'] = true;
        header("Location: login.php");
    } else {
        echo "<script>alert('User atau Password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- <?php echo $_SESSION['error'] ?> -->
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                </div>
                <div class="col-md-6 right">
                    <form action="" method="post" enctype="multipart/form">
                        <div class="gambarap">
                            <img src="images/ap.png" alt="Logo Angkasa Pura">
                        </div>
                        <div class="input-box">
                            <header>Login</header>
                            <div class="input-field">
                                <input type="text" class="input" name="user" id="user" required autocomplete="off" value="<?php echo $_POST['board']; ?>">
                                <label for="user">User</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="pass" id="pass" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="submit" class="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center"></footer>
                        <div class="col d-flex align-items-center">
                            <div class="copyright fixed-bottom align-items-center mb-4">
                                <p class="text  align-items-center">Copyright © 2023 Telkom-PENS. All rights reserved</p>
                            </div>
                        </div>
</footer>
</html>