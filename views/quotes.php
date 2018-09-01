<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Quotes</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ ?>
                          
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } ?>
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_quotes_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_quotes"><i class="fa fa-file-excel-o"></i> Export </a>-->
                      
                    </div>
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content" style="overflow: auto">
                    <table class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <th> <input type="checkbox" id="check-all" class="flat" value=''></th>
                          
                          <th>Customer</th>
                          <th>Quote</th>
                          <th>Design Registration Number</th>
                          <th>Quote Date</th>
                          <th>Created On</th>
                          <th>Quote Expires</th>
                          <th>Debit Valid</th>
                          <th>Debit Expires</th>
                          <th>Quote Type</th>
                          <th>Debit Number</th>
                          <th>Rep Contact</th>
                          <th>Currency</th>
                          <th>Contract Manufacturer</th>
                          <th>Note to Recipient</th>
                          <th>Quote To</th>
                          <th>Contact Name</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Country</th>
                          <th>Zip</th>
                          <th>Phone</th>
                          <th>Fax</th>
                          <th>Email</th>

                           <th>Part Number</th>
                          <th>Material Status- PLC</th>
                          <th>Ordering Status</th>
                          <th>MOQ</th>
                          <th>LeadTime</th>
                          <th>DBC- Disti Book Cost</th>
                          <th>Approved Cost</th>
                          <th>Suggested Resale Price</th>
                          <th>Line Item Status</th>


                          <th>Date Added </th>
                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         
                         if ($results)
                         { 
                          
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Customer; ?></td>
                          <td><?php echo $data->Quote; ?></td>
                          <td><?php echo $data->Design_Registration_Number; ?></td>
                          <td><?php echo $data->Quote_Date; ?></td>

                          <td><?php echo $data->Created_On; ?></td>
                          <td><?php echo $data->Quote_Expires; ?></td>
                          <td><?php echo $data->Debit_Valid; ?></td>
                          <td><?php echo $data->Debit_Expires; ?></td>
                          <td><?php echo $data->Quote_Type; ?></td>

                          <td><?php echo $data->Debit_Number; ?></td>
                          <td><?php echo $data->Rep_Contact; ?></td>
                          <td><?php echo $data->Currency; ?></td>
                          <td><?php echo $data->Contract_Manufacturer; ?></td>

                          <td><?php echo $data->Note_to_Recipient; ?></td>
                          <td><?php echo $data->Quote_To; ?></td>
                          <td><?php echo $data->Contact_Name; ?></td>
                          <td><?php echo $data->Address; ?></td>

                          <td><?php echo $data->City; ?></td>
                          <td><?php echo $data->State; ?></td>
                          <td><?php echo $data->Country; ?></td>
                          <td><?php echo $data->Zip; ?></td>

                          <td><?php echo $data->Phone; ?></td>
                          <td><?php echo $data->Fax; ?></td>
                          <td><?php echo $data->Email; ?></td>
                          <td><?php echo $data->Part_Number; ?></td>

                          <td><?php echo $data->Material_Status_PLC; ?></td>
                          <td><?php echo $data->Ordering_Status; ?></td>
                          <td><?php echo $data->MOQ; ?></td>
                          <td><?php echo $data->LeadTime; ?></td>

                          <td><?php echo $data->DBC_Disti_Book_Cost; ?></td>
                          <td><?php echo $data->Approved_Cost; ?></td>
                          <td><?php echo $data->Suggested_Resale_Price; ?></td>
                          <td><?php echo $data->Line_Item_Status; ?></td>

                          <td><?php echo $data->date_added; ?></td>
                          

                        </tr>
                        <?php }} ?>
                        <th colspan="17"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>
                      </tbody>
                    </table>
                  </div>
                  
                </div>
               </div>

             </div>

            </div>
          </div>
        </div>

  