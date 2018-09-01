<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Items </small></h2>
                    <?php $obj=& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach ($obj->sectionPriv[3] as $topsection) {
                          if($topsection['module_id']==85) { ?>
                          <a class="btn btn-app delete_tab_rec" href="#" id="items" ><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                        <?php }else{ ?>
                        <a class="btn btn-app " href="<?php echo base_url().$topsection['controller_name'].'/'.$topsection['method_name']; ?>"><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                        <?php }}}; ?>
                   
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_items_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_items "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_items_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="items" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a>-->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="overflow: auto;">
                    <form name="search_form" method="post" action="">
                    <table class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="23">
                            <table> 
                              <tr>
                           <td>Search Word:</td>
                           <td><input type="text" name="search_word" id="search_word" class="form-control" value="<?php echo ($search_word!='0')?$search_word:'';?>"></td> <td><input type="submit" name="search" id="search" value="search" class="btn btn-round btn-success"></td>
                           </tr>
                           </table>

                         </td> 
                        </tr>

                        <tr>
                          

               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          
                          <th>Item</th>
                          <th>Bulk_Output</th>
                          <th>Item_No_Pack</th>
                          <th>Item_NoCan_NoSL</th>
                          <th>Item_NoCan_NoSl_NoPack</th>
                          <th>Forecast_Item</th>
                          <th>Pack</th>
                          <th>Item_Class</th>
                          <th>Internal_Class</th>
                          <th>Mkt_Family</th>
                          <th>First_Segment</th>
                          <th>Density</th>
                          <th>Package</th>
                          <th>CANcode_SLcode</th>
                          <th>CANCode</th>
                          <th>SLCode</th>
                          <th>Die</th>
                          <th>Fab</th>
                          <th>Fab_Origin</th>
                          <th>Leadtime_Type</th>
                          <th>Leadtime</th>
                          <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php
                          if ($results)
                         { 
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Item; ?></td>
                          <td><?php echo $data->Bulk_Output; ?></td>                                     
                          <td><?php echo $data->Item_No_Pack; ?></td>
                          <td><?php echo $data->Item_NoCan_NoSL; ?></td>
                          <td><?php echo $data->Item_NoCan_NoSl_NoPack; ?></td>                                     
                          <td><?php echo $data->Forecast_Item; ?></td>
                          <td><?php echo $data->Pack; ?></td>
                          <td><?php echo $data->Item_Class; ?></td>                                     
                          <td><?php echo $data->Internal_Class; ?></td>
                          <td><?php echo $data->Mkt_Family; ?></td>
                          <td><?php echo $data->First_Segment; ?></td>                                     
                          <td><?php echo $data->Density; ?></td>
                          <td><?php echo $data->Package; ?></td>
                          <td><?php echo $data->CANcode_SLcode; ?></td>                                     
                          <td><?php echo $data->CANCode; ?></td>
                          <td><?php echo $data->SLCode; ?></td>
                          <td><?php echo $data->Die; ?></td>                                     
                          <td><?php echo $data->Fab; ?></td>
                          <td><?php echo $data->Fab_Origin; ?></td>
                          <td><?php echo $data->Leadtime_Type; ?></td>                                     
                          <td><?php echo $data->Leadtime; ?></td>
                          <td>
                            <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){ 
                            foreach ($obj->sectionPriv[4] as $rightsection) { ?>
                              <a href="<?php echo base_url().$rightsection['controller_name'].'/'.$rightsection['method_name'].'/'.$data->id; ?>"><?php echo $rightsection['icon']; ?> </a>
                            <?php }}; ?>
                            


                           </td>
                        </tr>
                        <?php } }?>
                        
                         <th colspan="16"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>
                         <th colspan="7"></th>
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                    
              </div>

              </div>

            </div>
          </div>
        </div>

