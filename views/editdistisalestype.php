<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Disti Sales Type</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_disti_sales_type" class="form-horizontal form-label-left" novalidate="">

                      <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="distributor"> Distributor <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="distributor" name="distributor" value="<?php echo $result->distributor; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item"> Item 
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" name="item" value="<?php echo $result->item; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="saletype"> Sale Type
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="saletype" name="saletype" value="<?php echo $result->sale_type; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    

                     
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>user/disti_sales_type_view" class="btn btn-warning btn-round"> < BACK </a> &nbsp;
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