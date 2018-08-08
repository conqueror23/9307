<?php 

function find($regex,$dir){
$matches =array();
$d =dir($dir);
while (false !==($file =$d->read())){
	if (($file =='.')||($file =='..')){ continue;}
	if (is_dir("{$dir}/{$file}")){
		$submatches =find($regex, "{$dir}/{$file}");
		$matches = array_merge($matches,$submatches);
	}else{
		if(preg_match($regex, $file)){
			$matches[]="{$dir}/{$file}";
		}
	}
}
return $matches;
}
$found = find('/\./',$_SERVER['DOCUMNET_ROOT']=dirname(__FILE__));

sort($found);
echo '<pre>'.print_r($found,true).'</pre>';


/* from books
$Source= ".";
$scan =scandir($Source);
print_r($scan);
if (is_dir($Source)) {
$TotalFiles = 0;
$FilesMoved = 0;
$DirEntries = scandir($Source);
foreach ($DirEntries as $Entry) {
if (($Entry!=".") && ($Entry!="..")) {
	++$TotalFiles;
if (copy("$Source/$Entry","$Destination/$Entry"))
	++$FilesMoved;
else
	echo "Could not move file \"" .htmlentities($Entry) ."\".<br />\n";
}
}
echo "<p>$FilesMoved of $TotalFiles
comments successfully backed up.</p>\n";
}
else
echo "<p>The source directory \"" .
$Source . "\" does not exist!</p>\n";
*/

/*
$path =".";
$d=scandir($path);
print_r($d);

function ftpRecursiveFileListing($path) { 
    static $allFiles = array(); 
    $contents = ftp_nlist($path); 

    foreach($contents as $currentFile) { 
        // assuming its a folder if there's no dot in the name 
        if (strpos($currentFile, '.') === false) { 
            ftpRecursiveFileListing( $currentFile); 
        } 
        $allFiles[$path][] = substr($currentFile, strlen($path) + 1); 
    } 
    return $allFiles; 
} 
ftpRecursiveFileListing($path);

*/

/*
$dir = ".";
$key_files = scandir($dir);
if(exec("./", $files)){
    // the $files array now holds the path as it's values,
    // but we also want the paths as keys:
    $key_files = array_combine(array_values($files), array_values($files));

    // show the array
    print_r($key_files);
    $tree = explodeTree($key_files, "/");
	// show the array
	print_r($tree);
}
*/

/*
$split = "foremer/later";
$k = explode("/", $split);
echo $k[0];
echo "<br>".$k[1];
echo "<br>";
print_r($k);
*/

?>