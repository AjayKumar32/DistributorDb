<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Debit Transactions<!--<small>different form elements</small>--></h2> 
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" action="<?php echo base_url(); ?>/user/update_debittransactions"  data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="distributor">Distributor</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <?php echo form_dropdown('distributor',$distributor_list,$result->Distributor,'onchange="getregion(this.value)" id="distributor_list" class="form-control col-md-7 col-xs-12"');
                         ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_territory">Sales Territory 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          <?php echo form_dropdown('sales_territory',$sales_territory,$result->sales_territory,'id="sales_territory" class="form-control col-md-7 col-xs-12"'); ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_region">Sales Region 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                         <?php echo form_dropdown('sales_region',$sales_region,$result->sales_region,'id="sales_region" class="form-control col-md-7 col-xs-12"'); ?>
                        </div>
                      </div>

                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="country" name="country" value="<?php echo $result->Country; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reportdate">ReportDate</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reportdate" name="reportdate" value="<?php echo $result->report_date_adesto; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_added">Date Added
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="date_added" name="date_added" value="<?php echo $result->Load_date; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="branch_code">Branch Code</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="branch_code" name="branch_code" value="<?php echo $result->branch_code; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claim_date">Claim Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="claim_date" name="claim_date" value="<?php echo $result->claim_date; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="customer" name="customer" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="authorized_debit_number">Authorized debit number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="authorized_debit_number" name="authorized_debit_number" value="<?php echo $result->Authorized_debit_number; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quote">Quote</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="quote" name="quote" value="<?php echo $result->quote; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice">Invoice
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="invoice" name="invoice" value="<?php echo $result->invoice; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="line_number">Line Number</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="line_number" name="line_number" value="<?php echo $result->line_number; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="part_number">Part Number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="part_number" name="part_number" value="<?php echo $result->part_number; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ship_date">Ship Date</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ship_date" name="ship_date" value="<?php echo $result->ship_date; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale">Resale
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale" name="resale" value="<?php echo $result->resale; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="book_cost">Book Cost</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="book_cost" name="book_cost" value="<?php echo $result->book_cost; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="approved_new">Approved New
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="approved_new" name="approved_new" value="<?php echo $result->approved_new; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="quantity" name="quantity" value="<?php echo $result->quantity; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_credit_due">Total Credit Due 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="total_credit_due" name="total_credit_due" value="<?php echo $result->total_credit_due; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>user/debitstransactions_view " class="btn btn-round btn-warning"> < BACK </a> &nbsp;
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>