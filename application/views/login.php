
<script src="<?php echo base_url();?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/validationEngine.jquery.css" type="text/css"/>
<script language="javascript">
jQuery(document).ready(function(){
	// binds form submission and fields to the validation engine
	jQuery("#frm1").validationEngine();
});</script>
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" class="pad1">
	<tr>
    <!--<td width="50%"  align="left" valign="top" style="padding-right:20px;"><img src="<?php echo base_url();?>images/home.jpg" width="700px" /></td>-->

    	<td width="100%" height="90%" align="center" valign="top" style="padding-left:10px;"> <div class="panel panel-default">
                        <div class="panel-heading">
                           LOGIN
                        </div>
            <table align="center" cellpadding="0" cellspacing="0" width="80%" height="100%" class="newsbox">

                <tr><td colspan="4" height="50" valign="middle" align="center"><?php if(isset($login_msg)){?><h3 class="error_main_msg"><?php echo $login_msg;?></h3><?php }?></td></tr>
                <tr>
                    <td colspan="4" width="100%" align="center" valign="top" class="home-content">


                        <div class="panel-body">
                           <form name="frm_login" id="frm_login" method="post" action="<?php echo base_url();?>/Login">



                                            <div class="form-group">
                                            <label>Registred Mobile No</label>
                                            <input class="form-control" type="text"  name="username" id="username" />
                                     <div class="form-group has-error">
                                            <label class="control-label" for="error"><?php //echo form_error('username'); ?></label>
                                                                          </div>
                                        </div>



<input type="submit" class="btn btn-success" value="Submit"  />
                                    </form>
                            </div>













                    </td>
                </tr>
                <tr> <td>&nbsp;</td></tr>

            </table>  </div>

        </td>
    </tr>
</table>
