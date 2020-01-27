<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=Admin Değilsiniz!','_self')</script>";
}
else {

?>

<!DOCTYPE> 

<html>
	<head>
		<title>Admin Panel Sayfası</title> 
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>


<body> 

	<div class="main_wrapper">
	
	
		<div id="header"><a href="index.php"><img  style="width: 1200px; height: 120px;" src="images/bg-header.jpg"></a></div>
		
		<div id="right">
		<h2 style="text-align:center;">İçeriği Yönet</h2>
			
			<a href="index.php?insert_product">Yeni Ürün Ekle</a>
			<a href="index.php?view_products">Tüm Ürünleri Görüntüle</a>
			<a href="index.php?insert_cat">Yeni kategori Ekle</a>
			<a href="index.php?view_cats">Bütün kategorileri Görüntüle </a>
			<a href="index.php?insert_brand">Yeni Marka Ekle</a>
			<a href="index.php?view_brands">Bütün Markaları Görüntüle</a>
			<a href="index.php?view_customers">Müşterileri görüntüle</a>
			<a href="index.php?view_orders">Siparişleri Görüntüle</a>
			<a href="index.php?view_payments">Ödemeleri Görüntüle </a>
			<a href="index.php?insert_admin">Yeni Admin Ekle </a>
			<a href="../index.php">Siteye Git</a>
			<a href="logout.php">Admin Çıkış</a>
		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php"); 
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php"); 
		
		}
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php"); 
		
		}
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		if(isset($_GET['insert_admin'])){
		
		include("admins.php"); 
		
		}
		
		?>
		</div>






	</div>


</body>
</html>

<?php } ?>