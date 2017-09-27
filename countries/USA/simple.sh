#!/bin/bash

for d in */; do
    # Will print */ if no directories are available
    echo $d
    cd $d
    for f in shape*; do
    	echo $f
   	 	simplify-geojson -t 0.01 $f > inter01_$f
   	 	# geophp transform here
   	 	json-minify inter01_$f > minied01_$f
   	 	
    done
  cd ..
done