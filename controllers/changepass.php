<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                          <th>
               <th><input type="checkbox" id="check-all" class="flat"></th>
              </th>
                          <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Username</th>
                     <th>Action</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php 

                        if ($results)
                         { 
                         
                          foreach ($results as $data) { ?>
                        <tr>
                          <td><th><input type="checkbox" id="check-all" class="flat" value="<?php echo $data->id; ?>"></th></td>
                          <td><?php echo $data->CountryOriginal; ?></td>
                          <td><?php echo $data->CountryNew; ?></td>                                     
                          <td><a href="<?php echo base_url(); ?>/user/edit_countriescleanup/<?php echo $data->id ?>"><i class="fa fa-edit"></i></a></td>                                    
                          
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

  