<?php 
	include 'db.php';
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
			<h3>Kategori</h3>
			<div class="box">
				
					<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
					?>
					<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
					<div class="col-5">
					<img src="img/s.png" width="50px">
					<p>kategori1</p>
					<p><?php echo $k['category_name']; ?></p>
					
				</div>
			</a>
			<?php }}else{ ?>
				<p>Kategori Tidak Ada</p>
			<?php } ?>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
				$produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 8");
				if(mysqli_num_rows($produk) > 0){
					while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detail.produk.php?id=<?php $p['product_id'] ?>">
				<div class="col-4">
					<img src="produk/<?php echo $p['product_image'] ?>">
					<p class="nama"><?php echo $p['product_name'] ?></p>
					<p class="harga">RP.<?php echo $p['product_price'] ?></p>
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