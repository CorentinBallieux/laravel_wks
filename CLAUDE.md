# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Laravel 13 skeleton (PHP ^8.3) with a small `Todo` feature layered on top of the default install. Frontend tooling is Vite + Tailwind v4. Tests use Pest 4.

## Running locally — Laravel Sail

This project is dockerized with **Laravel Sail** (PHP 8.3 + MySQL 8.4). PHP/composer are not required on the host — Docker is. All commands go through `./vendor/bin/sail` (alias `sail` if you set one up).

- `sail up -d` — start the stack (web on `http://localhost`, MySQL exposed on `:3306`, Vite on `:5173`).
- `sail down` — stop containers (data persists in the `sail-mysql` volume).
- `sail artisan migrate` / `sail artisan tinker` / etc.
- `sail composer <cmd>`, `sail npm <cmd>`, `sail test`.
- `sail npm run dev` — Vite dev server with HMR. Blade templates need a `@vite([...])` directive to actually connect to it (the existing `home.blade.php` does not).
- `sail shell` — bash into the app container.

If `vendor/` ever goes missing (fresh clone), bootstrap composer via the official sail image:

```bash
docker run --rm --network host -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" -w /var/www/html \
    -e COMPOSER_HOME=/tmp/composer \
    laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```

(`--network host` is required on this machine — default bridge DNS doesn't resolve packagist. The same flag is set on the `laravel.test` service's `build:` block in `compose.yaml`.)

## Tests

- `sail test` (or `sail artisan test`) — Pest runner.
- Single test: `sail test --filter='creates properly a todo'`.
- `./vendor/bin/pint` — only PHP linter.

## Testing config worth knowing

`phpunit.xml` forces tests onto **sqlite `:memory:`** regardless of the `.env` `DB_CONNECTION` — tests don't hit the MySQL container. `tests/Pest.php` binds Feature tests to `Tests\TestCase` but **`RefreshDatabase` is commented out** — tests share the in-memory DB within a single process run. If you add tests that depend on a clean schema, either re-enable `RefreshDatabase` in `tests/Pest.php` or apply the trait per-file.

## Docker setup notes

- `compose.yaml` builds from `vendor/laravel/sail/runtimes/8.3` (was `8.5` by default — pinned to 8.3 deliberately). If you `sail artisan sail:install` again it will reset to the newest runtime; re-apply the 8.3 edit.
- `build.network: host` on the `laravel.test` service is required on this machine due to bridge DNS issues at build time.
- Code is volume-mounted (`.:/var/www/html`), so PHP changes are picked up on the next request — no rebuild needed.

## Architecture notes

Standard Laravel 13 layout — most structure is discoverable, but two things diverge from a vanilla skeleton:

- **Routing is web-only.** `bootstrap/app.php` registers `routes/web.php` and `routes/console.php` but **no `api.php`** (Laravel 13 default). The `TodoController` returns JSON directly from web routes — don't assume there's an API middleware group.
- **`TodoController::create` is a GET handler that writes** (`routes/web.php` line 10 → `TodoController.php:15`). It hardcodes `name = "faire les courses"`. This is scaffolding/demo code, not a real create endpoint — treat it as a placeholder when extending.

The default DB connection in `.env.example` is **MySQL** (`example_app`), not SQLite. Production-like local runs need a MySQL instance; tests don't (see above).
