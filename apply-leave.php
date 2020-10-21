<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['apply']))
{
 $leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];  
$todate=$_POST['todate'];
$description=$_POST['description'];  
$status=0;
$isread=0;
if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO tblleaves(LeaveType,FromDate,ToDate,Description,Status,IsRead) VALUES('$leavetype','$fromdate','$todate','$description','$status','$isread')";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>DCJ-Apply Leave</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  
 


    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Apply for Leave</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                            <img src="assets/images/logo.jpg" class="circle" alt="">
                            <div class="col s8 m9">
                                <h1>DCJ - Leave Application</h1>
                            </div>
                        </div>
                                    <div>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
                                                            <div class="input-field col  s12">
<label for="staffcode"></label>
<input  name="staffcode" id="staffcode" value="<?php echo $result['StaffId'];?>" type="text" autocomplete="off" readonly required>
<span id="staffid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName"></label>
<input id="firstName" name="firstName" value="<?php echo $result['FirstName'];?>"  type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName"> </label>
<input id="lastName" name="lastName" value="<?php echo $result['LastName'];?>" type="text" autocomplete="off" required>
</div>

<div class="input-field col  s12">
<select  name="leavetype" autocomplete="off">
<option value="">Select leave type...</option>
<?php 
$sql = "SELECT  LeaveType from tblleavetype";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);

 ?>                                            
<option value="<?php echo $result['LeaveType'];?>"><?php echo $result['LeaveType'];?></option>
</select>
</div><?php ?>
<?php
$sql = "SELECT  * from tblleavetype";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
?>
<div class="input-field col m6 s12">
<label for="fromdate">From  Date</label>
<input placeholder="" id="mask1" name="fromdate" class="masked" type="text" data-inputmask="'alias': 'date'" required value="<?php echo $result['FromDate'];?>">
</div>
<div class="input-field col m6 s12">
<label for="todate">To Date</label>
<input placeholder="" id="mask1" name="todate" class="masked" type="text" data-inputmask="'alias': 'date'" required value="<?php echo $result['ToDate'];?>">
</div>
<div class="materialize-textarea col m12 s12">
<label for="discription">Description</label>    

<textarea id="textarea" name="description "  required value="<?php echo $result['Description'];?>"></textarea>
</div>
</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>    <?php ?>                                         

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
          <script src="assets/js/pages/form-input-mask.js"></script>
                <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>