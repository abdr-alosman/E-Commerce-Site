<!DOCTYPE>
<?php 

include("function/functions.php");
session_start();
?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<div class="alan">
			<a href="index.php" ><img id="logo"  src="images/logo.jpg"/></a>
			
			<a href="cart.php"><img  id="spet" src="images/shopping-cart.svg" /></a>
			<p class="notice"></p>
			<p class="notice1"><?php total_items();?> </p>
			

			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" class="form-control"  name="user_query" placeholder="search a product" style="width:400px; float: left;" >
					<input type="submit" class="btn btn-info" name="search" value="search"/>

				</form>

			</div>
			<div style='float: right; width:110px; margin-top:33px; margin-right:20px;'>
			<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'><button type='button' class='btn btn-light' >Giriş Yap</button></a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'><button type='button' class='btn btn-light' >Logout</button></a>";
					}


					?>
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<a href='customer/my_account.php'><b style='font-size:15px; position:relative;right:100px; top:5px;'>Hoşgeldin:{$_SESSION['customer_email']} </b></a>";
					}
					else {
					echo "<b style='font-size:15px; position:relative;right:100px;top:5px;'></b>";
					}
					?>
			</div>
			

			


		</div>
		<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Anasayfa</a></li>
				<li><a href="all_products.php">Bütün Ürünler</a></li>
				<li><a href="Kampanya.php">Kampanyalar</a></li>
				<li><a href="c_login.php">Hesapım</a></li>
				<li><a href="contact.php">Bize Ulaşın</a></li>
				<li><a href="cart.php">Sepetim</a></li>
				<li><a href="admin_area/">Admin Girişi</a></li>

			</ul>
			
		</div>
	</div>
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Kategoriler</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
					
				<div id="sidebar_title">Markalar</div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
				<ul>
			
			
			</div>
		
			<div id="content_area">
			
			
			
				<div id="products_box">
	<?php 
	
	if(isset($_GET['search'])){
	
	$search_query = $_GET['user_query'];
	
	$get_pro = "select * from products where product_keywords like '%$search_query%'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<a href='details.php?pro_id=$pro_id'><img src='admin_area/product_images/$pro_image' width='250' height='250' /></a>
					
					<p style='background-color:skyblue;'><b>Fiyat: $ $pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' ><button type='button' class='btn btn-secondary' style='float:left ;'>Ürüne Git</button></a>
					<a href='index.php?add_cart=$pro_id'><button type='button'  class='btn btn-success' style='float:right '>Sepete Ekle</button></a> 
				
				</div>
		
		
		";
	
	}
	}
	?>
				
				</div>
			
			</div>
			<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy;2019 Kırıkkale Üni. Ahmed Ghannoum , Abdulrahman Alothman</h2>
		
		</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		
	
	
	
	
	
	
	</div> 
<!--Main Container ends here-->
<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>