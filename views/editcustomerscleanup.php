<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Customers for Cleanup</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_customerscleanup" class="form-horizontal form-label-left" novalidate="">

                         <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>" class="form-control col-md-7 col-xs-12">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer"> Customer <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="customer" name="customer" value="<?php echo $result->CustomerOriginal; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newcustomer">New Customer <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="newcustomer" name="newcustomer" value="<?php echo $result->CustomerNew; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a href="<?php echo base_url(); ?>/user/customerscleanup_view" class="btn btn-round btn-warning"> < BACK </a> &nbsp;
                          <button type="submit" class="btn btn-success">Submit</button><?php if(!is_null($msg)) echo $msg; ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>