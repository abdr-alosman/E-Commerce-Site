		<?php 	
				include("includes/db.php"); 
				
				$user = $_SESSION['customer_email'];
				
				$get_customer = "select * from customers where customer_email='$user'";
				
				$run_customer = mysqli_query($con, $get_customer); 
				
				$row_customer = mysqli_fetch_array($run_customer); 
				
				$c_id = $row_customer['customer_id'];
				$name = $row_customer['customer_name'];
				$email = $row_customer['customer_email'];
				$pass = $row_customer['customer_pass'];
				$country = $row_customer['customer_country'];
				$city = $row_customer['customer_city'];
				$contact = $row_customer['customer_contact'];
				$address= $row_customer['customer_address'];
				
				
				
		?>
			
		<form action="" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750" style="line-height: 30px; ">
						
						<tr align="center">
							<td colspan="6"><h2>Bilgilerini Güncelle</h2></td>
						</tr>
						<br>
						
						<tr>
							<td align="right">Müşteri Adı:</td>
							<td><input type="text" name="c_name" value="<?php echo $name;?>" required/></td>
						</tr>
						
						<tr>
							<td align="right">Müşteri Email:</td>
							<td><input type="text" name="c_email" value="<?php echo $email;?>" required/></td>
						</tr>
						
						<tr>
							<td align="right">Müşteri Password:</td>
							<td><input type="password" name="c_pass" value="<?php echo $pass;?>" required/></td>
						</tr>
						
						
						
						
						
						<tr>
							<td align="right">Ülke:</td>
							<td>
							<select name="c_country" >
								<option><?php echo $country; ?></option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Turkey</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>
							
							</td>
						</tr>
						
						<tr>
							<td align="right">Şehir:</td>
							<td><input type="text" name="c_city" value="<?php echo $city;?>"/></td>
						</tr>
						
						<tr>
							<td align="right">Telefon:</td>
							<td><input type="text" name="c_contact" value="<?php echo $contact;?>"/></td>
						</tr>
						
						<tr>
							<td align="right">Address</td>
							<td><input type="text" name="c_address" value="<?php echo $address;?>"/></td>
						</tr>
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="update" value="Bilgileri Güncelle" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
		
		
		
	
<?php 
	if(isset($_POST['update'])){
	
		
		$ip = getIp();
		
		$customer_id = $c_id;
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
	
		$c_city = $_POST['c_city'];
		$c_country = $_POST['c_country'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		
		 $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass',customer_country='$c_country',customer_city='$c_city', customer_contact='$c_contact',customer_address='$c_address' where customer_id='$customer_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	}





?>









