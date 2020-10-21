<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE id from  tbldepartments  WHERE id='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
}
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin-Manage Departments</title>
        
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
                        <div class="page-title">Manage Departments</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Departments Info</span>
                                 
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Dept Name</th>
                                            <th>Dept Short Name</th>
                                            <th>Dept Code</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php
$query = "SELECT * from tbldepartments";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
$i=1;
if($total !=" ")
{
while($result=mysqli_fetch_assoc($data))
{
           ?>  
                                        <tr>
                                            <td> <?php echo $i;?></td>
                                            <td><?php echo $result['DepartmentName'];?></td>
                                            <td><?php echo $result['DepartmentShortname'];?></td>
                                            <td><?php echo $result['DepartmentCode'];?></td>
                                            <td><?php echo $result['CreationDate'];?></td>
                                            <td><a href="editdepartment.php?deptid=<?php echo $result['id'];?>"><i class="material-icons">mode_edit</i></a><a href="managedepartments.php?del=<?php echo $result['id'];?>" onclick="return confirm('Do you want to delete');"> <i class="material-icons">delete_forever</i></a></td>
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