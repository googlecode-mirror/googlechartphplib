<?php

require '../lib/GoogleChart.php';

$values = array(
	array(),
	array(),
	array()
);
$n = 10;
for ($i = 0; $i <= $n; $i += 1) {
	$v = rand($i , $i*10);
	$values[0][] = $v;
	$values[1][] = $v - $i;
	$values[2][] = rand(100 - ($i+10),100 - 10*$i);
}

$chart = new GoogleChart('lc', 600, 300);
$chart->setGridLines(10,10);
$chart->setLegendPosition('r');
$chart->setFill('ffffcc');
$chart->setGradientFill(45, array('cccccc', 'ffffff', 'cccccc'), GoogleChart::CHART_AREA);
$chart->setTitle('Us versus the others.|A very good story.');
$chart->setTitleStyle('999999', 20);

$line = new GoogleChartData($values[0]);
$line->setLegend('Us');
$chart->addData($line);

$line = new GoogleChartData($values[1]);
$line->setStyle(2,2,2);
$line->setColor('6699cc');
$chart->addData($line);

$line = new GoogleChartData($values[2]);
$line->setLegend('The others');
$line->setColor('ff0000');
$chart->addData($line);

$y_axis = new GoogleChartAxis('y');
$chart->addAxis($y_axis);

$x_axis = new GoogleChartAxis('x');
$chart->addAxis($x_axis);

if ( isset($_GET['debug']) ) {
	var_dump($chart->getQuery());
	echo $chart->validate();
	echo $chart->toHtml();
}
else{
	header('Content-Type: image/png');
	echo $chart;
}

