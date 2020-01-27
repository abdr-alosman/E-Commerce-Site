<?php 
include("includes/db.php");
?>

<div> 
	
	
	</form>
<form  method="post" action="" style='width: 600px ; height: 300px; background-color:#0ECCB0; margin-top:60px; margin-left: 190px;   border-width:5px;  
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
  <button type="submit" name="login" value="Login"  style="position: relative;left:40px; " class="btn btn-primary">Submit</button>
  <h4 style="float:right; padding-right: 20px; "><a href="customer_register.php">Üye Ol</a></h4>
</form>



	
	
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
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	
	?>
	
	
	

</div>