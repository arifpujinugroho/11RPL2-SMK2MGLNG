<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "select * from biodata");
$jml = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sudah Jadi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Table Biodata</h1>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Nomor</th>
                <th>nama</th>
                <th>Alamat</th>
                <th>Usia</th>
                <th>aksi</th>
            </tr>
            <?php
    $c = 0;
    while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $c = $c + 1; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['usia']; ?></td>
                <td>
                    <div class="">
                        <button data-toggle="tooltip" title="Edit <?= $row['nama']; ?>"  data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama']; ?>"
                            data-alamat="<?= $row['alamat']; ?>" data-usia="<?= $row['usia']; ?>" class="editData btn btn-sm btn-warning">Edit</button>
                        <button data-toggle="tooltip" title="Hapus <?= $row['nama']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama']; ?>" class="hapusData btn btn-sm btn-danger">Hapus</button>
                    </div>
                </td>
            </tr>
            <?php
    }
    ?>
        </table><br>
        <button class="btn btn-primary tambahBiodata">Tambah Biodata</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah-biodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Biodata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <input type="text" name="usia" class="form-control" placeholder="Usia">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-biodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Biodata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="simpan.php" method="post">
                        <input type="hidden" id="idedit" name="id">
                        <div class="form-group">
                            <input type="text" id="namaedit" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" id="alamatedit" name="alamat" class="form-control" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <input type="text" id="usiaedit" name="usia" class="form-control" placeholder="Usia">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal -->
        <div class="modal fade" id="hapus-biodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Biodata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="isinya"></p>
                </div>
                <div class="modal-footer">
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" id="idhapus">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.tambahBiodata').click(function () {
            $('#tambah-biodata').modal('show');
        });

        $('.editData').click(function () {
            $('#idedit').val($(this).data('id'));
            $('#namaedit').val($(this).data('nama'));
            $('#alamatedit').val($(this).data('alamat'));
            $('#usiaedit').val($(this).data('usia'));
            $('#edit-biodata').modal('show');
        });
        
        $('.hapusData').click(function () {
            $('#idhapus').val($(this).data('id'));
            var nama = ($(this).data('nama'));
            $('#isinya').html('Apakah anda ingin menghapus <strong class="text-danger">'+ nama +'</strong> ?');
            $('#hapus-biodata').modal('show');
        });
    </script>
</body>

</html>