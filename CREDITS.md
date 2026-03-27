# Credits

## Original Project

match-box is a modernized successor to **eBot**, the original open-source match management system for Counter-Strike.

### eBot-CSGO-Web
- **Repository:** [github.com/deStrO/eBot-CSGO-Web](https://github.com/deStrO/eBot-CSGO-Web)
- **Author:** deStrO
- **Description:** Symfony-based web panel for managing CS:GO matches, teams, servers, and seasons.

### eBot-CSGO
- **Repository:** [github.com/deStrO/eBot-CSGO](https://github.com/deStrO/eBot-CSGO)
- **Author:** deStrO
- **Description:** Node.js match engine handling RCON communication, round tracking, and log parsing.

## What We Inherit

- The core concept of a web-managed match system with RCON integration
- The general data model for matches, maps, teams, and player statistics
- The approach of real-time log parsing for match state tracking
- The kill/round event tracking schema for detailed statistics

## What We Change

- **Complete rewrite** from Symfony + Node.js to Laravel + Filament
- **CS2 native** — MR12 defaults, CS2 weapon names, updated game mechanics
- **Docker-first** — single `docker compose up` deployment
- **Modern admin** — Filament v3 replaces custom Symfony admin
- **Tournament support** — events, groups, brackets, seeding, rosters
- **Venue screens** — dedicated display mode for projectors at LAN events
- **Optional CS2 plugin** — CounterStrikeSharp for enhanced server-side control

## Thank You

Special thanks to **deStrO** and all contributors to the original eBot project for establishing the foundation that countless tournament organizers have relied on for years.
