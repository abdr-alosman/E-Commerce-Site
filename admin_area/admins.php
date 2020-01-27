<!DOCTYPE>

<?php 

include("includes/db.php");

?>
<html>
	<head>
		<title>Ürün Ekleme</title> 
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="#e5e5e5">


	<form  method="post" action="admins.php"  enctype="multipart/form-data" style='width: 700px ; height: 400px; background-color:#e5e5e5; margin-top:50px; margin-left: 150px;   border-width:5px;  
    border-style:outset; '>
  <div class="col">
  	<h2 style="text-align: center;">Admin Ekle</h2>
  	<br>
   	<label>Admin Email</label>
    <input  type="email" name="email" placeholder="enter email" required class="form-control"   id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <br>
  
   <div class="col">
   <label>Admin Passeord</label>
    <input  type="password" name="pass" placeholder="enter password" required class="form-control"  id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <br>
  <button type="submit" name="login" value="Login"  style="position: relative;left:40px; " class="btn btn-primary">Ekle</button>
  
</form>


<script src='jquery-3.4.1.min.js'></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body> 
</html>
<?php 

	if(isset($_POST['login'])){
	
		//getting the text data from the fields
		$admin_email = $_POST['email'];
		$admin_pass= $_POST['pass'];
		
	
	
		 $insert_admin = "insert into admins (user_email,user_pass) values ('$admin_email','$admin_pass')";
		 
		 $insert_admins = mysqli_query($con, $insert_admin);
		 
		 if($insert_admins){
		 
		 echo "<script>alert('Admin Eklendi!')</script>";
		 echo "<script>window.open('index.php?insert_admin','_self')</script>";
		 
		 }
	}








?>



