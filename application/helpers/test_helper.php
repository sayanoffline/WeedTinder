<?php
require "predis/autoload.php";
Predis\Autoloader::register();
 
// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
function checkpredis()
{
try {
    $redis = new Predis\Client();
/*
    $redis = new PredisClient(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379));
*/
    echo "Successfully connected to Redis";

    //$key="Key_Name";
    //$redis->set($key, 'Key Value');
    //echo $redis->get($key);
    
}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}

}

function chatSave($key,$str)
{
	try {
   	$redis = new Predis\Client();
	$redis->lpush($key, $str); 
	}
	catch (Exception $e) {
		echo "Couldn't connected to Redis";
		echo $e->getMessage();
	}
}

function getChat($key)
{
	try {
   	$redis = new Predis\Client();
	$data = $redis->LRANGE($key,0,30); 
        $newData = arrayToJSON($data);
        return $newData;
	}
	catch (Exception $e) {
		echo "Couldn't connected to Redis";
		echo $e->getMessage();
	}
}


