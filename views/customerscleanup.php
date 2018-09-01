<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Cleanup</h2>
                    <?php $obj =& get_instance(); ?>
                      <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==205){ ?>
                            <a class="btn btn-app delete_tab_rec" id="distributor" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_customers"><i class="fa fa-plus"></i> Check for New Customers </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_customers_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_customers_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_customers_cleanup_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="customerscleanup" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>-->
                    </div>
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                    <form name="search_form" method="post" action="">
                    <table class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="4">
                            <table> 
                              <tr>
                           <td>Search Word:</td>
                           <td><input type="text" name="search_word" id="search_word" class="form-control" value="<?php echo ($search_word!='0')?$search_word:'';?>"></td> <td><input type="submit" name="search" id="search" value="search" class="btn btn-round btn-success"></td>
                           </tr>
                           </table>

                         </td> 
                        </tr>

                        <tr>
                      
               <th><input type="checkbox" id="check-all" class="flat" value=''></th>
                          <th>CustomerOriginal</th>
                          <th>CustomerNew</th>
                          <th>Edit</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                         if ($results)
                         {  
                          foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->CustomerOriginal; ?></td>
                          <td><?php echo $data->CustomerNew; ?></td> 
                          <td><?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                        foreach($obj->sectionPriv[4] as $topSection){ ?>
                           <a href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'].'/'.$data->id;?>"><?php echo $topSection['icon'];?> </a>&nbsp;
                       <?php } }?></td>                                    
                                                              
                          
                        </tr>
                        <?php }} ?>
                        <th colspan="4"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>
                      </tbody>
                    </table>
                  </form>  
                  </div>
                  
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  