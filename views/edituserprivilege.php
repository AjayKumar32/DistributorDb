<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit User Privilege</small></h2>
                    <!--<div style="float: right;">
                      <a class="btn btn-app" href="<?php echo base_url(); ?>user/check_for_new_currency"><i class="fa fa-plus"></i> Check for New Currencies </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_currency_cleanup_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_currency_cleanup"><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_currency_cleanup_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="currencycleanup" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>
                    </div>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form name="priv_form" action="<?php echo base_url(); ?>usermanagement/save_userprivilege" method="post">
                      <input type="hidden" value="<?php echo $user_id?>" name="user_id">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        Priv. Modules
                       
                          <?php echo $results;?>
                       
                      </div>
                      <input type="submit" value="Save Privileges" name="saveprivileges">
                    </form>
                    <?php if($msg!=''){echo "$msg";} ?>
                  </div>
                  
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>
  <script type="text/javascript">
    $.ShowModule = function(moduleID) {

      if($('#module'+moduleID).is(':checked')) {

        $('#sub'+moduleID).show();

      }

      else {

        $('#sub'+moduleID).hide();

        $('#sub'+moduleID).find('input[type=checkbox]:checked').removeAttr('checked');

        //$('#sub'+moduleID).find('input[type=checkbox]:checked').remove();

      }

    }

  </script>      

  