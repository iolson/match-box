const dgram = require('node:dgram');

const PORT = process.env.LOG_RECEIVER_PORT || 9999;

const server = dgram.createSocket('udp4');

server.on('message', (msg, rinfo) => {
  console.log(`[${new Date().toISOString()}] ${rinfo.address}:${rinfo.port} -> ${msg.toString().trim()}`);
});

server.on('listening', () => {
  const addr = server.address();
  console.log(`match-box logs-receiver listening on ${addr.address}:${addr.port}`);
});

server.on('error', (err) => {
  console.error('Server error:', err);
  server.close();
});

server.bind(PORT);
