<?php
if (empty($_GET['nsurl']) || empty($_GET['unit'])){
  header("HTTP/1.1 400 Bad Request");
} else {
  $jsonResponse = file_get_contents(urldecode($_GET['nsurl']) . 'pebble?units=' . urldecode($_GET['unit']));
  $jsonData = json_decode($jsonResponse);
	error_log("SGV: ". $jsonData->bgs[0]->sgv);
	error_log("Trend Direction: ". $jsonData->bgs[0]->direction);
  $speech = "Your BGL reading as of " . date("g:ia",$jsonData->bgs[0]->datetime) . " is " . $jsonData->bgs[0]->sgv . " and trending " . $jsonData->bgs[0]->direction;

  $myObj = (object)[
        'fulfillmentText' =>  $speech
  ];
  $myJSON = json_encode($myObj);
  header("HTTP/1.1 200 OK");
  header('Content-Type:application/json');
  echo $myJSON;
}
?>
