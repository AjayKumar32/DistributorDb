 <div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password </h2>

                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if($this->session->flashdata('message_name')!='') echo $this->session->flashdata('message_name');?>
                    <br>
                    <form id="demo-form3" data-parsley-validate="" method="post" action="<?php echo base_url() ?>user/change_profile_password" class="form-horizontal form-label-left" enctype="multipart/form-data" onsubmit="return validatePasswordConfirmPassword();">
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">Old Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="old_password" name="old_password" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12">New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="new_password" class="form-control col-md-7 col-xs-12"  type="password" name="new_password" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirm_password" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="confirm_password" class="form-control col-md-7 col-xs-12"  type="password" name="confirm_password" required>
                        </div>
                      </div>
                                            
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <input type="submit" class="btn btn-success" value="SUBMIT">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>

       
 <script>

         function validatePasswordConfirmPassword() {
    
            var password = document.getElementById('new_password').value;
            var cpassword = document.getElementById('confirm_password').value;

            if(password==cpassword){
               return true;
            } else {
               alert('Password and Confirm password should be same.');
               return false;
            }
          }

</script>