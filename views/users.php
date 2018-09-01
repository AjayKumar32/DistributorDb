<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php $obj=& get_instance(); ?>
                    <h2>User Management</small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_currency"><i class="fa fa-plus"></i> Check for New Currencies </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_currency_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_currency_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_currency_cleanup_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="currencycleanup" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>
                    </div>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                         
               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>Username</th>
                          <th>First name</th>
                          <th>Last Name</th>
                          <th>Email</th>

                          <th>Active</th>
                          <th>Level id</th>
                          <th>Parent id</th>
                          <th>Action</th>

                         
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        //echo "<pre>"; print_r($data["results"]);die();
                         if ($results)
                         {
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->userid; ?>" class="flat" name="table_records" value="<?php echo $data->userid; ?>"></td>
                          <td><?php echo $data->username; ?></td>
                          <td><?php echo $data->fname; ?></td>
                          <td><?php echo $data->lname; ?></td>
                          <td><?php echo $data->email; ?></td>
                          <td><?php echo $data->is_actiive; ?></td>
                          <td><?php echo $data->level_id; ?></td>
                          <td><?php echo $data->parent_id; ?></td>                                     
                          <td><?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                        foreach($obj->sectionPriv[4] as $topSection){ ?>
                           <a href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'].'/'.$data->userid;?>"><?php echo $topSection['icon'];?> </a>&nbsp;
                       <?php } }?></td>                                     
                          
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

  