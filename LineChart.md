

# Code examples #

## Flickr-like line chart ##

![http://chart.apis.google.com/chart?cht=lc&chs=800x154&chg=0,50,3,2&chma=5,5,5,5&chd=t:34,18,21,70,53,39,39,30,13,15,4,8,5,8,4,8,44,16,16,3,10,7,5,20,20,28,44,_|_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,44,34&chco=000000,000000&chls=3|3,4,2&chds=0,70&chm=B,eeeeee,0,0,0|B,eeeeee,1,0,0|o,ffffff,0,-1,9|o,000000,0,-1,7|o,000000,1,-1::,8|o,ffffff,1,-1::,4&chxt=y,x&chxl=0:||35|70|1:|27+apr|04+may|11+may|18+may&chxtc=0,5|1,5&chxs=0,666666,9,1,_,ffffff|1,666666,9,0,t&chxp=1,0,25.8,51.8,77.6&flickr.png](http://chart.apis.google.com/chart?cht=lc&chs=800x154&chg=0,50,3,2&chma=5,5,5,5&chd=t:34,18,21,70,53,39,39,30,13,15,4,8,5,8,4,8,44,16,16,3,10,7,5,20,20,28,44,_|_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,_,44,34&chco=000000,000000&chls=3|3,4,2&chds=0,70&chm=B,eeeeee,0,0,0|B,eeeeee,1,0,0|o,ffffff,0,-1,9|o,000000,0,-1,7|o,000000,1,-1::,8|o,ffffff,1,-1::,4&chxt=y,x&chxl=0:||35|70|1:|27+apr|04+may|11+may|18+may&chxtc=0,5|1,5&chxs=0,666666,9,1,_,ffffff|1,666666,9,0,t&chxp=1,0,25.8,51.8,77.6&flickr.png)

Code:
```
$chart = new GoogleChart('lc', 800, 154);
$chart->setAutoscale(true);
$chart->setGridLines(0,50, 3,2);
$chart->setMargin(5);

$values = array(34,18,21,70,53,39,39,30,13,15,4,8,5,8,4,8,44,16,16,3,10,7,5,20,20,28,44,null);
$line = new GoogleChartData($values);
$line->setColor('000000');
$line->setThickness(3);
$line->setFill('eeeeee');
$chart->addData($line);

$m = new GoogleChartShapeMarker(GoogleChartShapeMarker::CIRCLE);
$m->setData($line);
$m->setColor('000000');
$m->setSize(7);
$m->setBorder(2);
$chart->addMarker($m);

$values = array_fill(0,sizeof($values)-2, null);
$values[] = 44;
$values[] = 34;

$line2 = new GoogleChartData($values);
$line2->setColor('000000');
$line2->setThickness(3);
$line2->setDash(4,2);
$line2->setFill('eeeeee');
$chart->addData($line2);

$m = new GoogleChartShapeMarker(GoogleChartShapeMarker::CIRCLE);
$m->setData($line2);
$m->setColor('ffffff');
$m->setSize(4);
$m->setBorder(4,'000000');
$m->setPoints(-1);
$chart->addMarker($m);

$y_axis = new GoogleChartAxis('y');
$y_axis->setDrawLine(false);
$y_axis->setDrawTickMarks(false);
$y_axis->setLabels(array(null,35,70));
$y_axis->setFontSize(9);
$y_axis->setTickMarks(5);
$y_axis->setTickColor('ffffff');
$chart->addAxis($y_axis);

$x_axis = new GoogleChartAxis('x');
$x_axis->setDrawLine(false);
$x_axis->setLabels(array('27 apr','04 may','11 may','18 may'));
$x_axis->setLabelPositions(0,25.8,51.8,77.6);
$x_axis->setTickMarks(5);
$x_axis->setFontSize(9);
$chart->addAxis($x_axis);
```