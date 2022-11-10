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
<button type="button" class="btn btn-success mb-2" <?= $totalpengumuman >= 1 ? 'disabled' : '';?> data-toggle="modal" data-target="#addModal">Tambah Pengumuman</button>
<h6>Maks 1 Pengumuman!,anda bisa mengedit atau menghapus pengumuman untuk membuat pengumuman baru</h6>
<div class="table-responsive">
<table class="table table-hover table-bordered" id="TabelPengumuman">
                <thead>
                    <tr class="table-primary">
                        <th>Isi Pengumuman</th>
                        <th>Tanggal pembuatan</th>
                        <td>EDIT/DELETE</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pengumuman as $row) {
                    ?>
                        <tr>
                            <td><?= $row['pengumuman'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td>
                            <button class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id_pengumuman'];?>"
                            data-tanggal="<?= $row['tanggal'];?>"
                            data-pengumuman="<?= $row['pengumuman'];?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_pengumuman'];?>">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
 </div>
 <?= $pager->links() ?>


<!-- Modal Add Product-->
<form action="/pengumuman/simpanpengumuman" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Isi pengumuman</label>
                    <textarea class="form-control" name="pengumuman" placeholder="isi pengumuman..." required></textarea>
                </div>
                <div class="form-group">
                    <label>Tanggal di buat</label>
                    <input type="date" class="form-control" name="tanggal" required>
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
<form action="/pengumuman/editpengumuman" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    
            <div class="form-group">
                    <label>Isi pengumuman</label>
                    <textarea class="form-control pengumuman" name="pengumuman" value="" placeholder="isi pengumuman..." required></textarea>
                </div>
                <div class="form-group">
                    <label>Tanggal di buat</label>
                    <input type="date" class="form-control tanggal"  name="tanggal" value="" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_pengumuman" class="id_pengumuman">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <form action="/pengumuman/deletepengumuman" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Yakin ingin menghapus pengumuman?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_pengumuman" class="id_pengumuman">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
        </div>
        </form>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
 $('#TabelPengumuman').DataTable({
    paging: false,
    info: false,
 });


// get Edit Product
$('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     //const status = $(this).data('status');
     const pengumuman = $(this).data('pengumuman');
     const tanggal = $(this).data('tanggal');
     // Set data to Form Edit
     $('.id_pengumuman').val(id);
     $('.pengumuman').val(pengumuman);
     $('.tanggal').val(tanggal).trigger('change');
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id_pengumuman').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
});
</script>
</body>

</html>


<?= $this->endSection() ?>

