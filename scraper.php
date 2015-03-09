<?php
    error_reporting(E_ERROR | E_PARSE);
    $city=$_GET['city'];
    $city=str_replace(" ","",$city);
	$data=file_get_contents('http://www.weather-forecast.com/locations/'.$city.'/forecasts/latest');
	$p='3 Day Weather Forecast Summary';
	if($data==FALSE){
        echo "false";
    }
    else{
        preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)</s', $data, $matches);
	echo $matches[1];
    
    }
	
?>