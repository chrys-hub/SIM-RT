<html>
<head>
    <title>Daftar Warga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/jquery.min.js"></script>
</head>
<body>

<?= \Config\Services::validation()->listErrors(); ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">PENDAFTARAN WARGA</p>

                <form class="mx-1 mx-md-4 h5 font-weight-bold" action="/registerwarga/save" method="post">

                <div>
            <div class="form-group">
                    <label >Nama Lengkap Warga</label>
                    <input type="text" class="form-control" name="nama_warga" placeholder="nama lengkap" required>
            </div>
                <div class="form-group">
                    <label>NIK (Nomer Induk Kependudukan)</label>
                    <input type="text" class="form-control" pattern="[^\s]+" name="nik_akun_warga" placeholder="NIK warga" required>
                </div>

                <div class="form-group">
                    <label>NOMOR KK (KARTU KELUARGA)</label>
                    <input type="text" class="form-control" pattern="[^\s]+" name="no_kk_akun_warga" placeholder="KK Warga" required>
                </div>

                <div class="form-group">
                    <label>NOMOR HANDPHONE(Gunakan format 62)</label>
                    <input type="tel" pattern="62[0-9]{11,13}" class="form-control" name="no_hp_warga" placeholder="Nomer HP" required>
                </div>

                <div class="form-group">
                    <label>username</label>
                    <input type="text" class="form-control" pattern="[^\s]+" title="Tidak boleh ada spasi" name="username_warga" placeholder="Username di sarankan nama awal anda" required>
                </div>
                
                <div class="form-group">
                    <label>password/sandi</label>
                    <input type="password" class="form-control" pattern="[^\s]+" title="Tidak boleh ada spasi" name="password_warga" placeholder="Password di sarankan nik anda" required>
                </div>

                <div class="form-group">
                    <label>Pilih Desa</label>
                    <select name="nama_desa_akunwarga" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php foreach($desa as $row):?>
                        <option value="<?= $row->id_desa;?>"><?= $row->nama_desa;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
                  <div class="d-flex justify-content-center" style="margin-top: 2%">
                  <span style="display: inline;">
                    <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
                    <a href="/" class="btn btn-primary btn-lg" role="button">Kembali</a>
                  </span>
                  </div>
        </form>
        

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>