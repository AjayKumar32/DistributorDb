<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modules</small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==195){ ?>
                            <a class="btn btn-app delete_tab_rec" id="module" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                    </div>
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_currency"><i class="fa fa-plus"></i> Check for New Currencies </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_currency_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_currency_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/usermanagement/add_module_view"><i class="fa fa-plus"></i> Add </a>
                      
                      <a class="btn btn-app delete_tab_rec" id="module" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>-->
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                    <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                         
                          <th>Child Module</th>
                          <th>Parent Module</th>
                          
                          <th>controller name</th>
                          <th>method name</th>
                          
                          <!--<th>Action</th>-->

                         
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        //echo "<pre>"; print_r($data["results"]);die();
                         if ($results)
                         {
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->module_id; ?>" class="flat" name="table_records" value="<?php echo $data->module_id; ?>"></td>
                          <td><?php echo $data->child_module; ?></td>
                          <td><?php echo $data->parent_module; ?></td>
                          
                          <td><?php echo $data->controller_name; ?></td>
                          <td><?php echo $data->method_name; ?></td>
                          <!--                                     
                          <td><a href="<?php echo base_url(); ?>usermanagement/edit_module/<?php echo $data->module_id ?>"><i class="fa fa-edit"></i></a></td>                                     
                          -->
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
        </div>

  