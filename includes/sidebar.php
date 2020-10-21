     <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/images.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <?php
include('includes/config.php');
$username=$_SESSION['username'];
$query= "SELECT FirstName,LastName,StaffId from  tblstaff";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
     ?>
                    <p><?php echo $result['FirstName']." ".$result['LastName'];?></p>
                                <span><?php echo $result['StaffId']?></span>
                         
                        </div>
                    </div><?php ?>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
  <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>My Profiles</a></li>
  <li class="no-padding"><a class="waves-effect waves-grey" href="staff-changepassword.php"><i class="material-icons">settings</i>Change Password</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Apply Leave</a></li>
                                <li><a href="leavehistory.php">Leave History</a></li>
                            </ul>
                        </div>
                    </li>



                  <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>


                </ul>
                <div class="footer">
                    <p class="copyright"><a href=""> DCJ</a>©</p>

                </div>
                </div>
            </aside>
