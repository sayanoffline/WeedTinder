

function changeServiceStatus(id,val)
{
	var confm=confirm("Do you want to change status of this item.");
	if(confm==true)
	{
	//alert(val);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"cms/admin/statusChangeService/"+id+"/"+val;

	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
                //alert(responseText);

			document.getElementById('statusId'+id).innerHTML=responseText;

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


function addService()
{
	
	var title = $("#title").val();
	var slug = $("#slug").val();
       
       
	var flag=0;
        
	if(title.search(/\S/) == -1){
		$('#title').val('');
		$('#title').attr('placeholder', 'Enter service title.');
		$('#title').addClass('redmessage');
		//$('#brandName').focus();

		flag=1;
	}
	if(slug.search(/\S/) == -1){
		$('#slug').val('');
		$('#slug').attr('placeholder', 'Enter service url.');
		$('#slug').addClass('redmessage');
		//$('#brandName').focus();

		flag=1;
	}


        

        if(flag>0)
        {
        return false;
        }
        else
        {
        tinyMCE.triggerSave();
	var form = new FormData(document.getElementById('addServiceFrm'));
	



	//call ajax
      	$.ajax({
        url: js_site_url+"services/admin/ServiceAdd",
        type: 'POST',
        data: form,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false, //must, tell jQuery not to set contentType
        success: function(data) {
            console.log(data);
        },
        complete: function(XMLHttpRequest) {
            var data = XMLHttpRequest.responseText;
            
            //console.log(data);
		//alert("go");
        },
        error: function() {
            //alert("ERROR");
        }
    	}).done(function() {
        //console.log('Done');
	//alert("done");
	window.location.href=js_site_url+"services/admin/serviceList";

    	}).fail(function() {
        //alert("fail!");
    	});

        }
}


function deleteService(id)
{
	var confm=confirm("Are sure you want to delete this item.");
	if(confm==true)
	{
	//alert(id);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"services/admin/deleteService/"+id;
	
        
	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{
		   // alert(id);
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



function updateService()
{
	//alert("hi");
	var servicetitle = $("#title").val();
        var serviceUrl = $("#slug").val();
        
	var flag=0;

	if(servicetitle.search(/\S/) == -1){
		$('#title').val('');
		$('#title').attr('placeholder', 'Enter service title.');
		$('#title').addClass('redmessage');
		//$('#brandName').focus();

		flag=1;
	}
        if(serviceUrl.search(/\S/) == -1){
		$('#slug').val('');
		$('#slug').attr('placeholder', 'Enter service Url');
		$('#slug').addClass('redmessage');


		flag=1;
	}
	

        if(flag>0)
        {
        return false;
        }
        else
        {
        tinyMCE.triggerSave();
	var form = new FormData(document.getElementById('editServiceFrm'));
	/*var file = document.getElementById('bannerImage').files[0];
    	if (file) {
        form.append('bannerImage', file);
    	}*/



	//call ajax
      	$.ajax({
        url: js_site_url+"services/admin/updateService",
        type: 'POST',
        data: form,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false, //must, tell jQuery not to set contentType
        success: function(data) {
            console.log(data);
        },
        complete: function(XMLHttpRequest) {
            var data = XMLHttpRequest.responseText;
            
            //console.log(data);
		//alert("go");
        },
        error: function() {
            //alert("ERROR");
        }
    	}).done(function() {
        //console.log('Done');
	//alert("done");
	window.location.href=js_site_url+"services/admin/serviceList";

    	}).fail(function() {
        //alert("fail!");
    	});
        }
}

