<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Update Currency Exchange Rates </h2>
                    <?php $obj=& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach ($obj->sectionPriv[3] as $topsection) {
                          if($topsection['module_id']==165){ ?>
                          <a class="btn btn-app delete_tab_rec" href="#" id="currencyexchangerates"><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                          <?php }else { ?>
                          <a class="btn btn-app" href="<?php echo base_url().$topsection['controller_name'].'/'.$topsection['method_name']; ?>"><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                          <?php }}} ?>

                      
                      <!--
                      <?php if(!is_null($msg)) echo $msg; ?>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_currencyexchangerates_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_currencyexchangerates "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="javascript:void(0)" onclick="$('#date_form').submit()"><i class="fa fa-refresh"></i> Update </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_currencyexchangerates_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="currencyexchangerates" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/currencyexchangerates_history"><i class="fa fa-history"></i> View History</a>
                    -->
                    </div>
                    <div class="clearfix"></div>
                    <form id="date_form" action="<?php echo base_url(); ?>index.php/user/update_currencyexchangerates" method="post">
                    <div>
                      Input Currency Exchange Date <input type="date" name="date" id="exchane_date"> 
                    </div>

                    <div class="clearfix"></div>
                    </form>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          
               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>Currency</th>
                          <th>Currency Exchange</th>
                          <th>Currency Date</th>
                          <th>Date Updated</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                         if ($results)
                         { 
                          foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->base_currency  ; ?></td>
                          <td><?php echo $data->currency_exchange; ?></td>
                          <td><?php echo $data->currency_date_time; ?></td>  
                          <td><?php echo $data->date_added; ?></td>                                     
                          

                         
                        </tr>
                        <?php } }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

        

  