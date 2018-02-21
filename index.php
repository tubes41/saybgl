<?php
if (empty($_GET)){
  header("HTTP/1.1 400 Bad Request");
} else {
  header("HTTP/1.1 200 OK");
  header('Content-Type:application/json');

  $jsonResponse = file_get_contents($_GET['nsurl'] . 'pebble?units=' . $_GET['unit']);
  $jsonData = json_decode($jsonResponse);

$speech = "Your BGL reading as of " . date("g:ia",$jsonData->bgs[0]->datetime) . " is " . $jsonData->bgs[0]->sgv . " and trending " . $jsonData->bgs[0]->direction;


  $myObj = (object)[
	  'messages' => (array)[
		  (object)[
        'speech' 		=>  $speech,
        'displayText'   =>  $speech
			]
	  ]
  ];
  $myJSON = json_encode($myObj);
  echo $myJSON;
}
?>
