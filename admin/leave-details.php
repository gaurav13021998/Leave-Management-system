<?php
session_start();
error_reporting(0);
include('includes/config.php');
$isread=1;
$lid=$_GET['leaveid'];  
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="UPDATE tblleaves set IsRead='$isread' where id='$lid'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);



if(isset($_POST['update']))
{ 
$lid=$_GET['leaveid'];
$description=$_POST['description'];
$status=$_POST['status'];   
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="UPDATE tblleaves set AdminRemark='$description',Status='$status',AdminRemarkDate='$admremarkdate' where id='$lid'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin-Leave Details </title>
        
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

                <link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>  
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
                        <div class="page-title" style="font-size:24px;">Leave Details</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave Details</span>
                    
                                <table id="example" class="display responsive-table ">
                               
                                 
                                    <tbody>
<?php 
$lid=$_GET['lid'];
$sql= "SELECT tblleaves.id,tblstaff.FirstName,tblstaff.LastName,tblstaff.StaffId,tblstaff.id,tblstaff.Gender,tblstaff.Phonenumber,tblstaff.EmailId,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join tblstaff on tblleaves.staffid=tblstaff.id where tblleaves.id='$lid'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
$cnt=1;
      ?>  
                                        
                                        <tr>
                                            <td style="font-size:16px;"> <b>Staff Name :</b></td>
                                              <td><a href="editstaff.php?staffid=<?php echo $result['id'];?>" target="_blank">
                                                <?php echo $result['FirstName']." ".$result['LastName'];?></a></td>
                                              <td style="font-size:16px;"><b>Staff Id :</b></td>
                                              <td><?php echo $result['StaffId'];?></td>
                                              <td style="font-size:16px;"><b>Gender :</b></td>
                                              <td><?php echo $result['Gender'];?></td>
                                          </tr>

                                          <tr>
                                             <td style="font-size:16px;"><b>Staff Email id :</b></td>
                                            <td><?php echo $result['EmailId'];?></td>
                                             <td style="font-size:16px;"><b>Staff Contact No. :</b></td>
                                            <td><?php echo $result['Phonenumber'];?></td>
                                            <td>&nbsp;</td>
                                             <td>&nbsp;</td>
                                        </tr>

  <tr>
                                             <td style="font-size:16px;"><b>Leave Type :</b></td>
                                            <td><?php echo $result['LeaveType'];?></td>
                                             <td style="font-size:16px;"><b>Leave Date . :</b></td>
                                            <td>From <?php echo $result['FromDate'];?> to <?php echo $result['ToDate'];?></td>
                                            <td style="font-size:16px;"><b>Posting Date</b></td>
                                           <td><?php echo $result['PostingDate'];?></td>
                                        </tr>

<tr>
                                             <td style="font-size:16px;"><b> Leave Description : </b></td>
                                            <td colspan="5"><?php echo $result['Description'];?></td>
                                          
                                        </tr>

<tr>
<td style="font-size:16px;"><b>leave Status :</b></td>
<td colspan="5"><?php $stats=$result['Status'];
if($stats==1){
?>
<span style="color: green">Approved</span>
 <?php } if($stats==2)  { ?>
<span style="color: red">Not Approved</span>
<?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>
</td>
</tr>

<tr>
<td style="font-size:16px;"><b>Admin Remark: </b></td>
<td colspan="5"><?php
if($result['AdminRemark']==""){
  echo "waiting for Approval";  
}
else{
echo $result['AdminRemark'];
}
?></td>
 </tr>

 <tr>
<td style="font-size:16px;"><b>Admin Action taken date : </b></td>
<td colspan="5"><?php
if($result['AdminRemarkDate']==""){
  echo "NA";  
}
else{
echo $result['AdminRemarkDate'];
}
?></td>
 </tr>
<?php 
if($stats==0)
{

?>
<tr>
 <td colspan="5">
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Take Action</a>
<form name="adminaction" method="post">
<div id="modal1" class="modal modal-fixed-footer" style="height: 60%">
    <div class="modal-content" style="width:90%">
        <h4>Leave take action</h4>
          <select class="browser-default" name="status" required="">
                                            <option value="">Choose your option</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Not Approved</option>
                                        </select></p>
                                        <p><textarea id="textarea1" name="description" class="materialize-textarea" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
    </div>
    <div class="modal-footer" style="width:90%">
       <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">
    </div>

</div>   

 </td>
</tr>
<?php } ?>
   </form>                                     </tr>
                                         <?php $cnt++;?>
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
         <script src="assets/js/pages/ui-modals.js"></script>
        <script src="assets/plugins/google-code-prettify/prettify.js"></script>
        
    </body>
</html>