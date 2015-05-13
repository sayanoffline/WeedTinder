<?php
	foreach($result as $row)
	{
	//echo $row['status'];
?>
		<a title="<?php if($row['status']==1){ echo 'Active'; } else{ echo 'Inactive';} ?>" class="demo-basic" href="javascript:void(0)" onclick="changePageStatus('<?php echo $row['pageId']; ?>','<?php echo $row['status']; ?>')">
	<?php if($row['status']==1){ echo '<i style="color:#009d59" class="fa fa-plus-circle"></i>'; } else{ echo '<i style="color:#d7422d" class="fa fa-minus-circle"></i>';} ?>
	</a>

<?php
	}
?>

