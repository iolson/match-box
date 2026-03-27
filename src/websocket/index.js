const { WebSocketServer } = require('ws');

const PORT = process.env.WEBSOCKET_PORT || 8090;

const wss = new WebSocketServer({ port: PORT });

wss.on('connection', (ws, req) => {
  console.log(`[${new Date().toISOString()}] Client connected from ${req.socket.remoteAddress}`);

  ws.on('close', () => {
    console.log(`[${new Date().toISOString()}] Client disconnected`);
  });
});

wss.on('listening', () => {
  console.log(`match-box websocket server listening on port ${PORT}`);
});
