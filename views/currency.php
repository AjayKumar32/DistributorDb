<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Currency</small></h2>
                    <?php $obj=& get_instance(); ?>
                    <div style="float: right;">
                      
                      <?php if(isset($obj->sectionPriv[3]) && !empty($obj->sectionPriv[3])){
                        foreach ($obj->sectionPriv[3] as $topsection) {
                          if ($topsection['module_id']==90){ ?>
                          <a class="btn btn-app delete_tab_rec" href="#" id="currency"><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                          <?php }else{ ?>
                          <a class="btn btn-app" href="<?php echo base_url().$topsection['controller_name'].'/'.$topsection['method_name']; ?>"><?php echo $topsection['icon'].$topsection['module_name']; ?></a>
                         <?php }}}; ?>

            <!--
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/add_currency_view"><i class="fa fa-plus"></i> Add </a>
                      <a class="btn btn-app delete_tab_rec" id="currency" href="#"><i class="fa fa-trash-o"></i> Delete </a>
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/delete_log"><i class="fa fa-trash"></i> Delete Log</a>
                      -->
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                         
               <th><input type="checkbox" id="check-all" class="flat" value=''>
              </th>
                          <th>Currency</th>
                          
                          <th>Currency Decription</th>
                          <th>Edit</th>
                         
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        //echo "<pre>"; print_r($data["results"]);die();
                         if ($results)
                         {
                         foreach ($results as $data) { ?>
                        <tr>
                          <td><input type="checkbox" id="check-all<?php echo $data->id; ?>" class="flat" name="table_records" value="<?php echo $data->id; ?>"></td>
                          <td><?php echo $data->currency; ?></td>
                          <td><?php echo $data->currency_description; ?></td>
                          <td>
                            <?php if(isset($obj->sectionPriv[4]) && !empty($obj->sectionPriv[4])){
                              foreach ($obj->sectionPriv[4] as $rightsection) { ?>
                              <a href="<?php echo base_url().$rightsection['controller_name'].'/'.$rightsection['method_name'].'/'.$data->id;?>"><?php echo $rightsection['icon'];?> </a>&nbsp;
                       <?php } }?>
                          </td>
                            <!--<a href="<?php echo base_url(); ?>user/edit_currency/<?php echo $data->id ?>"><i class="fa fa-edit"></i></a></td>-->                                     
                          
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

  