# Codespaces checklist

1. Open this repository in GitHub Codespaces.
2. Confirm PHP 8.3+, Composer, and Node/npm are available.
3. Run `composer install`, copy `.env.example` to `.env`, then run `php artisan key:generate`.
4. For the fastest test, keep `DB_CONNECTION=sqlite` and ensure `database/database.sqlite` exists (`touch database/database.sqlite`).
5. Run `npm install && npm run build`.
6. Run `php artisan migrate` and `php artisan serve --host=0.0.0.0 --port=8000`.
7. Open port 8000 from the Codespaces Ports panel.
8. For hosted data, configure `DB_CONNECTION=pgsql` and your Supabase/PostgreSQL credentials as described in README.md.

Do not commit `.env`, database passwords, or Supabase service-role keys.
