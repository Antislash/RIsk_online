var main = require('./main.js');

var io = require('socket.io').listen(main.server);

io.sockets.on('connection', function(socket) {
  console.log('Un utilsateur est connecté au serveur !');
}); 