<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="gambar/smkn6jember.jpg" type="image/x-icon">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('asset/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
	<style>
		body {
			background-image: url('https://w0.peakpx.com/wallpaper/260/206/HD-wallpaper-black-3d-spheres-black-backgrounds-black-balls-3d-balls-spheres-geometry-background-with-spheres-3d-art-geometric-shapes-spheres-backgrounds.jpg');
			background-size: cover;
		}
	</style>
	<div class="login-box">
		<div class="login-logo" style="color: white;">
			<b>LOGIN</b>
		</div>

		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">SILAHKAN LOGIN</p>
				<?= $this->session->flashdata('message'); ?>
				<form action="<?php base_url('login') ?>" method="post">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>');
					?>
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control" placeholder="USERNAME" value="<?= set_value('email'); ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>');
					?>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="PASSWORD">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa fa-eye"></span>
							</div>
						</div>
					</div>

					<div>
						<div class="input-group-text" style="background-color: red;
															color: white; ">
							<a href="<?= base_url('/') ?>" style="color: black;"><i class="fa fa-chevron-left" aria-hidden="true"></i> </a>
							<button style="background-color: red; type=" submit" class="btn btn-block btn-danger">LOGIN </button>

						</div>
					</div>

				</form>

				<!-- <div class="social-auth-links text-center mb-3">
					<a href="<?= base_url('index') ?>" class="btn btn-block btn-warning">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>kembali
					</a>
				</div> -->

				<!-- /.social-auth-links -->


			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<script>
		// membuat fungsi change
		function change() {

			// membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
			var x = document.getElementById('pass').type;

			//membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
			if (x == 'password') {

				//ubah form input password menjadi text
				document.getElementById('pass').type = 'text';

				//ubah icon mata terbuka menjadi tertutup
				document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
			} else {

				//ubah form input password menjadi text
				document.getElementById('pass').type = 'password';

				//ubah icon mata terbuka menjadi tertutup
				document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
			}
		}
	</script>
	<!-- jQuery -->
	<script src="<?php base_url() ?>asset/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php base_url() ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php base_url() ?>asset/dist/js/adminlte.min.js"></script>
</body>

</html>