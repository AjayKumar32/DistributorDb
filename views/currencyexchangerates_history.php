<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Currency Exchange Rates History</small></h2>
                    <!--<div style="float: right;">
                      <?php if(!is_null($msg)) echo $msg; ?>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_currencyexchangerates_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_currencyexchangerates "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="javascript:void(0);" onclick="$('#date_form').submit()"><i class="fa fa-refresh"></i> Update </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_currencyexchangerates_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="currencyexchangerates" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/currencyexchangerates_history"><i class="fa fa-trash"></i> View History</a>
                    </div>
                    <div class="clearfix"></div>
                    <form id="date_form" action="" method="post">
                    <div>
                      Currency Exchange Date <input type="date" name="date" id="exchane_date"> 
                    </div>
-->
                    <div class="clearfix"></div>

                  <div class="x_content">
                    <div class="x_content">
                    <form name="search_form" method="post" action="">
                      <table>
                      <thead> 
                        <tr>
                          <td colspan="5">
                              <table>
                                <tr>
                                  <td>Currency</td><td><?php echo form_dropdown('currency',$currencies_list,$currency,' id="currency" class="form-control input-sm"'); ?></td>
                                  <td>Currency Date</td><td><?php echo form_dropdown('currency_date',$date_list,$currency_date,' id="currency_date" class="form-control input-sm"'); ?></td>
                                  
                                      
                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                </tr>
                              </table>
                                </td>
                                </tr>
                              </thead>
                              </table>


                    </form>
                  </div>



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

        

  