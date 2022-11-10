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
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah Data Warga Baru</button>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-bordered" id="TabelWarga">
                <thead>
                    <tr class="table-primary">
                        <th>Nama Warga</th>
                        <th>NIK</th>
                        <th>NO.KK</th>
                        <th>GAMBAR KTP</th>
                        <th>GAMBAR KK</th>
                        <td>EDIT/DELETE</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($warga as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nama_warga'] ?></td>
                            <td><?= $row['nik_warga'] ?></td>
                            <td><?= $row['no_kk_warga'] ?></td>
                            <td>
                            <?php if($row['gambar_ktp_warga'] == NULL) : ?>
                            <p>Belum Memasukan</p>
                            <?php elseif($row['gambar_ktp_warga']!= NULL) : ?>
                            <a href="/upload/ktp/<?= $row['gambar_ktp_warga'] ?>" download>Unduh</a>
                            <?php endif; ?>
                            </td>
                            <td><a href="/upload/kk/<?= $row['gambar_kk_warga'] ?>" download>Unduh</a></td>
                            <td><button class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id_warga'];?>"
                            data-ktp_old="<?= $row['gambar_ktp_warga'];?>"
                            data-kk_old="<?= $row['gambar_kk_warga'];?>"
                            data-nama_warga="<?= $row['nama_warga'];?>"
                            data-nik="<?= $row['nik_warga'];?>"
                            data-kk="<?= $row['no_kk_warga'];?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_warga'];?>"
                            data-ktp_old="<?= $row['gambar_ktp_warga'];?>"
                            data-kk_old="<?= $row['gambar_kk_warga'];?>">Delete</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
 </div>
 <?= $pager->links() ?>



 <!-- Modal Add Product-->
<form action="/warga/simpanwarga" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data warga baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama Warga</label>
                    <input type="text" class="form-control" name="nama_warga" value="" placeholder="nama warga" required>
                </div>

                <div class="form-group">
                    <label>Nomor NIK Warga</label>
                    <input type="text" class="form-control" name="nik_warga" value="" pattern="[0-9]{16,16}" placeholder="nik warga" required>
                </div>

                <div class="form-group">
                    <label>Nomor KK Warga</label>
                    <input type="text" class="form-control" name="no_kk_warga" value="" pattern="[0-9]{16,16}" placeholder="nomer kk warga" required>
                </div>

                <div class="form-group">
                    <label>Scan/Foto KTP Warga </label>
                    <label>(Tidak perlu di isi jika warga belum memiliki KTP)</label>
                    <input type="file" name="gambar_ktp_warga">
                </div>

                <div class="form-group">
                    <label>Scan/Foto KK Warga (Wajib di isi)</label>
                    <input type="file" name="gambar_kk_warga" required>
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
<form action="/warga/editwarga" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Warga</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
          
            <div class="form-group">
                    <label>Nama Warga</label>
                    <input type="text" class="form-control nama_warga" name="nama_warga" value="" placeholder="nama warga" required>
                </div>

                <div class="form-group">
                    <label>Nomor NIK Warga</label>
                    <input type="text" class="form-control nik_warga" name="nik_warga" value="" pattern="[0-9]{16,16}" placeholder="nik warga" required>
                </div>

                <div class="form-group">
                    <label>Nomor KK Warga</label>
                    <input type="text" class="form-control no_kk_warga" name="no_kk_warga" value="" pattern="[0-9]{16,16}" placeholder="nomer kk warga" required>
                </div>

                <div class="form-group">
                    <label>Scan/Foto KTP Warga </label>
                    <label>(Kosongi jika tidak ingin di rubah)</label>
                    <input type="file" name="gambar_ktp_warga">
                </div>

                <div class="form-group">
                    <label>Scan/Foto KK Warga (Kosongi jika tidak ingin dirubah)</label>
                    <input type="file" name="gambar_kk_warga">
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_warga" class="id_warga" value="">
                <input type="hidden" name="ktp_old" class="ktp_old" value="">
                <input type="hidden" name="kk_old" class="kk_old" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
             
            </div>
            </div>
        </div>
        </div>
    </form>


    <form action="/warga/hapuswarga" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Yakin ingin menghapus warga ini?,semua record keuangan yang berhubungan dengan warga ini akan terhapus</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_warga" class="id_warga">
                <input type="hidden" name="ktp_old" class="ktp_old" value="">
                <input type="hidden" name="kk_old" class="kk_old" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
        </div>
        </form>

</body>
<script>
$(document).ready(function(){
 
    $('#TabelWarga').DataTable({
        paging: false,
    info: false,
    });

// get Edit Product
$('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     const nama_warga = $(this).data('nama_warga');
     const nik = $(this).data('nik');
     const kk = $(this).data('kk');
     //get old gambar data
     const ktp_old = $(this).data('ktp_old');
     const kk_old = $(this).data('kk_old');
     //set to edit form of old data
     $('.ktp_old').val(ktp_old);
     $('.kk_old').val(kk_old);
     // Set data to Form Edit
     $('.nama_warga').val(nama_warga);
     $('.nik_warga').val(nik);
     $('.no_kk_warga').val(kk);
     $('.id_warga').val(id);
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const ktp_old = $(this).data('ktp_old');
            const kk_old = $(this).data('kk_old');
            // Set data to Form Edit
            $('.id_warga').val(id);
            $('.ktp_old').val(ktp_old);
     $('.kk_old').val(kk_old);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

});
</script>
</html>


<?= $this->endSection() ?>

