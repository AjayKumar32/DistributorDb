<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Import </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    
                    
                    <form action="<?php echo base_url(); ?>user/import_commisions_data" class="dropzone"></form>
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                  <a href="<?php echo base_url(); ?>user/commisions_data_view" class="btn btn-warning btn-round"> < BACK </a>
                  <?php if(!is_null($msg)) echo $msg; ?>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->