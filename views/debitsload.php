<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Debit Load </small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_debittransactions_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_debittransactions "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_debittransaction_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="debittransactions" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/debits_delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/debits_load_view"><i class="fa fa-table"></i> Debits Load</a>
                    </div>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form name="serach_form" method="post" action="">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <!--<thead>
                        <tr>
                          <td colspan="23">
                              <table>
                                <tr>
                                  <td>Sales Region</td><td><?php echo form_dropdown('sales_region',$sales_region_list,$sales_region,'onchange="getFilters(this.value,1)" id="sales_region" class="form-control input-sm"'); ?></td>
                                  <td>Sales Territory</td><td><?php echo form_dropdown('sales_territory',$sales_territory_list,$sales_territory,'onchange="getFilters(this.value,2)" id="sales_territory" class="form-control input-sm"'); ?></td>
                                  <td>Distributor</td><td><?php echo form_dropdown('distributor',$distributor_list,$distributor,'onchange="getFilters(this.value,3)" id="distributor_list" class="form-control input-sm"'); ?></td>
                                   

                                    <td>POS Reported Year</td><td><?php echo form_dropdown('sales_year',$years_list,'','id="sales_year" class="form-control input-sm"'); ?></td>
                                    <td>POS Reported Quarter</td><td><?php echo form_dropdown('sales_quarter',$quarter_list,$sales_quarter,'id="sales_quarter" class="form-control input-sm"'); ?></td>

                                     <td>POS Reported Month</td><td><?php echo form_dropdown('sales_month',$months_list,$sales_month,'id="sales_month" class="form-control input-sm"'); ?></td>

                                      
                                    </tr><tr>
                                      <td>Disti Status</td><td><?php 
                                       $statuslist  = array('All'=>'All',
                                                            'YES'=>'Active'
                                                            ,'NO'=>'In-Active');
                                      echo form_dropdown('disti_status',$statuslist,$disti_status,'id="disti_status" class="form-control input-sm"'); ?></td>
                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                </tr>
                                </td>
                              </tr>
                              </table>
                              </form> -->
                              <thead> 
                        <tr>
                         
               <th><input type="checkbox" id="check-all" class="flat" value=''></th>
             
                          <th>Distributor</th>                  
                          <th>Branch code</th>
                          <th>Claim date</th>
                          <th>Authorized Debit number</th>
                          <th>Quote</th>
                          <th>Invoice Number</th>
                          <th>Line Number</th>
                          <th>Part Number</th>
                          <th>Ship Date</th>
                          <th>Resale</th>
                          <th>Book Cost</th>
                          <th>Approved new</th>
                          <th>Quantity</th>
                          <th>Total credit due</th>
                          <th>Report Date Adesto</th>
                          <th>Fiile Name</th>
                          <th>Uploaded By</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        if ($results)
                         {                            
                          foreach ($results as $key=>$data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" name="table_records" class="flat" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Distributor; ?></td>
                            
                                                          

                          <td><?php echo $data->branch_code; ?></td> 

                          <td><?php echo $data->claim_date; ?></td>
                          <td><?php echo $data->Authorized_debit_number; ?></td>   
                          <td><?php echo $data->quote; ?></td> 
                          <td><?php echo $data->invoice; ?></td>                                 
                          <td><?php echo $data->line_number; ?></td>

                          <td><?php echo $data->part_number; ?></td>
                          <td><?php echo $data->ship_date; ?></td>                                     
                          <td><?php echo $data->resale; ?></td> 

                          <td><?php echo $data->book_cost; ?></td>
                          <td><?php echo $data->approved_new; ?></td>   
                          <td><?php echo $data->quantity; ?></td>                                 
                          <td><?php echo $data->total_credit_due; ?></td>

                          <td><?php echo $data->report_date_adesto; ?></td>   
                          <td><?php echo $data->file_name; ?></td>                                 
                          <td><?php echo $data->uploaded_by; ?></td>
                          

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
<script>

</script>
  