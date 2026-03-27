# Contributing to match-box

Thanks for your interest in contributing! This guide will help you get started.

## Development Setup

1. Fork and clone the repository:

```bash
git clone https://github.com/<your-fork>/match-box.git
cd match-box
```

2. Start the development environment:

```bash
make init
make dev  # includes Vite dev server for frontend work
```

3. Create an admin user:

```bash
docker compose exec php php artisan make:filament-user
```

## Development Workflow

1. Create a branch from `main`:

```bash
git checkout -b feature/your-feature-name
```

2. Make your changes.

3. Run the test suite:

```bash
make test
```

4. Ensure code coverage stays above 85%:

```bash
make coverage
```

5. Commit your changes and push:

```bash
git add .
git commit -m "Add your feature description"
git push origin feature/your-feature-name
```

6. Open a Pull Request against `main`.

## Code Style

- **PHP**: Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards. Laravel Pint is available for auto-formatting:

```bash
docker compose exec php ./vendor/bin/pint
```

- **JavaScript/TypeScript**: Use the project's ESLint and Prettier configurations.

## Testing

- All new features must include tests.
- Use [Pest PHP](https://pestphp.com/) for writing tests.
- Feature tests go in `src/web/tests/Feature/`.
- Unit tests go in `src/web/tests/Unit/`.
- Test database uses SQLite in-memory for speed.

## Pull Request Guidelines

- Keep PRs focused — one feature or fix per PR.
- Write a clear description of what changed and why.
- Reference any related issues.
- Ensure CI passes before requesting review.
- See the [PR template](.github/PULL_REQUEST_TEMPLATE.md) for the expected format.

## Reporting Bugs

Open an issue with:

- Steps to reproduce
- Expected behavior
- Actual behavior
- Docker and PHP version info (`docker compose version`, `docker compose exec php php -v`)

## Architecture

See [docs/architecture.md](docs/architecture.md) for an overview of the system design.

## Questions?

Open a discussion or issue — we're happy to help.
