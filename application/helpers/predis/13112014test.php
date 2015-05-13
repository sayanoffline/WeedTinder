<?php

require "autoload.php";
Predis\Autoloader::register();
 
// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
try {
 $redis = new Predis\Client();

  /* $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "172.16.1.42",
        "port" => 6379));*/

echo "Successfully connected to Redis";
echo '<form id="myfrm" method="post"  >
<input type="text" name="testing" value="" />
<input type="submit" value="enter" /> 
</form>';
$val="Pritam" ;
if(!empty($_POST))
{
	$val= $_POST['testing'];
	$redis->set("hello_world",$val);
	$value = $redis->get("hello_world");
//var_dump($value);
	echo '<br>';
	 echo $value;
}



//echo ($redis->exists("hello_world")) ? "true" : "false";
}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}

?>
