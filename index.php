<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php  
  error_reporting(E_ALL ^ E_NOTICE);
	@ini_set("display_errors",1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# clickastro: http://ogp.me/ns/fb/clickastro#">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta property="fb:app_id" content="125842397601142" /> 
  <meta property="og:type"   content="clickastro:free_horoscope" /> 
  <meta property="og:url"    content="http://www.clickastro.com/free-horoscope-online.php" /> 

<title>News</title>
<style>
body{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:12px;color:#555;margin:0;
}
div { float:left;width:300px;height:250px;margin:10px;border:0;}
h1{ color:#068;}
</style>
</head>
<body>
<p style="background:#068;height:35px;color:white;padding-left:10px;line-height:35px;font-size:20px;">Kochi News</p>
<?php
	$tpl = '<div><h1>::TITLE::</h1>::DESC::</div>';
	$file = file_get_contents("rss.kochi.xml");
	try{
		$xml = simplexml_load_string($file);
		if(!empty($xml->channel->item)){
			foreach($xml->channel->item as $topics){
				$a = str_replace('::TITLE::',(string)$topics->title,$tpl);
				$a = str_replace('::DESC::',(string)$topics->description,$a);
				echo $a;
			}
		}
	}catch(Exception $e){
		print_r($e);
	}
?>
</body>
</html>
