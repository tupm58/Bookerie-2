var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

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
        console.log(data.userId);
        for (var temp in io.clients().sockets){
            if (io.clients().sockets[temp].userId == data.userId){
                if (io.clients().sockets[temp].userId != client.userId){
                    io.clients().sockets[temp].emit( 'message', {
                            avatar : data.avatar,
                            userId: data.userId,
                            senderId : data.senderId ,
                            senderName: data.senderName,
                            post_id: data.post_id,
                            message: data.message
                        });
                }
            }
        }
    });
});

// server.listen( 8080 );
server.listen(8080, function(){
  console.log('listening on *:8080');
});

