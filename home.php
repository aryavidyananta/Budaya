<?php
include("header.php")
?>
<div class="pt 10 pb10">
    
        <div class="pd10">
            <?php
            $open = isset($_GET['open']) ? $_GET['open'] : ''; // Hindari pesan kesalahan PHP

            switch ($open) {
              
                case 'berita':
                    include("berita.php");
                    break;
                
                default:
                include("depan.php");
                    break;
            }
            ?>
        </div>

    <?php
    include("footer.php");
    ?>