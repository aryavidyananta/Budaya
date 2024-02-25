<div class="mainpage">

<div class="content">
    <?php
    global $connect;

    $sql = mysqli_query($connect,"SELECT * FROM upload WHERE Terbit='1' ORDER BY ID DESC LIMIT 0,10");

    while ($b = mysqli_fetch_array($sql)){
        extract($b);
        echo '

        <div class="boxnews"> 
            <div class="img">
                <img src="'.URL_SITUS.$Gambar.'">
            </div>
            <h1><a href="./?open=detail&id='.$ID.'">'.$Judul.'</a></h1>
            <p>'.substr(strip_tags($Isi),0,200), '</p>
            <div class="clear"></div>


        </div>
        
      
        ';
    }
    ?>

</div>
<div class="sidebar">
    
    <div class="bar-menu">
        Berita Populer

    </div>

    <div>
        <?php
        global $connect;

        $pop = mysqli_query($connect, "SELECT * FROM upload WHERE Terbit='1' AND Tanggal >= '" . date('Y-m-d H:i:s', strtotime('-7 days')) . "' ORDER BY view DESC LIMIT 0,10");



        while ($r = mysqli_fetch_array($pop)){
            extract($r);
            echo'
            <div class="side-box">
                <div class="img">
                    <img src="'.URL_SITUS.$Gambar.'">
                </div>
                <span>'.substr($Tanggal, 0,10).' | view: <b>'.$View.' </b></span>

                <h1><a href="./?open=detail&id='.$ID.'">'.$Judul.'</a></h1>
                <div class="clear"></div>


            </div>

            ';
        }

        ?>
    </div>

</div>

    <div class="clear"></div>


</div>