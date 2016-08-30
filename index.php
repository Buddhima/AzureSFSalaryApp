<!DOCTYPE HTML>
<html>

<head>  
<script type="text/javascript">

	

	window.onload = function () {

		// averaged total get request
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                responseObj = JSON.parse(xmlhttp.responseText);

                var average_total = responseObj[0][""];
				var options = {
					useEasing : true, 
					useGrouping : true, 
					separator : ',', 
					decimal : '.', 
					prefix : '$', 
					suffix : '' 
				};
				var demo = new CountUp("countUpElement", 1000, average_total, 0, 2.5, options);
				demo.start();

            }
        };
        xmlhttp.open("GET", "dbconnect.php?option=average_total", true);
        xmlhttp.send();


        // top 5 job titles
		var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                responseObj = JSON.parse(xmlhttp2.responseText);

                var chart = new CanvasJS.Chart("topChartContainer", {

					title:{
						text:"Top 5 Job Titles"				

					},
		            animationEnabled: true,
					axisX:{
						interval: 1,
						gridThickness: 0,
						labelFontSize: 10,
						labelFontStyle: "normal",
						labelFontWeight: "normal",
						labelFontFamily: "Lucida Sans Unicode"

					},
					axisY2:{
						interlacedColor: "rgba(1,77,101,.2)",
						gridColor: "rgba(1,77,101,.1)"

					},

					data: [
					{     
						type: "bar",
		                name: "companies",
						axisYType: "secondary",
						color: "#014D65",				
						dataPoints: [
						
							{y: parseFloat(responseObj[4]["total_pay"]), label: responseObj[4]["job_title"]  },
							{y: parseFloat(responseObj[3]["total_pay"]), label: responseObj[3]["job_title"]  },
							{y: parseFloat(responseObj[2]["total_pay"]), label: responseObj[2]["job_title"]  },
							{y: parseFloat(responseObj[1]["total_pay"]), label: responseObj[1]["job_title"]  },
							{y: parseFloat(responseObj[0]["total_pay"]), label: responseObj[0]["job_title"]  }
						]
					}
					
					]
				});

				chart.render();

            }
        };
        xmlhttp2.open("GET", "dbconnect.php?option=top_five_total", true);
        xmlhttp2.send();


		// bottom 5 job titles
		var xmlhttp3 = new XMLHttpRequest();
        xmlhttp3.onreadystatechange = function() {
            if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
                responseObj = JSON.parse(xmlhttp3.responseText);

                var chart = new CanvasJS.Chart("bottomChartContainer", {

					title:{
						text:"Bottom 5 Job Titles"				

					},
		            animationEnabled: true,
					axisX:{
						interval: 1,
						gridThickness: 0,
						labelFontSize: 10,
						labelFontStyle: "normal",
						labelFontWeight: "normal",
						labelFontFamily: "Lucida Sans Unicode"

					},
					axisY2:{
						interlacedColor: "rgba(1,77,101,.2)",
						gridColor: "rgba(1,77,101,.1)"

					},

					data: [
					{     
						type: "bar",
		                name: "companies",
						axisYType: "secondary",
						color: "#014D65",				
						dataPoints: [
						
							{y: parseFloat(responseObj[4]["total_pay"]), label: responseObj[4]["job_title"]  },
							{y: parseFloat(responseObj[3]["total_pay"]), label: responseObj[3]["job_title"]  },
							{y: parseFloat(responseObj[2]["total_pay"]), label: responseObj[2]["job_title"]  },
							{y: parseFloat(responseObj[1]["total_pay"]), label: responseObj[1]["job_title"]  },
							{y: parseFloat(responseObj[0]["total_pay"]), label: responseObj[0]["job_title"]  }
						]
					}
					
					]
				});

				chart.render();

            }
        };
        xmlhttp3.open("GET", "dbconnect.php?option=bottom_five_total", true);
        xmlhttp3.send();

		
	}

</script>
<script type="text/javascript" src="js/countUp.min.js"></script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="page-header">
	    <h1>San Francisco <small>Average annual income of job titles in 2015</small></h1>
	</div>
	
	<div id="chartContainer" style="height: 400px; width: 100%; font-size: 76px;" class="text-center">
		<h1>Annully</h1>
		<ww id="countUpElement" style="font-size: 110px;">$1,000</ww>
		<h1>in average per employee</h1>
	</div>

	<div id="topChartContainer" style="height: 300px; width: 100%;">
	</div>

	<div id="spacer" style="height: 150px;"></div>

	<div id="bottomChartContainer" style="height: 300px; width: 100%;">
	</div>

	<div id="spacer" style="height: 150px;"></div>

	<div class="well">Dataset courtesy <a href="http://transparentcalifornia.com/">Transparent California</a></div>
</body>
</html>
