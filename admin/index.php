<?php
session_start(); // Pastikan untuk memulai sesi agar dapat mengakses variabel sesi

// Periksa apakah pengguna sudah login, jika tidak, redirect ke halaman login
if (empty($_SESSION['loginadmin'])) {
    header("Location: login.php"); // Sesuaikan nama file halaman login jika diperlukan
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="headers.css">

    <script src="https://kit.fontawesome.com/53afb437a2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>$(document).ready(function() {
     $('.summernote').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]});
    });
</script>

</head>
<body>
    <header>
        <div class="container">
            <!-- ... (kode yang sudah ada untuk header) ... -->

            <nav>
                <ul>
                    <li><a href="./">Beranda</a></li>
                    <li><a href="?mod=galeri">Galeri</a></li>
                    <li><a href="?mod=berita">Berita</a></li>
                    <li><a href="?mod=event">Event</a></li>
                    <li><a href="?mod=konfigurasi">Konfigurasi</a></li>
                    <li><a href="?mod=useradmin">User Admin</a></li>

                    <span class="fr"><a href="?keluar=yes">Log out</a></span>
                </ul>
            </nav>

            <div class="search-box">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="pd10">
            <?php
            $mod = isset($_GET['mod']) ? $_GET['mod'] : ''; // Hindari pesan kesalahan PHP

            switch ($mod) {
                case 'useradmin':
                    include("useradmin.php");
                    break;

                case 'konfigurasi':
                    include("konfigurasi.php");
                    break;
                case 'event':
                    include("event.php");
                    break;
                case 'berita':
                    include("berita.php");
                    break;
                
                default:
                    echo "Selamat Datang, " . (isset($_SESSION['loginadminnama']) ? $_SESSION['loginadminnama'] : 'Admin') . "!";
                    break;
            }
            ?>
        </div>
    </header>
</body>
</html>
