<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> COMMISSIONS DATA CALCULATED</small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==191){ ?>
                            <a class="btn btn-app delete_tab_rec" id="commissionsdata" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                    </div>

                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_commisions_data_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_commisions_data "><i class="fa fa-file-excel-o"></i> Export </a>
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/commisions_data_add_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="commissionsdata" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <!--<a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>-->
                  
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
                                  <td>Sales Region</td><td><?php echo form_dropdown('sales_region',$sales_region_list,$sales_region,'onchange="getFilters(this.value,1)" id="sales_region" class="form-control input-sm"'); ?></td>
                                  <td>Sales Territory</td><td><?php echo form_dropdown('sales_territory',$sales_territory_list,$sales_territory,'onchange="getFilters(this.value,2)" id="sales_territory" class="form-control input-sm"'); ?></td>
                                  <td>Distributor</td><td><?php echo form_dropdown('distributor',$distributor_list,$distributor,'onchange="getFilters(this.value,3)" id="distributor_list" class="form-control input-sm"'); ?></td>
                                   

                                    <td>POS Reported Year</td><td><?php echo form_dropdown('sales_year',$years_list,'','id="sales_year" class="form-control input-sm"'); ?></td>
                                    <td>POS Reported Quarter</td><td><?php echo form_dropdown('sales_quarter',$quarter_list,$sales_quarter,'id="sales_quarter" class="form-control input-sm"'); ?></td>
                                    </tr><tr>

                                     <td>POS Reported Month</td><td><?php echo form_dropdown('sales_month',$months_list,$sales_month,'id="sales_month" class="form-control input-sm"'); ?></td>
                                     <td>Disti Status</td><td><?php 
                                       $statuslist  = array('All'=>'All',
                                                            'YES'=>'Active'
                                                            ,'NO'=>'In-Active');
                                      echo form_dropdown('disti_status',$statuslist,$disti_status,'id="disti_status" class="form-control input-sm"'); ?></td>

                                    <td>Sales Rep</td><td><?php echo form_dropdown('sales_rep',$sales_rep_list,$sales_rep,'id="sales_rep" class="form-control input-sm"'); ?></td>
                                    <td>Sales Person</td><td><?php echo form_dropdown('sales_person',$sales_person_list,$sales_person,'id="sales_person" class="form-control input-sm"'); ?></td>
                                       
                        
                          <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                </tr>
                                </table>
                                </td>
                                </tr>
                              
                              </form>  
                          
                        <tr>


                          

               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          
                          <th>Distributor</th>
                          <th>Country</th>
                          <th>Sales Territory</th>
                          <th>Sales Region</th>
                          
                          
                          <th>InvoiceDate</th>
                          <th>InvoiceNum</th>
                          <th>EndCust</th>
                          <th>End_Customer_Street</th>
                          <th>End_Customer_City</th>
                          <th>End_Customer_Country</th>
                          <th>End_Customer_State</th>
                          <th>End_Customer_ZipCode</th>

                          <th>PurchCust</th>
                          <th>Purchase_Customer_Street</th>
                          <th>PurchCustCity</th>
                          <th>PurchCustState</th>
                          <th>PurchCustZip</th>
                          <th>PurchCustCountry</th>
                          <th>End_Purch_Direct</th>

                          <th>Item</th>
                          <th>CustPartNumber</th>
                          <th>Quantity</th>
                          <th>DBC_Currency</th>
                          <th>DBC_Curr_Exch</th>
                          <th>DBC_Unit_Orig</th>

                          <th>DBC_Unit_USD</th>
                          <th>DBC_Ext_USD</th>
                          <th>Debited_Cost_Currency</th>
                          <th>Debited_Cost_Curr_Exch</th>
                          <th>Debited_Cost_Unit_Orig</th>
                          <th>Debited_Cost_Unit_USD</th>

                          <th>Debited_Cost_Ext_USD</th>
                          <th>Resale_Currency</th>
                          <th>Resale_Curr_Exch</th>
                          <th>Resale_Unit_Origin</th>
                          <th>Resale_Unit_USD</th>
                          <th>Resale_Ext_USD</th>

                          <th>Debit_Percent</th>

                          <th>Report_date_adesto</th>
                          
                          <th>Ship_date</th>
                          <th>Debit_number</th>
                          <th>Quote_number</th>
                          <th>Design_Registraion_Number</th>
                          <th>Exchange_Rate</th>
                          <th>Exchange_Date</th>
                          <th>Contract_Number</th>
                          <th>SL_Code</th>
                          
                          

                          <th>Sales Rep</th>
                          <th>Sales Person</th>
                          
                          <th>Transfer_type</th>
                          <th>Item Commission rate</th>
                          <th>Commission Base</th>
                          <th>Line Type</th>


                            
                         
                        </tr>
                      </thead>


                      <tbody>

                        <?php
                         if ($results)
                         { 
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data['id']; ?>" class="flat" name="table_records" value="<?php echo $data['id']; ?>"></td>
                          <td><?php echo $data['Distributor_name']; ?></td>
                          <td><?php echo $data['Country_name']; ?></td>
                          <td><?php echo $data['sales_territory']; ?></td>
                          <td><?php echo $data['sales_region']; ?></td>                                     
                          

                          <td><?php echo $data['InvoiceDate']; ?></td>
                          <td><?php echo $data['InvoiceNum']; ?></td>                                     
                          <td><?php echo $data['EndCust']; ?></td> 
                         

                          <td><?php echo $data['End_Customer_Street']; ?></td>
                          <td><?php echo $data['End_Customer_City']; ?></td>
                          <td><?php echo $data['End_Customer_Country']; ?></td>
                          <td><?php echo $data['End_Customer_State']; ?></td>                                     
                          

                          <td><?php echo $data['End_Customer_ZipCode']; ?></td>



                          <td><?php echo $data['PurchCust']; ?></td>
                          <td><?php echo $data['Purchase_Customer_Street']; ?></td>
                          <td><?php echo $data['PurchCustCity']; ?></td>                                     
                          <td><?php echo $data['PurchCustState']; ?></td> 

                          <td><?php echo $data['PurchCustZip']; ?></td>
                          <td><?php echo $data['PurchCustCountry']; ?></td>                                     
                          <td><?php echo $data['End_Purch_Direct']; ?></td> 

                          <td><?php echo $data['Item']; ?></td>
                          <td><?php echo $data['CustPartNumber']; ?></td>                                     
                          <td><?php echo $data['Quantity']; ?></td> 

                          <td><?php echo $data['DBC_Currency']; ?></td>
                          <td><?php echo $data['DBC_Curr_Exch']; ?></td>                                     
                          <td><?php echo $data['DBC_Unit_Orig']; ?></td> 

                          <td><?php echo $data['DBC_Unit_USD']; ?></td>
                          <td><?php echo $data['DBC_Ext_USD']; ?></td>                                     
                          <td><?php echo $data['Debited_Cost_Currency']; ?></td> 

                          <td><?php echo $data['Debited_Cost_Curr_Exch']; ?></td>
                          <td><?php echo $data['Debited_Cost_Unit_Orig']; ?></td>                                     
                          <td><?php echo $data['Debited_Cost_Unit_USD']; ?></td> 

                          <td><?php echo $data['Debited_Cost_Ext_USD']; ?></td>
                          <td><?php echo $data['Resale_Currency']; ?></td>                                     
                          <td><?php echo $data['Resale_Curr_Exch']; ?></td>    

                          <td><?php echo $data['Resale_Unit_Origin']; ?></td>
                          <td><?php echo $data['Resale_Unit_USD']; ?></td>                                     
                          <td><?php echo $data['Resale_Ext_USD']; ?></td>                                   
                          <td><?php echo $data['Debit_Percent']; ?></td>

                          <td><?php echo $data['report_date_adesto']; ?></td>

                          <td><?php echo $data['Ship_date']; ?></td> 

                          <td><?php echo $data['Debit_number']; ?></td>
                          <td><?php echo $data['Quote_number']; ?></td>                                     
                          <td><?php echo $data['Design_Registraion_Number']; ?></td>    

                          <td><?php echo $data['Exchange_Rate']; ?></td>
                          <td><?php echo $data['Exchange_Date']; ?></td>                                     
                          <td><?php echo $data['Contract_Number']; ?></td>                                   
                          <td><?php echo $data['SL_Code']; ?></td>



                           <td><?php echo $data['sales_rep']; ?></td>    

                          <td><?php echo $data['sales_person']; ?></td>
                          <td><?php echo $data['Transfer_type']; ?></td>                                     
                          <td><?php echo $data['Commission_rate']; ?></td>                                   
                          <td><?php echo $data['commission_base']; ?></td>
                          <td><?php echo $data['line_type']; ?></td>
                          
                          
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

