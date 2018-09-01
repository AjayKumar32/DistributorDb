<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>FINANCE REJECTED DEBITS</small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ ?>
                          
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } ?>
                      
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div>
                     <form name="serach_form" method="post" action="">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="23">
                              <table>
                                <tr>
                                  <td>Distributor</td><td><?php echo form_dropdown('distributor',$distributor_list,$distributor,'onchange="getFilters(this.value,1)" id="distributor" class="form-control input-sm"'); ?></td>
                                
                                

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
                                    <input type="text" class="form-control has-feedback-left" id="single_cal2" name="to_date" placeholder="To Date" aria-describedby="inputSuccess2Status2" <?php isset($to_date)?'value="<?php echo $to_date; ?>':'' ?>">
                                
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                  </td>
                                </tr><tr>

                                  <td>Search Word</td><td><input type="text" name="search_word" id="search_word" class="form-control input-sm" value="<?php echo ($search_word!='0')?$search_word:'';?>"></td>

                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                      </tr><tr>
                                      <td><?php if(!is_null($msg)) echo $msg; ?></td>
                                </tr>
                              </table>
                                </td>
                                </tr>
                              </thead>
                              </table>
                              </form> 
                              </div> 
                  <div class="x_content" style="overflow: auto">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
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
                          <th>Status</th>
                          <th>Customer Service Approved by</th>
                          <th>Customer Service Approved date</th>
                          <th>Customer Service Approved Notes</th>
                          <th>Customer Service Approved Reason</th>
                          <th>Sent to Finance by</th>
                          <th>Sent to Finance date</th>
                          <th>Finance Rejected by</th>
                          <th>Finance Rejected date</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        if ($results)
                         {                            
                          foreach ($results as $key=>$data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" name="table_records" class="flat" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Distributorname; ?></td>
                            
                                                          

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
                          <td><?php if($data->status==0){
                            echo "New";}elseif ($data->status==1) {
                              echo "Approved";
                            }elseif ($data->status==2) {
                               echo "Rejected";
                            }elseif ($data->status==3){
                              echo "Finance Review";
                            }elseif ($data->status==4){
                              echo "Finance Approved";
                            }elseif ($data->status==5){
                              echo "Finance Rejected";} ?></td>  

                          <td><?php echo $data->customer_service_approved_rejected_by; ?></td>
                           <td><?php echo $data->customer_service_approved_rejected_date; ?></td>
                            <td><?php echo $data->customer_service_notes; ?></td>
                            <td><?php echo $data->customer_service_reason; ?></td>
                            <td><?php echo $data->sent_to_finance_by; ?></td>
                            <td><?php echo $data->sent_to_finance_date; ?></td>
                            <td><?php echo $data->finance_approved_rejected_by; ?></td>
                            <td><?php echo $data->finance_approved_rejected_date; ?></td>

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


  