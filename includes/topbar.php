<?php
include_once('includes/addon.php');
?>  
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
            <?php if($_SESSION['aid']):?>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
						


<?php                //Fetching admin Name
$adid=$_SESSION['aid'];
$ret1=mysqli_query($con,"select * from user where ID='$adid'");
while($row1=mysqli_fetch_array($ret1)){
	//$id_ruas = $row1['Ruas'];
		//$type_ruas = $row1['Type'];
}
?>
							
<?php 

$query2="";
$count2=0;


//$count=mysqli_num_rows($query);


//$count = $count+$count2;
//$count = 2;
?>


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php //echo $count;?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <?php if($count>0){
while($row=mysqli_fetch_array($query)){
                                    ?>
                                <a class="dropdown-item d-flex align-items-center" href="details.php?tid=<?php echo $row['ID'];?>&&idtrac=<?php echo $row['Id Tracking'];?>&&notif=yes">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo tanggalwaktu($row['AssignedTime']);?></div>
                                        <span class="font-weight">Alert from <b><?php echo $row['AdminName'];?></b> Contract Name <u><?php echo $row['Nama Kontrak'];?></u>  </span>
                                    </div>
                                </a>
                            <?php }

while($row2=mysqli_fetch_array($query2)){
                                    ?>
                                <a class="dropdown-item d-flex align-items-center" href="kontrak-add-klausa.php?id_add=<?php echo $row2['ID'];?>&&idtrac=<?php echo $row2['Tracking_add'];?>&&notif=yes">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo tanggalwaktu($row2['AssignedTime']);?></div>
                                        <span class="font-weight">Alert from <b><?php echo $row2['AdminName'];?></b> Addendum No. <u><?php echo $row2['NoAdd'];?></u>  </span>
                                    </div>
                                </a>
                            <?php }
														
							
							
							
							} else{?>
                                <p style="color:red">  no notif </p>
                            <?php } ?>
                            
							
								
                            </div>
                        </li>

                     

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                //Fetching admin Name
$adid=$_SESSION['aid'];
$ret1=mysqli_query($con,"select nama from user where ID='$adid'");
while($row1=mysqli_fetch_array($ret1)){

?>

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $row1['nama'];?></span>
                           <?php } ?>
                                <img class="img-profile rounded-circle"
                                    src="img/no-pict.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="change-password.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Change Password
                                </a>
                       
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                <?php endif;?>

                </nav>