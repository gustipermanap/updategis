<?php 
session_start();
error_reporting(0);
//DB conncetion
include_once('includes/config.php');


include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit'])){

$NewId= mt_rand(10000, 99999);
	
//getting post values
$ruas=$_POST['ruas'];

$bulantahun=$_POST['bulantahun'];
$temp=explode("-", $bulantahun);
$tahun = $temp[0];
$bulan = $temp[1];

//echo '<script>alert("Order number is "+"'.$bulan.'")</script>';
//echo '<script>alert("Order number is "+"'.$tahun.'")</script>';

$CreatedBy=$_SESSION['aid'];
$plan = $_POST['rencana'];
$actual = $_POST['realisasi'];

$query="Insert into scurve(id,ruas,bulan,tahun,plan,actual,update_by) values('$NewId','$ruas','$bulan','$tahun','$plan','$actual','$CreatedBy');";


$result = mysqli_multi_query($con, $query);
if ($result) {
echo '<script>alert("Your data created successfully.")</script>';
  echo "<script>window.location.href='manage-kurvas.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='add-kurvas.php'</script>";
}


}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Data Kurva S</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}

</style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php include_once('includes/sidebar.php');?>

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
                     <h1 class="h3 mb-4 text-gray-800">New Data</h1>
<form name="newtesting" method="post">
  <div class="row">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                
                                <div class="card-body">

										 <div class="form-group">
                                              <label>Ruas</label>
											  	<select class="form-control" name="ruas" id="ruas" required="true">
													<option value="">Select</option>
													<?php $sql=mysqli_query($con,"select * from ruas");
													while ($result=mysqli_fetch_array($sql)) {
													?>
													<option value="<?php echo $result['id'];?>"><?php echo $result['ruas'];?></option>
													<?php } ?>
												</select>
                                        </div>
                                        
							 									
										
										
                        <div class="form-group">
							<label>Bulan & Tahun</label>									
									<input type="month"  class="form-control" id="bulantahun" name="bulantahun" required="true">  </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                           <div class="card shadow mb-4">
                               
                                <div class="card-body">
                          				
										<div class="form-group">
                                             <label>Nilai Rencana</label>
												<input type="number" class="form-control" id="rencana" name="rencana" placeholder="Masukan nilai rencana" required="true" >
                                               
                                        </div>	
										<div class="form-group">
                                             <label>Nilai Realisasi</label>
												<input type="number" class="form-control" id="realisasi" name="realisasi" placeholder="Masukan nilai realisasi" required="true" >
                                               
                                        </div>	
									

								<div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Save">                           
                             </div>
							 
                                </div>
                            </div>
                       

                        </div>

                    </div>
</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php } ?>