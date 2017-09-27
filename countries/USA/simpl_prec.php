<?php
$directories = glob('*' , GLOB_ONLYDIR);
 // print_r($directories);
 foreach ($directories as $key => $dir) {
// 	print $key . ": " . $dir . "\n";
 	chdir("$dir");
 	$files = glob('*.geo.json');
 	 	print "====Starting " . $dir . " ======\n";
 	 foreach($files as $key => $file) {

 	 	print $key . "-" . $file . "\n";
 	 `geojson-precision -p 3 "$file" shape_"$file"`;
# 	`simplify-geojson -t 0.1 shape_$file > $key_shape_$file`;
 	// chdir("../");		
 	}
 chdir("../");
 }
?>