<?php $this->load->view('header'); ?>
<?php $this->load->view('left'); ?>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
            $('#pageListTable').DataTable({
            "columnDefs": [ 
                        {
                            "searchable": false,
                            "orderable": false,
                            "targets": 5
                        },
                        {
                            "searchable": false,
                            "orderable": false,
                            "targets": 4
                        }
                    ]
            
        });
    } );
</script>
<style>
    input[type="search"] , select{
        background-color: #FAFAFA;
        border: 1px solid rgba(0, 0, 0, 0.15);
        color: #AAAAAA;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;

        font-size: 14px;
        height: 33px;
        padding: 0px 6px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        vertical-align: middle;   
        
    }
    
</style>




<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Pages
            <small>Page List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Page</a></li>
            <li class="active">Page List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="float: right;">
                      <a title="Add Page" class=" r" href="<?php echo $this->config->item('base_url');?>index.php/cms/admin/addPage"><button class="btn btn-default" type="button" style="margin-right:10px;">Add Page</button></a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="pageListTable" class="display dt-responsive nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Page Title</th>
                                <th>Page Url</th>
                                <th>Tenant Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                foreach($query as $row)
                                {

                                $id=$row['pageId'];


                                ?>
                            <tr id="del<?php echo $id; ?>">
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['slug']; ?></td>
                                <td><?php echo $row['tenantName']; ?></td>
                                <td id="statusId<?php echo $id; ?>">
                                    <a title="<?php if($row['status']==1){ echo 'Active'; } else{ echo 'Inactive';} ?>" class="demo-basic" href="javascript:void(0)" onclick="changePageStatus('<?php echo $id; ?>','<?php echo $row['status']; ?>')">
                                    <?php if($row['status']==1){ echo '<i style="color:#009d59" class="fa fa-plus-circle"></i>'; } else{ echo '<i style="color:#d7422d" class="fa fa-minus-circle"></i>';} ?>
                                    </a>
                                </td>
                                <td><a title="Edit" class="demo-basic" href="<?php echo $this->config->item('base_url');?>index.php/cms/admin/editPage/<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="javascript:void(0)" title="Delete" class="demo-basic"><i class="fa fa-trash-o" onclick="deletePage('<?php echo $id;?>');"></i></a></td>
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



<!-- /das_body_middle End-->
<?php $this->load->view('footer');?>