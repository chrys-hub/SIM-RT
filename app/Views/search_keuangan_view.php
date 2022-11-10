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
    <script src="/js/jquery.table2excel.js"></script>
    
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<button type="button"  class="btn btn-success mb-2" id="export">Export excel</button>
<table class="table table-hover table-bordered" id="myTable">
                <thead>
                    <tr class="table-primary">
                        <th>Nominal</th>
                        <th>Kategori</th>
                        <th>Orang Yang Berkaitan</th>
                        <th>Aksi Keuangan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th></th>
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
                    <tr>
                    <td colspan="2"><b>TOTAL UANG YANG BELUM DI BAYAR:<?= "Rp " . number_format($belumbayar['totalbelumbayar'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong1"></td>
                    <td colspan="2"><b>TOTAL PEMASUKAN:<?= "Rp " . number_format($pemasukan['totalmasuk'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong2"></td>
                    <td colspan="2"><b>TOTAL PENGELUARAN:<?= "Rp " . number_format($pengeluaran['totalkeluar'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong3"></td>
                    <td></td>
                    </tr>
                </tbody>
            </table>

            
            
            
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
                    <label>Tanggal uang masuk/keluar</label>
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

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.table2excel.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#myTable').DataTable({
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
     $('.id_warga').val(idwarga).trigger('change');
     $('.id_kategori').val(idkategori).trigger('change');
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
$('#export').on('click',function(){
    $("#myTable").table2excel({
            filename: "datakeuangan.xls",
            exclude: ".btn-edit",
            exclude: ".btn-delete",
        });
});

});


</script>
</body>

</html>

<?= $this->endSection() ?>