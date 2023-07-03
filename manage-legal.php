<?php session_start();
//DB conncetion
include_once('includes/config.php');
include_once('includes/addon.php');
error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for record deletion
if($_GET['action']=='delete'){    
$pid=intval($_GET['pid']);    
$query=mysqli_query($con, "delete from tbladdendum where id='$pid'");
echo '<script>alert("Contract deleted")</script>';
  echo "<script>window.location.href='manage-addendum.php'</script>";
}


//get ruas untuk ambil di tujukan
$adid=$_SESSION['aid'];
$ret1=mysqli_query($con,"select ruas.id as 'ruas_id' from user INNER JOIN ruas ON user.ruas = ruas.id where user.id='$adid'");
while($row1=mysqli_fetch_array($ret1)){
	$id_ruas = $row1['ruas_id'];
}




if (isset($_POST['takeaction'])) 
{
	$DocIdFrom = $_POST['contract'];
	echo "<script>window.location.href='legal-add.php?tid=".$DocIdFrom."'</script>";
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

    <title>UPDATE GIS | Manage Legal</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Manage Legal</h1>
    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
							
							<!-- 
							<button type="button" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#takeaction">New Addendum</button>-->
</h6>
							
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Ruas</th>
                                            <th>Category</th>
                                            <th>Awal</th>
											<th>Akhir</th>
											<th>Nama</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php
If ($id_ruas=='')
{
	$query=mysqli_query($con,"SELECT legal.id, ruas.ruas, legal.category, legal.start, legal.end, legal.nama FROM legal INNER JOIN ruas ON legal.ruas = ruas.id; ");
}
Else
{
	$query=mysqli_query($con,"SELECT legal.id, ruas.ruas, legal.category, legal.start, legal.end, legal.nama FROM legal INNER JOIN ruas ON legal.ruas = ruas.id Where ruas.id='".$id_ruas."'");
}	




$cnt=1;
while($row=mysqli_fetch_array($query)){
?>

                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                        
                                            <td> <?php echo $row['ruas'];?>	</td>
                                            <td><?php echo $row['category'];?></td>
                                            <td><?php echo tanggal($row['start']);?></td>
											<td><?php echo tanggal($row['end']);?></td>
												
										
											<td><a href="legal-add.php?tid=<?php echo $row['id'];?>"><?php echo $row['nama'];?></a></td>
											
										
										
											
											
										</tr>
                               <?php 
							   $cnt++;	
							   } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
    <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



<div id="takeaction" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Take Action</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data" >
          <p>  
			<select class="form-control" name="contract" id="contract" required="true">
				<option value="">Select Contract</option>
					<?php $sql=mysqli_query($con,"SELECT legal.id, ruas.ruas, legal.category FROM legal INNER JOIN ruas ON legal.ruas = ruas.id; ");
						while ($result=mysqli_fetch_array($sql)) {
						?>
						<option value="<?php echo $result['id'];?>"><?php echo $result['ruas']." - ".$result['category'];?></option>
						<?php } ?>
			</select>
			</p>
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="takeaction" id="submit" value="Create Addendum">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>







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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
<?php } ?>