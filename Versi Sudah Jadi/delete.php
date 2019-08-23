<?php
include "koneksi.php";
$id = $_POST['id'];
$query = mysqli_query($koneksi, "delete from biodata where id='$id'");
if ($query) {
    ?><script language="javascript">
        document.location.href = "table.php";
    </script>
<?php
} else {
    echo "gagal hapus data";
}
?>