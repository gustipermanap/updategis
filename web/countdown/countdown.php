<?php
include_once('../../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style-countdown.css">

</head>
<body>


<?php 


$initial=$_GET['initial'];
$tipe=$_GET['tipe'];
//updategis/web/countdown/countdown.html?initial=Sigbanceh&tipe=supervisi
//echo $_GET['tipe'];


$query_edit=mysqli_query($con,"SELECT ruas.initial ,ruas.ruas,countdown.ppjt,countdown.contract,countdown.pmi,countdown.supervisi FROM countdown INNER JOIN ruas ON countdown.ruas = ruas.id where ruas.initial='$initial'");


$num=mysqli_num_rows($query_edit);

while($row=mysqli_fetch_array($query_edit)){
	
    //echo $row['ppjt'];
   
	$date1 = new DateTime('now');
   
	IF ($tipe=="ppjt")
		{
			$date1 = new DateTime($row['ppjt']);
		}
	Else IF ($tipe=="contract")
		{
			$date1 = new DateTime($row['contract']);
			//echo "masuk contract";
		}
	Else IF ($tipe=="pmi")
		{
			$date1 = new DateTime($row['pmi']);
			//echo "masuk pmi";
			}
	Else IF ($tipe=="supervisi")
		{
			$date1 = new DateTime($row['supervisi']);
			//echo "masuk supervisi";
		}

	
	$date2 = new DateTime();
	$interval = $date1->diff($date2);

}
  
  ?>
  
<body>
  <div class="countdown" id="js-countdown">
    <div class="countdown__item countdown__item--large">
      <div class="countdown__timer js-countdown-days" aria-labelledby="day-countdown">
        <?php echo $interval->days;?>
      </div>
      <div class="countdown__label"  id="day-countdown"> Days</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-hours" aria-labelledby="hour-countdown">
         <?php echo $interval->y;?>
      </div>
      
      <div class="countdown__label" id="hour-countdown">Tahun</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-minutes" aria-labelledby="minute-countdown">
         <?php echo $interval->m;?>
      </div>
      
      <div class="countdown__label" id="minute-countdown">Bulan</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-seconds" aria-labelledby="second-countdown">
         <?php echo $interval->d-1;?>
      </div>
      
      <div class="countdown__label" id="second-countdown">Hari</div>
    </div>
  </div>
</body>

  <script  src="./script.js"></script>

</body>
</html>
