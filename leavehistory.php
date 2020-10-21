<?php
session_start();
error_reporting(0);
include('includes/config.php');
$query = "SELECT * from tblleaves";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
$cnt=1;
          
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>DCJ-Leave History</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Leave History</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave History</span>
                                
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="120">Leave Type</th>
                                            <th>From</th>
                                            <th>To</th>
                                             <th>Description</th>
                                             <th width="120">Posting Date</th>
                                            <th width="200">Admin Remak</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
<?php 
$query = "SELECT * from tblleaves";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
$cnt=1;
         ?>  
                                 
                                    <tbody>

                                        <tr>
                                            <td> <?php echo $cnt;?></td>
                                            <td><?php echo $result['LeaveType'];?></td>
                                            <td><?php echo $result['ToDate'];?></td>
                                            <td><?php echo $result['FromDate'];?></td>
                                           <td><?php echo $result['Description'];?></td>
                                            <td><?php echo $result['PostingDate'];?></td>
                                            <td><?php if($result['AdminRemark']=="")
                                            {
echo 'waiting for approval';
                                            } else
{

 echo ($result['AdminRemark']." "."at"." ".$result['AdminRemarkDate']);
}
                                            

                                           ?> </td>
                                                                            <td><?php $stats=$result['Status'];
                                             
                                                 ?><span style="color: green">Approved</span>
                
                                                <span style="color: red">Not Approved</span>
 <span style="color: blue">waiting for approval</span>

                                             </td>
          
                                        </tr>
                                         <?php $cnt++ ; ?>
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
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        
    </body>
</html>
