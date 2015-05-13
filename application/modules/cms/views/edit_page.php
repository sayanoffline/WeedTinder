<?php $this->load->view('header'); ?>
<?php $this->load->view('left'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#content",
    theme: "modern",
    plugins: [
        "link image hr anchor pagebreak"
        
    ],
         image_advtab: true

   
});

</script>

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Edit Page
            <small>&nbsp;</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Page</li>
          </ol>
    </section>
    <section class="content">
          <div class="row">
<form method="post" name="editPageFrm" id="editPageFrm">

<?php
	
	foreach($pageTbl as $row)
	{
?>

<table cellspacing="0" cellpadding="0" align="left" class="table add_user">
<tbody>

    <?php
         /*   if($this->session->userdata('tenantId')=='1')
            {
        ?>
            <tr><td align="right">Merchant </td>
                <td>
                 <div class="select">
<select name="merchantAttr" id="merchantAttr" class="form-control" onchange="getAttrset();"  onFocus="javascript:checkNullProf()">
        <option value="1" <?=($row['tenantId']=='1')?"selected":""?>>Administrator</option>
        <?php
	foreach($merchantList as $valMerchant)
	{
	?>
	<option value="<?php echo $valMerchant['tenantId']; ?>" <?=($valMerchant['tenantId']==$row['tenantId'])?"selected":""?>><?php echo $valMerchant['tenantName']; ?></option>
	<?php
	}
	?>
      </select>
      </div>
     </td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            </tr>
        <?php } */?>

<tr><td align="right">Page Title <sup>*</sup></td><td><input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" class="form-control" onFocus="javascript:checkNullProf()"></td>
<td align="right" colspan="2">&nbsp;</td>
</tr>

<tr><td align="right">Page Url <sup>*</sup></td><td><input type="text" name="slug" id="slug" placeholder="Page url" value="<?php echo $row['slug']; ?>" class="form-control" onFocus="javascript:checkNullProf()"></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr><td align="right">Page Content</td><td><textarea  name="content" id="content" rows="10"  class="form-control" onFocus="javascript:checkNullProf()" ><?php echo $row['content'];?></textarea></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>


<tr>
<td></td>
<td colspan="3">
    

<input type="hidden" id="crs_id" name="crs_id" value="<?php echo $row['pageId']; ?>">
<button type="button" class="btn btn-default" onclick="updatePage();">&nbsp;Submit&nbsp;</button>
</td>
</tr>
</tbody>
<?php
	}
?>
</table>
</form>
</div>
    </section>    
<!-- /das_body_middle End-->
</div>

<?php $this->load->view('footer');?>
