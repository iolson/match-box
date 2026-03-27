# match-box

A modernized eBot for Counter-Strike 2 — a one-click deployable match management system for local tournament organizers.

## Architecture

match-box replaces the legacy eBot ecosystem (Symfony web panel, Node.js services) with a unified, containerized stack:

| Component | Tech | Description |
|-----------|------|-------------|
| Web Panel | Laravel (PHP) | Match configuration, team/player management, admin UI. Replaces eBot-web (Symfony). |
| Match Engine | PHP | Core match orchestration — RCON communication, round tracking, map vetoes. Replaces eBot-CSGO. |
| Logs Receiver | Node.js | Receives and parses CS2 game server log events via UDP. |
| WebSocket Server | Node.js | Real-time match updates pushed to the web panel. |
| CS2 Plugin | C# (CounterStrikeSharp) | Optional server-side plugin for enhanced match control (knife round, pause, etc.). |

## Tech Stack

- **Backend:** Laravel 12 (PHP 8.3+), Filament v5, Livewire, Tailwind CSS
- **Database:** MySQL 8
- **Cache/Queue:** Redis 7
- **Testing:** Pest PHP
- **Containerization:** Docker & Docker Compose
- **CS2 Plugin:** CounterStrikeSharp (C#, .NET 8) — optional

## Directory Structure

```
match-box/
├── docker-compose.yml       # Service orchestration
├── Makefile                 # Dev shortcuts (make up, make test, etc.)
├── docker/                  # Dockerfiles and service config
│   ├── php/                 # PHP 8.3 FPM + extensions
│   ├── nginx/               # Reverse proxy
│   ├── node/                # Node.js base
│   └── mysql/               # MySQL config
├── src/
│   ├── web/                 # Laravel app (all PHP code here)
│   │   ├── app/
│   │   │   ├── Enums/       # 6 backed string enums
│   │   │   ├── Models/      # 22 Eloquent models
│   │   │   ├── Filament/    # Admin panel resources
│   │   │   └── Http/        # Controllers (public + API)
│   │   ├── database/
│   │   │   ├── migrations/  # 22 custom migrations
│   │   │   └── seeders/     # MatchConfig + Map seeders
│   │   └── tests/           # Pest PHP tests
│   ├── logs-receiver/       # Node.js UDP log receiver
│   ├── websocket/           # Node.js WebSocket server
│   └── plugin/              # CS2 CounterStrikeSharp plugin
└── docs/
    └── architecture.md
```

## Build & Test Commands

All commands run from `src/web/` (Laravel root):

```bash
# Run tests
php artisan test

# Run tests with coverage
php artisan test --coverage --min=85

# Run specific test file
php artisan test tests/Unit/Models/GameMatchTest.php

# Run migrations
php artisan migrate

# Fresh migrate + seed
php artisan migrate:fresh --seed

# Seed only
php artisan db:seed
```

Docker commands (from repo root):

```bash
make up          # Start all services
make down        # Stop all services
make dev         # Start with Vite dev server
make migrate     # Run migrations in container
make fresh       # Fresh migrate + seed in container
make test        # Run tests in container
make coverage    # Run tests with 85% coverage threshold
make shell       # Shell into PHP container
```

## Conventions

- **Model naming:** The Match model is `GameMatch` (App\Models\GameMatch) because `match` is a PHP 8 reserved keyword. Table is still `matches`.
- **Route binding:** GameMatch uses UUID for public route binding (`getRouteKeyName()` returns 'uuid'). Route parameter `{match}` is bound to GameMatch in AppServiceProvider.
- **Enums:** All 6 enums are backed string enums in `App\Enums\` with a `label()` method.
- **Filament:** Admin panel at `/admin` using Filament v5. Resources auto-discovered from `App\Filament\Resources\`.
- **API:** Versioned at `/api/v1/`. Log receiver endpoint requires Sanctum auth.
- **CS2 defaults:** MR12, $12,500 overtime start money, 3 overtime max rounds.
- **Tests:** Pest PHP with RefreshDatabase for Feature tests. SQLite :memory: for test DB.

## Design Principles

- **Docker-first:** Every component runs in a container. `docker compose up` is the primary deployment method.
- **Simple for organizers:** Minimal configuration to get a tournament running.
- **Modular:** The CS2 plugin is optional; core functionality works via RCON + log receiver alone.
