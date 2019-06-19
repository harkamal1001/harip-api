<?php 
header("Content-type:application/json");
header('Access-Control-Allow-Origin: *');
    $client  = $_GET["ip"];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = @$_SERVER['REMOTE_ADDR'];
			$result  = array('country'=>'', 'city'=>'');
			if(filter_var($client, FILTER_VALIDATE_IP)){
				$ip = $client;
			}elseif(filter_var($forward, FILTER_VALIDATE_IP)){
				$ip = $forward;
			}else{
				$ip = $remote;
			}
			print_r(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
