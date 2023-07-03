<?php
include_once('../../includes/config.php');
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style-padat.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- 2017 Countdown - Simple JS, HTML, & CSS only -->

<?php

$initial=$_GET['initial'];

$query_edit=mysqli_query($con,"SELECT padat.id as 'id_padat',padat.tenaga_kerja,padat.hari_kerja_orang,padat.biaya,ruas.ruas FROM padat INNER JOIN ruas ON padat.ruas = ruas.id where ruas.initial='$initial';");


$num=mysqli_num_rows($query_edit);

while($row=mysqli_fetch_array($query_edit)){


?>


  
<body>
  <div class="countdown" id="js-countdown">
    

    
    <div class="countdown__item countdown__item--large" style="font-size:16px;" aria-labelledby="day-countdown" >
		<div class="countdown__timer js-countdown-days" style="background-color:#82DACA;opacity: 0.8;padding:2px;" aria-labelledby="day-countdown">
        <div style="font-size:10px;padding:1px;" aria-labelledby="day-countdown">Tenaga Kerja</div>
			
			<?php echo number_format($row['tenaga_kerja'],0,',','.') ; ?>
		<div style="font-size:10px;padding:0.1px;" >Orang</div>
      </div> 
	</div>
	
	<div class="countdown__item countdown__item--large" style="font-size:16px;" aria-labelledby="day-countdown" >
		<div class="countdown__timer js-countdown-days" style="background-color:#53CFE9;opacity: 0.8;padding:2px;" aria-labelledby="day-countdown">
        <div style="font-size:10px;padding:1px;" aria-labelledby="day-countdown">Hari Orang Kerja</div>
			
			<?php echo number_format($row['hari_kerja_orang'],0,',','.') ; ?>
		<div style="font-size:10px;padding:0.1px;" >Orang</div>
      </div> 
	</div>
	
	
	<div class="countdown__item countdown__item--large" style="font-size:16px;" aria-labelledby="day-countdown" >
       <div class="countdown__timer js-countdown-days" style="background-color:#EB6379;opacity: 0.8;padding:2px;" aria-labelledby="day-countdown">
        <div style="font-size:10px;padding:1px;" aria-labelledby="day-countdown">Biaya</div>
			<?php echo number_format($row['biaya'],0,',','.') ; ?>
	   <div style="font-size:10px;padding:1px;" aria-labelledby="day-countdown">Juta Rupiah</div>  
      </div> 
	</div>
   
   
    </div>
  </div>
  
<?php }?>
</body>

  <!--  
//[15:40, 07/01/2022] Efri: kontrak sd 8 maret 2022
[15:41, 07/01/2022] Efri: ppjt sd des 2022
  -->
  


<!-- 2013 Countdown -->
<!-- <body>
  <form class="countdown" name="countDown">
    <input size="4" name="daysLeft" />
    <hr class="soft">
    <h3>Days</h3>
    <hr class="soft">
    <span class="bottom_time"><input size="3"  name="hrLeft" /></span>
    <span class="bottom_time"><input size="3"  name="minLeft" /></span>
    <span class="bottom_time"><input size="3"  name="secLeft" /></span>
    <ul>
      <li>Hrs</li>
      <li>Min</li>
      <li>Sec</li>
    </ul>
  </form>
</body> -->
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
