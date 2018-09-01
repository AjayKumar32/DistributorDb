<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href=<?php echo base_url(); ?>/user><i class="fa fa-home"></i> Home </a>
                    
                  </li>
                  <li><a><i class="fa fa-edit"></i> Setup <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/disti">DISTI</a></li> 
                      <li><a href="<?php echo base_url(); ?>/user/disti_file_mapping_home_view">DISTI FILE MAPPING</a></li> 
                      <li><a href="<?php echo base_url(); ?>/user/repandsalesperson_view">SALES REP </a></li>
                      <li><a href="<?php echo base_url(); ?>/user/salesperson_view">SALES PERSON </a></li> 
                      <li><a href="<?php echo base_url(); ?>/user/salesterritories_view">SALES TERRITORY</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/countries_view">COUNTRIES</a></li> 
                      <li><a href="<?php echo base_url(); ?>/user/items_view">ITEMS</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/currency_view">CURRENCY</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/debitsapprovalrejectionreasons_view">DEBITS APPROVAL/REJECTION REASONS</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/commission_rates_view">COMMISSION RATES</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/disti_sales_type_view">DISTI SALES TYPE</a></li>


                      <li><a href="<?php echo base_url(); ?>/user/dates_view">DATES</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> CleanUp <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/countriescleanup_view">COUNTRIES</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/customerscleanup_view">CUSTOMERS</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/itemscleanup_view">ITEMS</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/currencycleanup_view">CURRENCY</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/postransactions_view">POS</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/inventorytransactions_view">Inventory</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/debitstransactions_view">Debits</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i> Update <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/currencyexchangerates_view">CURRECNY EXCHANGE RATES</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/netpricepercent_view">NET PRICE%</a></li>
                      <!--<li><a href="<?php echo base_url(); ?>/user/commisionmapping_view">COMMISION MAPPING</a></li>-->
                      <li><a href="<?php echo base_url(); ?>/user/pricebook_view">PRICE BOOK</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/quotes_view">QUOTES</a></li>
                      <!-- <li><a href="other_charts.html">Other Charts</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-check"></i> Debits Validation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/debitvalidation_view">DEBIT CLAIM VALIDATION</a></li>
                    <li><a href="<?php echo base_url(); ?>/user/approveddebits_view"> APPROVED DEBIT CLAIMS</a></li>
                    <li><a href="<?php echo base_url(); ?>/user/rejecteddebits_view"> REJECTED DEBIT CLAIMS</a></li>
                    <li><a href="<?php echo base_url(); ?>/user/financially_processed_debits_view"> FINANCE REVIEW</a></li>
                     <li><a href="<?php echo base_url(); ?>/user/financially_approved_debits_view"> FINANCE APPROVED</a></li>
                     <li><a href="<?php echo base_url(); ?>/user/financially_rejected_debits_view"> FINANCE REJECTED</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-money"></i> Commissions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/user/commisions_data_view">COMMISSIONS DATA</a></li>
                      <li><a href="<?php echo base_url(); ?>/user/commisions_data_calculated_view">COMMISSIONS CALCULATED</a></li>
                    
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/report/top_customers_view">Top Customers </a></li>
                     <li><a href="<?php echo base_url(); ?>/report/top_items_view">Top Items</a></li>
                      <!-- <li><a href="<?php echo base_url(); ?>/report/debitsreports_view">Debits</a></li>-->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope"></i> Emails <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/email/email_processed">Emails Processed </a></li>
                     <li><a href="<?php echo base_url(); ?>/email/email_log">Email Log </a></li>
                      <!-- <li><a href="<?php echo base_url(); ?>/report/debitsreports_view">Debits</a></li>-->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>/usermanagement/user_list">Users </a></li>
                     <li><a href="<?php echo base_url(); ?>/usermanagement/module_list">Modules </a></li>
                      <!-- <li><a href="<?php echo base_url(); ?>/report/debitsreports_view">Debits</a></li>-->
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>-->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php
                 $profile_picture = ($this->session->userdata('profile_picture')!='')?'assets/build/profile_picture/'.$this->session->userdata('profile_picture'):'assets/build/images/user.png';
                ?>
                    <img src="<?php echo base_url().$profile_picture; ?>" alt=""><?php echo $this->session->userdata('fname'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url(); ?>user/profile"> Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
<!--
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul> 
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
