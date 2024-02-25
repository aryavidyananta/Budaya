<?php
include("../code/koneksi.php");

if (isset($_POST['tambahkategori'])) {
    $hasil = mysqli_query($connect, "INSERT INTO kategori (Kategori, alias, Terbit) VALUES ('".$_POST['Kategori']."', '".$_POST['alias']."', '".$_POST['Terbit']."')");
}

if (isset($_GET['act']) && $_GET['act'] == 'Edit') {
    $id = (int)$_GET['id'];

    global $connect;
    $sql = mysqli_query($connect, "SELECT * FROM kategori WHERE ID = '$id' ");

    while ($r = mysqli_fetch_array($sql)) {
        extract($r);

        $Kategori = $Kategori;
        $Alias = $alias;
        $terbit = $Terbit;
        $ID = $ID;
    }
}
?>

<div class="w100">
    <form action="./?mod=event" method="POST">

    <input type="hidden" name="ID" value="<?=$ID;?>">

    <fieldset>
        <legend>Tambah Kategori</legend>

        <div class="formnama w30">kategori:<br>
        <input type="text" name="Kategori" placeholder="Nama Kategori" value="<?= isset($Kategori) ? $Kategori : ''; ?>" class="form100">
        </div>

        <div class="formnama w30">Alias:<br>
        <input type="text" name="alias" placeholder="Alias" value="<?= isset($Alias) ? $Alias : ''; ?>" class="form100">
        </div>

        <div class="formnama w30">Tampilkan:<br>
            <select name="Terbit">
                <option value="1" <?= isset($terbit) && $terbit == 1 ? 'selected' : ''; ?>>Yes</option>
                <option value="0" <?= isset($terbit) && $terbit == 0 ? 'selected' : ''; ?>>No</option>
            </select>
        </div>

        <input type="submit" name="<?= isset($ID) ? 'editkategori' : 'tambahkategori'; ?>" value="<?= isset($ID) ? 'Edit' : 'tambah'; ?>" class="btn-primary">

    </fieldset>
    </form>
</div>
<div class="clear"></div>

<div class="w100">
    <fieldset>
        <legend>List Kategori</legend>

        <div class=" w100 fl list bg_dark">
            <div class="w5 fl">ID</div>
            <div class="w40 fl center">Kategori Name</div>
            <div class="w20 fl">Alias</div>
            <div class="w30 fl">Aksi</div>
            <div class="clear"></div>
        </div>

        <?php
        include("../code/koneksi.php");
        global $connect;

        $sql = mysqli_query($connect,"SELECT * FROM kategori ORDER BY ID DESC");
        while($r = mysqli_fetch_array($sql)) {
            extract($r);
        ?>
        <div class=" w100 fl list bg_dark">
            <div class="w5 fl"><?=$ID?></div>
            <div class="w40 fl center"><?=$Kategori?></div>
            <div class="w20 fl"><?=$alias?></div>
            <div class="w30 fl">
                <a href="./?mod=kategori&act=Edit&id=<?=$ID?>" class="btn btn-primary small">Edit</a>
                <a href="./?mod=kategori&act=Delete&id=<?=$ID?>" class="btn btn-red small">Delete</a>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
        ?>
    </fieldset>
</div>
<div class="clear"></div>
