<?php
//define(DBHOST, localhost);
//define(DBUSER, root);
//define(DBPASS, '');
//define(DBNAME, berita);

define('URL_SITUS', 'http://localhost/WebsiteBudaya/');
define('PATH_LOGO', 'image');
define('PATH_GAMBAR', 'photo');
define('FILE_LOGO', 'logo.png');
define('FILE_ICON', 'icon.png');


$connect = mysqli_connect("localhost", "root", "", "berita");

if(mysqli_connect_error()){
    echo "Gagal koneksi Ke database". mysqli_connect_error();

}


?>