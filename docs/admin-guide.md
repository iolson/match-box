# Match Box — Admin Guide

This guide walks you through setting up and running a Counter-Strike 2 tournament from scratch using the Match Box admin panel. No technical experience required — just follow the steps in order.

---

## Table of Contents

1. [Logging In](#1-logging-in)
2. [Understanding the Sidebar](#2-understanding-the-sidebar)
3. [Step 1: Verify Maps](#step-1-verify-maps)
4. [Step 2: Review Match Configs](#step-2-review-match-configs)
5. [Step 3: Add Servers](#step-3-add-servers)
6. [Step 4: Add Players](#step-4-add-players)
7. [Step 5: Create Teams](#step-5-create-teams)
8. [Step 6: Create an Event](#step-6-create-an-event)
9. [Step 7: Add Teams to the Event](#step-7-add-teams-to-the-event)
10. [Step 8: Build Rosters](#step-8-build-rosters)
11. [Step 9: Set Up Groups (Optional)](#step-9-set-up-groups-optional)
12. [Step 10: Set Up Brackets (Optional)](#step-10-set-up-brackets-optional)
13. [Step 11: Create Matches](#step-11-create-matches)
14. [Step 12: Post Announcements (Optional)](#step-12-post-announcements-optional)
15. [Quick Reference: Steam ID](#quick-reference-steam-id)
16. [Quick Reference: Country Codes](#quick-reference-country-codes)
17. [Checklist: Day-of-Event](#checklist-day-of-event)

---

## 1. Logging In

Open your browser and go to:

```
http://localhost:8080/admin
```

Enter the email and password that were set during installation. If you used the defaults, they are:

- **Email:** `admin@matchbox.local`
- **Password:** `changeme`

> If you don't know the login credentials, ask whoever set up Match Box to check the `ADMIN_EMAIL` and `ADMIN_PASSWORD` values in the `.env` file, or have them run `make shell` and then `php artisan matchbox:create-admin` to create a new admin account.

---

## 2. Understanding the Sidebar

After logging in, you'll see the admin dashboard with a sidebar on the left. Here's what each section is for:

| Sidebar Item | What It Does |
|---|---|
| **Dashboard** | Home page — overview of your panel |
| **Events** | Tournaments / LANs you're running |
| **Teams** | Team profiles (org name, tag, logo) |
| **Players** | Individual player profiles with Steam IDs |
| **Servers** | CS2 game servers you'll run matches on |
| **Matches** | Individual matches between two teams |
| **Match Configs** | Reusable match format presets (BO1, BO3, etc.) |
| **Maps** | The CS2 map pool available for your events |
| **Announcements** | Messages displayed on the public site |

---

## Step 1: Verify Maps

**Where:** Sidebar → **Maps**

Match Box comes pre-loaded with CS2 maps:

- **Active:** Ancient, Anubis, Dust2, Inferno, Mirage, Nuke, Overpass
- **Reserve (inactive):** Train, Vertigo

**What to do:**

- Review the list and confirm it matches the maps you want to use.
- To **remove a map** from the pool: click the edit icon, toggle **Is Active** off, and save.
- To **add a custom map**: click **New Map** and fill in:
  - **Name** — the technical map name (e.g., `de_train`)
  - **Display Name** — the human-readable name (e.g., `Train`)
  - **Is Active** — leave on
  - **Sort Order** — controls the display order (lower = first)

> You probably don't need to change anything here unless your tournament uses workshop maps or a non-standard pool.

---

## Step 2: Review Match Configs

**Where:** Sidebar → **Match Configs**

Match Box comes with three pre-built configurations:

| Config | Best Of | Rounds Per Half | Overtime | Knife Round |
|---|---|---|---|---|
| Standard BO1 | 1 map | 12 (MR12) | On ($12,500) | On |
| Standard BO3 | 3 maps | 12 (MR12) | On ($12,500) | On |
| Standard BO5 | 5 maps | 12 (MR12) | On ($12,500) | On |

**What to do:**

- These match CS2 Premier/competitive defaults. If they work for your event, skip this step.
- To **create a custom config**: click **New Match Config** and fill in:
  - **Name** — descriptive name (e.g., `Casual BO1 - No Overtime`)
  - **Best Of** — 1, 3, or 5
  - **Max Rounds** — rounds per half (12 = MR12 = 24 total regulation rounds)
  - **Overtime Enabled** — toggle on/off
  - **Overtime Start Money** — default is `12500` ($12,500)
  - **Overtime Max Rounds** — default is `3` (3 rounds per OT half)
  - **Knife Round Enabled** — if on, teams play a knife round to pick sides
  - **Streamer Mode** — hides sensitive info from overlays
  - **Heatmap Enabled** — records X/Y/Z position data for kills

---

## Step 3: Add Servers

**Where:** Sidebar → **Servers**

You need at least one CS2 game server for each match you want to run simultaneously.

Click **New Server** and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **IP** | Server IP address and port | `192.168.1.100:27015` |
| **RCON Password** | The server's RCON password (used to send commands) | `my-rcon-password` |
| **Hostname** | A friendly name for this server (optional) | `Server 1 - Main Stage` |
| **GOTV IP** | GOTV spectator IP if available (optional) | `192.168.1.100:27020` |
| **Is Available** | Toggle on if the server is ready to use | On |

> **Where do I find the RCON password?** It's set in the CS2 server's `server.cfg` file. Look for the line `rcon_password "something"`. If you're running your own server, you set this yourself. If someone else manages the servers, ask them.

Repeat for each server you have available.

---

## Step 4: Add Players

**Where:** Sidebar → **Players**

Add every player who will participate in your tournament. You need their Steam ID.

Click **New Player** and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **Steam ID** | The player's SteamID64 (a 17-digit number) | `76561198012345678` |
| **Name** | The player's in-game name or alias | `s1mple` |
| **Country Code** | Two-letter country code (optional) | `UA` |
| **Avatar Path** | URL or path to their avatar image (optional) | *(leave blank)* |

### How to Find a Player's Steam ID

The **Steam ID** must be in **SteamID64** format — a 17-digit number that starts with `7656119`.

**Method 1: Steam Profile URL**
1. Open the player's Steam profile in a browser.
2. If their URL looks like `https://steamcommunity.com/profiles/76561198012345678`, the number at the end is their SteamID64.
3. If their URL uses a custom name (like `https://steamcommunity.com/id/playername`), use Method 2.

**Method 2: SteamID Lookup Tool**
1. Go to [steamid.io](https://steamid.io) or [steamidfinder.com](https://steamidfinder.com).
2. Paste the player's Steam profile URL, custom URL, or any form of their Steam ID.
3. Copy the **steamID64** value (the 17-digit number).

**Method 3: Ask the Player**
1. Have the player open Steam.
2. Go to **Steam → Settings → Interface** and enable **"Display Steam URL address bar when available"**.
3. Click on their own profile name at the top.
4. The URL bar will show their profile URL — use Method 1 or 2 to convert it.

> **Common mistake:** Don't use the old `STEAM_0:1:12345` format. Match Box requires the 17-digit SteamID64 number.

> **Tip:** If you're running a small LAN and collecting registrations ahead of time, ask players to submit their Steam profile link on a sign-up form. You can batch-look them up on steamid.io.

---

## Step 5: Create Teams

**Where:** Sidebar → **Teams**

Create each team that will participate.

Click **New Team** and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **Name** | Full team name | `Natus Vincere` |
| **Short Name** | Team tag/abbreviation (max 10 characters) | `NAVI` |
| **Country Code** | Two-letter country code (optional) | `UA` |
| **Logo Path** | URL or path to team logo (optional) | *(leave blank)* |
| **Link** | Team website or social media (optional) | `https://navi.gg` |

> **Important:** At this point, you are just creating the team profile. You'll assign players to teams in Step 8 (after creating an Event).

---

## Step 6: Create an Event

**Where:** Sidebar → **Events**

An Event represents your tournament or LAN. Everything — teams, matches, brackets, groups — is organized under an Event.

Click **New Event** and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **Name** | Tournament name | `Summer LAN 2026` |
| **Description** | Brief description (optional) | `16-team CS2 tournament` |
| **Location** | Venue name or address (optional) | `Dave's Gaming Lounge` |
| **Start Date** | First day of the event | `2026-07-15` |
| **End Date** | Last day of the event | `2026-07-17` |
| **Logo Path** | URL or path to event logo (optional) | *(leave blank)* |
| **Link** | Event website or registration page (optional) | *(leave blank)* |
| **Is Active** | Toggle on — this makes the event visible on the public site | On |

After saving, you'll be taken to the Event edit page. This is where you'll do Steps 7–10.

---

## Step 7: Add Teams to the Event

**Where:** Event edit page → **Teams** tab (at the bottom)

Now you register which teams are participating in this specific event.

Click **New** in the Teams section and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **Team** | Select a team from the dropdown | `Natus Vincere` |
| **Seed** | The team's seed number (optional) | `1` |
| **Group** | Group letter assignment (optional) | `A` |

Repeat for every team in the tournament.

> **Why separate Teams from Event Teams?** A team profile (Step 5) exists across your entire Match Box instance. Adding them to an Event registers them for *this specific tournament*. The same team can participate in multiple events.

---

## Step 8: Build Rosters

**Where:** Event edit page → **Rosters** tab (at the bottom)

> **Note:** The Rosters tab appears on the Event edit page and shows rosters for all teams in this event. Each roster entry connects a Player to a Team for this specific Event.

For each team in the event, add their players:

Click **New** in the Rosters section:

| Field | What to Enter | Example |
|---|---|---|
| **Player** | Select a player from the dropdown | `s1mple` |

Repeat until every player on every team has been added.

> **Why are rosters per-event?** A player might be on Team A for one tournament and Team B for another. Rosters are tied to the event so the same player can have different team assignments across events.

---

## Step 9: Set Up Groups (Optional)

**Where:** Event edit page → **Groups** tab (at the bottom)

If your tournament has a group stage, create the groups here.

Click **New** in the Groups section:

| Field | What to Enter | Example |
|---|---|---|
| **Name** | Group name | `Group A` |
| **Sort Order** | Display order (lower = first) | `1` |

Repeat for each group (e.g., Group A, Group B, Group C, Group D).

> **Skip this step** if your tournament is a direct bracket (e.g., single elimination with no group stage).

---

## Step 10: Set Up Brackets (Optional)

**Where:** Event edit page → **Brackets** tab (at the bottom)

If your tournament has a playoff/bracket stage, create the bracket(s) here.

Click **New** in the Brackets section:

| Field | What to Enter | Example |
|---|---|---|
| **Name** | Bracket name | `Playoffs` |
| **Type** | Bracket format | `Single Elimination` |
| **Sort Order** | Display order | `1` |

Available bracket types:
- **Single Elimination** — lose once and you're out
- **Double Elimination** — upper and lower bracket (must lose twice to be eliminated)
- **Swiss** — Swiss-system format (teams play opponents with similar records)

> If you're running double elimination, create two bracket entries: one for the **Upper Bracket** and one for the **Lower Bracket**.

---

## Step 11: Create Matches

**Where:** Sidebar → **Matches**

Now create the actual matches. Each match is a contest between two teams on a server.

Click **New Match** and fill in:

| Field | What to Enter | Example |
|---|---|---|
| **Server** | Select the game server to use | `192.168.1.100:27015` |
| **Event** | Select the event this match belongs to | `Summer LAN 2026` |
| **Team A** | Select first team (from event teams) | `Natus Vincere` |
| **Team B** | Select second team (from event teams) | `FaZe Clan` |
| **Status** | Leave as **Not Started** | `Not Started` |
| **Best Of** | Number of maps (1, 3, or 5) | `1` |
| **Max Rounds** | Rounds per half (12 = MR12) | `12` |
| **Overtime Enabled** | Toggle on if you want overtime | On |
| **Knife Round Enabled** | Toggle on for knife-round side pick | On |
| **Scheduled At** | Match start time (optional) | `2026-07-15 14:00` |

Repeat for every match in your tournament.

**Tips for creating matches:**
- Create **group stage matches** first, then **playoff matches** after groups finish.
- For playoff matches, you can create them ahead of time and leave Team A / Team B empty — fill them in once the qualifying teams are decided.
- The **Status** field will update automatically as the match progresses once connected to a game server. You generally don't need to change it manually.

---

## Step 12: Post Announcements (Optional)

**Where:** Sidebar → **Announcements**

Announcements appear on the public-facing site. Use them for schedule changes, delays, or general info.

Click **New Announcement**:

| Field | What to Enter | Example |
|---|---|---|
| **Event** | Link to a specific event (optional) | `Summer LAN 2026` |
| **Message** | The announcement text | `Round 2 matches start at 3:00 PM` |
| **Is Active** | Toggle on to display, off to hide | On |

---

## Quick Reference: Steam ID

Match Box uses **SteamID64** format — a 17-digit number starting with `7656119`.

| Format | Example | Used by Match Box? |
|---|---|---|
| SteamID64 | `76561198012345678` | **Yes** |
| SteamID | `STEAM_0:0:26039975` | No |
| SteamID3 | `[U:1:52079950]` | No |

**How to look up a SteamID64:**
1. Go to [steamid.io](https://steamid.io)
2. Paste any Steam profile URL, Steam ID, or vanity name
3. Copy the **steamID64** value

---

## Quick Reference: Country Codes

Country codes use the **ISO 3166-1 alpha-2** standard (two uppercase letters).

| Country | Code |
|---|---|
| United States | `US` |
| United Kingdom | `GB` |
| Germany | `DE` |
| France | `FR` |
| Sweden | `SE` |
| Denmark | `DK` |
| Brazil | `BR` |
| Ukraine | `UA` |
| Russia | `RU` |
| China | `CN` |
| South Korea | `KR` |
| Australia | `AU` |
| Canada | `CA` |
| Poland | `PL` |

Full list: [ISO 3166-1 alpha-2 on Wikipedia](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)

---

## Checklist: Day-of-Event

Use this checklist on tournament day to make sure everything is set up:

**Before the event:**
- [ ] All players added with correct SteamID64s
- [ ] All teams created
- [ ] Event created and set to **Active**
- [ ] All teams added to the Event with seeds (if applicable)
- [ ] Rosters built for every team
- [ ] Groups created (if using group stage)
- [ ] Brackets created (if using playoffs)
- [ ] Game servers added and marked **Available**
- [ ] At least one match created for the first round

**At match time:**
- [ ] Server is running and accessible
- [ ] Match is created with correct teams and server
- [ ] Players connect to the server

**Between rounds:**
- [ ] Update bracket/group results as needed
- [ ] Create next round matches with the advancing teams
- [ ] Post announcements for schedule updates

**After the event:**
- [ ] All match results are recorded
- [ ] Toggle Event's **Is Active** to off (if you want to archive it)
