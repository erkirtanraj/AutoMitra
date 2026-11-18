# AutoMitra Backend

Laravel 13 REST API foundation.

## Requirements

- PHP 8.3+
- Composer 2
- MySQL 8.4
- Required PHP extensions including PDO MySQL, OpenSSL, Mbstring, Tokenizer, XML, Ctype, JSON and Fileinfo

## Setup

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```

Create a MySQL database named `automitra`, then configure DB credentials in `.env`.

```bash
php artisan migrate --seed
php artisan serve
```

Health check: `GET http://127.0.0.1:8000/api/v1/health`

## Authentication endpoints

- `POST /api/v1/auth/register`
- `POST /api/v1/auth/login`
- `GET /api/v1/auth/me` (Bearer token)
- `POST /api/v1/auth/logout` (Bearer token)

Registration creates a customer role and a Sanctum personal access token. Before production, add email/phone verification, password reset, token expiry/revocation policy, abuse monitoring and security review.

## Tests

```bash
php artisan test
vendor/bin/pint --test
```

The test environment uses in-memory SQLite; local development uses MySQL 8.4.

## Security notes

Never commit `.env`, API keys, database passwords or payment secrets. Configure production secrets through the deployment environment. This foundation is not production-ready until verification, password recovery, authorization policies, privacy controls and deployment hardening are completed.
