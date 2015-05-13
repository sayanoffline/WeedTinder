<?php
include_once("php/dbconfig.php");
include_once("php/functions.php");
//function getCalendarByRange($id){
  //try{
    //$db = new DBConnection();
    //$db->getConnection();
    //$sql = "select * from `jqcalendar` where `id` = " . $id;
    //$handle = mysql_query($sql);
    //echo $sql;
    //$row = mysql_fetch_object($handle);
	//}catch(Exception $e){
  //}
  //return $row;
//}
//if($_GET["id"]){
  //$event = getCalendarByRange($_GET["id"]);
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
  <head>    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">    
    <title>Calendar Details</title>    
    <link href="css/main.css" rel="stylesheet" type="text/css" />       
    <link href="css/dp.css" rel="stylesheet" />    
    <link href="css/dropdown.css" rel="stylesheet" />    
    <link href="css/colorselect.css" rel="stylesheet" />   
     
    <script src="src/jquery.js" type="text/javascript"></script>    
    <script src="src/Plugins/Common.js" type="text/javascript"></script>        
    <script src="src/Plugins/jquery.form.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.validate.js" type="text/javascript"></script>     
    <script src="src/Plugins/datepicker_lang_US.js" type="text/javascript"></script>        
    <script src="src/Plugins/jquery.datepicker.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.dropdown.js" type="text/javascript"></script>     
    <script src="src/Plugins/jquery.colorselect.js" type="text/javascript"></script>    
     
    <script type="text/javascript">
        if (!DateAdd || typeof (DateDiff) != "function") {
            var DateAdd = function(interval, number, idate) {
                number = parseInt(number);
                var date;
                if (typeof (idate) == "string") {
                    date = idate.split(/\D/);
                    eval("var date = new Date(" + date.join(",") + ")");
                }
                if (typeof (idate) == "object") {
                    date = new Date(idate.toString());
                }
                switch (interval) {
                    case "y": date.setFullYear(date.getFullYear() + number); break;
                    case "m": date.setMonth(date.getMonth() + number); break;
                    case "d": date.setDate(date.getDate() + number); break;
                    case "w": date.setDate(date.getDate() + 7 * number); break;
                    case "h": date.setHours(date.getHours() + number); break;
                    case "n": date.setMinutes(date.getMinutes() + number); break;
                    case "s": date.setSeconds(date.getSeconds() + number); break;
                    case "l": date.setMilliseconds(date.getMilliseconds() + number); break;
                }
                return date;
            }
        }
        function getHM(date)
        {
             var hour =date.getHours();
             var minute= date.getMinutes();
             var ret= (hour>9?hour:"0"+hour)+":"+(minute>9?minute:"0"+minute) ;
             return ret;
        }
        $(document).ready(function() {

	//for days checkbox
	$('#checkAllPop').bind('click', function(){
	var status = $(this).is(':checked');
	$('.chkPop').attr('checked', status);
	});



            //debugger;
            var DATA_FEED_URL = "php/datafeed.php";
            var arrT = [];
            var tt = "{0}:{1}";
            for (var i = 0; i < 24; i++) {
                arrT.push({ text: StrFormat(tt, [i >= 10 ? i : "0" + i, "00"]) }, { text: StrFormat(tt, [i >= 10 ? i : "0" + i, "30"]) });
            }
            $("#timezone").val(new Date().getTimezoneOffset()/60 * -1);
            $("#stparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            $("#etparttime").dropdown({
                dropheight: 200,
                dropwidth:60,
                selectedchange: function() { },
                items: arrT
            });
            var check = $("#IsAllDayEvent").click(function(e) {
                if (this.checked) {
                    $("#stparttime").val("00:00").hide();
                    $("#etparttime").val("00:00").hide();
                }
                else {
                    var d = new Date();
                    var p = 60 - d.getMinutes();
                    if (p > 30) p = p - 30;
                    d = DateAdd("n", p, d);
                    $("#stparttime").val(getHM(d)).show();
                    $("#etparttime").val(getHM(DateAdd("h", 1, d))).show();
                }
            });
            if (check[0].checked) {
                $("#stparttime").val("00:00").hide();
                $("#etparttime").val("00:00").hide();
            }
            $("#Savebtn").click(function() { $("#fmEdit").submit(); });
            $("#Closebtn").click(function() { CloseModelWindow(); });
            $("#Deletebtn").click(function() {
			alert("hi");
                 if (confirm("Are you sure to remove this event")) {  
                    var param = [{ "name": "calendarId", value: 8}];                
                    $.post(DATA_FEED_URL + "?method=remove",
                        param,
                        function(data){
                              if (data.IsSuccess) {
                                    alert(data.Msg); 
                                    CloseModelWindow(null,true);                            
                                }
                                else {
                                    alert("Error occurs.\r\n" + data.Msg);
                                }
                        }
                    ,"json");
                }
            });
            
           $("#stpartdate,#etpartdate").datepicker({ picker: "<button class='calpick'></button>"});    
            var cv =$("#colorvalue").val() ;
            if(cv=="")
            {
                cv="-1";
            }
            $("#calendarcolor").colorselect({ title: "Color", index: cv, hiddenid: "colorvalue" });
            //to define parameters of ajaxform
            var options = {
                beforeSubmit: function() {
                    return true;
                },
                dataType: "json",
                success: function(data) {
                    alert(data.Msg);
                    if (data.IsSuccess) {
                        CloseModelWindow(null,true);  
                    }
                }
            };
            $.validator.addMethod("date", function(value, element) {                             
                var arrs = value.split(i18n.datepicker.dateformat.separator);
                var year = arrs[i18n.datepicker.dateformat.year_index];
                var month = arrs[i18n.datepicker.dateformat.month_index];
                var day = arrs[i18n.datepicker.dateformat.day_index];
                var standvalue = [year,month,day].join("-");
                return this.optional(element) || /^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1,3-9]|1[0-2])[\/\-\.](?:29|30))(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1,3,5,7,8]|1[02])[\/\-\.]31)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])[\/\-\.]0?2[\/\-\.]29)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:16|[2468][048]|[3579][26])00[\/\-\.]0?2[\/\-\.]29)(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?: \d{1,3})?)?$|^(?:(?:1[6-9]|[2-9]\d)?\d{2}[\/\-\.](?:0?[1-9]|1[0-2])[\/\-\.](?:0?[1-9]|1\d|2[0-8]))(?: (?:0?\d|1\d|2[0-3])\:(?:0?\d|[1-5]\d)\:(?:0?\d|[1-5]\d)(?:\d{1,3})?)?$/.test(standvalue);
            }, "Invalid date format");
            $.validator.addMethod("time", function(value, element) {
                return this.optional(element) || /^([0-1]?[0-9]|2[0-3]):([0-5][0-9])$/.test(value);
            }, "Invalid time format");
            $.validator.addMethod("safe", function(value, element) {
                return this.optional(element) || /^[^$\<\>]+$/.test(value);
            }, "$<> not allowed");
            $("#fmEdit").validate({
                submitHandler: function(form) { $("#fmEdit").ajaxSubmit(options); },
                errorElement: "div",
                errorClass: "cusErrorPanel",
                errorPlacement: function(error, element) {
                    showerror(error, element);
                }
            });
            function showerror(error, target) {
                var pos = target.position();
                var height = target.height();
                var newpos = { left: pos.left, top: pos.top + height + 2 }
                var form = $("#fmEdit");             
                error.appendTo(form).css(newpos);
            }
        });
    </script>      
    <style type="text/css">     
    .calpick     {        
        width:16px;   
        height:16px;     
        border:none;        
        cursor:pointer;        
        background:url("sample-css/cal.gif") no-repeat center 2px;        
        margin-left:-22px;    
    }      
    </style>
  </head>
	<?php
	if($_GET["id"])
	{
		$db = new DBConnection();
		$db->getConnection();
		$getCalRow=mysql_fetch_array(mysql_query("select * from `jqcalendar` where `id`='$_GET[id]'"));
		$sql_e=mysql_query("select * from `schedules` where `id`='$getCalRow[schedule_id]'");
		$num_e=mysql_num_rows($sql_e);
		if($num_e>0)
		{
		while($row=mysql_fetch_array($sql_e))
		{
	?>

	<body>    
    <div>      
      <div class="toolBotton">           
        <a id="Savebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Save"  title="Save the calendar">Save(<u>S</u>)
          </span>          
        </a>                          
        <a id="Deletebtn" class="imgbtn" href="javascript:void(0);">                    
          <span class="Delete" title="Cancel the calendar">Delete(<u>D</u>)
          </span>                
        </a>             
        <a id="Closebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Close" title="Close the window" >Close
          </span></a>            
        </a>        
      </div>                  
      <div style="clear: both">         
      </div>        
      <div class="infocontainer">            
        <form action="php/datafeed.php?method=adddetails&id=<?php echo $row['id']; ?>" class="fform" id="fmEdit" method="post">                 
          

	



	<label>                    
            <span>                        *Select Batch:              
            </span>                    
            <div id="calendarcolor">
            </div>                     
            <input id="colorvalue" name="colorvalue" type="hidden" value="<?php echo $row['Color']; ?>" />                

			<select name="Batch" id="Batch">
			<option>Batch</option>
			<?php
				 $db = new DBConnection();
				$db->getConnection();
				$sqlBatch=mysql_query("select * from batch where deleted='0' and status='1'");
				while($batchRow=mysql_fetch_array($sqlBatch))
				{
			?>
				<option value="<?php echo $batchRow['id']; ?>" <?php if($row['batch_id']==$batchRow['id']) { echo "selected"; } ?>><?php echo $batchRow['name']; ?></option>
			<?php
				}
			?>
			</select>              
          </label>


          <label>                    
            <span>*Time:
            </span>                    
            <div>  
              <?php
                  $sarr = explode(" ", php2JsTime(mySql2PhpTime($row['start_time'])));
                  $earr = explode(" ", php2JsTime(mySql2PhpTime($row['end_time'])));
              ?>                    
                                     
              <input MaxLength="5" class="required time" id="stparttime" name="stparttime" style="width:60px;" type="text" value="<?php echo $sarr[1]; ?>" />To                       
                                    
              <input MaxLength="5" class="required time" id="etparttime" name="etparttime" style="width:60px;" type="text" value="<?php echo $earr[1]; ?>" />                                            
              <label class="checkp"> 
                <input id="IsAllDayEvent" name="IsAllDayEvent" type="checkbox" value="1" <?php if($row['IsAllDayEvent']!=0) {echo "checked";} ?>/>          All Day Event                      
              </label>                    
            </div>                
          </label> 
	
	<?php
		$scheduleArr=explode(',',$row['schedule_days']);
	?>

	<span style="font-weight:bold;">Schedule days :
	
	<input id="checkAllPop" type="checkbox" value="1">
	All Days<br>
	<input style="margin-left:98px;" class="chkPop" type="checkbox" value="Monday" name="scheduleDays[]" <?php if(in_array('Monday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Monday&nbsp;
	<input class="chkPop" type="checkbox" value="Tuesday" name="scheduleDays[]" <?php if(in_array('Tuesday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Tuesday&nbsp;
	<input class="chkPop" type="checkbox" value="Wednesday" name="scheduleDays[]" <?php if(in_array('Wednesday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Wednesday&nbsp;
	<input class="chkPop" type="checkbox" value="Thursday" name="scheduleDays[]" <?php if(in_array('Thursday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Thursday&nbsp;</br>
	<input style="margin-left:98px;" class="chkPop" type="checkbox" value="Friday" name="scheduleDays[]" <?php if(in_array('Friday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Friday&nbsp;
	<input class="chkPop" type="checkbox" value="Saturday" name="scheduleDays[]" <?php if(in_array('Saturday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Saturday&nbsp;
	<input class="chkPop" type="checkbox" value="Sunday" name="scheduleDays[]" <?php if(in_array('Sunday', $scheduleArr)) { echo "checked"; }else{  } ?>>
	Sunday&nbsp;
	</span> 
		  

		


	






                       
          <input id="timezone" name="timezone" type="hidden" value="" />           
        </form>         
      </div>         
    </div>
  </body>
</html>





	<?php
	}
		}
	}
	else
	{
	?>



  <body>    
    <div>      
      <div class="toolBotton">           
        <a id="Savebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Save"  title="Save the calendar">Save(<u>S</u>)
          </span>          
        </a>                  
        <a id="Closebtn" class="imgbtn" href="javascript:void(0);">                
          <span class="Close" title="Close the window" >Close
          </span></a>            
        </a>        
      </div>                  
      <div style="clear: both">         
      </div>        
      <div class="infocontainer">            
        <form action="php/datafeed.php?method=adddetails" class="fform" id="fmEdit" method="post">                 


	<label>                    
            <span> Select Batch:              
                               
            <div id="calendarcolor">
            </div>
			<select class="required" name="Batch" id="Batch">
			<option>Batch</option>
			<?php
				 $db = new DBConnection();
				$db->getConnection();
				$sqlBatch=mysql_query("select * from batch where deleted='0' and status='1'");
				while($batchRow=mysql_fetch_array($sqlBatch))
				{
			?>
				<option value="<?php echo $batchRow['id']; ?>"><?php echo $batchRow['name']; ?></option>
			<?php
				}
			?>
			</select>  
		</span>             
          </label>

          <label>                    
            <span>*Time:
            </span>                    
            <div>  
                                    
              <input MaxLength="5" class="required time" id="stparttime" name="stparttime" style="width:60px;" type="text" value="" />To                       
                                 
              <input MaxLength="5" class="required time" id="etparttime" name="etparttime" style="width:60px;" type="text" value="" />                                            
              <label class="checkp"> 
                <input id="IsAllDayEvent" name="IsAllDayEvent" type="checkbox" value="1" />          All Day Event                      
              </label>                    
            </div>                
          </label> 


	                   
            <span style="font-weight:bold;">Schedule days :
	
	<input id="checkAllPop" type="checkbox" value="1" checked>
	All Days<br>
	<input style="margin-left:98px;" class="chkPop" type="checkbox" value="Monday" name="scheduleDays[]" checked>
	Monday&nbsp;
	<input class="chkPop" type="checkbox" value="Tuesday" name="scheduleDays[]" checked>
	Tuesday&nbsp;
	<input class="chkPop" type="checkbox" value="Wednesday" name="scheduleDays[]" checked>
	Wednesday&nbsp;
	<input class="chkPop" type="checkbox" value="Thursday" name="scheduleDays[]" checked>
	Thursday&nbsp;</br>
	<input style="margin-left:98px;" class="chkPop" type="checkbox" value="Friday" name="scheduleDays[]" checked>
	Friday&nbsp;
	<input class="chkPop" type="checkbox" value="Saturday" name="scheduleDays[]" checked>
	Saturday&nbsp;
	<input class="chkPop" type="checkbox" value="Sunday" name="scheduleDays[]" checked>
	Sunday&nbsp;
	</span>
	
              
          <input id="timezone" name="timezone" type="hidden" value="" />           
        </form>         
      </div>         
    </div>
  </body>
</html>
<?php
	}		  
?>

