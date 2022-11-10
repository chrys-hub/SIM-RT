<?= $this->extend('layout/dashboard-layout-rt');?>
<?= $this->section('content');?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Sticky Footer Template · Bootstrap v5.0</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
</head>

<body>
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah Data Keuangan</button>
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exportFind">Cari dan Export Data Keuangan</button>
<center>
<div>
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
    <h5 class="card-title"><?= "Rp " .number_format($belumbayarbulanini['totalbelumbayarbulanini'],2,',','.');  ?></h5>
  </div>
    </div>
  </div>
</div>
</center>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-bordered" id="tabeluang">
                <thead>
                    <tr class="table-primary">
                        <th>Nominal</th>
                        <th>Kategori</th>
                        <th>Orang Yang Berkaitan</th>
                        <th>Aksi Keuangan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($keuangan as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nominal'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['nama_warga'] ?></td>
                            <td><?= $row['aksi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td>
                            <button class="btn btn-info btn-sm btn-edit" 
                            data-id="<?= $row['id_uang'];?>"
                            data-nominal="<?= $row['nominal'];?>"
                            data-aksi="<?= $row['aksi'];?>"
                            data-tanggal="<?= $row['tanggal'];?>"
                            data-deskripsi="<?= $row['deskripsi'];?>"
                            data-idwarga="<?= $row['id_warga'];?>"
                            data-idkategori="<?= $row['id_kategori_uang'];?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_uang'];?>">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            

<?= $pager->links() ?>
</div>

<div style="margin-top: 10%">

</div>


<!-- Modal Add Product-->
<form action="/keuangan/simpankeuangan" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" class="form-control" name="nominal" placeholder="Nominal" required>
                </div>

                <div class="form-group">
                    <label>Aksi (Uang masuk atau keluar atau belum membayar)</label>
                    <select name="aksi" class="form-control" required>
                        <option value="masuk">masuk</option>
                        <option value="keluar">keluar</option>
                        <option value="belum membayar">belum membayar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal uang masuk/keluar</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="tanggal" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php foreach($kategori as $row):?>
                        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pembayar/Orang Yang Terkait (Kosongi jika tidak ada)</label>
                    <select name="id_warga" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($warga as $row):?>
                        <option value="<?= $row['id_warga'] ?>"><?= $row['nama_warga'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Catatan/Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="deskripsi">
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit status warga-->
<form action="/keuangan/updatekeuangan" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record Keuangan</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
       
            <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" class="form-control" name="nominal" placeholder="Nominal" required>
                </div>

                <div class="form-group">
                    <label>Aksi (Uang masuk atau keluar)</label>
                    <select name="aksi" class="form-control">
                        <option value="masuk">masuk</option>
                        <option value="keluar">keluar</option>
                        <option value="belum membayar">belum membayar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal uang masuk/keluar/belum membayar</label>
                    <input type="date" class="form-control tanggal" name="tanggal" value="" placeholder="tanggal">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control id_kategori" required>
                        <?php foreach($kategori as $row):?>
                        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pembayar/Orang Yang Terkait</label>
                    <select name="id_warga" class="form-control id_warga">
                        <?php foreach($warga as $row):?>
                        <option value="<?= $row['id_warga'] ?>"><?= $row['nama_warga'] ?></option>
                        <?php endforeach;?>
                        <option value="">Tidak ada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Catatan/Deskripsi</label>
                    <input type="text" class="form-control deskripsi" value="" name="deskripsi" placeholder="deskripsi">
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_uang" class="id_uang">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>


    <!-- Modal Delete Product-->
    <form action="/keuangan/deletekeuangan" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Yakin ingin menghapus record keuangan ini?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_uang" class="id_uang">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
        </div>
        </form>



        <!-- Modal cari Product-->
<form action="/keuangan/carikeuangan" method="post">
        <div class="modal fade" id="exportFind" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){

    $('#tabeluang').DataTable({
        paging: false,
        info: false,
    });
  // get Edit Product
  $('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     const nominal = $(this).data('nominal');
     const aksi = $(this).data('aksi');
     const tanggal = $(this).data('tanggal');
     const deskripsi = $(this).data('deskripsi');
     const idkategori = $(this).data('idkategori');
     const idwarga =  $(this).data('idwarga');
     // Set data to Form Edit
     $('.id_uang').val(id);
     $('.nominal').val(nominal);
     $('.aksi').val(aksi).trigger('change');
     $('.tanggal').val(tanggal).trigger('change');
     $('.deskripsi').val(deskripsi);
     $('.id_kategori').val(idkategori).trigger('change');
     $('.id_warga').val(idwarga).trigger('change');
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id_uang').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

});
</script>
</body>

</html>

<?= $this->endSection() ?>