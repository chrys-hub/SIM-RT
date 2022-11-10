<!doctype html>
<html lang="en">

  <head>
    <style>
    html,body { 
	height: 100%; 
}

.global-container{
	height:100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}


.login-form{ 
	width:330px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

.alert{
	margin-bottom:-30px;
	font-size: 13px;
	margin-top:20px;
}
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Login</title>
  </head>
  <body>

                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
  <div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Halaman Masuk RT</h3>
		<div class="card-text">
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			<form action="/loginrt/authrt" method="post">
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
                <label for="InputForUsernameAdmin" class="form-label">username</label>
                <input type="text" name="username_rt" class="form-control" id="InputForUsernameAdmin" value="<?= set_value('username_admin') ?>">
				</div>
				<div class="form-group">
                <label for="InputForPasswordAdmin" class="form-label">Password</label>
                <input type="password" name="password_rt" class="form-control" id="InputForPasswordAdmin">
				</div>
				<button type="submit" class="btn btn-primary btn-block">MASUK</button>
			</form>
		</div>
		<a href="https://wa.me/<?= $no_hp_admin['no_hp_admin'] ?>" target="_blank" class="btn btn-success">Lupa password</a>
		<a href="/"  class="btn btn-success">Kembali    </a>
	</div>
</div>
</div>


    
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>