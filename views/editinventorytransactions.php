<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Inventory Transactions<!--<small>different form elements</small>--></h2>
                      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" action="<?php echo base_url(); ?>/user/update_inventorytransactions"  data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="country" name="country" value="<?php echo $result->Country; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reportdate">ReportDate (yyyy-mm-dd)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reportdate" name="reportdate" value="<?php echo $result->report_date_adesto; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="itemoriginal">ItemOriginal
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="itemoriginal" name="itemoriginal" value="<?php echo $result->ItemOriginal; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="custpartnumber">CustPartNumber</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="custpartnumber" name="custpartnumber" value="<?php echo $result->CustPartNumber; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Quantity 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="quantity" name="quantity" value="<?php echo $result->Quantity; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_currency">DBC_Currency</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dbc_currency" name="dbc_currency" value="<?php echo $result->DBC_Currency; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_curr_exch">DBC_Curr_Exch
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dbc_curr_exch" name="dbc_curr_exch" value="<?php echo $result->DBC_Curr_Exch; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_unit_orig">DBC_Unit_Orig</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dbc_unit_orig" name="dbc_unit_orig" value="<?php echo $result->DBC_Unit_Orig; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_unit_usd">DBC_Unit_USD 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dbc_unit_usd" name="dbc_unit_usd" value="<?php echo $result->DBC_Unit_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_ext_usd">DBC_Ext_USD</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dbc_ext_usd" name="dbc_ext_usd" value="<?php echo $result->DBC_Ext_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_currency">Debited_Cost_Currency
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debited_cost_currency" name="debited_cost_currency" value="<?php echo $result->Debited_Cost_Currency; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_curr_exch">Debited_Cost_Curr_Exch </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debited_cost_curr_exch" name="debited_cost_curr_exch" value="<?php echo $result->Debited_Cost_Curr_Exch; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_unit_orig">Debited_Cost_Unit_Orig
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debited_cost_unit_orig" name="debited_cost_unit_orig" value="<?php echo $result->Debited_Cost_Unit_Orig; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_unit_usd">Debited_Cost_Unit_USD </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debited_cost_unit_usd" name="debited_cost_unit_usd" value="<?php echo $result->Debited_Cost_Unit_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_ext_usd">Debited_Cost_Ext_USD 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debited_cost_ext_usd" name="debited_cost_ext_usd" value="<?php echo $result->Debited_Cost_Ext_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SL_Code">SL Code 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="SL_Code" name="SL_Code" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Branch_Code">Branch Code
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Branch_Code" name="Branch_Code" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Warehouse_Code">Warehouse Code
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Warehouse_Code" name="Warehouse_Code" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Batch_Id">Batch Id
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Batch_Id" name="Batch_Id" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>user/inventorytransactions_view" class="btn btn-round btn-warning"> < BACk </a> &nbsp;
                          <button type="submit" class="btn btn-success">Submit</button><?php if(!is_null($msg)) echo $msg;?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>