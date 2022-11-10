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
<div style="margin-bottom:2%;">
<button class="btn btn-primary"  data-toggle="modal" data-target="#infoModal">Informasi tentang halaman ini</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#export">Cari data keuangan spesifik</button>
</div>
<center>
<div class="container">
 <div class="row">
    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">TOTAL UANG:</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($totaluangrt['totaluang'],2,',','.'); ?></h5>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">TOTAL PEMASUKAN:</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($totalpemasukan['totalmasuk'],2,',','.'); ?></h5>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">TOTAL PENGELUARAN:</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($totalpengeluaran['totalkeluar'],2,',','.'); ?></h5>
  </div>
</div>
    </div>
 </div>


  <div class="row">
    <div class="col-sm">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">PEMASUKAN BULAN INI</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($masukbulanini['totalmasukbulanini'],2,',','.'); ?></h5>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">PENGELUARAN BULAN INI</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($keluarbulanini['totalkeluarbulanini'],2,',','.'); ?></h5>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">BELUM MEMBAYAR BULAN INI</div>
  <div class="card-body text-primary">
    <h5 class="card-title"><?= "Rp " . number_format($belumbayarbulanini['totalbelumbayarbulanini'],2,',','.'); ?></h5>
  </div>
    </div>
  </div>
</div>
</center>
<h2 style="text-align: center;">Data Keuangan</h2>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-bordered" id="tabeluang">
                <thead>
                    <tr>
                        <th>Nominal</th>
                        <th>Aksi</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Orang yang terkait</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($keuangan as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nominal'] ?></td>
                            <td><?= $row['aksi'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['nama_warga'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
 </div>
<div style="margin-top: 10%">

</div>


  <!-- Modal cari Product-->
  <form action="/keuanganwarga/caridetailKeuangan" method="post">
        <div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Record Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Di antara Tanggal</label>
                    <input type="date" class="form-control" name="start_date" placeholder="tanggal">
                </div>

                <div class="form-group">
                    <label>Hingga Tanggal</label>
                    <input type="date" class="form-control" name="end_date" placeholder="tanggal">
                </div>
                

                <div class="form-group">
                    <label>Aksi (Uang masuk atau keluar atau yang belum membayar)</label>
                    <select name="aksi_cari" class="form-control">
                        <option value="semua">Semua Aksi</option>
                        <option value="masuk">masuk</option>
                        <option value="keluar">keluar</option>
                        <option value="belum membayar">belum membayar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih Kategori (Jika di butuhkan)</label>
                    <select name="id_kategori" class="form-control">
                        <option value="semua">Semua Kategori</option>
                        <?php foreach($kategori as $row):?>
                        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->



 <!-- modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Halaman Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <p>Halaman ini berfungsi untuk melihat data keuangan di RT anda</p>
             <p><b>Terdapat tabel yang memiliki kolom:</b></p>
             <p><b>Nominal :</b> adalah nominal atau jumlah uang</p>
             <p><b>Aksi : adalah operasi uang,terdapat 3 operasi:</b></p>
             <p><b>Masuk :</b> adalah uang yang masuk ke dalam keuangan rt</p>
             <p><b>Keluar :</b> adalah uang yang di keluarkan dari rt</p>
             <p><b>Belum bayar :</b> adalah nominal uang yang belum di bayar oleh seorang warga(untuk nama warga tidak di tampilkan)</p>
             <p><b>Kategori :</b> adalah kategori di mana uang tersebut berada</p>
             <p><b>Tanggal :</b> adalah tanggal data tersebut di buat</p>
             <p><b>Deskripsi :</b> adalah informasi tambahan yang di buat oleh RT/pengurus dari data yang terkait</p>
            </div>
        </div>
        </div>

</body>
<script>
$(document).ready(function(){
 
    $('#tabeluang').DataTable({
    });

});
</script>
</html>
<?= $this->endSection() ?>
