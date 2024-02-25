<?php
include_once("./code/koneksi.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="headers.css">
    <script src="https://kit.fontawesome.com/53afb437a2.js" crossorigin="anonymous"></script>

</head>
<body>

            <div class="pd10">
<header>
    
        <div class="container">
        
            <div class="logo">
            <img src="gambar/busungbiu-removebg-preview.png" alt="">
            </div>

            <nav>
                <ul>
                    <a href="./">Beranda</a>
                    <?php
                    //$connect = mysqli_connect("localhost", "root", "", "websitebudaya");

                    global $connect;

                    $menu = mysqli_query($connect,"SELECT * FROM kategori WHERE Terbit='1' ORDER BY ID ASC LIMIT 0,10");
                    while ($r = mysqli_fetch_array($menu)){
                        extract($r);

                        echo '
                        <a href="./?open=cat&id='.$ID.'">'.$Kategori.'</a>';

                    }

                    ?>

                    
                   

                    
            <form action="" method="GET">
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
        </header>