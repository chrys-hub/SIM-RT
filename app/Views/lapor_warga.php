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
<h3>List Kontak:</h3>
<?php
foreach ($kontak as $row) {
?>
                  <div class="card">
                    <div class="card-header">
                    Nama: <?= $row['nama_rt'] ?>
                    </div>
                    <div class="card-body"><h5 class="card-title">Kontak:</h5>
                    <p class="card-text"><a type="button" class="btn btn-info" href="tel:+<?= $row['no_hp_rt']?>">Hubungi Via Telephone</a></p>
                    <p class="card-text"><a type="button" class="btn btn-success" href="https://wa.me/<?= $row['no_hp_rt']?>" target="_blank">Hubungi Via Whatsapp</a></p>
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
                <h5 class="modal-title" id="exampleModalLabel">Halaman Pelaporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <p>Halaman ini berfungsi untuk melaporkan sesuatu kepada RT anda</p>
             <p>Gunakan tombol kontak untuk menghubungi RT</p>
             <p>Anda dapat langsung menghubungi RT secara langsung untuk melaporkan sesuatu</p>
            </div>
        </div>
        </div>
</body>
</html>
<?= $this->endSection() ?>
