<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Territories <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_territories" class="form-horizontal form-label-left" novalidate="">

                      
                          <input type="hidden" id="id" name ="id" value="<?php echo $result->id; ?>">
                        

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="territory"> Sales Territory 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="territory" name="territory" value="<?php echo $result->sales_territory; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_area"> Sales Area 
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_dropdown('sales_area',$sales_area_list,trim($result->sales_area),' id="sales_area" class="form-control input-sm"'); ?>
                      </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                        <a class="btn btn-round btn-warning" href="<?php echo base_url().'user/salesterritories_view' ?>"> < BACK </a> &nbsp;                         
                          <button type="submit" class="btn btn-success">SUBMIT</button> <?php if(!is_null($msg)) echo $msg;?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>