<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION["stafflogin"]==true)
{
if(isset($_POST['update']))
{
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$query="UPDATE tblstaff set FirstName='$fname',LastName='$lname',Gender='$gender',Dob='$dob',Department='$department',Address='$address',City='$city',Country='$country',Phonenumber='$mobileno'";
$data= mysqli_query ($conn,$query);
$result=mysqli_fetch_assoc($data);
}
else
{
    header('location: index.php');
}
}
if(isset($_POST['update']))
{
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$query="UPDATE tblstaff set FirstName='$fname',LastName='$lname',Gender='$gender',Dob='$dob',Department='$department',Address='$address',City='$city',Country='$country',Phonenumber='$mobileno'";
$data= mysqli_query ($conn,$query);
$result=mysqli_fetch_assoc($data);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Update staff</title>
        
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
                        <div class="card-title center">Update staff</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3>Update staff Info</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
<?php 
$sid=$_POST['StaffId'];
$query= "SELECT * from  tblstaff";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
            ?> 

 <div class="input-field col  s12">
<label for="staffcode">Staff Code</label>
<input  name="staffcode" id="staffcode" value="<?php echo $result['StaffId'];?>" type="text" autocomplete="off" readonly required>
<span id="staffid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" value="<?php echo $result['FirstName'];?>"  type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name </label>
<input id="lastName" name="lastName" value="<?php echo $result['LastName'];?>" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" value="<?php echo $result['EmailId'];?>" readonly autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" value="<?php echo $result['Phonenumber'];?>" maxlength="10" autocomplete="off" required>
 </div>

</div>
</div>
                                                    
<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="<?php echo $result ['Gender'];?>"><?php echo $result ['Gender'];?></option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
<label for="birthdate">Date of Birth</label>
<div class="input-field col m6 s12">

<input id="birthdate" name="dob"  class="datepicker" value="<?php echo $result ['Dob'];?>" >
</div>

                                                    

<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="<?php echo $result['Department'];?>"><?php echo $result ['Department'];?></option>
<?php
 $query = "SELECT DepartmentName from tbldepartments";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
?>          
<option value="<?php echo $result['DepartmentName'];?>"><?php echo $result['DepartmentName'];?></option>
</select>
</div>
<?php 
$query= "SELECT * from  tblstaff ";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
            ?> 
<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text"  value="<?php echo $result['Address'];?>" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text"  value="<?php echo $result['City'];?>" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text"  value="<?php echo $result['Country'];?>" autocomplete="off" required>
</div>

                                                        
                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid()">UPDATE</button>

</div><?php ?><?php ?>

                                                        </div>
                                                    </div>
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
        
    </body>
</html>