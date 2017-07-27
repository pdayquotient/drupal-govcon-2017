/**
 * Using Drupal 8's RESTful API service to call a custom
 * resource.
 *
 * This is part of Example #4.
 */
var http = require("http");
var fs = require("fs");

http.createServer(function(request, response) {
  // HTTP OK header
  response.writeHead(200, {'Content-Type': 'application/json'});

  // Prepare the request to get user #1
  var optionsget = {
    host : 'govcon2017.localhost',  // Only the domain name - no http/https!
    port : 8080,                    // Whatever port Drupal listens to
    path : '/ex4_rest/1?_format=json',
    method : 'GET'
  };

  // Execute the request
  var reqGet = http.request(optionsget, function(res) {
    res.on('data', function(d) {
      response.write(d.toString());
    });
  });
  reqGet.end();
  reqGet.on('error', function(e) {
    console.error(e);
  });
}).listen(8081);

// Console message
console.log('Server running at http://127.0.0.1:8081');
