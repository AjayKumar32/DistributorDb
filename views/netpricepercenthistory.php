<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Net Price Percent History</small></h2>
                    <div style="float: right;">
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_netpricepercent_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_netpricepercent"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="http://localhost/index.php/user/netpricepercent_add_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" href="#" id="netpricepercent"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/netpricepercent_history"><i class="fa fa-history"></i> View History</a>-->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table>

                      <form name="filter_form" method="post" action="">
                      <thead>
                        <tr>
                          <td colspan="7">
                              <table>
                                <tr>
                                  <td>Customer</td><td><?php echo form_dropdown('customer',$customer_list,$customer,'onchange="getFiltersfornetpricepercent(this.value,1)" id="customer" class="form-control input-sm"'); ?></td>
                                  <td>Item</td><td><?php echo form_dropdown('Item',$Item_list,$Item,'onchange="getFiltersfornetpricepercent(this.value,2)" id="Item" class="form-control input-sm"'); ?></td>
                                  
                                    

                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                </tr>
                              </table>
                                </td>
                                </tr>
                              </thead>
                            </form>

                    </table>
                    <br /> 

                    <table class="table table-striped table-bordered bulk_action" data-page-length='100'>              
                     
                      <thead>
                        <tr>
                          
               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>GP Customer Number</th>
                          <th>Item Number</th>
                          <th>Net Price Percent</th>
                          <th>Customer Net Price Percent</th>
                          <th>Date Added</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         if ($results)
                         { 
                         foreach ($results as $data) {  ;?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->GP_Customer_Number; ?></td>
                          <td><?php echo $data->Item_Number; ?></td>
                          <td><?php echo $data->Net_Price_Percent; ?></td>
                          <td><?php echo $data->Customer_Net_Price_percent; ?></td>
                          <td><?php echo $data->date_added; ?></td>

                        </tr>
                        <?php }} ?>
                        <th colspan="7"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>
                      </tbody>
                    </table>
                  
                  </div>
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  