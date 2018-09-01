<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Import POS</h3>
              </div>
            </div>
            <div>
              <div style="float: right;">
                      
                      <a class="btn btn-app" href="javascript:void(0);" onclick="alertuser()"><i class="fa fa-paint-brush"></i> Clean POS </a>
                      <a class="btn btn-app" href="javascript:void(0);" onclick="alertuser1()"><i class="fa fa-calculator"></i> Calculate POS </a>
                      <a class="btn btn-app "  href="<?php echo base_url(); ?>index.php/user/pos_load_log"><i class="fa fa-files-o"></i> POS Upload Log </a>
                      
              </div>

              <div class="clearfix"></div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <?php if(!is_null($msg)) echo $msg; ?>
                    
                    <form action="<?php echo base_url(); ?>user/import_postransactions" class="dropzone">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        Distributor<?php echo form_dropdown('distributor',$distributor_list,'','onchange="getregion(this.value)" id="distributor_list" class="form-control input-sm"'); ?>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-3">
                        Sales Territory<?php echo form_dropdown('sales_territory',$sales_territory,'','id="sales_territory" class="form-control input-sm"'); ?>
                      </div>

                      <div class="col-md-3 col-sm-3 col-xs-3">
                        Sales Region<?php echo form_dropdown('sales_region',$sales_region,'','id="sales_region" class="form-control input-sm"'); ?>
                      </div>
                      
                      <div class="col-md-3 col-sm-3 col-xs-3">
                      Report Date


                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" name="report_date_adesto" placeholder="Report Date" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                   </div>
                      <div class="clearfix"></div>
                      <br />

                    </form>
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                  <a href="<?php echo base_url(); ?>user/postransactions_view" class="btn btn-warning btn-round"> < BACK </a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <script type="text/javascript">

          $(document).ready(function(){
          $("id.alert_msg").hover(function(){
            alert("Please make sure to add Clean records for Country,Currency,Item and Customer");
              });
          });

          
        </script>