<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Disti File Mapping </small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                           ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } ?> 
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          

               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          
                          <th>Distribuor</th>
                          <th>File Name</th>
                          <th>Created date</th>
                          <th>Modified Date</th>
                          <th>Edit</th>
                         
                        </tr>
                      </thead>


                      <tbody>

                        <?php
                         if ($results)
                         { 
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all" class="flat" name="table_records" value=""></td>
                          <td><?php echo $data['Distributor']; ?></td>
                          <td><?php echo $data['File_Name']; ?></td>
                          <td><?php echo $data['created_date']; ?></td>
                          <td><?php echo $data['modify_date']; ?></td>                                
                          
                          <td>
                            

                       <a href="<?php echo base_url(); ?>/user/disti_filemapping_view/<?php echo $data['system_type']."/".$data['distributor']; ?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                    
              </div>

              </div>

            </div>
          </div>
        </div>

