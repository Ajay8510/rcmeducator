<header id="Header">

                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <h1><a id="logo" href="<?php echo base_url(); ?>" title="RCM Educator"><img class="scale-with-grid" src="<?php echo base_url('assets/images/logo.png')?>" alt="RCM Educator"/></a></h1>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="<?php echo ($this->uri->segment(1) == 'index' || $this->uri->segment(1) =='') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/index')?>"><span>Home</span></a>
                                            </li>
                                             <li class="<?php echo ($this->uri->segment(1) == 'about') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/about')?>"><span>About Us</span></a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'services') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/services')?>"><span>Services</span></a>
                                            </li>
                                             
                                            <li class="<?php echo ($this->uri->segment(1) == 'billing') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/billing')?>"><span>Billing</span></a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'credentialing') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/credentialing')?>"><span>Credentialing</span></a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'webinars') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/webinars')?>"><span>Webinars</span></a>
                                            </li>
                                           
                                             <li class="<?php echo ($this->uri->segment(1) == 'contact') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/contact')?>"><span>Contact Us</span></a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'blogs') ? 'current_page_item' : '' ?>">
                                                <a href="<?php echo base_url('/blogs')?>"><span>Blogs</span></a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'login') ? 'current_page_item' : '' ?>">
                                                <?php if(!$this->session->userdata('isUserLoggedIn')) { ?>
                                                <a href="<?php echo base_url('users/login')?>"><span>Login</span></a>
                                              <?php } ?>

                                              <?php if($this->session->userdata('isUserLoggedIn')) { ?>
                                                
                                                  <div class="dropdown">
                                                  <button class="dropbtn" style="color:#fff;border:0px;top:30px;padding:0px;margin:0px;"><i class="fa fa-2x fa-user-circle" aria-hidden="true"></i></button>
                                                  <div class="dropdown-content">
                                                    <button id="profile">Profile</button>
                                                    <button id="logout">Logout</button>
                                                    </div>
                                                </div>
                                              <?php } ?>

                                            </li>
                                           <!-- <li style="top:30px;"><i style="color:white;" class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></li> -->
                                        </ul>

                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" action="#">
                                        <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                                        <input type="text" class="field" name="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <script>
                var app_path ="<?php echo base_url()?>";
                jQuery(document).ready(function(){
                    jQuery("#profile").click(function(){
                        window.location = app_path + 'users/dashboard';
                    });
                    jQuery("#logout").click(function(){
                        window.location = app_path + 'users/logout';
                    });
                    
                });
            </script>