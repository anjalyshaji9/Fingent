<script src="<?php echo base_url();?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/validationEngine.jquery.css" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/thickbox.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/thickbox.css" type="text/css"/>


 <script language="javascript">
jQuery(document).ready(function(){
	// binds form submission and fields to the validation engine
	jQuery("#frm1").validationEngine();
});</script>
  <link rel="stylesheet" href="/resources/demos/style.css">

     <!-- BOOTSTRAP CORE STYLE  -->

    <!-- FONT AWESOME STYLE  -->

<div class="row">
                    <div class="col-md-6">

                     <!--  Modals-->
                    <div id="divpopup">



                     <!-- End Modals-->

                    </div>

                </div>
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" class="pad1">
	<tr>
    	<td width="100%" height="100%" align="center" valign="top">
            <table align="center" cellpadding="0" cellspacing="0" width="60%" height="100%" class="newsbox">





                 </td></tr>
                <tr>
                    <td width="100%" align="left" valign="top" class="home-content">
					

               <?php if(!empty($movie_details)){ ?>
               <tr><td height="30"></td></tr>
               <tr>
               		<td>


                       <div class="panel panel-default">
                        <div class="panel-heading">
                            Saved Files
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>Sl. No.</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Movie</th>
                                            <th>Date of Show</th>
                                            <th>Seats</th>
                                            <th>Tme</th>
                                            <th>Amount</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                      <form name="frm2" id="frm2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                                       <?php
								$slno=1;
								foreach ($movie_details as $sections): ?>



                                         <tr class="odd gradeX">
                                          <td><?php echo $slno++;?></td>
                                           <td><?php echo  $sections['name'] ; ?></td>
                                           <td><?php echo $sections['mobile_number'] ; ?></td>
                                           <td><?php echo $sections['film_name'] ; ?></td>
                                           <td><?php echo  $sections['booking_date'] ; ?></td>
                                           <td><?php echo  $sections['seat'] ; ?></td>
                                              <td><?php echo  $sections['booking_time'] ; ?></td>
                                                <td><?php echo  $sections['amount'] ; ?></td>

                                        </tr>
                                          <?php endforeach; ?>
                                     </form>




                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>







                    </td>

               <?php }?>
               <tr>
                  <td height="50" colspan="17" align="right"></td>
              </tr>
           </table>
        </td>
     </tr>

</table>
<script language="javascript">








	$(document).ready(function() {



		$("#Hostel_id").change(function(event) {
		var selrel = this.value;
		var deptid=document.getElementById('department_id').value;



		$.ajax({
			url: "<?php echo base_url(); ?>"+"Admin/Sections/students", //The url where the server req would we made.
			async: false,
			type: "POST", //The type which you want to use: GET/POST
			data: "dept="+selrel+'&hostel='+selrel+"&student=<?php if(set_value('student')){echo set_value('student');}else{echo "";}?>" , //The variables which are going.
			dataType: "html", //Return data type (what we expect).
			// alert(url);
			//This is the function which will be called if ajax call is successful.
			success: function(data) {
							//data is the html of the page where the request is made.
				$('#student').html(data);
			}
		})/**/

	});

});




//


 </script>

<script type="text/javascript" language="javascript">


<?php if(set_value('Hostel_id'))
{

?>
$(function () {

    $("#Hostel_id").change();

});
<?php
}
/*if(set_value("candidate_category")){?>agerelax('<?php echo set_value("candidate_category");?>');<?php }*/
?>
</script>

<script type="text/javascript" language="javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}




function loadpopup(x,y)
{
	var studid=x;
	var year=y;
	//alert(studid);

   $.ajax({
    url:"<?php echo base_url(); ?>"+"Admin/Sections/popup",
	async: false,
    method:"POST",
   data:"studid="+x+'&year='+year,
   dataType: "html",
  success:function(data)
    {
		//var msg="success";
	//	window.location.href = window.location.href + "/1";
		 //location.reload();

		$('#divpopup').html(data);


    }
   });


}





</script>
