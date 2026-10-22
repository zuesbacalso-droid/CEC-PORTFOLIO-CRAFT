# PortfolioCraft — Portfolio Generator

A simple Laravel 13 portfolio generator based on the supplied reference project, with a black, red, and blue application theme. Portfolio templates remain light, minimal, and focused on the user's work.

## Features

- Create, preview, save, edit, and delete portfolio records.
- Personal profile, bio, education, skills, projects, experience, and social links.
- Three template styles included in the existing UI: minimalist, modern grid, and creative.
- Portfolio data stored in the configured Laravel database as JSON plus searchable name/email fields.
- Responsive interface and print/export actions already present in the reference UI.
- PostgreSQL support for Supabase or another hosted PostgreSQL provider. SQLite remains the default for a quick local run.

## Run in GitHub Codespaces

Prerequisites: PHP 8.4.1+, Composer, Node.js/npm, and the PHP database extension matching your selected database. The locked Symfony dependencies require PHP 8.4.1 or newer.

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan migrate
php artisan serve --host=0.0.0.0 --port=8000
```

In Codespaces, open the **Ports** tab and open port `8000` in the browser. If `cp` is unavailable in your shell, copy `.env.example` to `.env` using the editor.

## Use Supabase PostgreSQL

1. In Supabase, open **Project Settings → Database** and copy the connection information. Prefer the pooler connection when your runtime requires it.
2. In `.env`, set the following values using your own credentials; do not commit `.env` to GitHub:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=your-supabase-postgres-host
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=your-database-user
DB_PASSWORD=your-database-password
DB_SSLMODE=require
```

Alternatively, set `DB_URL` to the PostgreSQL connection URL provided by Supabase. Use the exact host, port, username, password, and SSL requirements shown in your Supabase dashboard. Keep credentials in Codespaces Secrets or your deployment provider's environment variables.

Then run:

```bash
php artisan config:clear
php artisan migrate --force
```

Laravel's PostgreSQL PDO driver (`pdo_pgsql`) must be enabled in the runtime. Supabase is the database host; the Laravel app itself still needs a PHP-capable host/runtime.

## Database schema

The `portfolios` table stores a UUID primary key, `full_name`, `email`, a JSON `data` payload, and timestamps. The controller validates incoming data and provides JSON CRUD endpoints:

- `GET /api/portfolios`
- `POST /api/portfolios`
- `PUT /api/portfolios/{id}`
- `DELETE /api/portfolios/{id}`

## Deploying

GitHub Codespaces is a development environment, not permanent production hosting. This Laravel app is configured for Railway using the included `Dockerfile` and `railway.json`; the image builds the Vite assets, serves Laravel through Apache/PHP, and runs database migrations before starting the web server. Railway's `/up` health check verifies that the app is responding.

### Deploy to Railway

1. Push this project to a GitHub repository. If the Laravel project is inside a subfolder, set that folder as the Railway service's **Root Directory**.
2. In Railway, create a project from the GitHub repository and add a **PostgreSQL** database service. Railway detects the included Dockerfile for the Laravel service.
3. Add these variables to the Laravel service. Replace `Postgres` in the variable references with the actual name of your Railway PostgreSQL service if it differs.

   ```dotenv
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:your-generated-key
   APP_URL=https://your-generated-domain

   DB_CONNECTION=pgsql
   DB_HOST=${{Postgres.PGHOST}}
   DB_PORT=${{Postgres.PGPORT}}
   DB_DATABASE=${{Postgres.PGDATABASE}}
   DB_USERNAME=${{Postgres.PGUSER}}
   DB_PASSWORD=${{Postgres.PGPASSWORD}}
   DB_SSLMODE=prefer

   SESSION_DRIVER=database
   CACHE_STORE=database
   QUEUE_CONNECTION=database
   LOG_CHANNEL=stderr
   ```

4. Generate `APP_KEY` locally with `php artisan key:generate --show` and paste the output into Railway. Do not share or commit the key.
5. Generate a public domain for the Laravel service in Railway. Set `APP_URL` to that HTTPS URL, then redeploy if you added or changed variables after the first deployment.
6. Add your production mail settings as Railway variables so account verification emails can be delivered. Keep all credentials out of source control.

Railway supplies `PORT` at runtime; the startup script configures Apache to listen on that port. Do not set a fixed port. The startup script applies pending migrations with `php artisan migrate --force`; make sure the PostgreSQL service is connected and its variables resolve before deploying.

The app does not currently store uploaded files. If you add uploads later, use object storage or a Railway volume; files written to the container's local filesystem are not durable across deployments.

Never use SQLite or the container filesystem for production data. Do not commit `.env` or production credentials.

## Security notes

This reference project does not include user authentication or per-user authorization. Anyone who can reach the API may be able to list, change, or delete portfolios. Add authentication and ownership checks before storing real or sensitive personal information or deploying publicly. Never commit `.env` or production credentials.


## CEC PORTFOLIO CRAFT updates
- Account registration and username/password login.
- Portfolio records are scoped to the signed-in user.
- Deleted records are soft-deleted and can be restored from `/api/trash` via the UI/API; permanent deletion is a separate endpoint.
- CEC logo is stored at `public/images/cec-logo.png`.
- Run `php artisan migrate` after updating.

New accounts require a unique username and email and a password of at least 8 characters. The requested example passwords are not seeded as fixed accounts; register accounts through the sign-up screen. Never use shared demo passwords on a public deployment.

## Gmail verification and Remember Me

New accounts must verify their Gmail address with a six-digit code before they can sign in. Codes expire after 10 minutes and are rate-limited. After verification, users sign in with their username and password; the optional **Remember me on this device** checkbox uses Laravel's persistent authentication cookie.

Configure the actual `.env` file (not just `.env.example`) with a Gmail account and a Google App Password:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-gmail@gmail.com
MAIL_PASSWORD=your-google-app-password
MAIL_FROM_ADDRESS=your-gmail@gmail.com
MAIL_FROM_NAME="CEC Portfolio Craft"
```

Enable Google 2-Step Verification and create an App Password for this application. Never use your normal Gmail password or commit `.env` to source control. Then run `php artisan config:clear`. Do not leave `MAIL_MAILER=log`, because that writes messages to logs instead of delivering them.
