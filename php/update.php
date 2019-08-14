<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from biodata where id='$id'");
?>
<form action="simpan.php" method="post">
    <table border="1">
        <?php
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" /></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea cols="20" rows="5" name="alamat"><?php echo $row['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia" value="<?php echo $row['usia']; ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" name="simpan" /></td>
            </tr>
        <?php
        }
        ?>
    </table>
</form>