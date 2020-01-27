<?php 
include("includes/db.php");

session_start();
include ('function/functions.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<div class="main_wrapper">
		<!--- header start here --->
		
		<div class="alan">
			<a href="index.php" ><img id="logo"  src="images/logo.jpg"/></a>
			
			<a href="cart.php"><img  id="spet" src="images/shopping-cart.svg" /></a>
			<p class="notice"></p>
			<p class="notice1"><?php total_items();?> </p>
			

			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" class="form-control"  name="user_query" placeholder="search a product" style="width:400px; float: left;" >
					<input type="submit" style="position: relative; bottom: 9px;" class="btn btn-info" name="search" value="search"/>

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
		<!--- contenet wrapper start here --->
		<div class="content_wrapper">

			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php getCats();  ?>
					
				</ul>

				<div id="sidebar_title">Markalar</div>
				<ul id="cats">
						<?php getBrands();  ?>
				</ul>
					
				

			</div>

			<div id="content_area">
				<?php cart(); ?>

				

				<div id="products_box">
					<form  method="post" action="" style='width: 600px ; height: 300px; background-color:#e5e5e5; margin-top:60px; margin-left: 190px;   border-width:5px;  
    border-style:outset; '>
  <div class="col">
  	<h2 >Üye Girişi</h2>
  	<br>
   
    <input  type="email" name="email" placeholder="enter email" required class="form-control"   id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <br>
  
   <div class="col">
   
    <input  type="password" name="pass" placeholder="enter password" required class="form-control"  id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <div class="form-group form-check">
  	<br>
   
    <a href="checkout.php?forgot_pass">Şifrimi Unuttum</a>
  </div>
  <button type="submit" name="login" value="Login"  style="position: relative;left:40px; " class="btn btn-primary">Giriş Yap</button>
  <h4 style="float:right; padding-right: 20px; "><a href="customer_register.php">Üye Ol</a></h4>
</form>
				
				
				
				</div>


			</div>	
			<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy;2019 Kırıkkale Üni. Ahmed Ghannoum , Abdulrahman Alothman</h2>
		
		</div>
			


		</div>
		






	
	
	<?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Email veya şifra hatalı lütfen tekrer deneyin')</script>";
		exit();
		}

		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
		}
	}
	
	
	?>
	



<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>