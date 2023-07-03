        <!-- Sidebar -->
        
		
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-folder-user">WG</i>
                </div>
                <div class="sidebar-brand-text mx-3">Web GIS Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php if($_SESSION['aid']):?>


     <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span> <?php //echo $_SESSION['aid']; ?></a>
            </li>
	
		
	<?php /*  ?>
  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMD"
                    aria-expanded="true" aria-controls="collapseMD">
                    <i class="fas fa-fw fa-user-secret"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseMD" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manage-user.php">User</a>
						<a class="collapse-item" href="add-phlebotomist.php">Ruas</a>
						<a class="collapse-item" href="add-phlebotomist.php">Sub Ruas</a>
                        <a class="collapse-item" href="add-phlebotomist.php">Klausa Addendum</a>
						<a class="collapse-item" href="add-phlebotomist.php">Status Tracking</a>
						<a class="collapse-item" href="add-phlebotomist.php">Vendor</a>
						<a class="collapse-item" href="add-phlebotomist.php">Type Payment</a>
                    </div>
                </div>
            </li>
				<?php */  ?>
			<?php 
			
			
			
			
			
			
			?>
			
			
					
					
		

		
	  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContract"
                    aria-expanded="true" aria-controls="collapseContract">
                    <i class="fas fa-solid fa-folder-open"></i> 
                    <span>Transaction</span>
                </a>
                <div id="collapseContract" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manage-countdown.php">Countdown</a>
						<a class="collapse-item" href="">CCTV</a>
                        <a class="collapse-item" href="manage-legal.php">Legal</a>
						<a class="collapse-item" href="manage-padatkarya.php">Padat Karya</a>						
						<a class="collapse-item" href="manage-kurvas.php">Kurva S</a>
						<a class="collapse-item" href="">Struktur Organisasi</a>
					</div>
                </div>
            </li>
			<?php /* ?>
			
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAddendum"
                    aria-expanded="true" aria-controls="collapseAddendum">
                    <i class="fas fa-solid fa-folder-open"></i> 
                    <span>Addendum</span>
                </a>
                <div id="collapseAddendum" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manage-addendum.php">List</a>
                    </div>
                </div>
            </li>
			
			<?php */ ?>
					
	<?php /*  ?>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdd"
                    aria-expanded="true" aria-controls="collapseContract">
                    <i class="fas fa-solid fa-copy"></i> 
                    <span>Addendum</span>
                </a>
                <div id="collapseAdd" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="manage-addendum.php">List</a>
						<a class="collapse-item" href="add-kontrak.php">New  </a>
                         
                    </div>
                </div>
            </li>
		<?php */  ?>	
		
	<?php /*  ?>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBagian"
                    aria-expanded="true" aria-controls="collapseContract">
                    <i class="fas fa-fw fa-users"></i> 
                    <span>Section</span>
                </a>
                <div id="collapseBagian" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<?php $sql=mysqli_query($con,"select * from tblruas");
							while ($result=mysqli_fetch_array($sql)) {
							?>
							<a class="collapse-item" href="manage-kontrak.php"><?php echo $result['Initial'];?></a>
							<?php } ?>
                    </div>
                </div>
            </li>
			
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatusTracking"
                    aria-expanded="true" aria-controls="collapseContract">
                    <i class="fas fa-fw fa-bullhorn"></i> 
                    <span>Status</span>
                </a>
                <div id="collapseStatusTracking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<?php $sql=mysqli_query($con,"select * from tbladdendumtracking");
							while ($result=mysqli_fetch_array($sql)) {
							?>
							<a class="collapse-item" href="manage-kontrak.php"><?php echo $result['Nama'];?></a>
							<?php } ?>
                    </div>
                </div>
            </li>
			
  <?php */  ?>

<?php /*  ?>
<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdd"
                    aria-expanded="true" aria-controls="collapseContract">
                    <i class="fas fa-solid fa-copy"></i> 
                    <span>Tracking</span>
                </a>
                <div id="collapseAdd" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="search-tracking.php">Search Document</a>
                    </div>
                </div>
            </li>
			<?php */  ?>
			

 

<?php else:    ?>          
         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="live-test-updates.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                COVID19 Testing
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Testing</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-user-testing.php">New User</a>
                        <a class="collapse-item" href="registered-user-testing.php">Already Registered User</a>
                    </div>
                </div>
            </li>
 <li class="nav-item">
                <a class="nav-link" href="patient-search-report.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Test Report</span></a>
            </li>
         
<li class="nav-item active">
                <a class="nav-link" href="login.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span></a>
            </li>

<?php endif;    ?>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->