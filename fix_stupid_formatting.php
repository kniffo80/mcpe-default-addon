<?php

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
foreach($iterator as $file){
	//var_dump($file->getFilename());
	if(substr($file->getFilename(), -5) === ".json"){
		file_put_contents($file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename(), str_replace("    ", "  ", json_encode(json_decode(file_get_contents($file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename())), JSON_PRETTY_PRINT)));
		echo "Processed " . $file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename() . PHP_EOL;
	}
}

echo "Done" .PHP_EOL;


