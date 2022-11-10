<?= $this->extend('layout/dashboard-layout-warga');?>
<?= $this->section('content');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
<button class="btn btn-primary" style="margin-bottom: 2%" data-toggle="modal" data-target="#infoModal">Informasi tentang halaman ini</button>
<?php
foreach ($pengumuman as $row) {
?>
                  <div class="card">
                    <div class="card-header">
                    Di buat/Di ubah tanggal <?= $row['tanggal'] ?>
                    </div>
                    <div class="card-body"><h5 class="card-title">Isi Pengumuman:</h5>
                    <p class="card-text"><?= $row['pengumuman'] ?></p>
                    <a href="<?= site_url('pengumumanwarga/view/').$row['id_pengumuman'] ?>" class="btn btn-info">KOMENTAR</a>
                    </div>
                </div>
<?php
        }
?>



<!-- modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <p>Halaman ini berfungsi untuk melihat pengumuman yang di umumkan oleh RT</p>
            </div>
        </div>
        </div>

</body>
</html>
<?= $this->endSection() ?>
