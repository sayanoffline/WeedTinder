<?php
	foreach($result as $row)
	{
	//echo $row['status'];
?>
		<a title="<?php if($row['status']==1){ echo 'Active'; } else{ echo 'Inactive';} ?>" class="demo-basic" href="javascript:void(0)" onclick="changeUserStatus('<?php echo $row['userId']; ?>','<?php echo $row['status']; ?>')">
	<?php if($row['status']==1){ echo '<i style="color:#009d59" class="icon-ok-circle-1"></i>'; } else{ echo '<i style="color:#d7422d" class="icon-minus-circle-1"></i>';} ?>
	</a>

<?php
	}
?>

