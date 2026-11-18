# AutoMitra Technical Requirements Document (TRD)

- Status: Proposed architecture
- Backend: Laravel REST API
- Database: MySQL 8.4
- Web: React + Vite
- Android: Flutter

## 1. Architecture

Use a modular monolith initially. This reduces operational complexity while keeping domain boundaries clear. Extract services only when scale or team ownership justifies it.

Clients:
- React web application.
- Flutter Android application.
- Admin and dealer experiences (role-aware web application; separate deployment may be used later).

Backend modules:
- Identity and access.
- Vehicle catalogue.
- Used-car listings and media.
- Search and discovery.
- Dealers and inventory.
- Enquiries and lead routing.
- Plans, subscriptions and entitlements.
- Payments, invoices and refunds.
- Promotions and advertisements.
- Editorial content and SEO.
- Notifications.
- Reporting and audit.

## 2. Proposed repository layout

```text
AutoMitra/
  apps/
    web/
    android/
  admin/
    web/
  backend/
    app/
      Domain/
        Identity/
        Catalogue/
        Listings/
        Dealers/
        Leads/
        Billing/
        Promotions/
        Content/
      Http/
      Jobs/
      Policies/
    database/
      migrations/
      seeders/
    routes/
    tests/
  docs/
  design/
  infra/
  .github/workflows/
```

This is a target layout, not a claim that these directories already exist.

## 3. API conventions

- Prefix: /api/v1
- JSON request/response.
- REST resources with consistent plural nouns.
- Pagination: page, per_page; enforce maximum page size.
- Filtering and sorting use allowlisted fields.
- Standard errors: code, message, details, request_id.
- Authentication: Sanctum for first-party clients; token abilities and expiry policy for API tokens.
- Authorization: policies/gates and server-side ownership checks.
- Idempotency keys for payment, subscription and lead-billing operations.
- API versioning and OpenAPI documentation.

Example resource groups:
- /auth/*
- /brands, /models, /variants
- /cars, /cars/{id}
- /used-cars, /used-cars/{id}
- /dealers, /dealer/inventory
- /enquiries, /dealer/leads
- /comparisons
- /plans, /subscriptions
- /payments, /webhooks/*
- /promotions
- /admin/*

## 4. Data and storage

- MySQL 8.4 as transactional source of truth.
- InnoDB, foreign keys and appropriate composite indexes.
- Store money as integer minor units (paise) plus ISO currency code.
- Store timestamps in UTC; render in user locale.
- Store images in private/public S3-compatible object storage according to access needs; database stores metadata and object keys.
- Generate thumbnails and responsive variants asynchronously.
- Keep source, timestamp and city for price observations.
- Use soft deletion only where business/legal retention permits; define actual retention policies.

## 5. Search

MVP:
- MySQL indexed search and normalized filter columns.
- Index make/model, city, price, year, fuel, transmission, status and published_at.
- Avoid leading-wildcard queries on large tables.
- Add a dedicated search engine (e.g. OpenSearch/Meilisearch) only after query volume and relevance needs justify it.

## 6. Background processing

Use Laravel queues for:
- Image processing.
- Email and push notifications.
- Expiry and renewal reminders.
- Lead routing and SLA reminders.
- Sitemap and feed generation.
- Payment reconciliation and reports.

Redis may be introduced for queue/cache/rate-limit workloads. Queue jobs must be retry-safe and idempotent.

## 7. Payment integration

- Use a hosted/official payment flow from the selected gateway.
- Verify webhook signatures server-side.
- Never trust client-side success state.
- Store gateway order/payment/refund identifiers.
- Reconcile gateway settlements against internal ledger.
- Keep payment events immutable; record adjustments rather than rewriting history.
- Never store card credentials or sensitive payment authentication data.

## 8. Security

- Validate all input server-side.
- Use CSRF protection for cookie-authenticated web flows.
- Apply rate limits to login, OTP, search, enquiry and upload endpoints.
- Restrict upload MIME types, size, dimensions and file count; scan where feasible.
- Use signed URLs for private documents.
- Enforce object-level authorization to prevent IDOR.
- Encrypt secrets at rest and use environment/secret manager configuration.
- Maintain dependency updates, security headers, TLS and backups.
- Redact personal data and tokens from logs.
- Record privileged admin actions in append-only audit records.
- Conduct vulnerability and access-control testing before public launch.

## 9. Privacy and consent

- Show purpose-specific consent before sharing an enquiry with a dealer/partner.
- Record consent version, timestamp, source, recipient category and withdrawal status.
- Provide privacy notice, grievance contact and account/data request process.
- Limit retention and access to personal data.
- Do not use customer data for unrelated marketing without valid consent.
- Review applicable Indian law and sector-specific partner requirements before launch.

## 10. Observability and operations

- Centralized structured logs with request IDs.
- Error monitoring and uptime checks.
- Metrics for API latency, error rate, queue depth, payment failures and lead delivery.
- Database backup schedule and restore drills.
- Staging environment with synthetic/test data.
- CI pipeline: lint, static analysis, unit tests, feature tests and build.
- Deployment with health checks and rollback procedure.

## 11. Performance and scale

Initial target:
- Support a modest launch workload with horizontal-ready stateless API nodes.
- Cache public catalogue data and popular filters.
- CDN for public images and static assets.
- Paginate all listings and admin tables.
- Add database read replicas only when measured read load requires them.
- Load-test search, listing pages, enquiry submission and webhook processing.

## 12. Testing

- Unit tests for pricing, entitlements, lead qualification and state transitions.
- Feature tests for authentication, ownership, moderation and enquiry consent.
- Payment webhook signature and replay tests.
- API contract tests.
- Web and Android smoke tests.
- Security tests for IDOR, rate limits, upload validation and privilege escalation.
- Load tests before major marketing campaigns.
