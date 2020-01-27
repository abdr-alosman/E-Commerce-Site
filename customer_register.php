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
	
		<div class="alan">
			<a href="index.php" ><img id="logo"  src="images/logo.jpg"/></a>
			<a href="cart.php"><img id="spet"  src="images/shopping-cart.svg"/></a>

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
				<li><a href="checkout.php">Giriş yap</a></li>
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
			
			<?php cart(); ?>
			
			
		
					
					
						
	
						
			
				
<form  action="customer_register.php" method="post" enctype="multipart/form-data" style='width: 600px ; height: 500px; background-color:#12DFC5; margin-top:60px; margin-left: 190px;   border-width:5px;  
    border-style:outset; line-height: 8px; '>
  <div class="col">
  	<h2 style="text-align: center;">E-Posta ile Üye Ol</h2>
  	<br>
  	<br>
      <input type="text" name="c_name" class="form-control" placeholder="Adı Soyadı *" required>
      
    </div>
    <div class="col">
      <br>
      <input  type="email" name="c_email" placeholder="E-Posta Adresi *"  class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      
    </div>
    <div class="col">
    	<br>
    	<input  type="password" name="c_pass" placeholder="Şifre *" required class="form-control"  id="exampleInputPassword1" placeholder="Password">
    	
    </div>
    
    
 
  <div class="col">
  	<br>
  
								<select  class="form-control" name="c_country">
			 			 			<option value="AF">Afghanistan</option>
									<option value="DJ">Djibouti</option>
									<option value="SY">Syrian Arab Republic</option>
									<option value="TW">Taiwan, Province of China</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania, United Republic of</option>
									<option value="TH">Thailand</option>
									<option value="TL">Timor-Leste</option>
									<option value="TG">Togo</option>
									<option value="TK">Tokelau</option>
									<option value="TO">Tonga</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TN">Tunisia</option>
									<option value="TR">Turkey</option>
								</select>
							
  </div>


  <div class="col">
  	<br>
  	 <input type="text" name="c_city" class="form-control" placeholder="Şehir *" required>
  </div>
  <div class="col">
  	<br>
  	 <input type="text" name="c_contact" class="form-control" placeholder="Cep Telefonu *" required>
  </div>

<div class="col">
	<br>
  <textarea cols=75 rows=10  name="c_address"></textarea>
</div>
<br>
<br>
 
  <button  type="submit" name="register" value="Create Account" style="margin-left: 250px;" class="btn btn-primary">Kayıt Ol</button>
  
</form>










			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2014 by www.OnlineTuting.com</h2>
		
		</div>
	
	</div> 
<!--Main Container ends here-->

<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
<?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('c_login.php','_self')</script>";
		
		
		}
	}





?>










