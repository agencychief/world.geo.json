<?php
//$directories = glob('*' , GLOB_ONLYDIR);
// print_r($directories);
// foreach ($directories as $dir) {
// 	print $dir . " ";
// 	chdir("$dir");
 	$files = glob('*.geo.json');
//	print_r($files);
 	foreach($files as $key => $file) {
 		print $key . "-" . $file . "\n";
 	`geojson-precision -p 3 "$file" shape_"$file"`;
# 	`simplify-geojson -t 0.1 shape_$file > $key_shape_$file`;
// 	chdir("../");		
 	}

 //}
?>