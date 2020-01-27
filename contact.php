<!DOCTYPE>

<?php 
session_start();
include ('function/functions.php') ?>
<html>
<head>
	<title>My Online Shop</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	
</head>
<body>
	<!--- Main container start here --->
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
					<div style="width:950px; margin:50px;">
					
		<div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>size yardım etmek için bekliyoruz ..</h2>
             
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
              <iframe src="https://maps.google.com/maps?q=kirikkale%20univer&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
           <!-- Contact address -->

           <div class="aa-contact-address" style="margin-top:40px; ">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Your Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Subject" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Company" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                    </div>
                    
                    <button  type="submit" name="register" value="Create Account" style="float: left;" class="btn btn-primary">Gönder</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">

                 <div class="aa-contact-address-right">
                   <address style="text-align: left; line-height: 30px; ">
                     <h4>KKUShop</h4>
                     <p>Kırıkkale Üniversitesi, Ankara Yolu 7. Km, 71450 Yahşihan/Kırıkkale</p>
                     <p><span class="fa fa-home"></span>Kırıkkale yenişehir, Turkey</p>
                     <p><span class="fa fa-phone"></span>+905374245882</p>
                     <p><span class="fa fa-envelope"></span>Email: support@kkushop.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>



</div>



				</div>


			</div>	
			<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy;2019 Kırıkkale Üni. Ahmed Ghannoum , Abdulrahman Alothman</h2>
		
		</div>


		</div>
		<!--- contenet wrapper ends here --->

		
		


	</div>
	<!--- Main container ends here --->

<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>




</body>
</html>