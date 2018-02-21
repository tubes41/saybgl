'use strict';

var express = require('express');
var app = express();

app.get('/', function(req, res) {
  res.send('Hello World!');
});

app.listen(80, function() {
  console.log('Example app listening on port 80!');
});


/*



process.env.DEBUG = 'actions-on-google:*';

const ActionsSdkApp = require('actions-on-google').ActionsSdkApp;

exports.saybgl = functions.https.onRequest((request, response) => {
  const app = new ActionsSdkApp({request, response});

  function mainIntent (app) {
    console.log('mainIntent');
    var request = require("request");
    var url = "https://cgm-remote-monitorf2ed.azurewebsites.net/pebble?" +
    "units=mmol";
    
    internalrequest({
        url: url,
        json: true
    }, function (error, response, body) {
        console.log('error:', error); // Print the error if one occurred
        console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
        if (!error && response.statusCode === 200) {
            console.log(body) // Print the json response
            app.talk('Your BGL is ' + response.bgs.sgv + ' and and you are trending ' + response.bgs.direction);
        }
    })
    
    app.talk('Sorry, I had trouble reading your BGL');
  }


  let actionMap = new Map();
  actionMap.set(app.StandardIntents.MAIN, mainIntent);
  app.handleRequest(actionMap);
});
*/
