<?php
function auto ($url) {
if (function_exists('curl_init')) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
return curl_exec($ch);
} else {
return file_get_contents($url);
}
}
//fetch new short url from is.gd
function isgd($longUrl){
$shrt='https://is.gd/create.php?format=simple&url='.$longUrl;
$isgd=auto($shrt);
return $isgd;	
}

//fetch new short url from tinyurl
function createTinyUrl($strURL) { 
$tinyurl = auto("http://tinyurl.com/api-create.php?url=" . $strURL); 
return $tinyurl; 
} 

//fetch new short url from tiny.cc
function tinycc($Longurl){
$encodeurl=urlencode($Longurl);
$username="[Your Username]";
$apiKey="[yourAPIkey]";
$gettinycc=auto("http://tiny.cc/?c=rest_api&m=shorten&version=2.0.3&format=json&".$encodeurl."&login=".$username."&apiKey=".$apiKey."");
}

//Return short URL
echo isgd("http://www.domain.com?id=12345&ref=1a2b3c&or=isgd")."<br>";
echo createTinyUrl("http://www.domain.com?id=12345&ref=1a2b3c&or=isgd")."<br>";
echo tinycc("http://www.domain.com?id=12345&ref=1a2b3c&or=isgd")."<br>";
?>
