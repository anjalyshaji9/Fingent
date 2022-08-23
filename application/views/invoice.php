


  <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--<script src="<?php  //echo base_url();?>/js/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                         BILL DETAILS
                        </div>
                        <div class="panel-body">
                            <form>
                              <div class="row">
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >
                                            <label>Product</label>
                                            <select class="form-control pro" id="pro_0" name="pro[]" onchange="getPrice(this.value,0)">
                                                <option  value="" >Select</option>
                                              <?php
                                              for($i=0;$i<count($pro);$i++)
                                              {
                                              ?>
                                              <option  value="<?php  echo $pro[$i]['Id']?>" ><?php  echo $pro[$i]['Name']?></option>
                                              <?php
                                              } ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >
                                            <label>Quantity</label>
                                            <input class="form-control qty" type="number" min="0"  id="qty_0" name="qty[]" value="0" onchange="getlineamount(0),getTax(this.value,0)"/>
                                          </div>
                                        </div>
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >
                                            <label>Unit Price</label>
                                            <input type="text" id="upr_0" name="upr[]" class="form-control up" value=" "  readonly>
                                          </div>
                                        </div>
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >

                                            <label>Tax</label>
                                            <select class="form-control tax" id="tax_0" name="tax[]" onchange="getlineamount(0)" class="tax">

                                              <option  value="" >Select</option>
                                              <option  value="0" selected="true">0%</option>
                                              <option  value="1" >1%</option>
                                              <option  value="5" >5%</option>
                                              <option  value="10">10%</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >
                                            <label>Line Total</label>
                                            <input class="form-control line" type="number" id="Line_0" name="line[]" readonly/>
                                          </div>
                                        </div>
                                        <div  class="col-md-2 col-sm-2 col-xs-4">
                                          <div class="form-group" >
                                            <label></label>
                                           <button type="button" id="add" name="add" value="Add more" class="btn btn-info">Add More </button>
                                         </div>
                                       </div>
                                       </div>
                                       <div  id="dynamic_field">
                                       </div>
                                       <hr>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                         <div  class="col-md-2 col-sm-2 col-xs-4" >
                                           <div class="form-group" >
                                             <label>Discount(in $)</label>
                                             <input type="text" id="disc" name="disc" onchange="applydiscount()" class="form-control dis" onclick="checkvalue(this.id)">
                                           </div>
                                         </div>

                                         <div  class="col-md-2 col-sm-2 col-xs-4" >
                                           <div class="form-group" >
                                             <label>Discount(in %)</label>
                                             <input type="text" id="discper" name="disc" onchange="applydiscountpercentage()" class="form-control dis" onclick="checkvalue(this.id)">
                                           </div>
                                         </div>
                                         <div  class="col-md-2 col-sm-2 col-xs-4" >
                                           <div class="form-group" >
                                             <label>Subtotal with tax</label>
                                             <input type="text" id="with_tax" name="with_tax" value="0" readonly class="form-control">
                                           </div>
                                         </div>
                                       </div>



                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                       <div  class="col-md-2 col-sm-2 col-xs-4" >
                                         <div class="form-group" >
                                           <label>Subtotal without tax</label>
                                           <input type="text" id="no_tax" name="no_tax" value="0" readonly class="form-control">
                                         </div>
                                       </div>
                                       <div  class="col-md-2 col-sm-2 col-xs-4" >
                                         <div class="form-group" >
                                           <label>Total</label>
                                           <input type="number" id="total" name="total" value='0' readonly class="form-control">
                                         </div>

                                     </div>
                                     <div  class="col-md-2 col-sm-2 col-xs-4">
                                       <div class="form-group" >
                                         <label></label>
                                      <!--  <button type="button" id="submit" name="submit" value="submit" class="btn btn-info">Generate Invoice</button>-->
                                      <button type="button" id="submit" name="submit" value="submit" data-toggle="modal" data-target="#myModal" class="btn btn-info" onclick="genInvoice()">Generate Invoice</button>

                                      </div>
                                    </div>
                                      </div>
                                      <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Invoice</h4>
       </div>
       <div class="modal-body">
         <table border="1" align="center" width="100%">
  <tr >
    <td colspan='5'>ABC Infotech<br>
        Ramapuram P O<br>
        Kozhikode<br>
        Ph : 9600000000<br>
        Email : abc@gmail.com<br>
      </td>

  </tr>
  <tr>
    <td colspan='3'>Bill To</td>
    <td>Invoice No.</td>
    <td>Date</td>
  </tr>
  <tr>
    <td colspan='3'> Def hij<br>
                     House No : 233<br>
                     Kochi<br></td>
    <td >123456</td>
    <td >23-08-2022</td>
  </tr>
  <tr>
    <th>Description</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Tax (%)</th>
    <th>Amount</th>
  </tr>
  <tbody id="modaldata">
  </tbody>
   <tr>
     <td colspan="4" align="right">Discount(in $)</td>
     <td align="center" id="discount"></td>
   </tr>
   <tr>
     <td colspan="4" align="right">Subtotal without tax</td>
     <td align="center" id="withouttax"></td>
   </tr>
   <tr>
     <td colspan="4" align="right">Subtotal with tax</td>
     <td align="center" id="withtax"></td>
   </tr>
   <tr>
     <td colspan="4" align="right">Total</td>
     <td align="center" id="totali"></td>
   </tr>
