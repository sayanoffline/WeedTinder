<?php $this->load->view('front/header'); ?>
 <!-- start body -->
    <div class="bdywrap">
<!-- start broadcom -->    
    <div class="b_com">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><i class="icon-angle-double-right"></i></li>
    <li><a href="javascript:void(0);" class="active"><?php echo $pagecontent[0]['title']; ?></a></li>
    </ul>
    <div class="spacer"></div>
    </div>     
<!-- end broadcom -->      
    
<!-- start main -->
    <div class="main">
    <h3 class="hd4"><?php echo $pagecontent[0]['title']; ?></h3>
    <?php 
    if(!empty($pagecontent))
    {
        echo $pagecontent[0]['content'];
    }
    ?>
    <div class="spacer"></div>
    </div>    
	<!-- end main -->
    <div class="spacer"></div>
    </div>
<!-- end body -->
<?php $this->load->view('front/footer'); ?>