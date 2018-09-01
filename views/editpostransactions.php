<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit POS Transactions<!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" action="<?php echo base_url(); ?>/user/update_postransactions" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <input type="hidden" id="id"  name="id" value="<?php echo $result->id; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="distributor"> Distributor </label>
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
                          <input type="text" id="country" name="country" required="required" value="<?php echo $result->Country; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reportdate">ReportDate 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reportdate" name="reportdate" value="<?php echo $result->report_date_adesto; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoicedate">InvoiceDate 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="invoicedate" name="invoicedate" value="<?php echo $result->InvoiceDate; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoicenum">InvoiceNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="invoicenum" name="invoicenum" value="<?php echo $result->InvoiceNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchcust">PurchCust 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="purchcust" name="purchcust" value="<?php echo $result->PurchCust; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Purchase_Customer_Street">PurchCustStreet
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Purchase_Customer_Street" name="Purchase_Customer_Street" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchcustcity">PurchCustCity 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="purchcustcity" name="purchcustcity" value="<?php echo $result->PurchCustCity; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchcustcountry">PurchCustCountry 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="purchcustcountry" name="purchcustcountry" value="<?php echo $result->PurchCustCountry; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchcuststate">PurchCustState 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="purchcuststate" name="purchcuststate" value="<?php echo $result->PurchCustState; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchcustzip">PurchCustZip 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="purchcustzip" name="purchcustzip" value="<?php echo $result->PurchCustZip; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endcust">EndCust 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="endcust" name="endcust" value="<?php echo $result->EndCust; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_Customer_Street">EndCustStreet
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="End_Customer_Street" name="End_Customer_Street" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_Customer_City">EndCustCity 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="End_Customer_City" name="End_Customer_City" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_Customer_Country">EndCustCountry 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="End_Customer_Country" name="End_Customer_Country" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_Customer_State">EndCustState 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="End_Customer_State" name="End_Customer_State" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_Customer_ZipCode">EndCustZip 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="End_Customer_ZipCode" name="End_Customer_ZipCode" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endpurchdirect">End_Purch_Direct 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="endpurchdirect" name="endpurchdirect" value="<?php echo $result->End_Purch_Direct; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item">Item 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item" name="item" value="<?php echo $result->Item; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="custpartnumber">CustPartNumber 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_currency">DBC_Currency 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_unit_orig">DBC_Unit_Orig 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dbc_ext_usd">DBC_Ext_USD 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_curr_exch">Debited_Cost_Curr_Exch 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debited_cost_unit_usd">Debited_Cost_Unit_USD 
                        </label>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale_currency">Resale_Currency 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale_currency" name="resale_currency" value="<?php echo $result->Resale_Currency; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale_curr_exch">Resale_Curr_Exch 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale_curr_exch" name="resale_curr_exch" value="<?php echo $result->Resale_Curr_Exch; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale_unit_origin">Resale_Unit_Origin 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale_unit_origin" name="resale_unit_origin" value="<?php echo $result->Resale_Unit_Origin; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale_unit_usd">Resale_Unit_USD 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale_unit_usd" name="resale_unit_usd" value="<?php echo $result->Resale_Unit_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resale_ext_usd">Resale_Ext_USD 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="resale_ext_usd" name="resale_ext_usd" value="<?php echo $result->Resale_Ext_USD; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="debit_percent">Debit_Percent 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="debit_percent" name="debit_percent" value="<?php echo $result->Debit_Percent; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Ship_date">Ship date 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Ship_date" name="Ship_date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Debit_number">Debit number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Debit_number" name="Debit_number" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Quote_number">Quote number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Quote_number" name="Quote_number" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Design_Registraion_Number">Design Registraion Number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Design_Registraion_Number" name="Design_Registraion_Number" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Exchange_Rate">Exchange Rate 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Exchange_Rate" name="Exchange_Rate" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Exchange_Date">Exchange Date 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Exchange_Date" name="Exchange_Date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contract_Number">Contract Number 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Contract_Number" name="Contract_Number" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SL_Code">SL Code  
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="SL_Code" name="SL_Code" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>user/postransactions_view" class="btn btn-round btn-warning">< BACK </a> &nbsp;
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