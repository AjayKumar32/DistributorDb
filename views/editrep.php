<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Sales Rep <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/update_rep" class="form-horizontal form-label-left" novalidate="">
                    <input type="hidden" name="id" id="id" value="<?php echo $result->id; ?>">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_rep"> Sales Rep <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sales_rep" name="sales_rep" class="form-control col-md-7 col-xs-12" value="<?php echo $result->Sales_Rep; ?>">
                        </div>
                        </div>

                        

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rep_class"> Rep Class
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_dropdown('rep_class',$repclasses_list,trim($result->Rep_Class),' id="rep_class" class="form-control input-sm"'); ?>
                      </div>
                      </div>

                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_person"> Sales Person
                        </label>                       


                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_dropdown('sales_person',$salespersons_list,trim($result->Sales_Person),' id="sales_person" class="form-control input-sm"'); ?>
                      </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-round btn-warning" href="<?php echo base_url().'user/repandsalesperson_view' ?>"> < BACK </a> &nbsp;
                          <button type="submit" class="btn btn-success">UPDATE</button> <?php if(!is_null($msg)) echo $msg;?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>