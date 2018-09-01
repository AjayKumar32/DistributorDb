<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Commission rates</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_commission_rates" class="form-horizontal form-label-left" novalidate="">

                      <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productfamily"> Product Family <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="productfamily" name="productfamily" value="<?php echo $result->product_family; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registrable"> Registrable 
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="registrable" name="registrable" value="<?php echo $result->registrable; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commisionrate"> Commision rate 
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="commisionrate" name="commisionrate" value="<?php echo $result->multiplier; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    

                     
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>user/commission_rates_view" class="btn btn-warning btn-round"> < BACK </a> &nbsp;
                          <button type="submit" class="btn btn-success">SUBMIT</button><?php if(!is_null($msg)) echo $msg; ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>