
<?php 
	/**
	 * register.php
	 * halaman user interface untuk pendaftaran akun mahasiswa baru
	 */

	//memanggil koneksi
	require_once "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<!--Bagian Head HTML-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Transkrip Univ | Register</title>

	<!-- Custom fonts for this template-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>


<!--Bagian Body HTML-->
<body class="bg-gradient-primary">

	<div class="container">
	<div class="row">
		<div class="col-xl-12 col-md-12 mb-12">&nbsp;</div>
	</div>
	<?php
		/**
		 * tampilkan pesan bila data berhasil dimasukkan
		 */
		if(!empty($_GET)){
			if($_GET['message'] == "success"){
				?>
				<div class="row">

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-12 col-md-12 mb-12">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesan :</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">Perintah berhasil!</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-check fa-2x text-gray-300"></i>
								</div>
								</div>
							</div>
							</div>
						</div>

				</div>
				<div class="row">
					<div class="col-xl-12 col-md-12 mb-12">&nbsp;</div>
				</div>
				<?php
			}else if($_GET['message'] == "error"){
				?>
				<div class="row">

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-12 col-md-12 mb-12">
						<div class="card border-left-danger shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pesan :</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">Perintah gagal!</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-times fa-2x text-gray-300"></i>
								</div>
								</div>
							</div>
							</div>
						</div>

				</div>
				<div class="row">
					<div class="col-xl-12 col-md-12 mb-12">&nbsp;</div>
				</div>
				<?php
		}else if($_GET['message'] == "database"){
			?>
			<div class="row">

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-12 col-md-12 mb-12">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pesan :</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Kesalahan Database!</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-times fa-2x text-gray-300"></i>
							</div>
							</div>
						</div>
						</div>
					</div>

			</div>
			<div class="row">
				<div class="col-xl-12 col-md-12 mb-12">&nbsp;</div>
			</div>
			<?php
		}
		}
	?>

		<?php
			/**
			 * Bagian Form Registrasi
			 */
		?>
		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">
				<div>
					
				</div>
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Registrasi Akun Mahasiswa</h1>
									</div>
									<form class="user" method="post" action="mahasiswa/regist.php">
                                        <div class="form-group">
											<select name="nim" id="nim" class="form-control" required>
												<option selected disabled>-- Pilih Mahasiswa --</option>
												<?php

													/**
													 * mengeluarkan data mata kuliah dari database
													 */

													$mahasiswa = "SELECT * FROM mahasiswa WHERE status = 'aktif' ORDER BY nama ASC";
													$result = $conn->query($mahasiswa);

													if ($result->num_rows > 0) {
														// output data of each row
														while($row = $result->fetch_assoc()) {
															?>
															<option value="<?=$row['nim'];?>"><?=$row['nama'];?></option>    
															<?php
														}
													}
												?>
											</select>
                                        </div>
                                            <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control" id="password" maxlength="20" required placeholder="Masukkan Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="repass" class="form-control" id="repass" maxlength="20" required placeholder="Ulangi Password">
                                        </div>
										</div>
										<input type="submit" value="Daftar" class="btn btn-primary btn-block">
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="login.php">Sudah punya akun? Yuk login!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>


	<?php
	/**
	 * Bagian library
	 */
	?>
	<!-- Bootstrap core JavaScript-->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="assets/js/sb-admin-2.min.js"></script>

	<!-- Membuat text input angka -->
	<script>
		function isNumber(event) {
			var keycode=event.keyCode;
			if(keycode>48 && keycode<57){
				return true;
			}else{
				return false;
			}
		}
	</script>
</body>

</html>
