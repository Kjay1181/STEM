<?php
$servername = "192.168.0.214";
$username = "humid";
$password = "password";
$dbname = "humidity";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// checks the connection
if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error); }

$sql = "SELECT * FROM temperatureData ORDER BY dateTime DESC";
$humidityData='';
$tempData ='';
$result = $conn->query($sql);

// for objects use->
if ($result->num_rows > 0) {
    // output data of each row
   //fetch_assoc is an array that stores thing
    while($row = $result->fetch_assoc()) {
       // echo "Date: " . $row["dateTime"]. " Humudity: " . $row["humidity"]. " temperature: " . $row["temperature"]."<br>";
		$humidityData = $humidityData. "," .$row["humidity"];
		$tempData = $tempData. ",".$row["temperature"];
    }
} else {
    echo "0 results";
}
echo substr($humidityData,1)."\n";
//echo substr($tempData,1)."\n";




$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<meta charset="utf-8">
<title>house</title>
</head>
<body>

<div id="chart">
</div>
<script>
var options = {
series: [
{
name: "temperature",
// i tried to put the append and push the temperature data to the graph but it stop working
data: [<?php echo $tempData; ?>]
},
{
name: "Humidity",
data: [<?php echo $humidityData; ?>]

}
],
chart: {
height: 350,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#77B6EA', '#545454'],
dataLabels: {
enabled: true,
},
stroke: {
curve: 'smooth'
},
title: {
text: 'Average High & Low Temperature',
align: 'left'
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
title: {
text: 'Month'
}
},
yaxis: {
title: {
text: 'Temperature'
},
min: 5,
max: 40
},
legend: {
position: 'top',
horizontalAlign: 'right',
floating: true,
offsetY: -25,
offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


</script>
</body>
</html>
