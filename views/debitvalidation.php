<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Debits Validation</small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_pricebook_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_pricebook"><i class="fa fa-file-excel-o"></i> Export </a>
                      
                    </div>--> 
                    <div class="clearfix"></div>
                  <div class="x_content" style="overflow: auto">
                    <form name="serach_form" method="post" action="">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="23">
                              <table>
                                <tr>
                                  <td>Distributor</td><td><?php echo form_dropdown('distributor',$distributor_list,$distributor,'onchange="getFilters(this.value,1)" id="distributor" class="form-control input-sm"'); ?></td>
                                  <td>Claim Status</td><td><?php 
                                   $status  = array('0'=>'New',
                                                            '1'=>'Approved'
                                                            ,'2'=>'Rejected',
                                                            '3'=>'Finance Review',
                                                            '4'=>'Finance Approved');
                                    echo form_dropdown('claim_status',$status,$claim_status,'id="claim_status" class="form-control input-sm"'); ?></td>
                                

                                  <td>Date Types</td><td><?php 
                                       $datetypes  = array( '0'=>'--Select DateType--',
                                                            '1'=>'Claim Date',
                                                            '2'=>'Report Date'
                                                            ,'3'=>'Ship Date');
                                      echo form_dropdown('date_types',$datetypes,$date_types,'id="date_types" class="form-control input-sm"'); ?></td>
                                    
                                  <td>From</td>
                                  <td>  
                                  
                                  
                                  <input type="text" class="form-control has-feedback-left" id="single_cal1" name="from_date" placeholder="From Date" aria-describedby="inputSuccess2Status" >
                                
                                <span id="inputSuccess2Status" class="sr-only">(success)</span></td>
                                  <td>To</td>
                                  <td>
                                    <input type="text" class="form-control has-feedback-left" id="single_cal2" name="to_date" placeholder="To Date" aria-describedby="inputSuccess2Status2" >
                                
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                  </td>
                                </tr><tr>

                                  <td>Search Word</td><td><input type="text" name="search_word" id="search_word" class="form-control input-sm" value="<?php echo ($search_word!='0')?$search_word:'';?>"></td>

                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>

                                      <td>
                                      
                                       <?php 
                                          $total_credit_due_in_page = 0;
                                          if ($results){ 
                                               foreach ($results as $data) { 
                                                  $total_credit_due_in_page =  $total_credit_due_in_page+ $data->total_credit_due;
                                               }
                                            }   
                                        echo 'Total claimed amount :'.$total_credit_due_in_page.' $';
                                        ?>
                                     </td>
                                      </tr><tr>
                                      <td><?php if(!is_null($msg)) echo $msg; ?></td>
                                      
                                </tr>
                              </table>
                                </td>
                                </tr>
                              </thead>
                              </table>
                              </form>  
                    <table id="datatable-checkbox1" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <th> <input type="checkbox" id="check-all" class="flat" value=''></th>

                          <th>Distributor</th>
                          <th>Branch code</th>
                          <th>Claim date</th>

                          <th>Customer from Debit</th>
                          <th>Customer from Quote</th>

                          <th>Authorized debit number</th>
                          <!--<th>Quote_Debit Number</th>-->

                          <th>Quote number</th>
                          <!--<th>Quote_Quote_number</th>-->

                          <th>Invoice</th>
                          <th>Line number</th>
                          <th>Part number from Debit</th>
                          <th>Part Number from Quote</th>

                          <th>Ship date</th>

                          <th>Resale Price from Debit</th>
                          <th>Suggested Resale Price from Quote</th>

                          <th>Book cost from Debit</th>
                          <th>Disti Book Cost from Quote</th>


                          <th>Approved Cost from Debit</th>
                          <th>Approved Cost from Quote</th>

                          <th>Quantity from Quote</th>
                          <th>Total Claimed quantity for this Debit Number</th>
                          <th>Remaining quantity</th>
                          <th>Quantity claimed in Debit</th>
                          <th>Minimum order quantity</th>

                          <th>Total credit due from Debit</th>
                          <th>Calculated credit due</th>

                         <!-- <th>Customer</th>-->
                          <th>Design Registration Number</th>
                          <th>Quote Date</th>
                          <th>Quote Created On</th>
                          <th>Quote Expires</th>
                          <th>Debit Valid</th>
                          <th>Debit Expires</th>
                          <th>Quote Type</th>
                          <!--<th>Debit Number</th>-->
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

                          <th>Material Status- PLC</th>
                          <th>Ordering Status</th>
                          <th>LeadTime</th>
         
                          <th>Line Item Status</th>

                          <th>Notes</th>


                          <th>Action</th>




                         
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                         
                         if ($results)
                         { 
                          
                         foreach ($results as $data) { 
                          
                          ?>
                        <tr <?php echo (($data->status)==2)?'style="background-color:#F37F7F"':'';?>>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->disti; ?></td>
                          <td><?php echo $data->branch_code; ?></td>
                          <td><?php echo $data->claim_date; ?></td>

                          <td <?php echo (trim($data->Customer)!=trim($data->Customer_from_quote))?'style="background-color:#F37F7F"':'';?>><?php echo $data->Customer; ?></td>
                          <td><?php echo $data->Customer_from_quote; ?></td>

                          <td><?php echo $data->Authorized_debit_number; ?></td>
                          <!--<td><?php echo $data->Debit_Number; ?></td>-->

                          <td><?php echo $data->quote; ?></td>
                          <!--<td><?php echo $data->Expr2; ?></td>-->

                          <td><?php echo $data->invoice; ?></td>
                          <td><?php echo $data->line_number; ?></td>
                          <!--<td <?php echo (trim($data->part_number)!=trim($data->Part_number_from_quote))?'style="background-color:#F37F7F"':'';?>><?php echo $data->part_number; ?></td>-->
                          <td><?php echo $data->part_number; ?></td>
                           <td><?php echo $data->Part_number_from_quote; ?></td>
                          <td><?php echo $data->ship_date; ?></td>

                          <td <?php echo ($data->resale>$data->Suggested_Resale_Price)?'style="background-color:#F37F7F"':'';?>><?php echo $data->resale; ?></td>
                          <td><?php echo $data->Suggested_Resale_Price; ?></td>

                          <td><?php echo $data->book_cost; ?></td>
                          <td><?php echo $data->DBC_Disti_Book_Cost; ?></td>

                          <td><?php echo $data->approved_new; ?></td>
                          <td><?php echo $data->Approved_Cost; ?></td>

                           <td><?php echo $data->Quantity_from_quote; ?></td>
                           <td><?php echo $data->approved_quantity; ?></td>
                           <td><?php echo ($data->Quantity_from_quote- $data->approved_quantity
); ?></td>
                          <td <?php echo (($data->Quantity_from_quote- ($data->quantity+$data->approved_quantity))<0)?'style="background-color:#F37F7F"':'';?>><?php echo $data->quantity; ?></td>
                          <td><?php echo $data->MOQ; ?></td>

                          <td <?php echo ($data->total_credit_due > round((($data->quantity)*($data->DBC_Disti_Book_Cost - $data->Approved_Cost))))?'style="background-color:#F37F7F"':'';?>><?php echo $data->total_credit_due; ?></td>
                          <td><?php echo round((($data->quantity)*($data->DBC_Disti_Book_Cost - $data->Approved_Cost)),2); ?></td>


                         <!-- <td><?php echo $data->Customer; ?></td>-->
                          <td><?php echo $data->Design_Registration_Number; ?></td>
                          <td><?php echo $data->Quote_Date; ?></td>

                          <td><?php echo $data->Created_On; ?></td>
                          <td><?php echo $data->Quote_Expires; ?></td>
                          <td><?php echo $data->Debit_Valid; ?></td>
                          <td><?php echo $data->Debit_Expires; ?></td>
                          <td><?php echo $data->Quote_Type; ?></td>

                          <!--<td><?php echo $data->Debit_Number; ?></td>-->
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

                          <td><?php echo $data->Material_Status_PLC; ?></td>
                          <td><?php echo $data->Ordering_Status; ?></td>
                          <td><?php echo $data->LeadTime; ?></td>

                          
                          <td><?php echo $data->Line_Item_Status; ?></td>

                          <td ><?php echo form_dropdown('notes1',$notes_list,'',' id="notes1" class="form-control input-sm"'); ?>
                            <input style="height: 50px; type="text" name="notes2" id="notes2" placeholder="notes">
                          </td>




                          <td> 
                            <?php $obj=& get_instance(); ?>
                            <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                             // echo "<pre>";print_r($obj->sectionPriv[4]);die;
                              foreach ($obj->sectionPriv[4] as $key=>$rightsection) {?>
                                <a  onclick="ApproveReject('<?php echo($data->id) ?>',<?php echo $rightsection['sort']?>)" href="javascript:void(0)"><i class="fa fa-check fa-x"></i> <?php echo $rightsection['module_name']?> </a>   
                         <?php     }
                            }
                            ?>
                          </td>

                        </tr>
                        <?php }} ?>
                        <th colspan="22"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>

                      </tbody>
                    </table>
                  </div>
                
                </div>

              </div>


            </div>

          </div>
        </div>

      </div>

      <script type="text/javascript">

        function ApproveReject(id,action){
          var notes = $('#notes2').val();
          var reason = $('#notes1').val();

           $.ajax({
               url: '<?php echo base_url(); ?>/user/update_debitclaim_notesandreason',
               method: 'post',
               data:'reason='+reason+'&notes='+notes+'&id='+id,
               success:function(response){  //alert(response);return false;
                if ( action == 1){
                  window.location = '<?php echo base_url(); ?>/user/approve_debits_view/'+id;
                }
                if ( action == 2){
                  window.location = '<?php echo base_url(); ?>index.php/user/reject_debits_view/'+id;
                }

               }
           });
        
        }

      </script>

  