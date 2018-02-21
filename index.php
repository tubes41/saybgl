<?php
if (empty($_GET)){
  header("HTTP/1.1 400 Bad Request");
} else {
  header("HTTP/1.1 200 OK");
  header('Content-Type:text/plain');

  echo "URL: " . $_GET['nsurl'] . 'pebble?units=' . $_GET['unit'] . "\r\n";
  $jsonResponse = file_get_contents($_GET['nsurl'] . 'pebble?units=' . $_GET['unit']);
  $jsonData = json_decode($jsonResponse);

  echo "GET Response:" . $jsonResponse . "\r\n";
  echo "Decoded:";var_dump($jsonData);
  $myobj = (object){
    'timestamp' =>  $jsonData->bgs[0]->datetime,
    'sgv'       =>  $jsonData->bgs[0]->sgv,
    'direction' =>  $jsonData->bgs[0]->direction
  }
  /*$myObj->timestamp = $jsonData->bgs[0]->datetime;
  $myObj->sgv = $jsonData->bgs[0]->sgv;
  $myObj->direction = $jsonData->bgs[0]->direction;*/
  $myJSON = json_encode($myObj);
  echo "My JSON:";var_dump($myJSON);
}
?>
