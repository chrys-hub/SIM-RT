<?= $this->extend('layout/dashboard-layout');?>
<?= $this->section('content');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data RT dan Desa yang di urus</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery.min.js"></script>
</head>
<body>

<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
<table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomer NIK</th>
                    <th>Nomer KK</th>
                    <th>Desa yang di urus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($akunrt as $row):?>
                <tr>
                    <td><?= $row->nama_rt;?></td>
                    <td><?= $row->nik_rt;?></td>
                    <td><?= $row->no_kk_rt;?></td>
                    <td><?= $row->nama_desa;?></td>
                    <td>
                    <button class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id_rt;?>" data-namart="<?= $row->nama_rt;?>" 
                    data-nikrt="<?= $row->nik_rt;?>" data-kkrt="<?= $row->no_kk_rt;?>"
                    data-nohprt="<?= $row->no_hp_rt?>" data-usernamert="<?= $row->username_rt;?>"
                    data-passwordrt="<?= $row->password_rt;?>"
                    data-iddesaakunrt="<?= $row->id_desa_akunrt;?>">Edit</button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_rt;?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

<!-- Modal Add Product-->
<form action="/Akunrt/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Akun RT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Nama RT</label>
                    <input type="text" class="form-control" name="nama_rt" placeholder="Nama RT" required>
                </div>

                <div class="form-group">
                    <label>Nik RT</label>
                    <input type="text" class="form-control" name="nik_rt" placeholder="NIK Rt" required>
                </div>

                <div class="form-group">
                    <label>Nomer KK RT</label>
                    <input type="text" class="form-control" name="no_kk_rt" placeholder="Nama RT" required>
                </div>

                <div class="form-group">
                    <label>Nomer HP RT (gunakan format 62)</label>
                    <input type="text" pattern="62[0-9]{11,13}" class="form-control" name="no_hp_rt" placeholder="Nomer HP RT" required>
                </div>

                <div class="form-group">
                    <label>username</label>
                    <input type="text" class="form-control" name="username_rt" placeholder="Username di sarankan nama awal rt" required>
                </div>
                
                <div class="form-group">
                    <label>password</label>
                    <input type="text" class="form-control" name="password_rt" placeholder="Password di sarankan nik rt" required>
                </div>

                <div class="form-group">
                    <label>Nama Desa Yang Di Urus</label>
                    <select name="nama_desa_akunrt" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php foreach($desa as $row):?>
                        <option value="<?= $row->id_desa;?>"><?= $row->nama_desa;?></option>
                        <?php endforeach;?>
                    </select>
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



        <!-- Modal Edit Product-->
        <form action="/Akunrt/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <div class="results"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
            <div class="form-group">
                    <label>Nama RT</label>
                    <input type="text" class="form-control nama_rt" name="nama_rt" placeholder="Nama RT" required>
                </div>

                <div class="form-group">
                    <label>Nik RT</label>
                    <input type="text" class="form-control nik_rt" name="nik_rt" placeholder="NIK Rt" required>
                </div>

                <div class="form-group">
                    <label>Nomer KK RT</label>
                    <input type="text" class="form-control no_kk_rt" name="no_kk_rt" placeholder="Nama RT" required>
                </div>

                <div class="form-group">
                    <label>Nomer HP RT</label>
                    <input type="text" class="form-control no_hp_rt" name="no_hp_rt" placeholder="Nomer HP RT" required>
                </div>

                <div class="form-group">
                    <label>username</label>
                    <input type="text" class="form-control username_rt" name="username_rt" placeholder="Username di sarankan nama awal rt" required>
                </div>
                
                <div class="form-group">
                    <label>password</label>
                    <input type="text" class="form-control password_rt" name="password_rt" placeholder="Password di sarankan nik rt" required>
                </div>

                <div class="form-group">
                    <label>Nama Desa Yang Di Urus</label>
                    <select name="nama_desa_akunrt" class="form-control nama_desa_akunrt" required>
                        <option value="">-Select-</option>
                        <?php foreach($desa as $row):?>
                        <option value="<?= $row->id_desa;?>"><?= $row->nama_desa;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_rt" class="id_rt">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->


        <!-- Modal Delete Product-->
        <form action="/Akunrt/delete" method="post">
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
             
               <h4>Yakin ingin menghapus akun rt ini?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_rt" class="id_rt">
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
 
 // get Edit Product
 $('.btn-edit').on('click',function(){
     // get data from button edit
     const id = $(this).data('id');
     const namart = $(this).data('namart');
     const nikrt = $(this).data('nikrt');
     const kkrt = $(this).data('kkrt');
     const nohprt = $(this).data('nohprt');
     const usernamert = $(this).data('usernamert');
     const passwordrt = $(this).data('passwordrt');
     const iddesaakunrt = $(this).data('iddesaakunrt');
     
     // Set data to Form Edit
     $('.id_rt').val(id);
     $('.nama_rt').val(namart);
     $('.nik_rt').val(nikrt);
     $('.no_kk_rt').val(kkrt);
     $('.no_hp_rt').val(nohprt);
     $('.username_rt').val(usernamert);
     $('.password_rt').val(passwordrt);
     $('.nama_desa_akunrt').val(iddesaakunrt).trigger('change');
     // Call Modal Edit
     $('#editModal').modal('show');
 });

 // get Delete Product
 $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id_rt').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

});
</script>
</body>
</html>
<?= $this->endSection() ?>