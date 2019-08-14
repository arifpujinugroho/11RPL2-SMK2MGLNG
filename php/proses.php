<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$usia = $_POST['usia'];
$query = mysqli_query($koneksi, "INSERT INTO biodata(nama, alamat, usia) value ('$nama','$alamat','$usia')");
if ($query) {
	?><script language="javascript">
	document.location.href = "table.php";
</script>
<?php
} else {
	echo "gagal input data";
}
?>