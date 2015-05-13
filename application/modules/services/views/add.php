<?php $this->load->view('header'); ?>
<?php $this->load->view('left'); ?>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true
	});

</script>

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Add Service
            <small>&nbsp;</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Service</li>
          </ol>
    </section>
    <section class="content">
          <div class="row">
<form method="post" name="addServiceFrm" id="addServiceFrm">

<table cellspacing="0" cellpadding="0" align="left" class="table add_user">
<tbody>

<tr><td align="right"> Title <sup>*</sup></td><td><input type="text" name="title" id="title" placeholder="Title" class="form-control" onFocus="javascript:checkNullProf()"></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr><td align="right">Service Page Url <sup>* </sup></td><td><input type="text" name="slug" id="slug" placeholder="Page Url" class="form-control" onFocus="javascript:checkNullProf()">(Dont use any special charachters)</td>
<td align="right"></td>
<td align="right">&nbsp;</td>
</tr>

<tr><td align="right">Description </td><td><textarea  name="content" id="content" rows="10"  class="form-control" ></textarea></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr>
<td></td>
<td colspan="3"><button type="button" class="btn btn-default" onclick="addService();">Submit</button></td>
</tr>
</tbody>
</table>

</form>
          </div>
    </section>    
<!-- /das_body_middle End-->
</div>

<?php $this->load->view('footer');?>
