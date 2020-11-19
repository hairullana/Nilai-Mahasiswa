<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>PROGRAM NILAI MAHASISWA</title>

		<link href="bootstrap.css" rel="stylesheet">
	</head>

	<body id="page-top" style="background:#1e90ff">
		<div id="wrapper" style="margin:0 250px;">
			<div id="content-wrapper" class="d-flex flex-column">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<h1 class="h3 mb-0 text-gray-800"><a href="/">Program Nilai Mahasiswa Informatika Udayana</a></h1>
				</nav>
				
				<div style="margin:0 100px">
					<div class="col-xl-20 col-lg-15">
						<div class="card shadow mb-4">

							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">INPUT NILAI</h6>
							</div>
							
							<div class="card-body">

								<form action="" method="post" class="form-horizontal" style="padding-left:100px">

										<!-- input jumlah mahasiswa -->
									<input type="text" name="jumlahMhs" placeholder="Jumlah Mahasiswa"> 
									<button class="btn btn-facebook" type="submit" name="kirimJumlahMhs">Proses</button>
								</form>
								
								<!-- jika sudah input banyak mhs -->
								<?php if (isset($_POST["kirimJumlahMhs"])) : ?>
									<form action="proses.php" method="post" style="padding-left:100px">
										<input type="hidden" name="jumlahMhs2" value="<?= $_POST["jumlahMhs"] ?>">
										<br><b>Banyak Mahasiswa : <?= $_POST["jumlahMhs"] ?></b><br>
										<?php for ($i=0 ; $i<$_POST["jumlahMhs"] ; $i++) : ?>
											<br><label class="ui-controlgroup-label col-sm-3">Nama  :</label> <input type='text' name='namaMhs<?= $i ?>'>
											<br><label class="ui-controlgroup-label col-sm-3">NIM  :</label> <input type='text' name='nimMhs<?= $i ?>'>
											<br><label class="ui-controlgroup-label col-sm-3">Nilai  :</label> <input type='text' name='nilaiMhs<?= $i ?>'>
											<br>
										<?php endfor; ?>
										<br>
										<button class="btn btn-facebook" type='submit' name='kirimDataMhs'>Kirim Data Mahasiswa</button>
									</form>
									<?php exit; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="sticky-footer bg-white" style="margin:0 250px;">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; Hairul Lana 2020</span>
				</div>
			</div>
		</footer>
	</body>
</html>
