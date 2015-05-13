<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Under Construction </title>

<?php $this->load->view('front/includes'); ?>


</head>

<body>

<?php $this->load->view('front/header'); ?>
    
    <form id="loginFrm" method="post" action="<?=$this->config->item('base_url').'index.php/api/updateProfile'?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="file" id="file" placeholder="Username"  onfocus="" >
            <textarea name="data">{"userId":"12345","q1":"A","q2":"B","q3":"C","profile_images":["1","2","3","4","5","6"],"desc":"ABCDE"}</textarea>
                <input type="submit">
    </form>

   
    
    

<?php $this->load->view('front/footer'); ?>



</body>
</html>