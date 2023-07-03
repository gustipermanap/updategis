<?php
include_once('../../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Timeline</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/timeline.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/bullets.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<div id="chartdiv"></div>
<!-- partial -->

<script>

/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4plugins_timeline.SerpentineChart);
chart.curveContainer.padding(50, 20, 50, 20);
chart.levelCount =3;
chart.yAxisRadius = am4core.percent(25);
chart.yAxisInnerRadius = am4core.percent(-25);
chart.maskBullets = false;

var colorSet = new am4core.ColorSet();
colorSet.saturation = 0.5;


<?php 

//$initial='chlis';
$initial=$_GET['initial'];
$query_edit=mysqli_query($con,"SELECT * FROM legal ORDER BY category ASC;  ");
?>
  
 
chart.data = [ 
 
 {
	<?php $query_1=mysqli_query($con,"SELECT * FROM legal WHERE category='Konstruksi PPJT'; "); 
	while($row_1=mysqli_fetch_array($query_1))
	{
		echo '"category": "Konstruksi PPJT",
		"start1": "'.$row_1['start'].'",
		"end1": "'.$row_1['end'].'",
		"color": colorSet.getIndex(1),
		"task": "'.$row_1['nama'].'" '; 
	}
	?>
}, {
	<?php $query_1=mysqli_query($con,"SELECT * FROM legal WHERE category='Pengadaan Lahan PPJT'; "); 
	while($row_1=mysqli_fetch_array($query_1))
	{
	?>
	
    "category": "Pengadaan Lahan PPJT",
    "start2": "<?php echo $row_1['start']; ?>",  
    "end2": "<?php echo $row_1['end']; ?>", 
    "color": colorSet.getIndex(0),
    "task": "<?php echo $row_1['nama']; ?>"
	<?php }?>
},
{
	<?php $query_1=mysqli_query($con,"SELECT * FROM legal WHERE category='Kontrak Penyedia Jasa'; "); 
	while($row_1=mysqli_fetch_array($query_1))
	{
	?>
   "category": "Kontrak Penyedia Jasa",
    "start3": "<?php echo $row_1['start']; ?>", 
    "end3": "<?php echo $row_1['end']; ?>", 
    "color": colorSet.getIndex(0),
	"task": "<?php echo $row_1['nama']; ?>"
	<?php }?>
	
   
},

];


chart.dateFormatter.dateFormat = "dd-MM-yyyy";
chart.dateFormatter.inputDateFormat = "dd-MM-yyyy";
chart.fontSize = 11;

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.disabled = false;
categoryAxis.renderer.labels.template.paddingRight = 25;
categoryAxis.renderer.minGridDistance = 10;
categoryAxis.renderer.innerRadius = -60;
categoryAxis.renderer.radius = 60;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 70;
dateAxis.baseInterval = { count: 1, timeUnit: "day" };
dateAxis.renderer.tooltipLocation = 0;
dateAxis.startLocation = -0.5;
dateAxis.renderer.line.strokeDasharray = "1,4";
dateAxis.renderer.line.strokeOpacity = 0.6;
dateAxis.tooltip.background.fillOpacity = 0.2;
dateAxis.tooltip.background.cornerRadius = 5;
dateAxis.tooltip.label.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
dateAxis.tooltip.label.paddingTop = 7;

var labelTemplate = dateAxis.renderer.labels.template;
labelTemplate.verticalCenter = "middle";
labelTemplate.fillOpacity = 0.7;
labelTemplate.background.fill = new am4core.InterfaceColorSet().getFor("background");
labelTemplate.background.fillOpacity = 1;
labelTemplate.padding(7, 7, 7, 7);

let categories = ['Module #1', 'Konstruksi PPJT', 'Pengadaan Lahan PPJT', 'Kontrak Penyedia Jasa']

for(let i = 1; i < 4; i++) {
  let series = chart.series.push(new am4plugins_timeline.CurveColumnSeries());
series.columns.template.height = am4core.percent(20);
series.columns.template.tooltipText = "{task}: [bold]{openDateX}[/] sampai [bold]{dateX}[/]";

series.dataFields.openDateX = "start" + i;
series.dataFields.dateX = "end" + i;
series.dataFields.categoryY = "category";

series.columns.template.strokeOpacity = 50;
  series.name=categories[i];
}

chart.legend = new am4charts.Legend();




var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '-' + mm + '-' + yyyy ;
//today = yyyy + '-' + mm + '-' + dd ;
//document.write(today);


var eventSeries = chart.series.push(new am4plugins_timeline.CurveLineSeries());
eventSeries.dataFields.dateX = "eventDate";
eventSeries.dataFields.categoryY = "category";

eventSeries.data = [
<?php
	echo '{ category: "", eventDate: today, letter: "Today", description: "Tanggal Hari Ini " + today },';
?>	
                     
<?php 
	$query=mysqli_query($con,"SELECT legal.category,legaldetail.date,legaldetail.nama, legaldetail.deskripsi FROM legaldetail INNER JOIN legal ON legal.id = legaldetail.legal;");	
	while($row_detail=mysqli_fetch_array($query))
	{
		echo '{ category: "'.$row_detail['category'].'", eventDate: "'.$row_detail['date'].'", letter: "'.$row_detail['nama'].'", description: "'.$row_detail['deskripsi'].'" },'; 
	}
?>
];

eventSeries.strokeOpacity = 0;

var flagBullet = eventSeries.bullets.push(new am4plugins_bullets.FlagBullet())
flagBullet.label.propertyFields.text = "letter";
flagBullet.locationX = 0;
flagBullet.tooltipText = "{description}";

//chart.scrollbarX = new am4core.Scrollbar();
//chart.scrollbarX.align = "center"
//chart.scrollbarX.width = am4core.percent(85);

var cursor = new am4plugins_timeline.CurveCursor();
chart.cursor = cursor;
cursor.xAxis = dateAxis;
cursor.yAxis = categoryAxis;
cursor.lineY.disabled = true;
cursor.lineX.strokeDasharray = "1,4";
cursor.lineX.strokeOpacity = 1;

dateAxis.renderer.tooltipLocation2 = 0;
categoryAxis.cursorTooltipEnabled = false;

</script>


</body>
</html>
