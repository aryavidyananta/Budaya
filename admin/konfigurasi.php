<?php


if (isset($_POST['tambahkonfigurasi'])){

    global $connect;

    $sql = mysqli_query($connect,"INSERT INTO konfigurasi (Nama,Task,Isi,Link,Tipe) VALUES ('".$_POST['Nama']."','".$_POST['Task']."','".$_POST['Isi']."','".$_POST['Link']."','konfigurasi') ");

}



if(isset($_POST['uploadlogo'])){
    if(!empty($_FILES['logositus']['name']) && ($_FILES['logositus']['error'] !==4)){
        $filetype = $_FILES['logositus']['type'];

        $allowtype = array('image/jpg', 'image/jpeg', 'image/png');

        if(!in_array($filetype, $allowtype)){
            echo 'invalid file type';
        }else{
            $dest = '../'.PATH_LOGO.'/'.FILE_LOGO;

            copy($_FILES['logositus']['tmp_name'], $dest);
        }
    }
}

?>


<div class="w60 fl">
<form action="./?mod=useradmin" method="POST" enctype="multipart/form-data">

    <fieldset>
        <legend>Logo Situs</legend>

        

        <div class="clear"></div>

        <div class="clear">
            
        </div>

        <input type="file" name="logositus">

        <input type="submit" name="uploadlogo" value="Upload Logo">

    </fieldset>
</form>
</div>

<div class="w40 fl">
<form action="./?mod=useradmin" method="POST" enctype="multipart/form-data">
    
    <fieldset>
        <legend>Icon Situs</legend>

        

        <div class="clear"></div>

        <input type="file" name="Iconsitus">

        <input type="submit" name="uploadicon" value="Upload Icon">

    </fieldset>
</form>
</div>

<div class="clear"></div>

<div class="w100 fl">
    <form action="./?mod=konfigurasi" method="POST">
        <fieldset>
            <legend>Tambah Konfigurasi</legend>

            <div class="w20 fl pd5 bg_dark bold">Nama</div>
            <div class="w15 fl pd5 bg_dark bold">Task</div>
            <div class="w30 fl pd5 bg_dark bold">Isi</div>
            <div class="w30 fl pd5 bg_dark bold">Link</div>

            <div class="w20 fl pd5 bg_grey">
                <input type="text" name="Nama" placeholder="Nama" class="form100">
            </div>
            <div class="w20 fl pd5 bg_grey">
                <input type="text" name="Task" placeholder="Task" class="form100">
            </div>
            <div class="w30 fl pd5 bg_grey">
                <input type="text" name="Isi" placeholder="Isi" class="form100">
            </div>
            <div class="w30 fl pd5 bg_grey">
                <input type="text" name="Link" placeholder="Link" class="form100">
            </div>
            <div class="clear pd5"></div>
            <input type="submit" name="tambahkonfigurasi" value="Tambah" class="btn-primary">
            <div class="clear"></div>
        </fieldset>
    </form>
<div class="clear"></div>
</div>

<div class="clear"></div>





