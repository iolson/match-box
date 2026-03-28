# match-box

[![CI](https://github.com/iolson/match-box/actions/workflows/ci.yml/badge.svg)](https://github.com/iolson/match-box/actions/workflows/ci.yml)
[![PHP Version](https://img.shields.io/badge/php-8.4%2B-8892BF.svg)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/laravel-12-FF2D20.svg)](https://laravel.com)
[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

A modernized eBot for Counter-Strike 2 — a one-click deployable match management system for local tournament organizers.

---

## Prerequisites

- [Docker](https://docs.docker.com/get-docker/) & [Docker Compose](https://docs.docker.com/compose/install/) (v2+)
- [Git](https://git-scm.com/)
- [Make](https://www.gnu.org/software/make/) (optional, but recommended)

## Quick Start

```bash
git clone https://github.com/iolson/match-box.git
cd match-box
make init
```

That's it. This single command will:

1. Copy `src/web/.env.example` to `src/web/.env`
2. Build and start all Docker containers
3. Install PHP dependencies (via Composer)
4. Generate an application key
5. Run all database migrations
6. Seed the database with default configs and map pool
7. Create an admin user from your `.env` settings

Once complete, open your browser:

| URL | Description |
|-----|-------------|
| http://localhost:8080 | Public site |
| http://localhost:8080/admin | Admin panel (Filament) |

Default admin login: `admin@matchbox.local` / `changeme`

> **Important:** Change the default admin credentials in `src/web/.env` before running at a live event!

### Customizing the Admin Account

Set these in `src/web/.env` **before** running `make init`:

```env
ADMIN_NAME="Your Name"
ADMIN_EMAIL="you@example.com"
ADMIN_PASSWORD="a-strong-password"
```

Or create/update an admin at any time:

```bash
# From env vars
docker compose exec php php artisan matchbox:create-admin

# With flags (overrides env vars)
docker compose exec php php artisan matchbox:create-admin \
  --name="Your Name" \
  --email="you@example.com" \
  --password="a-strong-password"

# Interactive (prompts for each field)
docker compose exec php php artisan matchbox:create-admin
```

---

## Manual Setup (without Make)

If you don't have `make`, run the commands directly:

```bash
git clone https://github.com/iolson/match-box.git
cd match-box
cp src/web/.env.example src/web/.env
# Edit src/web/.env to set ADMIN_NAME, ADMIN_EMAIL, ADMIN_PASSWORD
docker compose up -d --build
docker compose exec php php artisan migrate --seed
docker compose exec php php artisan matchbox:create-admin
```

---

## Make Commands

| Command | Description |
|---------|-------------|
| `make init` | First-time setup (build, migrate, seed) |
| `make up` | Start all services |
| `make down` | Stop all services |
| `make dev` | Start with Vite dev server for frontend development |
| `make build` | Rebuild Docker images |
| `make migrate` | Run database migrations |
| `make fresh` | Drop all tables, re-migrate, and seed |
| `make seed` | Run database seeders |
| `make test` | Run the test suite |
| `make coverage` | Run tests with coverage report (min 85%) |
| `make shell` | Open a shell in the PHP container |
| `make tinker` | Open Laravel Tinker REPL |
| `make logs` | Tail logs from all containers |
| `make queue` | Start a queue worker |

---

## Tech Stack

| Component | Technology |
|-----------|-----------|
| Web Panel | Laravel 12, Filament v5, Livewire, Tailwind CSS |
| Database | MySQL 8 |
| Cache / Queue | Redis 7 |
| Logs Receiver | Node.js 20 (UDP) |
| WebSocket | Node.js 20 (ws) |
| CS2 Plugin | CounterStrikeSharp (C# / .NET 8) — optional |
| Containerization | Docker & Docker Compose |

## Project Structure

```
match-box/
├── docker-compose.yml          # Service orchestration
├── Makefile                    # Development shortcuts
├── docker/
│   ├── php/                    # PHP 8.4 FPM + Composer
│   ├── nginx/                  # Nginx reverse proxy
│   └── mysql/                  # MySQL config
├── src/
│   ├── web/                    # Laravel application (Filament admin + API)
│   ├── logs-receiver/          # UDP log receiver (Node.js)
│   ├── websocket/              # WebSocket server (Node.js)
│   └── plugin/                 # CS2 plugin (CounterStrikeSharp)
└── docs/
    └── architecture.md         # Architecture documentation
```

## Running Tests

```bash
# Run all tests
make test

# Run with coverage (requires xdebug — available in the Docker container)
make coverage

# Run a specific test file
docker compose exec php php artisan test --filter=PlayerTest
```

## Environment Configuration

All configuration lives in `src/web/.env`. Key settings:

**Laravel / Admin:**

| Variable | Default | Description |
|----------|---------|-------------|
| `DB_DATABASE` | `match_box` | MySQL database name |
| `DB_USERNAME` | `match_box` | MySQL username |
| `DB_PASSWORD` | `secret` | MySQL password |
| `ADMIN_NAME` | `Admin` | Default admin user name |
| `ADMIN_EMAIL` | `admin@matchbox.local` | Default admin login email |
| `ADMIN_PASSWORD` | `changeme` | Default admin login password |

**Docker ports** (set as environment variables or in a root `.env` file):

| Variable | Default | Description |
|----------|---------|-------------|
| `APP_PORT` | `8080` | Public web port |
| `WEBSOCKET_PORT` | `8090` | WebSocket server port |
| `LOG_RECEIVER_PORT` | `9999` | UDP log receiver port |
| `VITE_PORT` | `5173` | Vite dev server port (dev profile only) |

## Documentation

- [Admin Guide](docs/admin-guide.md) — Step-by-step guide for tournament organizers (no technical experience required)
- [Architecture](docs/architecture.md) — System design and technical overview

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

## Credits

See [CREDITS.md](CREDITS.md) for full attribution to the original eBot project.

## License

MIT License. See [LICENSE](LICENSE) for details.
