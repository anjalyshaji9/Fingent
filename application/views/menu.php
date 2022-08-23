<ul id="menu-top" class="nav navbar-nav navbar-right">

<!--<li><a href="<?php //echo base_url(); ?>" >Registration</a></li>-->
                <?php if($this->session->userdata('reconluser')){?>
                            <li><a href="<?php echo base_url();?>Admin/logout" class="menu-top-active">Logout</a></li>
                          <?php }
                else{
                ?>

                <li><a href="<?php echo base_url();?>Admin">Admin Login</a></li>

                <?php }?>
            </ul>
