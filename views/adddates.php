<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Dates <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" mehod="post" action="<?php echo base_url(); ?>user/add_dates" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="date" name="date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bulk-utput"> Year
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="year" name="year" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wknum"> WkNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wknum" name="wknum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthnum"> MthNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthnum" name="mthnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrnum"> QtrNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrnum" name="qtrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkTxt"> WkTxt
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkTxt" name="WkTxt" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthTxt"> MthTxt 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthTxt" name="MthTxt" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrTxt"> QtrTxt 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrTxt" name="QtrTxt" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkAbs"> WkAbs 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkAbs" name="WkAbs" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthAbs"> MthAbs 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthAbs" name="MthAbs" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrAbs"> QtrAbs 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrAbs" name="QtrAbs" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkAbsNum"> WkAbsNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkAbsNum" name="WkAbsNum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthAbsNum"> MthAbsNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthAbsNum" name="MthAbsNum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrAbsNum"> QtrAbsNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrAbsNum" name="QtrAbsNum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrnum"> WkInQtrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrnum" name="wkinqtrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrper"> WkInQtrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrper" name="wkinqtrper" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrtot"> WkInQtrTot 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrtot" name="wkinqtrtot" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrnum"> WkInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrnum" name="wkinyrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrper"> WkInYrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrper" name="wkinyrper" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrtot"> WkInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrtot" name="wkinyrtot" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrnum"> MthInQtrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrnum" name="mthinqtrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrper"> MthInQtrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrper" name="mthinqtrper" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrtot"> MthInQtrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrtot" name="mthinqtrtot" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrnum"> MthInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrnum" name="mthinyrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrper"> MthInYrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrper" name="mthinyrper" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrtot"> MthInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrtot" name="mthinyrtot" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrnum"> QtrInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrnum" name="qtrinyrnum" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrpec"> QtrInYrPec
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrpec" name="qtrinyrpec" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrtot"> QtrInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrtot" name="qtrinyrtot" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      -->
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-warning btn-round" href="<?php echo base_url(); ?>/user/dates_view"> < BACK </a>
                         
                          <button type="submit" class="btn btn-success">SUBMIT</button> <?php if(!is_null($msg)) echo $msg; ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>