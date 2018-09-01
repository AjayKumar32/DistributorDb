<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Items <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method ="post" action="<?php echo base_url(); ?>user/update_items" class="form-horizontal form-label-left" novalidate="">

                       <input type="hidden" id="id" name ="id" value="<?php echo $result->id; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item"> Item <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" name ="item" required="required" value="<?php echo $result->Item; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bulk_output"> Bulk Output 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="bulk_output" name="bulk_output" value="<?php echo $result->Bulk_Output; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_no_pack"> Item No Pack 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_no_pack" name="item_no_pack" value="<?php echo $result->Item_No_Pack; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_nocan_nosl"> Item NoCan NoSL 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_nocan_nosl" name="item_nocan_nosl" value="<?php echo $result->Item_NoCan_NoSL; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_nocan_nosl_nopack"> Item No CANno SLno Pack 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item_nocan_nosl_nopack" name="item_nocan_nosl_nopack" value="<?php echo $result->Item_NoCan_NoSl_NoPack; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="forecast_item"> Forecast Item 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="forecast_item" name="forecast_item" value="<?php echo $result->Forecast_Item; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pack"> Pack 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pack" name="pack" value="<?php echo $result->Pack; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemclass"> ItemClass 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="itemclass" name="itemclass" value="<?php echo $result->Item_Class; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="internal_class"> Internal Class 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="internal_class" name="internal_class" value="<?php echo $result->Internal_Class; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mktfamily"> MktFamily 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mktfamily" name="mktfamily" value="<?php echo $result->Mkt_Family; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_segment"> First Segment 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_segment" name="first_segment" value="<?php echo $result->First_Segment; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="density"> Density
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="density" name="density" value="<?php echo $result->Density; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package"> Package 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="package" name="package" value="<?php echo $result->Package; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cancode_slcode"> CANcode SLcode 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cancode_slcode" name="cancode_slcode" value="<?php echo $result->CANcode_SLcode; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cancode"> CANCode
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cancode" name="cancode" value="<?php echo $result->CANCode; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slcode"> SLCode
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="slcode" name="slcode" value="<?php echo $result->SLCode; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="die"> Die 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="die" name="die" value="<?php echo $result->Die; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fab"> Fab
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fab" name="fab" value="<?php echo $result->Fab; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fab_origin"> Fab Origin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fab_origin" name="fab_origin" value="<?php echo $result->Fab_Origin; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leadtime_type"> Leadtime Type 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="leadtime_type" name="leadtime_type" value="<?php echo $result->Leadtime_Type; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leadtime"> Leadtime
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="leadtime" name="leadtime" value="<?php echo $result->Leadtime; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-round btn-warning" href="<?php echo base_url(); ?>/user/items_view"> < BACK </a> &nbsp;
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