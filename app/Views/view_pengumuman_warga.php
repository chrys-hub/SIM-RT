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
    <a href="/pengumumanwarga" class="btn btn-info">KEMBALI</a>
<div class="card">
<?php
foreach ($pengumuman as $row) {
?>
                  
                    <div class="card-header">
                    Di buat/Di ubah tanggal <?= $row['tanggal'] ?>
                    </div>
                    <div class="card-body"><h5 class="card-title">Isi Pengumuman:</h5>
                    <p class="card-text"><?= $row['pengumuman'] ?></p>
                    <form action="/PengumumanWarga/komentar" method="post">
                    <div class="form-group">
                        <label for="isi_komentar">Komentari pengumuman ini:</label>
                        <input type="text" class="form-control" id="isi_komentar" name="isi_komentar" placeholder="Komentar anda">
                    </div>
                    <div class="form-group">
                    <input type="hidden" class="form-control" name="id_pengumuman" value="<?=$row['id_pengumuman'];?>">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                    </div>
                    </form>
<?php
        }
?>
<h4>Kolom Komentar</h4>
<?php
foreach ($komentar as $row) {
?>
<div class="media p-3 mb-2 bg-primary text-white">
  <div class="media-body">
    <h6 class="mt-0">Komentar Dari: <?= $row['nama_komentator']; ?></h6>
   <?= $row['isi_komentar'];?>
  </div>
</div>
<?php
        }
?>
</div>
</div>
</body>
</html>
<?= $this->endSection() ?>
