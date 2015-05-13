$(document).ready(function(){
    //  When user clicks on tab, this code will be executed
    $("#tabs li").click(function() {
        //  First remove class "active" from currently active tab
        $("#tabs li").removeClass('active');

        //  Now add class "active" to the selected/clicked tab
        $(this).addClass("active");

        //  Hide all tab content
        $(".tab_content").hide();

        //  Here we get the href value of the selected tab
        var selected_tab = $(this).find("a").attr("href");

        //  Show the selected tab content
        $(selected_tab).fadeIn();

        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });
});

function readURL(input,i) {

	//alert("hi");
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var loader = $('#loader');
                
                reader.onload = function (e) {
                $('#AddFileInputBox').show();
               // $('#input'+i).hide();
                $('#img').show();
                loader.css('opacity', '1'); 
                setTimeout(function(){
                    loader.css('opacity', '0'); 
                    $('#blah')
                        .show()
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                 }, 4000);
                        
                };

                reader.readAsDataURL(input.files[0]);
                
            }
        }

function getLoader()
{
	$('#loderId').show();
	$('#emailInvalid').hide();
	$('#emailValid').hide();	
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    

function checkLoginNullValue()
{
  
	$('#userEmail').attr('placeholder', 'email address');
	$('#password').attr('placeholder', 'Password');
        
	$('#userEmail').css('background-color', '#fff').css('color','#7F7F7F');
	$('#password').css('background-color', '#fff').css('color','#7F7F7F');
       
	$('#userEmail').removeClass('redmessage');
	$('#password').removeClass('redmessage');
        
}

function userLogin()
{
	//alert("hi");
	var flg=0;
	var username = $("#username").val();
	var password = $("#password").val();

	

	if(username.search(/\S/) == -1){
		$('#username').val('');
		$('#username').attr('placeholder', 'Enter Username.');
		$('#username').addClass('redmessage');
		flg=1;
	}
	
	if(password.search(/\S/) == -1){
		$('#password').val('');
		$('#password').attr('placeholder', 'Enter Password.');
		$('#password').addClass('redmessage');

		flg=1;
	}

	if(flg==1)
	{
		return false;
	}

	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"users/login";
        
        //alert(loadUrl);
	var formdata = $("#loginFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		data:formdata,
		success:function(responseText)
		{
                    
			var type = responseText.replace(/\s+/, "");
                        //alert(type);
			switch(type) 
			{
   			case 'Administrator':
				//alert("Hi Admin");				
				window.location.href=js_site_url+"users/adminDashBoard";
				break;
			
			default :
				//alert("hi Default");
				$('#login_err_txt').show().delay(3000).hide(10);
				return false;
				break;
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
	//alert("hijbjkbk");
	  /*  $('#userEmail').attr('placeholder', 'email address');
            $('#firstName').attr('placeholder', 'Firstname');
            $('#lastName').attr('placeholder', 'Lastname');
            $('#password').attr('placeholder', 'Password');
	    $('#confirmPassword').attr('placeholder', 'Confirm Password');
             $('#address1').attr('placeholder', 'address1');
             $('#address2').attr('placeholder', 'address2');
             $('#city').attr('placeholder', 'city');
             $('#state').attr('placeholder', 'state');
             $('#country').attr('placeholder', 'country');
             $('#contactNo').attr('placeholder', 'contactno');
             $('#zipCode').attr('placeholder', 'Zip Code');
	     $('#idCardNo').attr('placeholder', 'Identity Card No ');
	     $('#dob').attr('placeholder', 'Date Of Birth');
	     $('#bankName').attr('placeholder', 'Bank Name');
             $('#bankAccountNo').attr('placeholder', 'Bank Account No');
	     $('#doj').attr('placeholder', 'Date Of Joining'); */
             


	    $('#userEmail').css('background-color', '#fff').css('color','#7F7F7F');
            $('#firstName').css('background-color', '#fff').css('color','#7F7F7F');
            $('#lastName').css('background-color', '#fff').css('color','#7F7F7F');
            $('#username').css('background-color', '#fff').css('color','#7F7F7F');
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
	    $('#newPassword').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#courseName').css('background-color', '#fff').css('color','#7F7F7F');
            $('#courseCode').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#guardianName').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#batchName').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#batchCode').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#currentDay').css('background-color', '#fff').css('color','#7F7F7F');
            $('#teacher').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#startTime').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#endTime').css('background-color', '#fff').css('color','#7F7F7F');
		$('#startDate').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#endDate').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#batchId').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#subject').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#course').css('background-color', '#fff').css('color','#7F7F7F');
	    $('#tchCheckBox').css('background-color', '#fff').css('color','#7F7F7F');
	
	   $('#district').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#mobile').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#whs').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#radioTd').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#schoolName').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#schoolCode').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#gradeName').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#gradeCode').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#bankName').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#bankCode').css('background-color', '#fff').css('color','#7F7F7F');
	   $('#currentPassword').css('background-color', '#fff').css('color','#7F7F7F');
            


	    $('#userEmail').removeClass('redmessage');
            $('#firstName').removeClass('redmessage');
            $('#lastName').removeClass('redmessage');
            $('#username').removeClass('redmessage');
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
	    $('#newPassword').removeClass('redmessage');
	    $('#courseName').removeClass('redmessage');
            $('#courseCode').removeClass('redmessage');
	    $('#guardianName').removeClass('redmessage');
	   $('#batchName').removeClass('redmessage');
	    $('#batchCode').removeClass('redmessage');
	    $('#currentDay').removeClass('redmessage');
            $('#teacher').removeClass('redmessage');
	     $('#startTime').removeClass('redmessage');
	    $('#endTime').removeClass('redmessage');
		$('#startDate').removeClass('redmessage');
	    $('#endDate').removeClass('redmessage');
	    $('#batchId').removeClass('redmessage');
	    $('#subject').removeClass('redmessage');
	    $('#course').removeClass('redmessage');
	    $('#tchCheckBox').removeClass('redmessage');

	    $('#district').removeClass('redmessage');
	    $('#mobile').removeClass('redmessage');
	    $('#whs').removeClass('redmessage');
	    $('#radioTd').removeClass('redmessage');
	    $('#schoolName').removeClass('redmessage');
	    $('#schoolCode').removeClass('redmessage');
		$('#gradeName').removeClass('redmessage');
		$('#gradeCode').removeClass('redmessage');
	    $('#bankName').removeClass('redmessage');
	    $('#bankCode').removeClass('redmessage');
	    $('#currentPassword').removeClass('redmessage');

            
          

}




function getStates(cId)
{
	//alert(cId);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"teachers/getstate/"+cId;
	//var formdata = $("#addTeacherFrm").serialize();
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
			//alert(responseText);		
			//$("#addTeacherFrm").submit();
			//window.location.href=js_site_url+"teachers/showTeachersList";
			document.getElementById('districtDiv').innerHTML=responseText;


		},
	   error: function(jqXHR, exception) {
	   		return false;
	 }
	});
	return false;
}
