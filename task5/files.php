<?php 

/* working space manipulation
$location = getcwd();
echo $location;
$fit = '/xampp/htdocs';
$d=scandir($fit);

foreach ($d as $key => $value) {
	echo $key;
	echo $value;
	echo "<br>";
}
*/

/* testing locating the files 
$Dir = "/xampp/htdocs";
$DirEntries = scandir($Dir);
foreach ($DirEntries as $Entry) {
if ((strcmp($Entry, '.') != 0) &&
(strcmp($Entry, '..') != 0))
echo "<a href='$Dir."'/'".$Entry'>'.$Entry .'</a><br />\n";
}
*/


/* basic infos of the directories 
$Dir = "/xampp/htdocs";
if (is_dir($Dir)) {
echo "<table border='1' width='100%'>\n";
echo "<tr><th>Filename</th><th>File Size</th>
<th>File Type</th></tr>\n";
$DirEntries = scandir($Dir);
foreach ($DirEntries as $Entry) {
$EntryFullName = $Dir . "/" . $Entry;
echo "<tr><td>" . htmlentities($Entry) .
"</td><td>" .
filesize($EntryFullName) . "</td><td>" .
filetype($EntryFullName) . "</td></tr>\n";
}
echo "</table>\n";
}
else
echo "<p>The directory " . htmlentities($Dir) .
" does not exist.</p>\n";

*/


?>