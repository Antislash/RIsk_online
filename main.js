var express = require('express');
var path = require('path');

var app = express();

app.get('/', function(req, res){
	app.use(express.static(path.join(__dirname, 'www')));
	res.sendFile(path.resolve(__dirname + '/www/index.html'));
})

app.listen(8080);