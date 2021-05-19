<?php
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window,location="dashboard.php"</script>';
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
			<h3>Produk</h3>
			<div class="box">
				<p><a href="tambah-produk.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="50px">No</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>	
					</thead>
					<tbody>
						<?php
							$no = 1; 
							$produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC");
							if(mysqli_num_rows($produk)){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ; ?></td>
							
							<td><?php echo $row['product_name'] ?></td>
							<td>RP. <?php echo number_format($row['product_price']) ?></td>
							<td><?php echo $row['product_description'] ?></td>
							<td><img src="produk/<?php echo $row['product_image']; ?>" width="50px"></td>
							<td><?php echo $row['product_status'] ?></td>

							<td> 
								<a href="hapus-data-produk.php?idp=<?php echo $row['product_id'] ?>" onclick="return confrim('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="8">Tidak ada Data</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
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