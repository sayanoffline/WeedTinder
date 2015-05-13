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
            Edit User
            <small>&nbsp;</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit User</li>
          </ol>
    </section>
    <section class="content">
          <div class="row">
              <form method="post" name="" id=""  onSubmit="" >

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
            <td align="right" width="40%">My energy level when using Cannabis is? </td>
            <td>
                <select name="q1[]" id="q1" class="form-control" multiple>
                    <option value="3">Low</option>
                    <option value="2">Medium</option>
                    <option value="1">High</option>
                </select>
            </td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right" width="40%">When consuming Cannabis I prefer : </td>
            <td>
                <select name="q2[]" id="q2" class="form-control" multiple>
                    <option value="1">Smoking</option>
                    <option value="2">Vaporizing</option>
                    <option value="3">Edibles</option>
                    <option value="4">It's all Good</option>
                </select>
            </td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right" width="40%">I want to meet other HighThere users who like : </td>
            <td>
                <select name="q3[]" id="q3" class="form-control" multiple>
                    <option value="1">Outdoors</option>
                    <option value="2">Music</option>
                    <option value="3">TV/Movies</option>
                    <option value="4">Culture</option>
                    <option value="5">Gaming</option>
                    <option value="6">Food</option>
                </select>
            </td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right" width="40%">Tell Us about Yourself : </td>
            <td>
                <textarea name="description" id="description" class="form-control" ></textarea>
            </td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
        </tr>
        
        <tr>
            <td align="right" width="40%">Upload Your Image : </td>
            <td>
                <input type="file" name="profile_image" id="profile_image">
            </td>
            <td align="right">&nbsp;</td>
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
