
<table width="945" align="center" bgcolor="#e5e5e5"> 

	
	<tr align="center">
		<td colspan="6"><h2>Bütün Kategorileri Burdan Görün</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Kategori ID</th>
		<th>Kategori Adı</th>
		<th>Güncelle</th>
		<th>Sil</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from categories";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $cat_title;?></td>
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Güncelle</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Sil</a></td>
	
	</tr>
	<?php } ?>




</table>