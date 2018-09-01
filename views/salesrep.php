<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Rep</small></h2>
                     <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==65){ ?>
                            <a class="btn btn-app delete_tab_rec" id="distributor" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                    </div>

                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          

                          <th><input type="checkbox" id="check-all" class="flat" value=''>
                          </th>
                          
                          <th>Sales Rep</th>
                          <th>Rep Class</th>
                          <th>Sales Person</th>
                          <th>Edit</th>
                          
                        </tr>
                      </thead>


                      <tbody>

                        <?php 
                         if ($results)
                         { 
                          foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" name="table_records" class="flat" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->Sales_Rep; ?></td>
                          <td><?php echo $data->Rep_Class; ?></td>
                          <td><?php echo $data->Sales_Person; ?></td>
                          <td>
                            <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){ 
                              foreach ($obj->sectionPriv[4] as $rightsection) { ?>
                              <a href="<?php echo base_url().$rightsection['controller_name'].'/'.$rightsection['method_name']; ?>"> <?php echo $rightsection['icon']; ?> </a>
                              <?php }};  ?>
                          </td>
                              
                              
                            



                                                                 

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

