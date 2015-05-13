<?php $this->load->view('header'); ?>
<?php $this->load->view('left'); ?>

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            Change Password
            <small>&nbsp;</small>
          </h1>
    </section>
    <section class="content">
          <div class="row">
<form method="post" name="changePass" id="changePass"><!--form starts here-->

<table cellspacing="0" cellpadding="0" align="left" class="table add_user"><!--table starts here-->
<tbody><!--tbody starts here-->
    
<tr><td align="right">Old Password<sup>*</sup></td><td><input type="password" name="oldPass" id="oldPass" placeholder="Old Password" class="form-control" onFocus="javascript:checkNullProf()" onblur="checkOldPassword();"></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr><td align="right">New Password <sup>*</sup></td><td><input type="password" name="newPass" id="newPass" placeholder="New Password" class="form-control" onFocus="javascript:checkNullProf()"></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr><td align="right">Confirm Password <sup>*</sup></td><td><input type="password" name="confirmPass" id="confirmPass" placeholder="Confirm Password" class="form-control" onFocus="javascript:checkNullProf()"></td>
<td align="right">&nbsp;</td>
<td align="right">&nbsp;</td>
</tr>

<tr>
<td></td>
<td colspan="3"><button type="button" class="btn btn-default" onclick="changePassword();">Change Password</button></td>
</tr>

</tbody><!--tbody ends here-->
</table><!--table ends here-->
</form><!--form starts here-->
</div>
    </section>    
<!-- /das_body_middle End-->
</div>
<?php $this->load->view('footer');?>
