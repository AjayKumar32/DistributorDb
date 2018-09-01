<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Customers Cleanup for new Customers </small></h2>
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
                    <!--<form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_customerscleanup" class="form-horizontal form-label-left" novalidate="">-->
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr id="tr_msg" style="display: none;"><th colspan="3" id="th_msg"></th></tr>
                        <tr>
                         <!-- <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th> -->
                          
                          <th>Customers New</th>
                          <th>Add Cleanup Value</th>
                          <th>Edit</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        if ($results)
                         { 

                        
                          foreach ($results as $data) { ?>
                        <tr id="tr_<?php echo $data->id ?>">
                          <!--<td><th><input type="checkbox" id="check-all" class="flat" value="<?php echo $data->id; ?>"></th></td>-->
                          <td><?php echo $data->Customer; ?></td>
                          <!--<td><input type="text" id="customer" name="customer" placeholder="<?php echo $data->Customer_New; ?>" class="form-control col-md-7 col-xs-12"></td>-->
                          <td><input type="text" name="newcus_<?php echo $data->id ?>" id="newcus_<?php echo $data->id ?>"value="<?php echo $data->Customer_New; ?>" class="form-control input-sm" onblur="cleanCountry(this.value,'<?php echo $data->Customer; ?>','<?php echo $data->id ?>')"></td>                                     
                         <td><a href="<?php echo base_url(); ?>/user/addnew_customerscleanup/<?php echo $data->id ?>/<?php echo $data->Type ?>"><i class="fa fa-edit"></i></a></td>                                
                          
                        </tr>
                        <?php } }?>
                        
                      </tbody>
                    </table>
                    <div class="form-group" style="float:left">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>/user/customerscleanup_view" class="btn btn-warning btn-round"> < BACK</a> &nbsp; 
                          <!--<button type="submit" class="btn btn-success"> SUBMIT </button><?php if(!is_null($msg)) echo $msg; ?>-->
                        </div>
                      </div>
                  <!--</form>-->
                  </div>
                  
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  