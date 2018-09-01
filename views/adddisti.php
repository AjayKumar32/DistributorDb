<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Disti Add <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>user/add_distributor" class="form-horizontal form-label-left" novalidate="">

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="distributor_name"> Distributor </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="distributor_name" name="distributor_name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cust_Class">Customer Class 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Cust_Class" name="Cust_Class" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Sales_Area" class="control-label col-md-3 col-sm-3 col-xs-12">Sales Area</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Sales_Area" class="form-control col-md-7 col-xs-12" type="text" name="Sales_Area">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Sales_Territory" class="control-label col-md-3 col-sm-3 col-xs-12">Sales Territory</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Sales_Territory" class="form-control col-md-7 col-xs-12" type="text" name="Sales_Territory">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Country" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Country" class="form-control col-md-7 col-xs-12" type="text" name="Country">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Consolidated_Name" class="control-label col-md-3 col-sm-3 col-xs-12">Consolidated Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Consolidated_Name" class="form-control col-md-7 col-xs-12" type="text" name="Consolidated_Name">
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label for="gp-add-code" class="control-label col-md-3 col-sm-3 col-xs-12">GP Add Code</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gp_add_code" class="form-control col-md-7 col-xs-12" type="text" name="gp_add_code">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="gp-country" class="control-label col-md-3 col-sm-3 col-xs-12">GP Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gp_country" class="form-control col-md-7 col-xs-12" type="text" name="gp_country">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="crm-old-name" class="control-label col-md-3 col-sm-3 col-xs-12">CRM Old Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="crm_old_name" class="form-control col-md-7 col-xs-12" type="text" name="crm_old_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="crm-name" class="control-label col-md-3 col-sm-3 col-xs-12">CRM Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="crm_name" class="form-control col-md-7 col-xs-12" type="text" name="crm_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="consolidated-name" class="control-label col-md-3 col-sm-3 col-xs-12">Consolidated Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="consolidated_name" class="form-control col-md-7 col-xs-12" type="text" name="consolidated_name">
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Active </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="active" value="yes" data-parsley-multiple="active"> &nbsp; Yes &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="active" value="No" data-parsley-multiple="active"> No
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> POS Report </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="pos_report" value="yes" data-parsley-multiple="pos-report"> &nbsp; Yes &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="pos_report" value="No" data-parsley-multiple="pos-report"> No
                            </label>
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label for="Cust_Price_Type" class="control-label col-md-3 col-sm-3 col-xs-12">Cust Price Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Cust_Price_Type" class="form-control col-md-7 col-xs-12" type="text" name="Cust_Price_Type">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="POS_Curr" class="control-label col-md-3 col-sm-3 col-xs-12">POS Currency</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="POS_Curr" class="form-control col-md-7 col-xs-12" type="text" name="POS_Curr">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Calendar" class="control-label col-md-3 col-sm-3 col-xs-12">Calendar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Calendar" class="form-control col-md-7 col-xs-12" type="text" name="Calendar">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="Calendar" class="control-label col-md-3 col-sm-3 col-xs-12">GP Cust Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="GP_Cust_Num" class="form-control col-md-7 col-xs-12" type="text" name="GP_Cust_Num">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-round btn-warning" href="<?php echo base_url().'user/disti' ?>"> < BACK </a> &nbsp;
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