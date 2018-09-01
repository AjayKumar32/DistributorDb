<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Inventory Transactions </small></h2>
                    <?php $obj=& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection) {
                          if($topSection['module_id']==146){ ?>
                          <a class="btn btn-app delete_tab_rec" id="inventorytransactions" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?>
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_inventorytransactions_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url().'index.php/user/export_inventorytransactions?distributor='.$distributor.'&sales_territory='.$sales_territory.'&sales_region='.$sales_region.'&sales_year='.$sales_year.'&sales_month='.$sales_month.'&sales_quarter='.$sales_quarter?>"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_inventorytransaction_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="inventorytransactions" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/inventory_delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app " href="<?php echo base_url(); ?>index.php/user/inventory_load_view"><i class="fa fa-table"></i> Inventory Load </a>
                      <a class="btn btn-app " href="<?php echo base_url(); ?>index.php/user/inventory_load_history_view"><i class="fa fa-table"></i> Inventory Load History </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/inventory_cleaned_view"><i class="fa fa-table"></i> Inventory Cleaned</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/inventory_cleaned_history_view"><i class="fa fa-table"></i> Inventory Cleaned History</a>-->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form name="serach_form" method="post" action="">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                         <tr>
                          <td colspan="23">
                              <table>
                                <tr>
                                  <td>Sales Region</td><td><?php echo form_dropdown('sales_region',$sales_region_list,$sales_region,'
                                    onchange="getFilters(this.value,1)" id="sales_region" class="form-control input-sm"'); ?></td>
                                  <td>Sales Territory</td><td><?php echo form_dropdown('sales_territory',$sales_territory_list,$sales_territory,'
                                  onchange="getFilters(this.value,2)" id="sales_territory" class="form-control input-sm"'); ?></td>
                                  
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
                                </table>
                                </td>
                              </tr>
                              
                              </form>  
                          
                        <tr>
                          
               <th><input type="checkbox" id="check-all" class="flat" value=''></th>
              
                          <th>Distributor</th>
                          <th>Country</th>
                          <th>Sales Territory</th>
                          <th>Sales Region</th>
                          <th>LoadDate</th>
                          <th>ItemOriginal</th>
                          <th>CustPartNumber</th>
                          <th>Quantity</th>

                          <th>DBC Currency</th>
                          <th>DBC Currency Exchange</th>
                          <th>DBC Unit Orig</th>
                          <th>DBC Unit USD</th>
                          <th>DBC Extended USD</th>
                          <th>Debited Cost Currency</th>

                          <th>Debited Cost Currency Exchange</th>
                          <th>Debited Cost Unit Orig</th>
                          <th>Debited Cost Unit USD</th>
                          <th>Debited Cost Extended USD</th>

                          <th>Report Date Adesto</th>
                          <th>File Name</th>
                          <th>Uploaded By</th>

                          <th>Edit</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                         if ($results)
                         { 
                          foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" name="table_records" class="flat" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Distributor; ?></td>
                          <td><?php echo $data->Country; ?></td>
                          <td><?php echo $data->sales_territory; ?></td>
                          <td><?php echo $data->sales_region; ?></td>                                     
                          <td><?php echo $data->Load_Date; ?></td>

                          <td><?php echo $data->ItemOriginal; ?></td>
                          <td><?php echo $data->CustPartNumber; ?></td>                                     
                          <td><?php echo $data->Quantity; ?></td> 

                          <td><?php echo $data->DBC_Currency; ?></td>
                          <td><?php echo $data->DBC_Curr_Exch; ?></td>                                     
                          <td><?php echo $data->DBC_Unit_Orig; ?></td> 

                          <td><?php echo $data->DBC_Unit_USD; ?></td>
                          <td><?php echo $data->DBC_Ext_USD; ?></td>                                     
                          <td><?php echo $data->Debited_Cost_Currency; ?></td> 

                          <td><?php echo $data->Debited_Cost_Curr_Exch; ?></td>
                          <td><?php echo $data->Debited_Cost_Unit_Orig; ?></td>                                     
                          <td><?php echo $data->Debited_Cost_Unit_USD; ?></td> 

                          <td><?php echo $data->Debited_Cost_Ext_USD; ?></td>

                          <td><?php echo $data->report_date_adesto; ?></td>                                     
                          <td><?php echo $data->file_name; ?></td> 

                          <td><?php echo $data->uploaded_by; ?></td>
                          
                          <td><?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                              foreach($obj->sectionPriv[4] as $rightsection){?>
                            <a href="<?php echo base_url().$rightsection['controller_name'].'/'.$rightsection['method_name'].'/'.$data->id; ?>"> <?php echo $rightsection['icon']; ?></a>                                     
                          <?php }}; ?>
                        </td>

                        </tr>
                        <?php } }?>

                      </tbody>
                      <tr>
                          <td colspan="23">
                            <table><tr><th><?php echo $pagination;?></th></tr></table>
                          
                        </td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  