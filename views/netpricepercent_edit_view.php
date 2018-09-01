<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Net Price Percent Edit</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_netpricepercent" class="form-horizontal form-label-left" novalidate="">
                      <input type="hidden" name="id" id="id" value="<?php echo $results->id; ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_number"> GP Customer Number </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="customer_number" name="customer_number" class="form-control col-md-7 col-xs-12" value="<?php echo $results->GP_Customer_Number; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_number">Item Number
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_number" name="item_number" class="form-control col-md-7 col-xs-12" value="<?php echo $results->Item_Number; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="netpricepercent" class="control-label col-md-3 col-sm-3 col-xs-12">Net Price Percent</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="netpricepercent" class="form-control col-md-7 col-xs-12" type="text" name="netpricepercent" value="<?php echo $results->Net_Price_Percent; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Customer_Net_Price_percent" class="control-label col-md-3 col-sm-3 col-xs-12">Customer Net Price percent</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Customer_Net_Price_percent" class="form-control col-md-7 col-xs-12" type="text" name="Customer_Net_Price_percent" value="<?php echo $results->Customer_Net_Price_percent; ?>">
                        </div>
                      </div>
                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-round btn-warning" href="<?php echo base_url().'user/netpricepercent_view' ?>"> < BACK </a> &nbsp; <button type="submit" class="btn btn-success">UPDATE</button> <?php if(!is_null($msg)) echo $msg;?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>