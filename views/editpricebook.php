<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pricebook Edit</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_pricebook" class="form-horizontal form-label-left" novalidate="">
                      <input type="hidden" name="id" id="id" value="<?php echo $results->id; ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item"> Item </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" name="item" class="form-control col-md-7 col-xs-12" value="<?php echo $results->Item; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Price">Price 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" name="price" class="form-control col-md-7 col-xs-12" value="<?php echo $results->dbc; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="currency" class="control-label col-md-3 col-sm-3 col-xs-12">Currency</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="currency" class="form-control col-md-7 col-xs-12" type="text" name="currency" value="<?php echo $results->currency; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designregistrable"> Design Registrable </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="designregistrable" name="designregistrable" class="form-control col-md-7 col-xs-12" value="<?php echo $results->design_registration_product; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="validfrom">Valid From 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="validfrom" name="validfrom" class="form-control col-md-7 col-xs-12" value="<?php echo $results->valid_from; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="productfamily" class="control-label col-md-3 col-sm-3 col-xs-12">Product Family</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="productfamily" class="form-control col-md-7 col-xs-12" type="text" name="productfamily" value="<?php echo $results->product_family; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Item Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="description" class="form-control col-md-7 col-xs-12" type="text" name="description" value="<?php echo $results->description; ?>">
                        </div>
                      </div>
                     
                     
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-round btn-warning" href="<?php echo base_url().'user/pricebook_view' ?>"> < BACK </a> &nbsp; <button type="submit" class="btn btn-success">UPDATE</button> <?php if(!is_null($msg)) echo $msg;?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>