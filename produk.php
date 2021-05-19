<?php 
	error_reportting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
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
		<h1><a href="index.php">Ikhsanstore</h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Mencari Produk">
				<input type="submit" name="cari" value="Mencari Produk">
			</form>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php 
				if($_GET['search'] != '' || $_GET['kat'] != ''){
					$where = "AND product_name LIKE '%".$_GET['search']."%'AND category_id LIKE '%".$_GET['kat']."%' ";
				}
				$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status * 1 $where ORDER BY product_id DESC");
				if(mysqli_num_rows($produk) > 0){
					while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detail.produk.php?id=<?php $p['product_id'] ?>">
				<div class="col-4">
					<img src="produk/<?php echo $p['product_image'] ?>">
					<p class="nama"><?php echo $p['product_name'] ?></p>
					<p class="harga"><?php echo $p['product_price'] ?></p>
				</div>
				</a>
			<?php }}else{ ?>
				<p>Produk Tidak Ada</p>
			<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>