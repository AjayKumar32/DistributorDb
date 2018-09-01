<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile </h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url() ?>user/update_user_profile" class="form-horizontal form-label-left" enctype="multipart/form-data">
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_fname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="user_fname" name="user_fname" required="required" value="<?php echo $user_profile->fname; ?>" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_lname" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="user_lname" class="form-control col-md-7 col-xs-12" value="<?php echo $user_profile->lname; ?>" type="text" name="user_lname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="user_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="user_email" class="form-control col-md-7 col-xs-12" value="<?php echo $user_profile->email; ?>" type="text" name="user_email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="profile_picture" class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="profile_picture" id="profile_picture">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <input type="submit" class="btn btn-success" value="UPDATE">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>

       