</table>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>

                </form>

                        </div>

                      </div>
                    </div>

                    </div>


<script>

function genInvoice()
{
  var product=document.getElementsByClassName('pro')
  var qty=document.getElementsByClassName('qty')
  var upr=document.getElementsByClassName('up')
  var line=document.getElementsByClassName('line');
  var tax=document.getElementsByClassName('tax');
  var witht=document.getElementById('with_tax').value;
  var total=document.getElementById('total').value;

  var withouttax=document.getElementById('no_tax').value;
  str="";
  var temp="";
  for(var i=0;i<(line.length);i++)
  {
    temp=document.getElementById(product[i].id).options[document.getElementById(product[i].id).selectedIndex].text;

    str+='<tr><td align="center">'+temp+'</td>';
    str+='<td align="center">'+qty[i].value+'</td>';
    str+='<td align="center">'+upr[i].value+'</td>';
    str+='<td align="center">'+tax[i].value+'</td>';
    str+='<td align="center">'+line[i].value+'</td>';
    str+='</tr>';
  }

   $('#modaldata').append(str);
   disc=document.getElementById('disc').value;

   discper=document.getElementById('discper').value;

   if(disc)
   {
     document.getElementById('discount').innerHTML=disc;
   }
   else {
     document.getElementById('discount').innerHTML=disc;
   }
   if(discper)
   {
     var peramt=(parseInt(witht)*parseInt(discper))/100;
     document.getElementById('discount').innerHTML=Math.round(peramt);
   }
   document.getElementById('withtax').innerHTML=witht
   document.getElementById('totali').innerHTML=total
   document.getElementById('withouttax').innerHTML=withouttax

}


