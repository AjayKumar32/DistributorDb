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
                     <?php if($this->session->flashdata('message_name')!='') echo $this->session->flashdata('message_name');?>
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" data-page-length='100'>
                      <thead>
                        <tr>
                        
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Username</th>
                     <th>Action</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                       <td><?php echo $user_profile->fname; ?></td>
                        <td><?php echo $user_profile->lname; ?></td>
                        <td><?php echo $user_profile->email; ?></td>
                        <td><?php echo $user_profile->username; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>/user/update_user_profile" title="Edit Profile"><i class="fa fa-edit"></i></a>
                          &nbsp;|&nbsp;
                           <a href="<?php echo base_url(); ?>/user/change_profile_password"><i class="fa fa-key"></i></a>

                        </td>
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

  