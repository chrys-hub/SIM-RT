<?= $this->extend('layout/dashboard-layout-warga');?>
<?= $this->section('content');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<?= \Config\Services::validation()->listErrors(); ?>
<p>Setelah mengganti profile di sarankan melakukan log out terlebih dahulu</p>
  <form class="mx-1 mx-md-4 h5 font-weight-bold" action="editprofilewarga/updateprofilewarga" method="post">

                <div>
            <div class="form-group">
                    <label >Nama Lengkap Warga</label>
                    <input type="text" class="form-control" name="nama_warga" value="<?= $warga[0]['nama_warga']?>" placeholder="nama lengkap" required>
            </div>
                <div class="form-group">
                    <label>NIK (Nomer Induk Kependudukan)</label>
                    <input type="text" class="form-control" pattern="[^\s]+" name="nik_akun_warga" value="<?= $warga[0]['nik_akun_warga']?>" placeholder="NIK warga" required>
                </div>

                <div class="form-group">
                    <label>NOMOR KK (KARTU KELUARGA)</label>
                    <input type="text" class="form-control" pattern="[^\s]+" name="no_kk_akun_warga" value="<?= $warga[0]['no_kk_akun_warga']?>" placeholder="KK Warga" required>
                </div>

                <div class="form-group">
                    <label>NOMOR HANDPHONE(Gunakan format 62)</label>
                    <input type="tel" pattern="62[0-9]{11,13}" class="form-control" value="<?= $warga[0]['no_hp_warga']?>" name="no_hp_warga" placeholder="Nomer HP" required>
                </div>

             
            </div>
                  <div class="d-flex justify-content-center" style="margin-top: 2%">
                  <span style="display: inline;">
                    <button type="submit" class="btn btn-primary btn-lg">Ubah</button>
                  </span>
                  </div>
        </form>


<h2>Ubah Username dan Password</h2>
        <form action="editprofilewarga/updatelogininfowarga" method="post">
            
        <div class="form-group">
                    <label>username</label>
                    <input type="text" class="form-control" pattern="[^\s]+" value="<?= $warga[0]['username_warga']?>" title="Tidak boleh ada spasi" name="username_warga" placeholder="Username di sarankan nama awal anda" required>
                </div>
                
                <div class="form-group">
                    <label>password/sandi</label>
                    <input type="password" class="form-control" pattern="[^\s]+" value="<?= $warga[0]['password_warga']?>" title="Tidak boleh ada spasi" name="password_warga" placeholder="Password di sarankan nik anda" required>
                </div>

                </div>
                  <div class="d-flex justify-content-center" style="margin-top: 2%">
                  <span style="display: inline;">
                    <button type="submit" class="btn btn-primary btn-lg">Ubah</button>
                  </span>
                  </div>
        </form>
</body>
</html>

<?= $this->endSection() ?>
