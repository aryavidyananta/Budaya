<?php
include("../code/koneksi.php");

$error = '';

if (isset($_POST['tambahuser'])) {
    $Nama = mysqli_real_escape_string($connect, $_POST['Nama']);
    $Username = mysqli_real_escape_string($connect, $_POST['Username']);
    $Password = mysqli_real_escape_string($connect, $_POST['Password']);
    $Email = mysqli_real_escape_string($connect, $_POST['email']);
    
    $sql = mysqli_query($connect, "SELECT * FROM admin WHERE Username='".$_POST['Username']."' OR email ='".$_POST['email']."' ");
    $hasil = mysqli_num_rows($sql);

    if ($hasil > 0) {
        $error = "Username dan email sudah ada yang punya";
    } else {
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        if (isset($_POST['userid'])) {
            // Mengedit pengguna
            $userid = (int)$_POST['userid'];
            $updateQuery = "UPDATE admin SET Nama='$Nama', Username='$Username', Password='$hashedPassword', email='$Email' WHERE ID='$userid'";
            mysqli_query($connect, $updateQuery);
            $error = "Berhasil mengedit pengguna";
        } else {
            // Menambah pengguna baru
            $insertQuery = "INSERT INTO admin (Nama,='$Nama', Username='$Username', Password='$hashedPassword', email='$Email'";
            mysqli_query($connect, $insertQuery);
            $error = "Berhasil menambahkan pengguna dan admin baru";
        }
    }

}
if (isset($_POST['edituser'])){
    $Nama = mysqli_real_escape_string($connect, $_POST['Nama']);
    $Username = mysqli_real_escape_string($connect, $_POST['Username']);
    $Password = mysqli_real_escape_string($connect, $_POST['Password']);
    $Email = mysqli_real_escape_string($connect, $_POST['email']);

    $sql = mysqli_query($connect, "UPDATE admin SET Username='$Username', Nama ='$Nama', email='$Email' WHERE ID = '".$_POST['userid']."'");

    $error = "Data user admin berhasil diperbahuri";
}

if (isset($_GET['act']) && $_GET['act'] == 'edit') {
    $id = (int)$_GET['id'];

    $sql = mysqli_query($connect, "SELECT * FROM admin WHERE ID = '$id'");
    $b = mysqli_fetch_array($sql, MYSQLI_ASSOC);
}

if (isset($_GET['act']) && $_GET['act'] == 'hapus') {
    $id = (int)$_GET['id'];

    $sql = mysqli_query($connect, "DELETE FROM admin WHERE ID = '$id'");
    
    $error = "Data user admin berhasil dihapus";
}
?>
<link rel="stylesheet" href="../assets/style.css">
<form action="./?mod=useradmin" method="POST">
    <input type="hidden" name="userid" value="<?=$b['ID']?>">
    <fieldset>
        <legend>Tambah User</legend>

        <div class="formnama">
            <label for="">Nama User</label><br>
            <input type="text" name="Nama" placeholder="Nama Lengkap" value="<?= isset($b['Nama']) ? $b['Nama'] : ''; ?>">
        </div>

        <div class="formnama">
            <label for="">Username</label><br>
            <input type="text" name="Username" placeholder="Username" value="<?= isset($b['Username']) ? $b['Username'] : ''; ?>">
        </div>

        <div class="formnama">
            <label for="">Password</label><br>
            <input type="password" name="Password">
        </div>

        <div class="formnama">
            <label for="">Email</label><br>
            <input type="text" name="email" placeholder="Email address" value="<?= isset($b['email']) ? $b['email'] : ''; ?>">
        </div>

        <input type="submit" name="<?php echo isset($b['ID']) ? 'edituser' : 'tambahuser'; ?>" value="<?php echo isset($b['ID']) ? 'Edit' : 'Tambah'; ?>">

    </fieldset>
</form>

<fieldset>
    <legend>List User</legend>

    <div class="w100">
        <hr>
        <div class="w10" bold f1>ID</div>
        <div class="w20" bold f1>Username</div>
        <div class="w20" bold f1>Nama</div>
        <div class="w20" bold f1>Email</div>
        <div class="w20" bold f1>Aksi</div>
        <div class="clear"></div>
        <hr>

        <?php
        $sql = mysqli_query($connect, "SELECT * FROM admin ORDER BY ID ASC");
        while ($r = mysqli_fetch_array($sql)) {
            extract($r);

            echo '
                <div class="list">
                    <div class="w10" bold f1>' . $ID . '</div>
                    <div class="w20" bold f1>' . $Username . '</div>
                    <div class="w20" bold f1>' . $Nama . '</div>
                    <div class="w20" bold f1>' . $email . '</div>
                    <div class="w20" bold f1>
                        <a href="?mod=useradmin&act=edit&id=' . $ID . '" class="small btn btn-primary">edit </a> | <a href="?mod=useradmin&act=hapus&id=' . $ID . '" class="small btn btn-red">hapus </a>

                    </div>
                    <div class="clear"></div>
                </div>
            ';
        }
        ?>
    </div>
</fieldset>
