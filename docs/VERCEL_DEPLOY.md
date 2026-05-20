# Vercel deployment (PHP)

## Root cause: `.php` downloads instead of rendering

Vercel only executes PHP through **Serverless Functions** (`vercel-php` runtime). Files under `user/`, `farmer/`, or `officers/` are plain project files unless routed into `api/*.php`.

If `vercel.json` routes a URL like `/user/user.php` to the static path `/user/user.php` **before** the PHP runtime, Vercel serves the raw file (browser download or `<?php` source).

Login worked because `/` and `/index.php` already pointed at `/api/index.php`, which is registered with `vercel-php`.

## Fix

- `api/router.php` — includes the real `.php` file named in `?file=...`
- Routes send every `*.php` (except `/api/*`) to `/api/router.php?file=$1`
- `filesystem` runs **after** PHP routes so CSS/JS/images stay static

## Root Directory (Vercel project setting)

| Layout | Vercel **Root Directory** | Config file used |
|--------|---------------------------|------------------|
| Full repo (login at `/`, dashboards at `/user/user.php`, etc.) | `.` (repository root) | `vercel.json` |
| Admin app only (`user.php` at site root) | `user` | `user/vercel.json` |

Set in: **Vercel → Project → Settings → General → Root Directory**.

Wrong root directory = wrong `vercel.json` or missing `api/` → PHP pages break or download.

## Environment variables

- `DATABASE_URL` — PostgreSQL connection string (`sslmode=require`), required for login and dashboards.
- `AUTH_SECRET` (optional) — signs the `crops_auth` cookie used on Vercel. PHP file sessions are not shared across serverless invocations; without this cookie, login succeeds but the dashboard immediately sends you back to `/`.

## Login redirect URLs (monorepo root)

| User (level) | After login |
|--------------|-------------|
| admin (1) | `/user/user.php` |
| Farmer (2) | `/farmer/user.php` |
| Agronomist (3) | `/officers/user.php` |

With **Root Directory** = `user`, admin lands on `/user.php` instead.

## Redeploy

1. Commit and push `vercel.json`, `api/router.php`, and (if using `user` root) `user/vercel.json` + `user/api/router.php`.
2. Confirm **Root Directory** matches your layout (table above).
3. Vercel → **Deployments** → **Redeploy** latest (or push triggers a new build).
4. Test:
   - `https://<your-domain>/` — login page (HTML, not download)
   - `https://<your-domain>/user/user.php` (monorepo) or `/user.php` (user root) — dashboard HTML after login

## Local development

- XAMPP: use `index.php` at repo root or `user/` as usual.
- Vercel CLI: `vercel dev` from the same root directory as production; PHP must be installed locally.
