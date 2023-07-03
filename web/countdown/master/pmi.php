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
  
	$date1 = new DateTime("2022-04-01");
	$date2 = new DateTime();
	$interval = $date1->diff($date2);
  
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
