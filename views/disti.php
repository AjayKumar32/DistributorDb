<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Distributors</small></h2>
                    <?php $obj =& get_instance(); ?>
                    <div style="float: right;">
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach($obj->sectionPriv[3] as $topSection){ 
                          if($topSection['module_id']==57){ ?>
                            <a class="btn btn-app delete_tab_rec" id="distributor" href="#"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php   }else{ ?>
                           <a class="btn btn-app" href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'];?>"><?php echo $topSection['icon'].$topSection['module_name'];?> </a>
                       <?php } } }?> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form name="serach_form" method="post" action="">
                    <table id="datatable-checkbox1" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <td colspan="23">
                              <table>
                                <tr>
                                  <td>Sales Region</td><td><?php echo form_dropdown('sales_region',$sales_region_list,$sales_region,'onchange="getFilters(this.value,1)" id="sales_region" class="form-control input-sm"'); ?></td>
                                  <td>Sales Territory</td><td><?php echo form_dropdown('sales_territory',$sales_territory_list,$sales_territory,'onchange="getFilters(this.value,2)" id="sales_territory" class="form-control input-sm"'); ?></td>
                                  
                                      <td>Disti Status</td><td><?php 
                                       $statuslist  = array('All'=>'All',
                                                            'YES'=>'Active'
                                                            ,'NO'=>'In-Active');
                                      echo form_dropdown('disti_status',$statuslist,$disti_status,'id="disti_status" class="form-control input-sm"'); ?></td>
                                      <td><input type="submit" name="search" value="Search" class="btn btn-round btn-success"></td>
                                </tr>
                              </table>
                                </td>
                                </tr>
                              </thead>
                              </table>
                              </form>  
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="check-all" class="flat" value="0"></th>
                          
                          <th>Distributor</th>
                          <th>Customer Class</th>
                          <th>Sales Area</th>
                          <th>Sales Territory</th>
                          <th>Country</th>
                          <th>Consolidated Name</th>
                          <th>Active</th>
                          <th>POS Report</th>
                          <th>Cust Price Type</th>
                          <th>POS Currency</th>
                          <th>Calendar</th>
                          <th>GP Cust Number</th>                          
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
                          <td><?php echo $data->Distributor; ?></td>
                          <td><?php echo $data->Cust_Class; ?></td>
                          <td><?php echo $data->Sales_Area; ?></td>
                          <td><?php echo $data->Sales_Territory; ?></td>
                          <td><?php echo $data->Country; ?></td>
                          <td><?php echo $data->Consolidated_Name; ?></td>
                          <td><?php echo $data->Active; ?></td>
                          <td><?php echo $data->POS_Report; ?></td>
                          <td><?php echo $data->Cust_Price_Type; ?></td>
                          <td><?php echo $data->POS_Curr; ?></td>
                          <td><?php echo $data->Calendar; ?></td>
                          <td><?php echo $data->GP_Cust_Num; ?></td>
                          
                          <td>
                             <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                        foreach($obj->sectionPriv[4] as $topSection){ ?>
                           <a href="<?php echo base_url().$topSection['controller_name'].'/'.$topSection['method_name'].'/'.$data->id;?>"><?php echo $topSection['icon'];?> </a>&nbsp;
                       <?php } }?>



                          </td>

                        </tr>
                        <?php }}?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>


              </div>

            </div>
          </div>

        </div>

  