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

- **Backend:** Laravel (PHP 8.3+), Node.js
- **Database:** MySQL 8
- **Cache/Queue:** Redis
- **Containerization:** Docker & Docker Compose
- **CS2 Plugin:** CounterStrikeSharp (C#, .NET 8) — optional

## Design Principles

- **Docker-first:** Every component runs in a container. `docker compose up` is the primary deployment method.
- **Simple for organizers:** Minimal configuration to get a tournament running.
- **Modular:** The CS2 plugin is optional; core functionality works via RCON + log receiver alone.

## Project Status

Early development — no build or test commands yet.
