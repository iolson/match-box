# Architecture

## Overview

match-box is a containerized match management system for Counter-Strike 2 tournaments. It replaces the legacy eBot ecosystem with a unified, modern stack.

## Components

### Web Panel (Laravel + Filament)
- **Path:** `src/web/`
- **Tech:** Laravel 12, Filament v3, Livewire, Tailwind CSS
- **Role:** Admin panel for match/team/event management. Public pages for match results and stats. API endpoints for service communication.

### Logs Receiver (Node.js)
- **Path:** `src/logs-receiver/`
- **Tech:** Node.js 20, UDP socket
- **Role:** Receives real-time log lines from CS2 game servers via UDP. Parses events and pushes them to the web panel via internal API.

### WebSocket Server (Node.js)
- **Path:** `src/websocket/`
- **Tech:** Node.js 20, ws library
- **Role:** Pushes real-time match updates to connected browser clients.

### CS2 Plugin (CounterStrikeSharp)
- **Path:** `src/plugin/`
- **Tech:** C# / .NET 8
- **Role:** Optional server-side plugin for enhanced match control (knife round, pause, etc.).

## Data Flow

```
CS2 Server --[UDP logs]--> Logs Receiver --[HTTP API]--> Laravel
CS2 Server <--[RCON]------ Laravel (Match Engine)
Laravel --[Redis pub/sub]--> WebSocket Server --[WS]--> Browser
```

## Database

MySQL 8 with Redis for caching and queue. Key tables:
- **events** — tournaments/LANs
- **teams** / **players** — standalone entities
- **event_teams** / **rosters** — per-event team registrations and player assignments
- **matches** / **match_maps** — match configuration and map-level scoring
- **match_players** / **kills** / **round_summaries** — detailed match statistics

## Docker Services

All services run in Docker containers orchestrated by `docker-compose.yml`:
- `nginx` — reverse proxy
- `php` — Laravel FPM
- `queue` — Laravel queue worker
- `mysql` — database
- `redis` — cache and queue backend
- `logs-receiver` — UDP log receiver
- `websocket` — WebSocket server
- `vite` — frontend dev server (dev profile only)
