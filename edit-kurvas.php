<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
{
//getting post values


$ID=$_POST['id'];
$ruas=$_POST['ruas'];
$bulantahun=$_POST['bulantahun'];
$temp=explode("-", $bulantahun);
$tahun = $temp[0];
$bulan = $temp[1];

$CreatedBy=$_SESSION['aid'];
$plan = $_POST['rencana'];
$actual = $_POST['realisasi'];


$query="update scurve set plan='$plan',actual='$actual', update_by='$CreatedBy' where id='$ID'";


$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Edit successfully.")</script>';
  echo "<script>window.location.href='manage-kurvas.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='edit-kurvas.php?pid='".$ID."</script>";
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

    <title> Edit Kurva S</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Edit Kurva S</h1>

<?php

$id_kurva=$_GET['pid'];

$query_edit=mysqli_query($con,"SELECT scurve.id as 'scurve_id', ruas.id as 'ruas_id',ruas.ruas, bulan, tahun, plan, actual FROM scurve INNER JOIN ruas ON scurve.ruas = ruas.id where scurve.id='$id_kurva'");
$num=mysqli_num_rows($query_edit);
//echo $num;
?>

<form method="post">
					<div class="row">
	<?php while($row=mysqli_fetch_array($query_edit)){ ?>
	
                        <div class="col-lg-12">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kurva S</h6>
                                </div>
                                <div class="card-body">
    
	
								<input type="hidden" id="id" name="id" value="<?php echo $row['scurve_id'];?>">
											
								 <div class="form-group">
                                              <label>Ruas</label>
											  	<select disabled=disabled class="form-control" name="ruas" id="ruas" required="true">	
													<option value="">Select</option>
													<?php $sql=mysqli_query($con,"select * from ruas");
													while ($result=mysqli_fetch_array($sql)) {
													if ($result['id']==$row['ruas_id']){
													?>
													<option selected="selected" value="<?php echo $result['ID'];?>"><?php echo $result['ruas'];?></option>
													<?php }else {?>
													<option value="<?php echo $result['ID'];?>"><?php echo $result['ruas'];?></option> <?php } } ?>
												</select>
                                        </div>
								         
								<div class="form-group">
									<label>Bulan - Tahun</label>
                                    <label> </label>
									<input type="text" disabled=disabled class="form-control" id="rencana" name="rencana" value="<?php echo $row['bulan']."-".$row['tahun'];?>" required="true">
								</div>
								
								<div class="form-group">
									<label>Nilai Rencana</label>
                                    <input type="number" class="form-control" id="rencana" name="rencana" value="<?php echo $row['plan'];?>" required="true">
								</div>
								<div class="form-group">
									<label>Nilai Realisasi</label>
                                    <input type="number" class="form-control" id="realisasi" name="realisasi" value="<?php echo $row['actual'];?>" required="true">
								</div>
								
								

								<div class="form-group">
									 <input type="submit" class="btn btn-primary btn-user btn-block" value="Save" name="submit" id="submit">                           
								 </div>                                        

                                </div>
                            </div>

                        </div>
						   <?php } ?>
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
           <?php include_once('includes/footer2.php');?>



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