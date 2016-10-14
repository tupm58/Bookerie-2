var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

// io.sockets.on( 'connection', function( client ) {
//     console.log( "New client !" );
//
//     client.on( 'message', function( data ) {
//         console.log( 'Message received ' + data.name + ":" + data.message );
//        
//         io.sockets.emit( 'message', { name: data.name, message: data.message } );
//     });
// });
// io.sockets.on( 'connection', function( client ) {
//     console.log( "New client !" );
//     client.on('message',function (data) {
//
//         console.log(data.userId);
//         var userId = client.handshake.data.userId;
//        // console.log(userId);
//         client.join('user'+ data.userId);
//         console.log('user'+data.userId);
//         console.log( 'Message received ' + data.name + ":" + data.message );
//         io.to('user'+ data.userId).emit('message','hello');
//     });
// });
var clients =[];

io.sockets.on( 'connection', function( client ) {
    console.log( "New client !" );
    client.on('storeClientIfo',function(data){
        var clientInfo = new Object();
        clientInfo.customId         = data.customId;
        clientInfo.clientId     = client.id;
        clients.push(clientInfo);
       // console.log(clients);
        client.userId  = data.customId;
        console.log(io.clients().sockets);
    });
    client.on('message',function (data) {

        for (var temp in io.clients().sockets){
            if (io.clients().sockets[temp].userId == data.userId){
                io.clients().sockets[temp].emit( 'message', { name: data.name, message: data.message });
            }
        }
    });
});

// server.listen( 8080 );
server.listen(8080, function(){
  console.log('listening on *:8080');
});

