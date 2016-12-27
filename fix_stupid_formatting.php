<?php

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
foreach($iterator as $file){
	if(substr($file->getFilename(), -5) === ".json"){
		$lines = implode('', array_map(function($line){
			return trim(explode('//', $line)[0]);
		}, file($file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename())));

		file_put_contents($file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename(), str_replace("    ", "  ", json_encode(json_decode($lines), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)));
		echo "Processed " . $file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename() . PHP_EOL;
	}
}

echo "Done" . PHP_EOL;


