<?php $this->load->view('header'); ?>
<?php $this->load->view('left'); ?>
<script>
function addUser()
{	
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/userRegister";
        

	var formdata = $("#addUserFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
                    //alert(responseText);
			//$("#addUserFrm")[0].reset();
                        window.location.href = js_site_url+"users/admin/userList";
			
		},
	   	error: function(jqXHR, exception) {
	   	return false;
	 }
	});
	return false;
	
}


</script>
<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Add User
            <small>&nbsp;</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add User</li>
          </ol>
    </section>
    <section class="content">
          <div class="row">
              <form method="post" name="addUserFrm" id="addUserFrm"  onSubmit="return addUser()">

<table cellspacing="0" cellpadding="0" align="left" class="table add_user">
    <tbody>
        
        <!--
        <tr>
            <td align="right">User Name <sup>*</sup></td>
            <td><input type="text" name="add_username" id="add_username" placeholder="Username" class="form-control" onFocus="javascript:checkNullProf()" autocomplete="off" required></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        -->
        
        <tr>
            <td align="right">First Name <sup>*</sup></td>
            <td><input type="text" name="add_fname" id="add_fname" placeholder="First Name" class="form-control" onFocus="javascript:checkNullProf()" autocomplete="off"></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right">Last Name <sup>*</sup></td>
            <td><input type="text" name="add_lname" id="add_lname" placeholder="Last Name" class="form-control" onFocus="javascript:checkNullProf()" autocomplete="off"></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>

        <tr>
            <td align="right">Email ID <sup>*</sup></td>
            <td><input type="email" name="add_email" id="add_email" placeholder="Email ID" class="form-control" onFocus="javascript:checkNullProf()" autocomplete="off" required></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right">Password <sup>* </sup></td>
            <td><input type="password" name="add_password" id="add_password" placeholder="Password" class="form-control" onFocus="javascript:checkNullProf()" required></td>
            <td align="right"></td>
            <td align="right">&nbsp;</td>
        </tr>
        
        
        
        

        <tr>
            <td></td>
            <td colspan="3"><button type="submit" class="btn btn-default" onclick="">Submit</button></td>
        </tr>
    </tbody>
</table>

</form>
          </div>
    </section>    
<!-- /das_body_middle End-->
</div>

<?php $this->load->view('footer');?>
