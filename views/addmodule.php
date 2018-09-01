<div class="right_col" role="main" style="min-height: 3542px;">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Module<!--<small>different form elements</small>--></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" action="<?php echo base_url(); ?>usermanagement/add_module" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="module_name"> Module Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="module_name" name="module_name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent_id">Parent Id <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_dropdown('parent_id',$module_names_list,'','                                  onchange="getFilters(this.value,1)" id="sales_region" class="form-control col-md-7 col-xs-12"'); ?>
                         <!-- <input type="text" id="parent_id" name="parent_id" required="required" class="form-control col-md-7 col-xs-12">-->
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level_id">Level ID <span class="required">*</span>
                        </label>

                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown('level_id',$level_id_list,'','                                  onchange="getFilters(this.value,1)" id="sales_region" class="form-control col-md-7 col-xs-12"'); ?>
                        <!--<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="level_id" name="level_id" required="required" class="form-control col-md-7 col-xs-12">-->
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="controller_name"> Controller Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="controller_name" name="controller_name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="method_name">Method Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="method_name" name="method_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Satus <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="status" name="status" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">Icon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="icon" name="icon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sort">Sort <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sort" name="sort" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>/usermanagement/module_list" class="btn btn-warning btn-round"> < BACK </a> &nbsp;
                          <button type="submit" class="btn btn-success"> SUBMIT </button><?php if(!is_null($msg)) echo $msg; ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>