<?php 
	
	include 'db.php';

	if(isset($_GET['idp'])){
		$hapus = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="data-produk.php"</script>';
	} 

 ?>