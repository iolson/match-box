# match-box

A modernized eBot for Counter-Strike 2 — a one-click deployable match management system for local tournament organizers.

## Quick Start

```bash
# Clone and configure
git clone https://github.com/your-org/match-box.git
cd match-box
cp .env.example .env

# Start all services
docker compose up -d

# Run migrations and seed default data
docker compose exec php php artisan migrate --seed

# Create an admin user
docker compose exec php php artisan make:filament-user
```

Visit `http://localhost:8080` for the public site and `http://localhost:8080/admin` for the admin panel.

## Tech Stack

| Component | Technology |
|-----------|-----------|
| Web Panel | Laravel 12, Filament v3, Livewire, Tailwind CSS |
| Database | MySQL 8 |
| Cache/Queue | Redis 7 |
| Logs Receiver | Node.js 20 (UDP) |
| WebSocket | Node.js 20 (ws) |
| CS2 Plugin | CounterStrikeSharp (C# / .NET 8) — optional |
| Containerization | Docker & Docker Compose |

## Make Commands

```bash
make up          # Start all services
make down        # Stop all services
make dev         # Start with Vite dev server
make migrate     # Run migrations
make fresh       # Fresh migrate + seed
make seed        # Run seeders
make test        # Run test suite
make coverage    # Run tests with coverage (min 85%)
make shell       # PHP container shell
make tinker      # Laravel Tinker REPL
make logs        # Tail all container logs
```

## Project Structure

```
match-box/
├── docker-compose.yml       # Service orchestration
├── .env.example             # Environment template
├── Makefile                 # Development shortcuts
├── docker/                  # Dockerfiles and config
│   ├── php/                 # PHP 8.3 FPM
│   ├── nginx/               # Nginx reverse proxy
│   ├── node/                # Node.js base image
│   └── mysql/               # MySQL config
├── src/
│   ├── web/                 # Laravel application
│   ├── logs-receiver/       # UDP log receiver (Node.js)
│   ├── websocket/           # WebSocket server (Node.js)
│   └── plugin/              # CS2 plugin (CounterStrikeSharp)
└── docs/
    └── architecture.md      # Architecture documentation
```

## Credits

See [CREDITS.md](CREDITS.md) for full attribution to the original eBot project.

## License

MIT License. See [LICENSE](LICENSE) for details.
