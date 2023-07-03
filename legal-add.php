<?php session_start();
//DB conncetion
include_once('includes/config.php');
include_once('includes/addon.php');

error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

$IdKontrak = intval($_GET['tid']);

//Code for add addendum
if(isset($_POST['AddAddendum'])){
	
//		 echo '<script>alert("Your test request submitted successfully. Order number is "+"'.intval($_GET['tid']).'")</script>';
	
//getting post values

$Idlegal = intval($_GET['tid']);
$date = $_POST['tanggal'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$adid=$_SESSION['aid'];




/*
$query="insert into tbladdendum(NoTrac,addKe,IdKontrak,NoAdd,Tanggal,Keterangan,CreatedBy) values('$NoTrac','$addKe','$IdKontrak','$NoAdd','$Tanggal','$Keterangan','$adid');";
*/

$query="INSERT INTO legaldetail (legal, date, nama, deskripsi, update_by, update_date) VALUES ('$Idlegal', '$date', '$nama', '$deskripsi', '$adid', current_timestamp());";




$result = mysqli_multi_query($con, $query);
if ($result) {
  echo '<script>alert("Your addendum successfully.")</script>';
  echo "<script>window.location.href='add_kontrak.php?tid='.$IdKontrak.</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='new-user-testing.php'</script>";
}

}

if(isset($_POST['EditAddendum'])){
	
$IdLegal = $_POST['idlegal'];
$IdAdd = $_POST['idlegaldetail'];

$NamaAdd = $_POST['namaadd'];
$Tanggal = $_POST['tanggaladd'];     	
$Keterangan = $_POST['ketadd'];

$query=mysqli_query($con,"UPDATE legaldetail SET date='$Tanggal',nama='$NamaAdd',deskripsi='$Keterangan' where ID ='$IdAdd'");


 echo '<script>alert("Your addendum Edit successfully")</script>';
 echo "<script>window.location.href='legal-add.php?tid=".$IdLegal."'</script>";
}



//delete addendum
If($_GET['action']=='delete'){    
	$id_addendum=intval($_GET['pid']);
	$query_select=mysqli_query($con,"select * from legaldetail where id='$id_addendum'");
	while($row=mysqli_fetch_array($query_select))
	{
		$query=mysqli_query($con, "delete from tbladdendum where id='$id_addendum'");	
		echo '<script>alert("Addendum deleted")</script>';	
	}
}



//Code for Assign to
if (isset($_POST['submit_klausa'])) {

$IdStatus=$_POST['assignto']; 
$Value=$_POST['ketklausa']; 
$IdAdd=$_GET['oid'];
	

$query="insert into tbladdendumdetail(IdStatus,Value,IdAdd) values('$IdStatus','$Value','$IdAdd');";
$result = mysqli_multi_query($con, $query);
if ($result) {
echo '<script>alert("Your klause added successfully")</script>';
    echo "<script>window.location.href='kontrak-details.php?tid='".$_GET['tid']."&&oid=".$_GET['oid']."</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='new-user-testing.php'</script>";
}



	
	
	
	}

//Code for Take Action
if (isset($_POST['takeaction'])) 
{
	
$orderid=intval($_GET['oid']);    
$status=$_POST['status'];
$remark=$_POST['remark'];
$rby=$_SESSION['aid'];
//For delivered Status
if($status=='Delivered'):
$uploadtime = date( 'd-m-Y h:i:s A', time ());
//For checking the image type
$reportfile=$_FILES["report"]["name"];
// get the image extension
$extension = substr($reportfile,strlen($reportfile)-4,strlen($reportfile));
// allowed extensions
$allowed_extensions = array(".doc",".pdf",".PDF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only doc / pdf format allowed');</script>";
}
else
{
//rename the image file
$newreportfile=md5($reportfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["report"]["tmp_name"],"reportfiles/".$newreportfile);
$query=mysqli_query($con,"insert into tblreporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update tbltestrecord set ReportStatus='$status',FinalReport='$newreportfile',ReportUploadTime='$uploadtime' where OrderNumber='$orderid'");
echo '<script>alert("Status updated successfully")</script>';
echo "<script>window.location.href='all-test.php'</script>";
}

// For other status
else:
$query=mysqli_query($con,"insert into tblreporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update tbltestrecord set ReportStatus='$status' where OrderNumber='$orderid'");
echo '<script>alert("Status updated successfully")</script>';
echo "<script>window.location.href='all-test.php'</script>";
endif;  

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

	<title>MC | Addendum Details</title>


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
					
					<?php $query=mysqli_query($con,"SELECT legal.id, ruas.initial, legal.category FROM legal INNER JOIN ruas ON legal.ruas = ruas.id where legal.id='".$_GET['tid']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($query)){?>
					<?php $reportstatus = $row['initial']."-".$row['category']; }?>
					
					
                    <h3 class="h3 mb-4 text-gray-900"><b> <?php echo $reportstatus;?> </b></h3>
					
					
					
					
					<div class="row">
						<div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Addendum Information</h6>
                                </div>
                                <div class="card-body">
                                 <table class="table table-bordered"  id="user_data" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th>Nama</th>
                                            <th>Tanggal</th>
											<th>Deskripsi</th>			
											<th></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

<?php $query=mysqli_query($con,"SELECT legaldetail.* FROM legaldetail INNER JOIN legal ON legaldetail.legal = legal.id where legal.ID='".$_GET['tid']."' ORDER BY legaldetail.update_date  ");

$cnt=1;
while($row=mysqli_fetch_array($query)){
?>

                                        <tr>
											<td><?php echo $row['nama'];?></td>
												
											</td>
											<td><?php echo tanggal($row['date']);?></td>
											<td><?php echo $row['deskripsi'];?></td>
											<td>
											<ul class="navbar-nav ml-auto">
													<li class="nav-item dropdown">
														<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
															role="button" data-toggle="dropdown" aria-haspopup="true"
															aria-expanded="false">
															<i class="fa fa-cog" title="Option"></i>
														</a>

														<div class="dropdown-menu dropdown-menu-right animated--fade-in"
															aria-labelledby="navbarDropdown">
																
															<a class="dropdown-item" href="legal-add.php?tid=<?php echo $_GET['tid'];?>&&pid=<?php echo $row['id'];?>&&action=edit">Edit Addendum</a>
															<div class="dropdown-divider"></div>
															
															<a class="dropdown-item" href="legal-add.php?tid=<?php echo $_GET['tid'];?>&&pid=<?php echo $row['ID'];?>&&action=delete" onclick="return confirm('Do you really want to delete this record?');">Delete Addendum</a> 
														
														</div>
													</li>
												</ul>											
											</td>
										</tr>
                               <?php 
							   $cnt++;	
							   } ?>
                                    
									
									
									</tbody>
                                </table>
                             
                                </div>
                            </div>

                        </div>
						
						
						<?php If($_GET['action']!='edit'){ 

					
						


						?> 
						<div class="col-lg-6">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Addendum </h6>
                                </div>
                                <div class="card-body">
   
								<form name="newaddendum" method="post">
									<div class="col-lg-12">				
										
										
										<div class="form-group">
											<label>Nama</label>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
										</div>
										<div class="form-group">
                                             <label>Tanggal Addendum</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" >
                                        </div>			
										<div class="form-group">
											<label>Deskripsi</label>
											<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
										</div>
								
										<div class="form-group">
											 <input type="submit" class="btn btn-primary btn-user btn-block" name="AddAddendum" value="Add Addendum" id="submit"> 
										 </div>
									</div>
								</form>
                                </div>
                            </div>
                        </div>
							<?php

							
							}?>
						
						
						
						<?php 
						
						//Edit addendum
						If($_GET['action']=='edit'){    
						$id_addendum=intval($_GET['pid']);
						$query_edit=mysqli_query($con,"SELECT legal.id as 'id_legal', legaldetail.id as 'id_legal_detail', legaldetail.nama, date, deskripsi FROM legaldetail INNER JOIN legal ON legaldetail.legal = legal.id where legaldetail.id='$id_addendum'");
						while($row=mysqli_fetch_array($query_edit))
						{
						
						?>
						
						<div class="col-lg-6" >
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Addendum </h6>
                                </div>
                                <div class="card-body">
								<form name="newaddendum" method="post">
									<div class="col-lg-12">				
										<div class="form-group">
											<label>Nomor </label>
											<input type="hidden" class="form-control" id="idlegal" name="idlegal" value="<?php echo $row[id_legal]; ?>" >
											
											<input type="hidden" class="form-control" id="idlegaldetail" name="idlegaldetail" value="<?php echo $row[id_legal_detail]; ?>" >
																						
											
											<input type="text" class="form-control" id="namaadd" name="namaadd" value="<?php echo $row[nama]; ?>" placeholder="">
										</div>
										<div class="form-group">
                                             <label>Tanggal </label>
                                            <input type="date" class="form-control" id="tanggaladd" name="tanggaladd" value="<?php echo $row[date]; ?>">
                                        </div>			
										<div class="form-group">
											<label>Keterangan</label>
											<textarea class="form-control" id="ketadd" name="ketadd" placeholder="Masukan keterangan"><?php echo $row[deskripsi]; ?></textarea>
										</div>								
										<div class="form-group">
											<div class="row">
										
											 <input type="submit" class="btn btn-primary btn-user btn-block" name="EditAddendum" value="Save Addendum" id="submit"> 
											
											</div>
											</div>
											<div class="form-group">
											<div class="row">
											<input type="button" class="btn btn-primary btn-user btn-block" value="Cancel" onclick="location.href='kontrak-add.php?tid=<?php echo $row[IdKontrak];?>'">		 
											</div>
										 </div>
									</div>
									
								</form>
 

        
                                    
                                </div>
                            </div>
                        </div>
						
						<?php } }?>
	
					
					
					</div>
<div class="row"></div>








                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
<?php include_once('includes/footer2.php');?>


<!-- Assign Modal -->
<div id="assignto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Assign Klausa</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    
	  <div class="modal-body">
        
<form method="post">
          <p>  
		   <div class="form-group">
							<label>Klausa</label>
		  
		  <script>
function val() {
    d = document.getElementById("combostatus").value;
    alert(d);
}



function ChangeInput() 
{	
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'valueCombo='+$("#combostatus").val(),
	type: "POST",
	success:function(data){
	$("#mobile-status").html(data);
	$("#loaderIcon").hide();
	},
	error:function (){}
	});
}


