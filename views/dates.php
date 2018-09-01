<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Dates </small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==105){ ?>
                            <a class="btn btn-app delete_tab_rec" id="dates" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?>
                      <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/import_dates_view"><i class="fa fa-file-excel-o"></i> Import </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/export_dates "><i class="fa fa-file-excel-o"></i> Export </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_dates_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="dates" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/load_log"><i class="fa fa-files-o"></i> Upload Log</a> -->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form name="search_form" method="post" action="">
                    <table  class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="16">
                            <table> 
                              <tr>
                           <td>Search Word:</td>
                           <td><input type="text" name="search_word" id="search_word" class="form-control" value="<?php echo ($search_word!='0')?$search_word:'';?>"></td> <td><input type="submit" name="search" id="search" value="search" class="btn btn-round btn-success"></td>
                           <td></td>
                           </tr>

                           </table>

                         </td> 
                        </tr>

                        <tr>
                          

               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>Date</th>
                          <th>Year</th>
                          <th>WkNum</th>
                          <th>MthNum</th>
                          <th>QtrNum</th>
                          <th>WkTxt</th>
                          <th>MthTxt</th>
                          <th>QtrTxt</th>
                          <th>WkAbs</th>
                          <th>MthAbs</th>
                          <th>QtrAbs</th>
                          <th>WkAbsNum</th>

                          <th>MthAbsNum</th>
                          <th>QtrAbsNum</th>
                          
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
                          <td><?php echo $data->Date; ?></td>
                          <td><?php echo $data->Year; ?></td>                                     
                          <td><?php echo $data->WkNum; ?></td>
                          <td><?php echo $data->MthNum; ?></td>
                          <td><?php echo $data->QtrNum; ?></td>                                     
                          <td><?php echo $data->WkTxt; ?></td>
                          <td><?php echo $data->MthTxt; ?></td>
                          <td><?php echo $data->QtrTxt; ?></td>                                     
                          <td><?php echo $data->WkAbs; ?></td>
                          <td><?php echo $data->MthAbs; ?></td>
                          <td><?php echo $data->QtrAbs; ?></td>                                     
                          <td><?php echo $data->WkAbsNum; ?></td>
                          <td><?php echo $data->MthAbsNum; ?></td>
                          <td><?php echo $data->QtrAbsNum; ?></td>                                     
                          
                          <td><?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                        foreach($obj->sectionPriv[4] as $topSection){ ?>
                           <a href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'].'/'.$data->id;?>"><?php echo $topSection['icon'];?> </a>&nbsp;
                       <?php } }?></td>                                     
                          
                        </tr>
                          <?php }} ?>
                        
                          <th colspan="16"><div class="dataTables_paginate paging_simple_numbers"><?php echo $paging;?></div></th>
                       
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                    
              </div>

              </div>

            </div>
          </div>
        </div>

