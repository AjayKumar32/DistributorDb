<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Items Cleanup</small></h2>
                    <?php $obj=& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==121){ ?>
                            <a class="btn btn-app delete_tab_rec" id="itemscleanup" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                    
                     
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_items"><i class="fa fa-plus"></i> Check for New Items </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_items_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_items_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_items_cleanup_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="itemscleanup" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>
                    -->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          
               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>Item Original</th>
                          <th>Item New</th>
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
                          <td><?php echo $data->ItemOriginal; ?></td>
                          <td><?php echo $data->ItemNew; ?></td>                                     
                          <td>
                            <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                              foreach($obj->sectionPriv[4] as $rightsection){?>
                            <a href="<?php echo base_url().$rightsection['controller_name'].'/'.$rightsection['method_name'].'/'.$data->id; ?>"> <?php echo $rightsection['icon']; ?></a>                                     
                          <?php }}; ?>
                          </td>
                        </tr>
                        <?php } }?>
                      </tbody>
                    </table>
                    
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  