<?php
session_start();
include_once('includes/config.php');
include_once('includes/addon.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPDATE GIS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link href="css/timeline.css" rel="stylesheet">
	<link rel='stylesheet' href='https://assets.uits.iu.edu/css/rivet/1.6.0/rivet.min.css'>
	<link href="css/style-pulse.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      <!--  <a href="bwdates-report-ds.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>


<?php 
$totalcontract=0;
$totalvaluecontract=0;
$totallatecontract=0;
$totalonemonth=0;

///Total tests
//$query=mysqli_query($con,"select id from tblkontrak");
//$totalcontract=mysqli_num_rows($query);

///Total nilai kontrak
//$query=mysqli_query($con,"SELECT sum(NilaiAwal) FROM tblkontrak");
//$row=mysqli_fetch_row($query);
//$totalvaluecontract=$row[0];

///Total kontrak telat
//$query=mysqli_query($con,"SELECT AkhirKontrak,CURDATE() from tblkontrak WHERE AkhirKontrak < CURDATE()");
//$totallatecontract=mysqli_num_rows($query);

///Total kontrak telat 1 bulan ke depan
//$query=mysqli_query($con,"SELECT * FROM tblkontrak WHERE (tblkontrak.AwalKontrak BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH))");
//$totalonemonth=mysqli_num_rows($query);
 

/*
//Assigned tests
$query1=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Assigned'");
$totalassigned=mysqli_num_rows($query1);
//On the way for sample collection
$query2=mysqli_query($con,"select id from tbltestrecord where ReportStatus='On the Way for Collection'");
$totalontheway=mysqli_num_rows($query2);
//Sample Collected
$query3=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Sample Collected'");
$totalsamplecollected=mysqli_num_rows($query3);
//Sent for lab
$query4=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Sent to Lab'");
$totalsenttolab=mysqli_num_rows($query4);

//Report Delivered
$query5=mysqli_query($con,"select id from tbltestrecord where ReportStatus='Delivered'");
$totaldelivered=mysqli_num_rows($query5);

//Totall Registered Patients 
$query6=mysqli_query($con,"select id from tblpatients");
$totalpatients=mysqli_num_rows($query6); 

//Totall Registered Phlebotomist 
$query7=mysqli_query($con,"select id from tblphlebotomist");
$totalphlebotomist=mysqli_num_rows($query7);
*/
?>
<?php /*
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Tests-->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                              <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-virus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
						
						 
						
						
						
						
						  

                        <!-- On the way for sample collection-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                                            <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">  Total Contract</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                                </div>
                                                <div class="col">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>

                        <!-- Sample Collected -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                                            <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-prescription-bottle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

<!-- Sent to Lab -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                                            <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                             Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-microscope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
    <!-- Report Delivered-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                                          <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Total Contract</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                                </div>
                                                <div class="col">
                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>

 <!-- Total Registered Patients-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">


                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            <!-- Total Registered Phlebotomist-->
           
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                                                  <!--   <a href="all-test.php">-->
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                   
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                           Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltest;?></div>
                                        </div>

                                        <div class="col-auto"> 
                                            <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                        </div> 
                                    </div>
                                </div>
                                 </a>
                            </div>
                        </div>
                 
                    </div>
					
					*/?>
					
					
					<div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Contract</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalcontract;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
						
                            <div class="card border-left-success shadow h-100 py-2">
                               
								<div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Contract Value</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											<?php// echo $totalvaluecontract;?>
											<?php// echo denominasiRupiah($totalvaluecontract,1);?>
											 
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
								
								
                            </div>
							
							
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
						 <div class="pulse-button-red">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contract Will Expired 1 Month
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalonemonth;?></div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
						 <div class="pulse-button">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Late Contract </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totallatecontract;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>                       
					   </div>
						
						
						
						
                    </div>
					
					
					<div class="row">
					<div class="col-lg-6 mb-4">
							 <div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary"></h6>
								</div>
								 <div class="card-body">
									
								</div>	
							</div>
						</div>
						<?php /* ?>
					<div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Contract Based On Ruas</h6>
                                </div>
                                <div class="card-body">
                            		
									<h4 class="small font-weight-bold">Medan Binjai <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
									
                                    <h4 class="small font-weight-bold">Bakauheni - Terbanggi Besar <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
									<h4 class="small font-weight-bold">Pekanbaru - Dumai <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
									<h4 class="small font-weight-bold">Binjai - Langsa <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
									<h4 class="small font-weight-bold">Indralaya - Prabumulih <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php */?>

						<div class="col-md-6">
						<div class="card shadow mb-4">
						<div class="card-body">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
						
						<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
						
						
						<?php 
						
						?>
						
					
						
						
						
						
						
						
						<?php /*
						<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">										
						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
									<i class="badge badge-dot badge-dot-xl badge-warning"> </i>
								</span>
								<div class="vertical-timeline-element-content bounce-in">
									<h4 class="timeline-title">Discussion with team about new product launch</h4>
									<p>Yet another one, at <span class="text-success">5:00 PM</span></p>
									<span class="vertical-timeline-element-date">12:25 PM</span>
								</div>
							</div>
						</div>
						<div class="vertical-timeline-item vertical-timeline-element">
							<div>
								<span class="vertical-timeline-element-icon bounce-in">
								<i class="badge badge-dot badge-dot-xl badge-danger"> </i>
																		</span>
																		<div class="vertical-timeline-element-content bounce-in">
																			<h4 class="timeline-title">Discussion with team about new product launch</h4>
																			<p>meeting with team mates about the launch of new product. and tell them about new features</p>
																			<span class="vertical-timeline-element-date">6:00 PM</span>
																		</div>
																	</div>
																</div>
																<div class="vertical-timeline-item vertical-timeline-element">
																	<div>
																		<span class="vertical-timeline-element-icon bounce-in">
																			<i class="badge badge-dot badge-dot-xl badge-primary"> </i>
																		</span>
																		<div class="vertical-timeline-element-content bounce-in">
																			<h4 class="timeline-title text-success">Discussion with marketing team</h4>
																			<p>Discussion with marketing team about the popularity of last product</p>
																			<span class="vertical-timeline-element-date">9:00 AM</span>
																		</div>
																	</div>
																</div>
																<div class="vertical-timeline-item vertical-timeline-element">
																	<div>
																		<span class="vertical-timeline-element-icon bounce-in">
																			<i class="badge badge-dot badge-dot-xl badge-success"> </i>
																		</span>
																		<div class="vertical-timeline-element-content bounce-in">
																			<h4 class="timeline-title">Purchase new hosting plan</h4>
																			<p>Purchase new hosting plan as discussed with development team, today at <a href="javascript:void(0);" data-abc="true">10:00 AM</a></p>
																			<span class="vertical-timeline-element-date">10:30 PM</span>
																		</div>
																	</div>
																</div>
															</div>
															
															*/?>
															
															
															
															
															
															
															
															
														</div>
													</div>        
						   
						</div> 
					
					
					
					
					</div>
</div>

                    <!-- Content Row -->

              

             

            <!-- Footer -->
       <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
           <?php include_once('includes/footer2.php');?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
	
	

</body>

</html>
<?php } ?>