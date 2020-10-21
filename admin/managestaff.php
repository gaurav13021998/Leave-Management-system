<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "UPDATE tblstaff set Status='$status'  WHERE id='$id'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
header('location:manageemployee.php');


if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "UPDATE tblstaff set Status='$status'  WHERE id='$id'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
header('location:manageemployee.php');
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin Manage Staff</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
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
                        <div class="page-title">Manage Staff</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Staff Info</span>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Emp Id</th>
                                            <th>Full Name</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Reg Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT StaffId,FirstName,LastName,Department,Status,RegDate,id from  tblstaff";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
$i=1;
if($total !=" ")
{
while($result=mysqli_fetch_assoc($data))
{
?>
                                        <tr>
                                            <td> <?php echo $i;?></td>
                                            <td><?php echo $result['StaffId'];?></td>
                                            <td><?php echo $result['FirstName']." ".$result['LastName'];?></td>
                                            <td><?php echo $result['Department'];?></td>
                                            <td><?php $stats=$result['Status'];
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Active</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Inactive</a>
                                                 <?php } ?></td>
                                              
                                            <td><?php echo $result['RegDate'];?></td>
                                            <td><a href="editstaff.php?staffid=<?php echo $result['id'];?>"><i class="material-icons">mode_edit</i></a>
                                        <?php if($result['Status']==1)
 {?>
<a href="managestaff.php?inid=<?php echo $result['id'];?>" onclick="return confirm('Are you sure you want to inactive this Staff Account?');" > <i class="material-icons" title="Inactive">clear</i>
<?php } else {?>

                                            <a href="managestaff.php?id=<?php echo $result['id'];?>" onclick="return confirm('Are you sure you want to active this Staff Account?');"><i class="material-icons" title="Active">done</i>
                                            <?php } ?> </td>
                                        </tr>
                                         <?php $i++;}} ?>
                                    </tbody>
                                </table>
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
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        
    </body>
</html>