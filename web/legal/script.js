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

chart.data = [ {
    "category": "Konstruksi PPJT",
    "start1": "01-10-2019",
    "end1": "31-12-2022",
    "color": colorSet.getIndex(1),
    "task": "Pekerjaan Konstruksi"    
}, {
    "category": "Pengadaan Lahan PPJT",
    "start2": "01-10-2019",  
    "end2": "31-12-2021", 
    "color": colorSet.getIndex(0),
    "task": "Simpang Indralaya - Prabumulih"
},
{
    "category": "", //belum
    "start4": "21-01-2001",
    "end4": "21-01-2010",
    "disabled1":false,
    "image1":".icon/here.png"
},
{
    "category": "Kontrak Penyedia Jasa",
    "start3": "31-07-2019", //30/11/2018
    "end3": "29-05-2022", //15.08.2022
    "color": colorSet.getIndex(0),
	"task": "Kontrak HKI"
}];

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
	
	{ category: "Kontrak Penyedia Jasa", eventDate: "08-12-2020", letter: "Addendum I", description: "PBJT/FE.2857Q/S.Perj.237L/XII/2020" },
	{ category: "Kontrak Penyedia Jasa", eventDate: "22-01-2021", letter: "Addendum II", description: "PBJT/FE.146/S.Perj.15/I/2021" },
	{ category: "Kontrak Penyedia Jasa", eventDate: "19-04-2021", letter: "Addendum III", description: "PJT/FE.649/S.perj.62/IV/2021" },
         
         { category: "Kontrak Penyedia Jasa", eventDate: "14-06-2021", letter: "Addendum IV", description: "PJT/FE.967D/S.Perj.96A/VI/2021" },
         //{ category: "Kontrak Penyedia Jasa", eventDate: "19-04-2021", letter: "Addendum V", description: "No: PJT/FE.648/BA.76/IV/2021" },
         { category: "Kontrak Penyedia Jasa", eventDate: "17-12-2021", letter: "Addendum VI", description: "PJT/FE.2036/S.Perj.249/XII/2021" },
         { category: "Kontrak Penyedia Jasa", eventDate: "29-12-2021", letter: "Addendum VI", description: "PJT/FE.2107/S.Perj.265/XII/2021" },            
                     
                     
	//{ category: "Pengadaan Lahan PPJT", eventDate: "2021-10-18", letter: "SPMK II", description: "No. SPMK : 13/BPJT/SPMK/P/JL.01.03/2021" },
	{ category: "", eventDate: today, letter: "Today", description: "Tanggal Hari Ini " + today },
	{ category: "Konstruksi PPJT", eventDate: "09-07-2019", letter: "Amandemen I", description: "" },
	{ category: "Konstruksi PPJT", eventDate: "23-10-2020", letter: "Amandemen II", description: "" },
	{ category: "Konstruksi PPJT", eventDate: "11-05-2021", letter: "Amandemen III", description: "" },
	//{ category: "Konstruksi PPJT", eventDate: "01-05-2021", letter: "Operation Seksi Blang Bintang - Kutobaro", description: "" },
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