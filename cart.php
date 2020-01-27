<!DOCTYPE>
<?php 
session_start(); 

include("function/functions.php");

include("includes/db.php");
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
					echo "<b style='font-size:15px; position:relative;right:100px;top:5px;'></b>";
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
			
			<?php cart(); ?>
			
			
			
				<div id="products_box">
				
			<form action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="950" bgcolor="#e5e5e5">
					
					<tr align="center">
						<th>Ürün Sil</th>
						<th>Ürünler</th>
						<th>Adet</th>
						<th>Fiyat</th>
					</tr>
					
		<?php 
		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price); 
			
			$total += $values; 
					
					?>
					
					<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
						<td><?php echo $product_title; ?><br>
						<img src="admin_area/product_images/<?php echo $product_image;?>" width="70" height="70"/>
						</td>
						<td><input type="text" size="4" name="qty"  value="1" /></td>
						<?php 
						if(isset($_POST['update_cart'])){
							
						
							$qty = $_POST['qty'];
							
							$update_qty = "update cart set qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty']=$qty;
							
							$total = $total* $qty;
						}
						
						
						?>
						
						
						<td><?php echo "$" . $single_price; ?></td>
					</tr>
					
					
				<?php } } ?>
				
				<tr>
						<td colspan="4" align="right"><b>Ödenecek Tutar:</b></td>
						<td><?php echo "$" . $total;?></td>
					</tr>
					
					<tr align="center">
						
						<td colspan="2"><button type="submit" name="update_cart" class="btn btn-primary">Sepeti Güncelle</button></td>
						
						<td colspan="2"><button type="submit" name="continue" class="btn btn-secondary">Alışveirişe Devamı Et</button></td>


						
						<td colspan="2"><a href="checkout.php"><button type="button" class="btn btn-success">Ödeme yap</button></a></td>
					</tr>
					
				</table> 
			
			</form>
			
	<?php 
		
	function updatecart(){
		
		global $con; 
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
		if(isset($_POST['continue'])){
		
		echo "<script>window.open('index.php','_self')</script>";
		
		}
	
	}
	echo @$up_cart = updatecart();
	
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