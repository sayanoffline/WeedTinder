
function checkLoginNullValue()
{
  
	$('#userEmail').attr('placeholder', 'email address');
	$('#password').attr('placeholder', 'Password');
        
	$('#userEmail').css('background-color', '#fff').css('color','#7F7F7F');
	$('#password').css('background-color', '#fff').css('color','#7F7F7F');
       
	$('#userEmail').removeClass('redmessage');
	$('#password').removeClass('redmessage');
        
}

function changePassword()
{
   var oldPass = $("#oldPass").val();
   var newPass = $("#newPass").val();
   var confirmPass = $("#confirmPass").val();

   //*******validation starts Here*********//
   if(oldPass.search(/\S/) == -1){
		$('#oldPass').val('');
		$('#oldPass').attr('placeholder', 'Enter Old Password.');
		$('#oldPass').addClass('redmessage');

		return false;
    }
 
   if(newPass.search(/\S/) == -1){
		$('#newPass').val('');
		$('#newPass').attr('placeholder', 'Enter New Password.');
		$('#newPass').addClass('redmessage');

		return false;
    }
 
   if(confirmPass.search(/\S/) == -1){
		$('#confirmPass').val('');
		$('#confirmPass').attr('placeholder', 'Enter Confirm Password.');
		$('#confirmPass').addClass('redmessage');

		return false;
    }   
        
   if(newPass!=confirmPass){
		$('#confirmPass').val('');
		$('#confirmPass').attr('placeholder', 'Plase enter the same password again');
		$('#confirmPass').addClass('redmessage');
		return false;
    }
   //*******validation Ends Here*********// 
    
    $.ajaxSetup ({cache: false});
    var loadUrl = js_site_url+"users/passwordChange/";
    var formdata = $("#changePass").serialize();
     
    $.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			$("#changePass").submit();
			window.location.href=js_site_url+"users/adminDashBoard";

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
    return false;
   
}


function checkOldPassword()
{
     var oldPass = $("#oldPass").val();
     $.post('users/checkOldPass',{'oldPass':oldPass},function(data){
        if(data == 0)
        {
            $('#oldPass').val('');
	    $('#oldPass').attr('placeholder', 'Old password do not match');
	    $('#oldPass').addClass('redmessage');
	    return false;
        }
     });
}

function checkEmail()
{
    var email = $("#email").val();
    var validRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    
        if(email.search(/\S/) == -1){
		$('#email').val('');
		$('#email').attr('placeholder', 'Please enter email Id');
		$('#email').addClass('redmessage');
		return false;
	}
        else if(email.search(validRegex) == -1){
		$('#email').val('');
		$('#email').attr('placeholder', 'Enter valid email Id.');
		$('#email').addClass('redmessage');

		return false;
	}
     $.post(js_site_url+'index.php/users/checkEmail',{'email':email},function(data){
        if(data == 0)
        {
            $('#email').val('');
	    $('#email').attr('placeholder', 'Email does not exist');
	    $('#email').addClass('redmessage');
	    return false;
        }
     });
}

function forgotPassword()
{
    $.ajaxSetup ({cache: false});
    var loadUrl = js_site_url+"users/sendMail/";
    var formdata = $("#forgotPassForm").serialize(); 
    $.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
                    //alert(responseText);
			$("#forgotPassForm").submit();
			window.location.href=js_site_url+"users/adminLogin";

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
    return false;
     
     
}