$(document).ready(function(){
      var i = 1;
     $("#add").click(function(){
       var obj = <?php echo json_encode($pro); ?>;
       var str="";
       i++;
       str+='<div id="row'+i+'" class="row">';
       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >';

           str+='<select class="form-control pro" id="pro_'+i+'" name="pro[]" onchange="getPrice(this.value,'+i+')">';
               str+='<option  value="" >Select</option>';
               $.each(obj, function(key, value){
               str+='<option  value="'+obj[key]['Id']+'">'+obj[key]['Name']+'</option>';
                });
           str+='</select>';
         str+='</div>';
       str+='</div>';
       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >  ';
           str+='<input type="number" min="0"  id="qty_'+i+'" name="qty[]" value="0" class="form-control qty" onchange="getlineamount('+i+')">';
         str+='</div>';
       str+='</div>';
       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >  ';
           str+='<input type="number" id="upr_'+i+'" name="upr[]" class="form-control up" readonly>';
         str+='</div>';
       str+='</div>';

       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >';
         str+='<select id="tax_'+i+'" name="tax[]" onchange="getlineamount('+i+')" class="form-control tax" style="width:100%">';
         str+='<option  value="" >Select</option>';
         str+='<option  value="0" selected="true">0%</option>';
         str+='<option  value="1" >1%</option>';
         str+='<option  value="5" >5%</option>';
         str+='<option  value="10" >10%</option>';
         str+='</select>';
         str+='</div>';
       str+='</div>';
       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >';
           str+='<input type="number" id="Line_'+i+'" name="line[]" class="form-control line" readonly>';
         str+='</div>';
      str+=' </div>';
       str+='<div  class="col-md-2 col-sm-2 col-xs-4">';
         str+='<div class="form-group" >';
          str+=' <button id="'+i+'" name="remove" class="btn_remove">Remove</button>';
         str+='</div>';
       str+='</div>';
       str+='</div>';

       $('#dynamic_field').append(str);


   });


});
function checkvalue(id)
{
   var discdo=document.getElementById('disc').value
   var discper=document.getElementById('discper').value
   if(id=='disc')
   {
     document.getElementById('disc').value="";
     calculate();
     if(discper)
     {
       alert("Apply discount either in percentage or in dollers");
     }
   }
   else
   {
      document.getElementById('discper').value="";
      calculate();
    if(discdo)
     {
       alert("Apply discount either in percentage or in dollers");
     }
   }
}
function getPrice(pro,myid)
{
  var id='upr_'+myid;
  $.ajax({
  url:  "<?php echo base_url(); ?>"+"ProductDetails/getUnitPrice",
  type: "POST",
  data:  {'pro': pro},
  success: function(data){
	document.getElementById(id).value=data;
  document.getElementById('qty_'+myid).value=0;

  }
  });
}
function getlineamount(param)
{
  document.getElementById('disc').value="";
  document.getElementById('discper').value="";
  var pro=document.getElementById('pro_'+param).value;
  if(pro)
  {
    var qy=  document.getElementById('qty_'+param).value;
    var up=  document.getElementById('upr_'+param).value;
    document.getElementById('Line_'+param).value=parseInt(qy)*parseInt(up);
  }
  var line=document.getElementsByClassName('line');
  var tax=document.getElementsByClassName('tax');
  with_tax=0;
  without_tax=0;
  for(i=0;i<line.length;i++)
  {
    with_tax=with_tax+(parseInt(line[i].value)*parseInt(tax[i].value)/100)
    without_tax=without_tax+parseInt(line[i].value)
  }
  document.getElementById('with_tax').value=with_tax
  document.getElementById('no_tax').value=without_tax
  document.getElementById('total').value=without_tax+with_tax

}

function applydiscount()
{
  var wtx=document.getElementById('with_tax').value;
  var ntx=document.getElementById('no_tax').value;
  var dis=document.getElementById('disc').value;
  var tot=document.getElementById('total').value;
  if(dis)
  {
    if(wtx>=dis)
    {
      document.getElementById('with_tax').value=parseInt(wtx)-parseInt(dis);
      var temp=document.getElementById('with_tax').value;
      document.getElementById('total').value=parseInt(temp)+parseInt(ntx);
    }
    else
    {
     alert('Discount amount is greater than or equal to total amount');
     document.getElementById('disc').value="";
     calculate();
     }
    }
    else
    {
      calculate();
    }
}
function applydiscountpercentage()
{
  var wtx=document.getElementById('with_tax').value;
  var ntx=document.getElementById('no_tax').value;
  var dis=document.getElementById('discper').value;
  var tot=document.getElementById('total').value;
  if(dis)
  {
    var peramt=(parseInt(wtx)*parseInt(dis))/100;
    if(wtx>=peramt)
    {

      document.getElementById('with_tax').value=parseInt(wtx)-parseInt(peramt);
      var temp=document.getElementById('with_tax').value;
      document.getElementById('total').value=parseInt(temp)+parseInt(ntx);
    }
    else
    {
     alert('Discount amount is greater than or equal to total amount');
     document.getElementById('disc').value="";
     calculate();
     }
    }
    else
    {
      calculate();
    }
}
$(document).ready(function(){

  $(document).on('click', '.btn_remove', function(){
  var button_id = $(this).attr("id");
  $('#row'+button_id+'').remove();
  calculate();
  document.getElementById('disc').value="";
  document.getElementById('discper').value="";

});
});
function getTax(val,param)
{
  if(val>0)
  {
    document.getElementById('tax_'+param).disabled=false
  }
  else
  {
    document.getElementById('tax_'+param).disabled=true
  }
}
function calculate()
{
  line=document.getElementsByClassName('line');
  tax=document.getElementsByClassName('tax');
  taxsum=0;
  linesum=0;
  for(i=0;i<line.length;i++)
  {
    temp=(parseInt(line[i].value)*parseInt(tax[i].value))/100;
    taxsum+=temp;
    linesum+=parseInt(line[i].value)
  }
  document.getElementById('with_tax').value=parseInt(taxsum);
  document.getElementById('total').value=parseInt(linesum)+parseInt(taxsum);
  document.getElementById('no_tax').value=parseInt(linesum);
}

</script>
