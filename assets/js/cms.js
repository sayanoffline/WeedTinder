

function changePageStatus(id,val)
{
	var confm=confirm("Do you want to change status of this item.");
	if(confm==true)
	{
	//alert(val);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"cms/admin/statusChangePage/"+id+"/"+val;

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

function changeTopsale(id,val)
{
	var confm=confirm("Do you want to change status of this item.");
	if(confm==true)
	{
	//alert(val);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"brands/admin/changeTopsale/"+id+"/"+val;

	$.ajax({
		type: "POST",
		url: loadUrl,
		dataType:"html",
		//data:formdata,
		success:function(responseText)
		{

			document.getElementById('topsaleId'+id).innerHTML=responseText;

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





function addPage()
{
	
	var title = $("#title").val();
	var slug = $("#slug").val();
       
       
	var flag=0;
        
	if(title.search(/\S/) == -1){
		$('#title').val('');
		$('#title').attr('placeholder', 'Enter page title.');
		$('#title').addClass('redmessage');
		//$('#brandName').focus();

		flag=1;
	}
	if(slug.search(/\S/) == -1){
		$('#slug').val('');
		$('#slug').attr('placeholder', 'Enter page url.');
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
	var form = new FormData(document.getElementById('addPageFrm'));
	



	//call ajax
      	$.ajax({
        url: js_site_url+"cms/admin/PageAdd",
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
	window.location.href=js_site_url+"cms/admin/pageList";

    	}).fail(function() {
        //alert("fail!");
    	});

        }
}


function deletePage(id)
{
	var confm=confirm("Are sure you want to delete this item.");
	if(confm==true)
	{
	//alert(id);
	$.ajaxSetup ({cache: false});
	var loadUrl = js_site_url+"cms/admin/deletePage/"+id;
	
        
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



function updatePage()
{
	//alert("hi");
	var pagetitle = $("#title").val();
        var pageUrl = $("#slug").val();
        
	var flag=0;

	if(pagetitle.search(/\S/) == -1){
		$('#title').val('');
		$('#title').attr('placeholder', 'Enter page title.');
		$('#title').addClass('redmessage');
		//$('#brandName').focus();

		flag=1;
	}
        if(pageUrl.search(/\S/) == -1){
		$('#slug').val('');
		$('#slug').attr('placeholder', 'Enter page Url');
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
	var form = new FormData(document.getElementById('editPageFrm'));
	/*var file = document.getElementById('bannerImage').files[0];
    	if (file) {
        form.append('bannerImage', file);
    	}*/



	//call ajax
      	$.ajax({
        url: js_site_url+"cms/admin/updatePage",
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
	window.location.href=js_site_url+"cms/admin/pageList";

    	}).fail(function() {
        //alert("fail!");
    	});
        }
}

