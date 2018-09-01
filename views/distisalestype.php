<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> DISTI SALES TYPE </small></h2>
                    <div style="float: right;">
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_countriesandterritories_view"><i class="fa fa-file-excel-o"></i> Import </a>-->
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_disti_sales_type "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/disti_sales_type_add_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="distisalestype" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>-->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          

               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          
                          <th>Distributor</th>
                          <th>Item</th>                          
                          <th>Sale Type</th>
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
                          <td><?php echo $data->distributor; ?></td>
                          <td><?php echo $data->item; ?></td>
                          <td><?php echo $data->sale_type; ?></td>                                     
                          
                          <td><a href="<?php echo base_url(); ?>/user/disti_sales_type_edit_view/<?php echo $data->id ?>"><i class="fa fa-edit"></i></a></td>
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

