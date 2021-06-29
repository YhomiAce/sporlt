  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       <?php //echo number_format($count); ?> Intra State Costs
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Intra State Cost</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_intra_cost"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Cost</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> <?php echo $up_error; ?></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<!--<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="customers">
        <input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search For a City" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>-->

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cities</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Kg</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Cost</th> 
  <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Discount</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Insurance</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Earned</th>


 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Edit</th>
<!-- <th>Edit</th>-->
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Delete</th>
<?php
require 'config/config.php';



$sql=$con->query("SELECT * FROM intra_cost ORDER BY id DESC LIMIT 0,500") or die("Error2 : ". mysqli_error($con));


 $i=1;
   
  while ($rows=mysqli_fetch_array($sql))
   {
    $id=$rows['id'];
    $state = $rows['state'];
    $kg = $rows['kg'];
    $cost = $rows['cost'];
    
    $multiplier = $rows['multiplier'];
    $discount=$rows['discount'];
    $insurance=$rows['insurance'];
    
    
    $date_t =$rows['date_t'];

    $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
    
    
?>
<tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $state; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $kg; ?> <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($cost); ?> <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($discount); ?><td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($insurance); ?> <td style="border:solid; border-width: thin; border-color: #eee;">&#8358;<?php echo number_format($insurance); ?><td style="border:solid; border-width: thin; border-color: #eee;"><a href="?p=edit_intra&id=<?php echo $id; ?>"> <button class="btn btn-danger">Edit</button></a></td><td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-danger" onclick="delete_intra_cost('<?php echo $id; ?>');">Delete</button></td></td></td></td></td></td></td></tr>

<?php
$i++;
}
?>

</table>


<script type="text/javascript">
function delete_intra_cost(id)
{

var r = confirm ("Do you want to Delete this cost?");

if (r == true) {
var dataString='id='+id;
$.ajax({
type:"GET",
url:"process/delete_intra_cost.php",
data:dataString,
jsonp:"callback",
jsonpCallback:"Sverify",
dataType:"jsonp",
crossDomain:true,
success: function(data){
var success = data.success;
if(success == "Yes")
{
//alert("Category Deleted Successfully!");
window.location = "?p=intra_costs";
}
else if (success = "No")
{
 alert("An error Occured!");
}
},
beforeSend:function()
{
$('#loader').fadeOut(200).show();
},
error: function(jqXHR, textStatus, errorThrown)
{
    alert ("Could not connect to server");
    //$('#in').fadeOut(200).hide();

    }


});} else {
}


 
}
</script>

        </div>
        </div>
        <!-- ./col -->
     
     
  <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div>
        </div>
        </div>
     
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
     </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

   
<?php include('includes/js.php')?>
</body>
</html>



