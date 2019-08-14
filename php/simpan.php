<?php
include "koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$usia = $_POST['usia'];
$query = mysqli_query($koneksi, "update biodata set nama='$nama', alamat='$alamat', usia='$usia' where id='$id'");
if ($query) {
    ?><script language="javascript">
	document.location.href = "table.php";
</script>
<?php
} else {
    echo "Gagal update data";
    echo mysqli_error($koneksi);
}
?>