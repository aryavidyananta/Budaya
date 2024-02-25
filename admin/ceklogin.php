<?php
session_start();

if(isset($_GET['Keluar'])=='yes'){
    session_destroy();
    header('Location: index.php');
    
}

include("../code/koneksi.php");

if (isset($_POST['submit'])) {
    global $connect;

    $Username = mysqli_real_escape_string($connect, $_POST['Username']);
    $Password = mysqli_real_escape_string($connect, $_POST['Password']);

    $sql = "SELECT * FROM admin WHERE Username='" . $Username . "' AND Password='" . $Password . "' ";

    $result = mysqli_query($connect, $sql);
    $numrow = mysqli_num_rows($result);

    $r = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($numrow > 0) {
        $_SESSION['loginadmin'] = $r['Username'];
        $_SESSION['loginadminid'] = $r['ID'];
        $_SESSION['loginadminemail'] = $r['email'];
        $_SESSION['loginadminnama'] = $r['Nama'];

        // Redirect ke index.php setelah login berhasil
        header("Location: index.php");
        exit;
    } else {
        $error = "Username dan password salah";
        header("Location: index.php?error=" . $error);
        exit;
    }
}

if (empty($_SESSION['loginuser'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class=" w20 fn loginpage">
        <div class="logo">

        </div>
        <form action="" method="POST">
            <div class='user'>
                <label for="">Username</label><br>
                <input type="text" name="Username" placeholder="Username">
            </div>

            <div class='user'>
                <label for="">Password</label><br>
                <input type="password" name="Password">
            </div>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>
<?php
exit;
}
?>
