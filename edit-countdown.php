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
$PPJT=$_POST['ppjt'];
$Contract=$_POST['contract'];
$PMI=$_POST['pmi'];
$Supervisi=$_POST['supervisi'];

$query="update countdown set ppjt='$PPJT',contract='$Contract',pmi='$PMI',supervisi='$Supervisi' where id='$ID'";



$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Edit successfully.")</script>';
  echo "<script>window.location.href='manage-countdown.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='manage-countdown.php'</script>";
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

    <title> Edit Countdown</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Edit Countdown</h1>

<?php

$id_user=$_GET['pid'];

$query_edit=mysqli_query($con,"SELECT countdown.id as 'id_countdown',ruas.ruas,countdown.ppjt,countdown.contract,countdown.pmi,countdown.supervisi FROM countdown INNER JOIN ruas ON countdown.ruas = ruas.id where countdown.id='$id_user'");
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
                                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                                </div>
                                <div class="card-body">
    
	
								<input type="hidden" id="id" name="id" value="<?php echo $row['id_countdown'];?>">
											
								<div class="form-group">
									<label> Name</label>
									<input disabled  class="form-control"  value="<?php echo $row['ruas'];?>" >
                                </div>
								         
								<div class="form-group">
									<label>PPJT</label>
                                    <input type="date" class="form-control" id="ppjt" name="ppjt" value="<?php echo $row['ppjt'];?>" required="true">
								</div>
								
								<div class="form-group">
									<label>Kontraktor</label>
                                    <input type="date" class="form-control" id="contract" name="contract" value="<?php echo $row['contract'];?>" required="true">
								</div>
								<div class="form-group">
									<label>PMI</label>
                                    <input type="date" class="form-control" id="pmi" name="pmi" value="<?php echo $row['pmi'];?>" required="true">
								</div>
								<div class="form-group">
									<label>Supervisi</label>
                                    <input type="date" class="form-control" id="supervisi" name="supervisi" value="<?php echo $row['supervisi'];?>" required="true">
								</div>
								
								

								<div class="form-group">
									 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">                           
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