<?php

include("../code/koneksi.php");


if (isset($_POST['add'])){
    if(!empty($_FILES['gambar']['name']) && ($_FILES['gambar']['error'] !== 4)){

        $gambarfile = $_FILES['gambar']['tmp_name'];

        $gambarfile_name = $_FILES['gambar']['name'];

        $filetype = $_FILES['gambar']['type'];

        $allowtype = array('image/jpeg', 'image/jpg', 'image/png');

        if(!in_array($filetype, $allowtype))
        {
            echo 'invalid file type';
            exit;

        }
      
            $path = PATH_GAMBAR.'/';

        if($gambarfile && $gambarfile_name)
        {

            $gambarbaru = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['judul']);

            $dest1 = '../'.$path.$gambarbaru.'.jpg';
            $dest2 = $path.$gambarbaru.'.jpg';


            copy($_FILES['gambar']['tmp_name'], $dest1);

            $gambar =$dest2;
        }else{
            //$Gambar = $_POST['gambar'];

        }
    }

        global $connect;
        $sql = "INSERT INTO upload (
            Judul,Isi,Kategori,Gambar,Teks,Tanggal,View,Author,Post_type,Terbit)
            VALUES ('".$_POST['judul']."','".$_POST['isi']."','".$_POST['Kategori']."','".$gambar."','".$_POST['teks']."','".date("Y-m-d H:i:s")."','0','".$_SESSION['loginadmin']."','berita','".$_POST['terbit']."')";

            $hasil = mysqli_query($connect,$sql);

    

}

if(isset($_GET['act']) && $_GET['act']=='edit'){

    $ID = (int)$_GET['id'];
    global $connect;

    $sql = mysqli_query($connect, "SELECT * FROM upload WHERE ID='$ID' ");
    while($b = mysqli_fetch_array($sql)){

        extract($b);
        $id = $ID;
        $judul = $Judul;
        $kategori = $Kategori;
        $isi = $Isi;
        $gambar = $Gambar;
        $teks = $Teks;
        $tanggal = $Tanggal;
        $author = $Author;
        $terbit = $Terbit;

        if($isset($_GET['hapusgambar']) && $_GET['hapusgambar']=='yes')
        {
            unlink('../'.$gambar);
            $sqlupdate = mysqli_query($connect, "UPDATE upload SET Gambar='' WHERE ID='$id' ");

            echo'<meta http-equiv="REFRESH" content="0;url=./?mod=berita&act=edit&id='.$id.'" >';
        }
      }
    }
?>

<div class="w100">
    <form action="./?mod=berita" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="id">
    <fieldset>S
        <legend>Tambah berita</legend>

        <div class="formnama">
            <label for="">Judul</label>:<br>
            <input type="text" name="judul" placeholder="Judul berita" value="<?=isset($judul) ? $judul : ''?>" size="40">

        </div>

        <div class="formnama">
            <label for="">Kategori</label>:<br>
            <select name="Kategori" id="">
                <option value="">Pilih kategori</option>
                <?php

                include("../code/koneksi.php");

                global $connect;

                $hasil = mysqli_query($connect,"SELECT * FROM kategori WHERE terbit='1' ORDER BY ID DESC");
                print_r($hasil);
                while ($k = mysqli_fetch_array($hasil)){

                    echo '<option value="'.$k['alias'].'" '.($Kategori==$k['alias'] ? 'Selected' : '').' >'.$k['Kategori'].'</option>';
                }

                ?>
            </select>
        </div>

        <div class="formnama">
            <label for="">Isi Berita</label>:<br>
            <textarea name="isi" id="" cols="80" rows="8" class="summernote"><?=isset($isi) ? $isi : ''?></textarea>
        </div>

        <div class="formnama">
            <label for="">Gambar</label>:<br>
            <?php
            
                $gambar = isset($gambar) ? $gambar : ''; // Inisialisasi $Gambar
            if ($gambar) {
            echo '
            <div class="imgsedang">
            <input type="hidden" name="gambar" value="$gambar">
            <img src="' .URL_SITUS .$gambar. '">
            <a href="./?mod=berita&act=edit&hapusgambar=yes&id='.$id.'">Hapus</a></div>
            </div>
            ';
            
            } else {
            echo '<input type="file" name="gambar">';

}

?>
            
        </div>

        <div class="formnama">
            <label for="">Teks</label>:<br>
            <textarea name="teks" id="" cols="30" rows="5"><?=isset($teks) ? $teks : ''?></textarea>
        </div>

        <div class="formnama">
            <label for="">Terbitkan</label>:<br>
            <select name="terbit" id="">
            <option value="1" <?= isset($b['Terbit']) && $b['Terbit'] == 1 ? 'selected' : '' ?> >Yes</option>
            <option value="0" <?= isset($b['Terbit']) && $b['Terbit'] == 1 ? 'selected' : '' ?> >No</option>

            </select>
        </div>

        <input type="submit" name="<?=isset($b['ID']) ? 'edit' : 'add'?>" value="<?=isset($b['ID']) ? 'Edit' : 'Tambah'?>" class="btn-primary">


        </fieldset>
    </form>
</div>

<div class="clear"></div>
<div class="w100">
    <fieldset>
        <legend>List Berita</legend>

        <div class="w100 list fl bold bg_dark">
            <div class="w10 fl">ID</div>
            <div class="w40 fl">Judul</div>
            <div class="w20 fl">Kategori</div>
            <div class="w20 fl">Tanggal</div>
            <div class="w10 fl">Aksi</div>
            

        </div>
        <?php
        global $connect;

        $hasil = mysqli_query($connect,"SELECT * FROM upload ORDER BY ID DESC");

        while ($b = mysqli_fetch_array($hasil)){
            extract($b);
            ?>

            <div class="w100 list fl">
            <div class="w10 fl"><?=$ID;?></div>
            <div class="w40 fl"><?=$Judul;?></div>
            <div class="w20 fl"><?=$Kategori;?></div>
            <div class="w20 fl"><?=$Tanggal;?></div>
            <div class="w10 fl">
                <a href="./?mod=berita&act=edit&id=<?=$ID;?>" class="btn-primary pd5">edit</a>
                <a href="./?mod=berita&act=hapus&id=<?=$ID;?>" class="btn-red pd5">Hapus</a>

            </div>

        </div>

        <?php
        }

        ?>

    </fieldset>
</div>
