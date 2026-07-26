# wordpress-elementor

Live: https://wordpress-elementor.onrender.com  
Repo: https://github.com/ankitdev597/wordpress-elementor.git

Push to `main` → Render builds Docker → MySQL auto-links → SQL imports on first boot → site URL is set. No manual DB setup.

## Deploy (one-time Blueprint)

1. Push this repo to GitHub (`main`).
2. [Render Blueprints](https://dashboard.render.com/blueprints) → New → select `ankitdev597/wordpress-elementor` → Apply.
3. Wait for **mysql-wordpress** Live, then **wordpress-elementor** Live.
4. Open https://wordpress-elementor.onrender.com

**Important:** Do not set Railway (`*.rlwy.net`) DB env vars. Delete any manual `WORDPRESS_DB_*` that point outside Render so Blueprint wiring works.

Starter plan (or higher) is required for disks + private MySQL.

## Local Docker

```bash
docker compose up --build
```

http://localhost:8080 — DB `wordpress` / `wordpress` (SQL auto-imports once).

## What the container does on start

1. Syncs `usnews` theme + Elementor onto the disk
2. Waits for MySQL
3. Copies WordPress core if needed
4. Imports `database/usnews_wordpress.sql` when the DB is empty
5. Sets `siteurl` / `home` to `WORDPRESS_SITE_URL`
6. Starts Apache on `$PORT` (10000 on Render)

## Env (auto on Render)

| Variable | Value |
| --- | --- |
| `WORDPRESS_DB_*` | from private `mysql-wordpress` |
| `WORDPRESS_SITE_URL` | `https://wordpress-elementor.onrender.com` |
| `PORT` | `10000` |
