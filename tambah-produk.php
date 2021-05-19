<?php
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window,location="login.php"</script>';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-width, intial-scale-1">
	<title>Ikhsanstore</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&family=Indie+Flower&family=Pangolin&display=swap" rel="stylesheet">

</head>
<body>
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Ikhsanstore</h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Tambah Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">PILIH</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while ($r = mysqli_fetch_array($kategori)) {
						?>
						<option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name']; ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" required>
					<input type="file" name="gambar" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
					<select class="input-control" name="status">
						<option value="">PILIH</option>
						<option value="1">AKTIF</option>
						<option value="0">TIDAK AKTIF</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])) {

						print_r($_FILES['gambar']);

						$kategori = $_POST['kategori'];
						$nama = $_POST['nama'];
						$harga = $_POST['harga'];
						$deskripsi = $_POST['deskripsi'];
						$status = $_POST['status'];

						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().'.'.$type2;

						$tipe_diizinkan =  array('jpg', 'jpeg', 'png', 'gif');

						if(!in_array($type2, $tipe_diizinkan)){
							echo '<script>alert("Format file tidak diizinkan")</script>';

						}else{
							move_uploaded_file($tmp_name, './produk/' .$newname);

							$insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$newname."',
										'".$status."',
										null
											)");

							if($insert){
								echo '<script>alert("Berhasil Ditambahkan")</script>';
								echo '<script>window.location="data-produk.php"</script>';
							}else{
								echo 'gagal'.mysqli_error($conn);
							}
						}
					}
				 ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Ikhsanstore</small>
		</div>
	</footer>

</body>
</html>