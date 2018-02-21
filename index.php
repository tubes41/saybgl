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
  echo "Decoded:" . $jsonData . "\r\n";

  $myObj->timestamp = $jsonData->bgs->datetime;
  $myObj->age = 30;
  $myObj->city = "New York";

  $myJSON = json_encode($myObj);

  echo "My JSON:" . $myJSON;
}
?>
