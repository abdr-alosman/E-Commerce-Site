
<table width="945" align="center" bgcolor="#e5e5e5"> 

	
	<tr align="center">
		<td colspan="6"><h2>Tüm Markaları Buradan Görün</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Marka ID</th>
		<th>Marka Adı</th>
		<th>Güncelle</th>
		<th>Sil</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_brand = "select * from brands";
	
	$run_brand = mysqli_query($con, $get_brand); 
	
	$i = 0;
	
	while ($row_brand=mysqli_fetch_array($run_brand)){
		
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $brand_title;?></td>
		<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Güncelle</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Sil</a></td>
	
	</tr>
	<?php } ?>




</table>