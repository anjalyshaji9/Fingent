<ul id="menu-top" class="nav navbar-nav navbar-right">

<!--<li><a href="<?php echo base_url(); ?>Admins/Search" >Search</a></li>-->
                <?php if($this->session->userdata('reconluser')){?>
<!--
                   <li><a href="form.html"></a></li>-->


                            <li><a href="<?php echo base_url();?>Admin/logout" class="menu-top-active">Logout</a></li>

                <?php }
                else{
                ?>


                <li><a href="<?php echo base_url();?>Admin">Admin Login</a></li>


                <?php }?>
            </ul>

        </div>
        </td>
	</tr>
    <tr>
    	<td height="20"></td>
    </tr>
</table>
