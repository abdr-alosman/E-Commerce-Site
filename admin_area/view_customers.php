
<table width="945" align="center" bgcolor="#e5e5e5"> 

	
	<tr align="center">
		<td colspan="6"><h2>Bütün Müşterileri Burdan Görün</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>İsim</th>
		<th>Email</th>
		<th>Sil</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from customers";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['customer_id'];
		$c_name = $row_c['customer_name'];
		$c_email = $row_c['customer_email'];
		
		$i++;
	
	?>
	<tr align="center" style="line-height: 30px;">
		<td><?php echo $i;?></td>
		<td><?php echo $c_name;?></td>
		<td><?php echo $c_email;?></td>
		<td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Sil</a></td>
	
	</tr>
	<?php } ?>




</table>