<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
print "<pre>";

$path_xml = "uni.xml";
$sxe = simplexml_load_file($path_xml); //load as simpleXML
print "$sxe->universityname\n"; //can access vales in tree
print $sxe->school[0]->schoolname . "\n"; //take care [0]

foreach ($sxe->school as $oneschool){ //loop through entries
$schoolname = $oneschool -> schoolname;
print " a schoolname is $schoolname \n";
}

$sxe->school[0]->schoolname = "NewHSCS"; //can change values in tree
print $sxe->school[0]->schoolname . "\n";

//however cant save simpleXML backout using one php command
//but can convert to text (includes tags) and write to file as XML text
$mystring = $sxe->asXML(); //can convert SimpleXML to string
//print " the asXML gives out $def"; //view source in IE
$outfilepointer = fopen("newXML1.xml","w"); //open for write
fwrite($outfilepointer, $mystring);
fclose($outfilepointer);

//We could create a new XML file using data from the XML tree
$outfilepointer = fopen("newXML2.xml","w");// open for write
$outtext = "<university>\n";
$outtext .= "\t<universityname>westminster</universityname> \n";
foreach ($sxe->school as $oneschool) //iterate through entries
{
	$schoolname = $oneschool->schoolname;
	$outtext .= "\t<school>\n\t\t <schoolname>$schoolname</schoolname>\n\t</school> \n";
}
$outtext .= "</university> \n";
fwrite($outfilepointer, $outtext);
fclose($outfilepointer);
print "</pre>";
?>
</body>

</html>
