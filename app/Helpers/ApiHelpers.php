<?php

function getCurrencyRates($dtBdate){
	$strApiUrl =$_ENV['API_URL'];
	$strApiKey=$_ENV['API_KEY'];
	$strUrl =$strApiUrl.''.$dtBdate.'?access_key='.$strApiKey.'&symbols=INR';
	if(checkOnline($strUrl)){

		$json = json_decode(file_get_contents($strUrl));

		if(isset($json->error))
		{
			return array('success'=>0,'msg'=>$json->error->info);
		}else{
			$intRates=number_format((float)$json->rates->INR, 2, '.', '');
			return array('success'=>1,'rates'=>$intRates);
		}
	}else{
		return array('success'=>0,'msg'=>'Site is down/check your internet connection');
	}
}

function ConvertDates($dtBdate){
	$pieces = explode(" ", $dtBdate);
	$dtNewDate = date("Y-m-d",strtotime(rtrim($pieces[2],",")." ".$pieces[1]." ".$pieces[3]));
	return $dtNewDate;
	
}

function checkOnline($domain) {
   $curlInit = curl_init($domain);
   curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
   curl_setopt($curlInit,CURLOPT_HEADER,true);
   curl_setopt($curlInit,CURLOPT_NOBODY,true);
   curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

   //get answer
   $response = curl_exec($curlInit);

   curl_close($curlInit);
   if ($response) return true;
   return false;
}