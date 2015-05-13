<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php if($this->session->userdata('userImg')=='') { echo $this->config->item('base_url').'assets/images/avter_pic.jpg'; } else { echo $this->config->item('base_url').'assets/uploads/thumbs/'.$this->session->userdata('userImg'); } ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('userName'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <? /*
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo $this->config->item('base_url');?>index.php/users/adminDashBoard"><i class="fa fa-circle-o"></i> Dashboard </a></li>
                <li class="active"><a href="<?php echo $this->config->item('base_url');?>index.php/users/adminDashBoard"><i class="fa fa-circle-o"></i> Dashboard </a></li>
                <li class="active"><a href="<?php echo $this->config->item('base_url');?>index.php/users/adminDashBoard"><i class="fa fa-circle-o"></i> Dashboard </a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Danger</a></li> 
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> 
             */
            ?>
            <li class=""><a href="<?php echo $this->config->item('base_url');?>index.php/users/adminDashBoard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="header">LABELS</li>
            <li><a href="<?php echo $this->config->item('base_url');?>index.php/cms/admin/pageList"><i class="fa fa-font"></i> Manage Pages </a></li>
            <li><a href="<?php echo $this->config->item('base_url');?>index.php/users/admin/userList"><i class="fa fa-users"></i> Manage Users </a></li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>