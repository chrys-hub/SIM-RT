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
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah Kategori</button>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-bordered" id="TabelKategori">
                <thead>
                    <tr class="table-primary">
                        <th>Nama Kategori</th>
                        <td>EDIT/DELETE</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kategori as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td>
                            <button class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id_kategori'];?>"
                            data-namakategori="<?= $row['nama_kategori'];?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_kategori'];?>">Delete</button>
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
<form action="/kategori/simpankategori" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" required>
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
<form action="/kategori/editkategori" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control nama_kategori" name="nama_kategori" value="" placeholder="Nama Kategori" required>
                </div>
          
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_kategori" class="id_kategori">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <form action="/kategori/deletekategori" method="post">
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
             
               <h4>Yakin ingin menghapus kategori ini?,semua record keuangan yang memakai kategori ini akan ikut terhapus</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_kategori" class="id_kategori">
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
 $('#TabelKategori').DataTable({
    paging: false,
    info: false,
 });

 // get Edit Product
 $('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     //const status = $(this).data('status');
     const namakategori = $(this).data('namakategori');
     // Set data to Form Edit
     $('.id_kategori').val(id);
     $('.nama_kategori').val(namakategori);
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id_kategori').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

});
</script>
</body>

</html>


<?= $this->endSection() ?>

