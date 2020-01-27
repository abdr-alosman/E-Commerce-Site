<!DOCTYPE>
<?php 

include("function/functions.php");

?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
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
echo "<a href='customer/my_account.php'><b style='font-size:15px; position:relative;right:100px; top:5px;'>Hoşgeldin:{$_SESSION['customer_email']} </b></a>";					}
					else {
					echo "<b style='font-size:15px; position:relative;right:100px;top:5px;'> </b>";
					}
					?>
			</div>
			

			


		</div>
		<!--- header ends here --->

		<!--- navigation bar start here --->
		<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Anasayfa</a></li>
				<li><a href="all_products.php">Bütün Ürünler</a></li>
				<li><a href="Kampanya.php">Kampanyalar</a></li>
				<li><a href="checkout.php">Hesapım</a></li>
				<li><a href="lc_login.php">Giriş yap</a></li>
				<li><a href="contact.php">Bize Ulaşın</a></li>
				<li><a href="cart.php">Sepetim</a></li>
				<li><a href="admin_area/">Admin Girişi</a></li>

			</ul>
			
		</div>
			

		</div>
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
					
				<div id="sidebar_title">Brands</div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
				<ul>
			
			
			</div>
		
			<div id="content_area">
			
			
			
				<div id="products_box">
	<?php 
	if(isset($_GET['pro_id'])){
	
	$product_id = $_GET['pro_id'];
	
	$get_pro = "select * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
	
		echo "
				<div id='single_product'>
					<img src='admin_area/product_images/$pro_image' width='400' height='300' />
					<h3>$pro_title</h3>
					<p><b>Fiyat: $ $pro_price </b></p>

					<b>$pro_desc</p>
					<a href='index.php' ><button type='button' class='btn btn-secondary' style='float:left ;'>Geri Dön</button></a>
					<a href='index.php?pro_id=$pro_id'><button type='button'  class='btn btn-success' style='float:right '>Sepete Ekle</button></a> 
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