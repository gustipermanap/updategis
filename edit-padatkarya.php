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
$tenaga_kerja=$_POST['tenaga_kerja'];
$hari_kerja_orang=$_POST['hari_kerja_orang'];
$biaya=$_POST['biaya'];

$query="update padat set tenaga_kerja='$tenaga_kerja',hari_kerja_orang='$hari_kerja_orang',biaya='$biaya' where id='$ID'";



$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Edit successfully.")</script>';
  echo "<script>window.location.href='manage-padatkarya.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='manage-padatkarya.php'</script>";
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

    <title> Edit Padat Karya</title>

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

$query_edit=mysqli_query($con,"SELECT padat.id as 'id_padat',padat.tenaga_kerja,padat.hari_kerja_orang,padat.biaya,ruas.ruas FROM padat INNER JOIN ruas ON padat.ruas = ruas.id where padat.id='$id_user'");
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
    
	
								<input type="hidden" id="id" name="id" value="<?php echo $row['id_padat'];?>">
											
								<div class="form-group">
									<label> Name</label>
									<input disabled  class="form-control"  value="<?php echo $row['ruas'];?>" >
                                </div>
								         
								<div class="form-group">
									<label>Tenaga Kerja</label>
                                    <input type="text" class="form-control" id="tenaga_kerja" name="tenaga_kerja" value="<?php echo $row['tenaga_kerja'];?>" required="true">
								</div>
								<div class="form-group">
									<label>Hari Kerja Orang</label>
                                    <input type="text" class="form-control" id="hari_kerja_orang" name="hari_kerja_orang" value="<?php echo $row['hari_kerja_orang'];?>" required="true">
								</div>
								<div class="form-group">
									<label>Biaya</label>
                                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo $row['biaya'];?>" required="true">
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