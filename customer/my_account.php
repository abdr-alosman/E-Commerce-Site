<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
error_reporting(0);

?>
<html>
	<head>
		<title>My Online Shop</title>
		
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<div class="alan">
			<a href="../index.php" ><img id="logo"  src="images/logo.jpg"/></a>
			
			<a href="../cart.php"><img  id="spet" style="width: 50px;" src="images/shopping-cart.svg" /></a>
			<p class="notice"></p>
			<p class="notice1"><?php total_items();?> </p>
			

			<div id="form">
				<form method="get" action="../results.php" enctype="multipart/form-data">
					<input type="text" class="form-control"  name="user_query" placeholder="search a product" style="width:400px; float: left;" >
					<input type="submit" class="btn btn-info" name="search" value="search"/>

				</form>

			</div>
			<div style='float: right; width:110px; margin-top:33px; margin-right:20px;'>
			<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='../checkout.php' style='color:orange;'><button type='button' class='btn btn-light' >Giriş Yap</button></a>";
					
					}
					else {
					echo "<a href='../logout.php' style='color:orange;'><button type='button' class='btn btn-light' >Logout</button></a>";
					}


					?>
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<a href='my_account.php'><b style='font-size:15px; position:relative;right:100px; top:5px;'>Hoşgeldin:{$_SESSION['customer_email']} </b></a>";
					}
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
				<li><a href="../index.php">Anasayfa</a></li>
				<li><a href="../all_products.php">Bütün Ürünler</a></li>
				<li><a href="../Kampanya.php">Kampanyalar</a></li>
				<li><a href="my_account.php">Hesapım</a></li>
				<li><a href="../contact.php">Bize Ulaşın</a></li>
				<li><a href="../cart.php">Sepetim</a></li>
				<li><a href="../admin_area/">Admin Girişi</a></li>

			</ul>
			
		</div>
		</div>

		
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Hesabım :</div>
				
				<ul id="cats">
				<?php 
				$user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				
				
				?>
				<li><a href="my_account.php?my_orders">Siparişlerim</a></li>
				<li><a href="my_account.php?edit_account">Bilgilerimi Güncelle</a></li>
				<li><a href="my_account.php?change_pass">Şifre Değiştir</a></li>
				<li><a href="my_account.php?delete_account">Hesabı Sil</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				</ul>
				
				</div>
					
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			
			
				<div id="products_box">
				
				<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Hoşgeldiniz $c_name </h2>
				<b>Siparişlernizi bu linke tıklayarak görüntüleyebilirsiniz <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				
				
				?>
				
				</div>
			
			</div>
			<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy;2019 Kırıkkale Üni. Ahmed Ghannoum , Abdulrahman Alothman</h2>
		
		</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
	
	
	
	
	
	
	
<!--Main Container ends here-->

<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>