</script>
		  
		  <select class="form-control" onchange="ChangeInput()" name="assignto" id="combostatus" required="true">
            <option value="">Select</option>
            <?php $sql=mysqli_query($con,"select * from tblstatusaddendum");
            while ($result=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo $result['ID'];?>"><?php echo $result['Nama'];?></option>
        <?php } ?>
            </select>
			
			 <span id="mobile-status" style="font-size:12px;"></span>
			</div>
						 
			<div class="form-group">
				<label>Keterangan</label>
					<input type="text" class="form-control" id="ketklausa" name="ketklausa"  >				
            </div>
										
			
			</p>
            <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="submit_klausa" disabled=true id="submit_klausa">  </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>



<!-- Take Action Modal -->
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
          <p>  <select class="form-control" name="status" id="status" required="true">
            <option value="">Select Action</option>
  <?php 

  $query1=mysqli_query($con,"select ReportStatus from tbltestrecord where OrderNumber='$orderid'");
  while($result=mysqli_fetch_array($query1)):
$reportstatus=$result['ReportStatus'];
endwhile;
  ?>

            <?php if($reportstatus=='Assigned'):?>
            <option value="On the Way for Collection">On the Way for Collection</option>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='On the Way for Collection'):?>
            <option value="Sample Collected">Sample Collected</option>
            <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
            <?php elseif($reportstatus=='Sample Collected'):?>
             <option value="Sent to Lab">Sent to Lab</option>
            <option value="Delivered">Delivered</option>
             <?php elseif($reportstatus=='Sent to Lab'):?>
             <option value="Delivered">Delivered</option>
         <?php endif;?>

            </select></p>
       <p id='reportfile'> Report <span style="color:red; font-size:12px;">(Doc and PDF formate allowed)</span>    <input type="file" name="report" id="report"></p>
       <p>
<textarea name="remark" class="form-control" required="true" placeholder="Remark (Max 500 Characters)" maxlength="500" rows="5"></textarea>  </p> 
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="takeaction" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">

  //For report file
  $('#reportfile').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Delivered')
  {
  $('#reportfile').show();
  jQuery("#report").prop('required',true);  
  }
  else{
  $('#reportfile').hide();
  }
})}) 
</script>
</body>
</html>
<?php } ?>