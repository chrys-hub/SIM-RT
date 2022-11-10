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
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-bordered" id="tabelakunwarga">
                <thead>
                    <tr class="table-primary">
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>NO.KK</th>
                        <th>ROLE</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Status</th>
                        <th>Hubungi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($akunwarga as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nama_warga'] ?></td>
                            <td><?= $row['nik_akun_warga'] ?></td>
                            <td><?= $row['no_kk_akun_warga'] ?></td>
                            <td><?= $row['role_warga'] ?></td>
                            <td><?= $row['username_warga'] ?></td>
                            <td><?= $row['password_warga'] ?></td>
                            <td><?= ($row['status'] == 'false')? 'belum terkonfirmasi' : $row['status'];  ?></td>
                            <td><a href="https://api.whatsapp.com/send/?phone=<?= $row['no_hp_warga']?>&text&app_absent=0" target="_blank">Hubungi</a>
</td>
                            <td>
                            <button class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id_akun_warga'];?>" data-status="<?= $row['status'];?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_akun_warga'];?>">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

 </div>
            

<?= $pager->links() ?>


<!-- Modal Edit status warga-->
<form action="/konfirmasiwarga/konfirmasi" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label>Status (Bisa di ubah)</label>
                    <select name="status" class="form-control status" required>
                        <option value="">-Select-</option>
                        <option value="false">belum di konfirmasi</option>
                        <option value="terkonfirmasi">terkonfirmasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Role (Bisa di ubah)</label>
                    <select name="role_warga" class="form-control status" required>
                        <option value="">-Select-</option>
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                        <option value="Anak/Istri">Anak/Istri</option>
                    </select>
            </div>
            </div>
         
            <div class="modal-footer">
                <input type="hidden" name="id_akun_warga" class="id_akun_warga" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <!-- End Modal Edit warga-->
    <form action="/konfirmasiwarga/hapusakunwarga" method="post">
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
             
               <h4>Yakin ingin menghapus akun warga ini?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_akun_warga" class="id_akun_warga">
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

    $('#tabelakunwarga').DataTable({
        paging: false,
        info: false,
    });
 
 // get Edit Product
 $('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     //const status = $(this).data('status');
     const status = $(this).data('status');
     // Set data to Form Edit
     $('.id_akun_warga').val(id);
     $('.status').val(status).trigger('change');
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id_akun_warga').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

});
</script>
</body>

</html>


<?= $this->endSection() ?>

