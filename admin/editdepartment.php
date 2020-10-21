<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['update']))
{
$did=$_GET['deptid'];    
$deptname=$_POST['departmentname'];
$deptshortname=$_POST['departmentshortname'];
$deptcode=$_POST['deptcode'];   
$sql="UPDATE tbldepartments set DepartmentName='$deptname',DepartmentCode='$deptcode',DepartmentShortName='$deptshortname' where id='$did'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin-Update Department</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
  
        </style>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Update Department</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">

                                        <div class="row">
     <?php 
$did=$_GET['deptid'];
$sql = "SELECT * from tbldepartments WHERE id='$did'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_query($data);
      ?>  
                                            <div class="input-field col s12">
<input id="departmentname" type="text"  class="validate" autocomplete="off" name="departmentname" value="<?php echo $result['DepartmentName'];?>"  required>
                                                <label for="deptname">Department Name</label>
                                            </div>


          <div class="input-field col s12">
<input id="departmentshortname" type="text"  class="validate" autocomplete="off" value="<?php echo $result['DepartmentShortName'];?>" name="departmentshortname"  required>
                                                <label for="deptshortname">Department Short Name</label>
                                            </div>
  <div class="input-field col s12">
 <input id="deptcode" type="text" name="deptcode" class="validate" autocomplete="off" value="<?php echo $result['DepartmentCode'];?>" required>
                                                <label for="password">Department Code</label>
                                            </div>

<?php  ?>


<div class="input-field col s12">
<button type="submit" name="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

</div><?php ?>




                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                     
             
                   
                    </div>
                
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>