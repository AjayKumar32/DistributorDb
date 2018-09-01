<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Delete Log</small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_distributor_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_distributor"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="http://localhost/index.php/user/disti_add_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" href="#" id="distributor"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app delete_tab_rec" href="<?php echo base_url(); ?>index.php/user/disti_delete_log" id="distributor"><i class="fa fa-trash"></i> Delete Log</a>
                    </div> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <th> <th><input type="checkbox" id="check-all" class="flat" value="0"></th></th>
                          
                          
                          <th>Table</th>
                          <th>User Id</th>
                          <th>User</th>
                          <th>Data</th>
                          <th>Delete Time</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         if ($results)
                         { 
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><th><input type="checkbox" id="check-all" class="flat" value="<?php echo $data->id; ?>"></th></td>
                          <td><?php echo $data->table; ?></td>
                          <td><?php echo $data->user_id; ?></td>
                          <td><?php echo $data->user; ?></td>
                          <td><?php echo $data->data; ?></td>
                          <td><?php echo $data->deleted_time; ?></td>
                          

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

  