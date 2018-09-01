<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Dates <!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" mehod="post" action="<?php echo base_url(); ?>user/update_dates" class="form-horizontal form-label-left" novalidate="">

                      <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>" class="form-control col-md-7 col-xs-12">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="date" name="date" value="<?php echo $result->Date; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year"> Year
                        </label>  
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="year" name="year" value="<?php echo $result->Year; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wknum"> WkNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wknum" name="wknum" value="<?php echo $result->WkNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthnum"> MthNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthnum" name="mthnum" value="<?php echo $result->MthNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrnum"> QtrNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrnum" name="qtrnum" value="<?php echo $result->QtrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkTxt"> WkTxt
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkTxt" name="WkTxt" value="<?php echo $result->WkTxt; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthTxt"> MthTxt 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthTxt" name="MthTxt" value="<?php echo $result->MthTxt; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrTxt"> QtrTxt 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrTxt" name="QtrTxt" value="<?php echo $result->QtrTxt; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkAbs"> WkAbs
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkAbs" name="WkAbs" value="<?php echo $result->WkAbs; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthAbs"> MthAbs 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthAbs" name="MthAbs" value="<?php echo $result->MthAbs; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrAbs"> QtrAbs 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrAbs" name="QtrAbs" value="<?php echo $result->QtrAbs; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="WkAbsNum"> WkAbsNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="WkAbsNum" name="WkAbsNum" value="<?php echo $result->WkAbsNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MthAbsNum"> MthAbsNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="MthAbsNum" name="MthAbsNum" value="<?php echo $result->MthAbsNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="QtrAbsNum"> QtrAbsNum 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="QtrAbsNum" name="QtrAbsNum" value="<?php echo $result->QtrAbsNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinmthnum"> WkInMthNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinmthnum" name="wkinmthnum"  value="<?php echo $result->WkInMthNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinmthper"> WkInMthPer 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinmthper" name="wkinmthper" value="<?php echo $result->WkInMthPer; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinmthtot"> WkInMthTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinmthtot" name="wkinmthtot"  value="<?php echo $result->WkInMthTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrnum"> WkInQtrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrnum" name="wkinqtrnum" value="<?php echo $result->WkInQtrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrper"> WkInQtrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrper" name="wkinqtrper" value="<?php echo $result->WkInQtrPer; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinqtrtot"> WkInQtrTot 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinqtrtot" name="wkinqtrtot" value="<?php echo $result->WkInQtrTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrnum"> WkInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrnum" name="wkinyrnum" value="<?php echo $result->WkInYrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrper"> WkInYrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrper" name="wkinyrper" value="<?php echo $result->WkInYrPer; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wkinyrtot"> WkInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wkinyrtot" name="wkinyrtot" value="<?php echo $result->WkInYrTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrnum"> MthInQtrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrnum" name="mthinqtrnum" value="<?php echo $result->MthInQtrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrper"> MthInQtrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrper" name="mthinqtrper" value="<?php echo $result->MthInQtrPer; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinqtrtot"> MthInQtrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinqtrtot" name="mthinqtrtot" value="<?php echo $result->MthInQtrTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrnum"> MthInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrnum" name="mthinyrnum" value="<?php echo $result->MthInYrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrper"> MthInYrPer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrper" name="mthinyrper" value="<?php echo $result->MthInYrPer; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mthinyrtot"> MthInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mthinyrtot" name="mthinyrtot" value="<?php echo $result->MthInYrTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrnum"> QtrInYrNum
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrnum" name="qtrinyrnum" value="<?php echo $result->QtrInYrNum; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrpec"> QtrInYrPec
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrpec" name="qtrinyrpec" value="<?php echo $result->QtrInYrPec; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qtrinyrtot"> QtrInYrTot
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qtrinyrtot" name="qtrinyrtot" value="<?php echo $result->QtrInYrTot; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      -->
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a class="btn btn-warning btn-round" href="<?php echo base_url().'user/dates_view' ?>"> < BACK </a> &nbsp; 
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