function userLogin()
{
	//alert("hi");
	var email = $("#userEmail").val();
	var password = $("#password").val();

	var validRegex		=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if(email.search(/\S/) == -1){
		$('#userEmail').val('');
		$('#userEmail').attr('placeholder', 'Please use valid email.');
		$('#userEmail').addClass('redmessage');
		return false;
	}
	else if(email.search(validRegex) == -1){
		$('#userEmail').val('');
		$('#userEmail').attr('placeholder', 'Enter valid email id.');
		$('#userEmail').addClass('redmessage');

		return false;
	}
	if(password.search(/\S/) == -1){
		$('#password').val('');
		$('#password').attr('placeholder', 'Enter Password.');
		$('#password').addClass('redmessage');

		return false;
	}

	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/login";
        

	var formdata = $("#loginFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			//alert(responseText);
			if(responseText==1)
			{
                                // alert("ok");
				$("#loginFrm").submit();
				window.location.href=js_site_url+"users/adminDashBoard";
			}
			else
			{
				//alert("no");
                                $('#login_err_txt').show();
				return false;
			}
		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
}



function checkNullProf()
{
	    $('#userEmail').attr('placeholder', 'email address');
            $('#firstName').attr('placeholder', 'firstname');
            $('#lastName').attr('placeholder', 'lastname');
            $('#password').attr('placeholder', 'department');
	    $('#confirmPassword').attr('placeholder', 'messanger');
             $('#address1').attr('placeholder', 'address1');
             $('#address2').attr('placeholder', 'address2');
             $('#city').attr('placeholder', 'city');
             $('#state').attr('placeholder', 'state');
             $('#country').attr('placeholder', 'country');
             $('#contactNo').attr('placeholder', 'contactno');
             $('#zipCode').attr('placeholder', 'skype');
	     $('#idCardNo').attr('placeholder', 'skype');
	     $('#dob').attr('placeholder', 'skype');
	     $('#bankName').attr('placeholder', 'skype');
             $('#bankAccountNo').attr('placeholder', 'skype');
	     $('#doj').attr('placeholder', 'skype');
             


	    $('#userEmail').css('background-color', '#fff').css('color','#7F7F7F');
            $('#firstName').css('background-color', '#fff').css('color','#7F7F7F');
            $('#lastName').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#password').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#confirmPassword').css('background-color', '#fff').css('color','#7F7F7F');
            $('#address1').css('background-color', '#fff').css('color','#7F7F7F');
            $('#address2').css('background-color', '#fff').css('color','#7F7F7F');
            $('#city').css('background-color', '#fff').css('color','#7F7F7F');
            $('#state').css('background-color', '#fff').css('color','#7F7F7F');
            $('#country').css('background-color', '#fff').css('color','#7F7F7F');
            $('#contactNo').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#zipCode').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#idCardNo').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#dob').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#bankName').css('background-color', '#fff').css('color','#7F7F7F');
            $('#bankAccountNo').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#doj').css('background-color', '#fff').css('color','#7F7F7F');

            


	    $('#userEmail').removeClass('redmessage');
            $('#firstName').removeClass('redmessage');
            $('#lastName').removeClass('redmessage');
	    $('#password').removeClass('redmessage');
	    $('#confirmPassword').removeClass('redmessage');
            $('#address1').removeClass('redmessage');
            $('#address2').removeClass('redmessage');
            $('#city').removeClass('redmessage');
            $('#state').removeClass('redmessage');
            $('#country').removeClass('redmessage');
	     $('#contactNo').removeClass('redmessage');
            $('#zipCode').removeClass('redmessage');
	    $('#idCardNo').removeClass('redmessage');
	    $('#dob').removeClass('redmessage');
	    $('#bankName').removeClass('redmessage');
	    $('#bankAccountNo').removeClass('redmessage');
	    $('#doj').removeClass('redmessage');

            
          

}




function addUser()
{
 //alert("ok");

       var email = $("#userEmail").val();
	var password = $("#password").val();
	var cpassword = $("#confirmPassword").val();
	var firstName = $("#firstName").val();
	var lastName = $("#lastName").val();
        var dob = $("#dob").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var contactNo = $("#contactNo").val();
        var zipCode = $("#zipCode").val();
        var idCardNo = $("#idCardNo").val();
	var dob = $("#dob").val();
	var bankName = $("#bankName").val();
	var bankAccountNo = $("#bankAccountNo").val();
	var doj = $("#doj").val();
       
	var validRegex		=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if(email.search(/\S/) == -1){
		$('#userEmail').val('');
		$('#userEmail').attr('placeholder', 'Enter email.');
		$('#userEmail').addClass('redmessage');
		$( "#userEmail" ).focus();

		return false;
	}
	else if(email.search(validRegex) == -1){
		$('#userEmail').val('');
		$('#userEmail').attr('placeholder', 'Enter valid email id.');
		$('#userEmail').addClass('redmessage');

		return false;
	}
	else if(password.search(/\S/) == -1){
		$('#password').val('');
		$('#password').attr('placeholder', 'Enter password.');
		$('#password').addClass('redmessage');

		return false;
	}
	else if(cpassword.search(/\S/) == -1){
		$('#confirmPassword').val('');
		$('#confirmPassword').attr('placeholder', 'Enter Confirm password.');
		$('#confirmPassword').addClass('redmessage');

		return false;
	}
	else if(password!=cpassword)
	{
		$('#confirmPassword').val('');
		$('#confirmPassword').attr('placeholder', 'Confirm password.');
		$('#confirmPassword').addClass('redmessage');

		return false;
	}
	else if(firstName.search(/\S/) == -1){
		$('#firstName').val('');
		$('#firstName').attr('placeholder', 'Enter first_name.');
		$('#firstName').addClass('redmessage');

		return false;
	}
        else if(lastName.search(/\S/) == -1){
                        $('#lastName').val('');
                        $('#lastName').attr('placeholder', 'Enter last_name.');
                        $('#lastName').addClass('redmessage');

                        return false;
                }

        else if(address1.search(/\S/) == -1){
                        $('#address1').val('');
                        $('#address1').attr('placeholder', 'Enter address1.');
                        $('#address1').addClass('redmessage');

                        return false;
                }
        else if(address2.search(/\S/) == -1){
                        $('#address2').val('');
                        $('#address2').attr('placeholder', 'Enter address2.');
                        $('#address2').addClass('redmessage');

                        return false;
                }
	 else if(country==0){
                        $('#country').val('');
                        $('#country').attr('placeholder', 'Enter country.');
                        $('#country').addClass('redmessage');

                        return false;
                }
	else if(state==0){
                        $('#state').val('');
                        $('#state').attr('placeholder', 'Enter state.');
                        $('#state').addClass('redmessage');

                        return false;
                }
	else if(city.search(/\S/) == -1){
                        $('#city').val('');
                        $('#city').attr('placeholder', 'Enter city.');
                        $('#city').addClass('redmessage');

                        return false;
                }
        
       
        else if(contactNo.search(/\S/) == -1){
                        $('#contactNo').val('');
                        $('#contactNo').attr('placeholder', 'Enter contact_no.');
                        $('#contactNo').addClass('redmessage');

                        return false;
                }
        else if(zipCode.search(/\S/) == -1){
                        $('#zipCode').val('');
                        $('#zipCode').attr('placeholder', 'Enter skype.');
                        $('#zipCode').addClass('redmessage');

                        return false;
                }
        else if(idCardNo.search(/\S/) == -1){
                        $('#idCardNo').val('');
                        $('#idCardNo').attr('placeholder', 'Enter messanger.');
                        $('#idCardNo').addClass('redmessage');

                        return false;
                }
	else if(dob.search(/\S/) == -1){
                        $('#dob').val('');
                        $('#dob').attr('placeholder', 'Enter messanger.');
                        $('#dob').addClass('redmessage');

                        return false;
                }
	else if(bankName.search(/\S/) == -1){
                        $('#bankName').val('');
                        $('#bankName').attr('placeholder', 'Enter messanger.');
                        $('#bankName').addClass('redmessage');

                        return false;
                }
	else if(bankAccountNo.search(/\S/) == -1){
                        $('#bankAccountNo').val('');
                        $('#bankAccountNo').attr('placeholder', 'Enter messanger.');
                        $('#bankAccountNo').addClass('redmessage');

                        return false;
                }
	else if(doj.search(/\S/) == -1){
                        $('#doj').val('');
                        $('#doj').attr('placeholder', 'Enter messanger.');
                        $('#doj').addClass('redmessage');

                        return false;
                } 
	else
	{
	

	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"teachers/userAdd";
	var formdata = $("#addTeacherFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			alert(responseText);		
			$("#addTeacherFrm").submit();
			window.location.href=js_site_url+"teachers/showTeachersForm";

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
}
}


function deleteTeacher(id)
{
	alert(id);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"teachers/deleteTeacher/"+id;
	//var formdata = $("#TeacherListfrm").serialize();
        //var del_id= $(this).attr('id');
        
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
		    alert(id);
                    $("#del"+id).remove();

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
      
}


function updateTeacher()
{
	//alert("hi...");
	var existingPassword = $("#existingPassword").val();
	var currentPassword = $("#currentPassword").val();
	var newPassword = $("#newPassword").val();
	var confirmPassword = $("#confirmPassword").val();
	//alert(existingPassword);
	if(currentPassword!='')
	{
		
		//if(currentPassword!=existingPassword){
		//$('#currentPassword').val('');
		//$('#currentPassword').attr('placeholder', 'Enter Correct Current Password.');
		//$('#currentPassword').addClass('redmessage');

		//return false;
		//}
		if(newPassword.search(/\S/) == -1){
		$('#newPassword').val('');
		$('#newPassword').attr('placeholder', 'Enter New password.');
		$('#newPassword').addClass('redmessage');

		return false;
		}
		if(confirmPassword.search(/\S/) == -1){
		$('#confirmPassword').val('');
		$('#confirmPassword').attr('placeholder', 'Confirm Password.');
		$('#confirmPassword').addClass('redmessage');

		return false;
		}
		if(confirmPassword!=newPassword){
		$('#confirmPassword').val('');
		$('#confirmPassword').attr('placeholder', 'Confirm Password.');
		$('#confirmPassword').addClass('redmessage');

		return false;
		}

		$.ajaxSetup ({cache: false});
		var loadUrl = js_site_url+"teachers/updateTeacherPass";
		var formdata = $("#editTeacherFrm").serialize();
		$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			alert(responseText);		
			$("#editTeacherFrm").submit();
			window.location.href=js_site_url+"teachers/showTeachersList";

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
		
	}


	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"teachers/updateTeacher";
	var formdata = $("#editTeacherFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			alert(responseText);		
			$("#editTeacherFrm").submit();
			window.location.href=js_site_url+"teachers/showTeachersList";

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;	
}



function editTeacher(id)
{
	alert(id);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"teachers/editTeacher/"+id;
	var formdata = $("#TeacherListfrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			alert(responseText);		
			$("#TeacherListfrm").submit();
			window.location.href=js_site_url+"teachers/editTeacher/"+id;

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;	
}




function check_add()
{
 alert("ok");

	var email = $("#email").val();
	var password = $("#password").val();
         var confirmpassword = $("#confirmpassword").val();
	var validRegex		=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if(email.search(/\S/) == -1){
		$('#email').val('');
		$('#email').attr('placeholder', 'Please use valid email.');
		$('#email').addClass('redmessage');
		return false;
	}
	else if(email.search(validRegex) == -1){
		$('#email').val('');
		$('#email').attr('placeholder', 'Enter valid email id.');
		$('#email').addClass('redmessage');

		return false;
	}
	if(password.search(/\S/) == -1){
		$('#password').val('');
		$('#password').attr('placeholder', 'Enter Password.');
		$('#password').addClass('redmessage');

		return false;
	}
if(confirmpassword.search(/\S/) == -1){
		$('#confirmpassword').val('');
		$('#confirmpassword').attr('placeholder', 'Enter confirmpassword.');
		$('#confirmpassword').addClass('redmessage');

		return false;
	}

	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/ajax_add";


	var formdata = $("#login_add").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
			if(responseText != '0')
			{

			        alert(responseText);
				$("#login_add").submit();
				window.location.href=js_site_url+"users/add_prof/"+responseText;
}
else
			{
                                $('#login_err_txt').show();
				return false;
			}

			
		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
}



function editUser1(id)
{
	alert(id);
$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/prof_edit/"+id;


	var formdata = $("#frm_opts").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function()
		{
			alert("here");
				$("#frm_opts").submit();
				window.location.href=js_site_url+"users/profile_edit/"+id;

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;

}
function replace_page(ID)
{
	alert(ID);

}
function up_prof(id)
{
	alert(id);
$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/update_profile/"+id;


	var formdata = $("#login_add").serialize();
         
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function()
		{
			alert("here");
				//$("#prof_add").submit();
                              // $("#del").remove();
                                //$('#'+rowid).remove();


		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;

}
function chk_email(id){
    alert(id);
 if(id!=''){
//$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/emailChk/"+id;


	var formdata = $("#prof_add").serialize();
			$.ajax({
		        type: "POST",
		        url: loadUrl,
                  data: formdata,
                  success: function(ret){


if(ret=='1'){
	alert("here");
						$('#email').css('border', '2px green solid');	
					}else{
						alert('here1');
						$('#email').css('border', '2px red solid');
                                                  $('#email').html('email already exists');	
					}	
                  //alert("here");
                  //window.location.href=js_site_url+"users/profile_edit/"+id;
                  //$('#chk').html('hii');
				  //chk.html('hii');
                     //$('#id').fadeOut();
                  
}

					    	});
					 }

}

$(document).ready(function(){

     $(".delete").click(function(){
       alert("Delete?");
         var href = $(this).attr("href");
         var btn = this;

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {

          if (response == "Success")
          {
             $(btn).closest('tr').fadeOut("slow");
          }
          else
          {
            alert("Error");
          }

       }
    });

   })
  });
   $(document).ready(function() {

    $('a.delete').click(function(e) {

        e.preventDefault();

        var parent = $(this).parent();
var loadUrl = js_site_url+"users/prof_del/"+id;

        $.ajax({

            type: 'post',

            url: loadUrl,

            data: 'ajax=1&delete=' + parent.attr('id').replace('record-',''),

            beforeSend: function() {

                parent.animate({'backgroundColor':'#fb6c6c'},300);

            },

            success: function() {

                parent.slideUp(300,function() {

                    parent.remove();

                });

            }

        });

    });

});


function changeUserStatus(id)
{
	var confm=confirm("Do you want to change status of this user.");
	if(confm==true)
	{
	//alert(val);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/admin/statusChangeUser/"+id;

	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
                        //alert(responseText);
                        
			document.getElementById('changeStatusAnchorUser'+id).innerHTML=responseText;

		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
	}
	else
	{
	return false;
	}

	
}

function deleteUser(id)
{
	var confm=confirm("Are sure you want to delete this User.");
	if(confm==true)
	{
	//alert(id);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/admin/deleteUser/"+id;
	
        
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
		   // alert(id);
                     $("#del"+id).next('.child').remove();
                     $("#del"+id).remove();

		},
                error: function(jqXHR, exception) {
	   		return false;
                }
	});
	return false;
	}
	else
	{
		return false;
	}
}