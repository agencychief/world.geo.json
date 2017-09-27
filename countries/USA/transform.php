<?php
include_once('geoPHP.inc');
$directories = glob('*' , GLOB_ONLYDIR);
 $polygon = array();
 $county = array();
 foreach ($directories as $dir) {
 	chdir("$dir");
 	$files = glob('final01_shape_*.geo.json');
 	 foreach($files as $file) {
 	  	$json	= file_get_contents(getcwd() . "/" . $file);
 	  	$geom = geoPHP::load($json, 'json');
      foreach($geom as $geo) {
		    $centroid    = $geom->getCentroid();
		    $lon         = $centroid->getX();
      	$lat         = $centroid->getY();
      	$bounding    = $geom->getBBox();
      	$geo_type    = $geom->geometryType();
		    $left        = $bounding['minx'];
      	$top         = $bounding['maxy'];
      	$right       = $bounding['maxx'];
      	$bottom      = $bounding['miny'];
      	$geohash     = $geom->out('geohash');
      	$latlon      = $centroid->getY() . ',' . $centroid->getX();
        $polygon     = $geom->out('wkt');
      	//$county[]    = $dir . " " . $file . " " . $latlon . " " . $geo_type . " " . $polygon;
        $county[]    = $latlon . " " . $geo_type . " " . $polygon ."\n";
     	
      }
 
 	}
  // print_r($county);

 chdir("../");
 }
 $fp = fopen('file.csv', 'w');

foreach ($county as $fields) {
    //fputcsv($fp, $fields);
  print $fields;
}

fclose($fp);