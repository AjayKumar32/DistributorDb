<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Items Cleanup for new Items </small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_countries"><i class="fa fa-plus"></i> Check for New Countries </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/import_countries_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                       <a class="btn btn-app" href="<?php echo base_url(); ?>user/export_countries_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/add_countries_cleanup_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="countriescleanup" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>
                    </div>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                         <!-- <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th> -->
                          
                          <th>Items New</th>
                          <th>Add Cleanup Value</th>
                          <th>Edit</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        if ($results)
                         { 
                         
                          foreach ($results as $data) { ?>
                        <tr>
                          <!--<td><th><input type="checkbox" id="check-all" class="flat" value="<?php echo $data->id; ?>"></th></td>-->
                          <td><?php echo $data->ItemOriginal; ?></td>
                          <td><?php echo $data->Item_New; ?></td>                                     
                          <td><a href="<?php echo base_url(); ?>/user/addnew_itemscleanup/<?php echo $data->id ?>/<?php echo $data->table ?>"><i class="fa fa-edit"></i></a></td>                                    
                          
                        </tr>
                        <?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  