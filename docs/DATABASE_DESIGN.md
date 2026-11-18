# AutoMitra Database Design Baseline

This is a logical starting design. Final migrations should be created and reviewed incrementally.

## 1. Identity and access

### users
- id (PK)
- name
- email (unique nullable)
- phone (unique nullable; normalized)
- password
- status
- email_verified_at
- phone_verified_at
- created_at, updated_at, deleted_at

### roles, permissions, role_user, permission_role
Use explicit role/permission mapping. Roles may include customer, seller, dealer_staff, dealer_admin, support, moderator, finance_admin and super_admin. Enforce authorization in backend policies, not UI visibility alone.

### dealers
- id (PK)
- legal_name
- display_name
- business_type
- registration identifiers as legally required and access-restricted
- address fields, city_id
- verification_status
- verified_at
- created_by
- timestamps

### dealer_users
- dealer_id
- user_id
- role
- status

## 2. Vehicle catalogue

### brands
- id, name, slug, logo_media_id, status

### car_models
- id, brand_id, name, slug, body_type, launch_status

### car_variants
- id, model_id, name, fuel_type, transmission, engine_cc, seating_capacity, status

### car_specs
- id, variant_id, spec_key, spec_value, unit, source, updated_at

### car_price_observations
- id, variant_id, city_id, price_type, amount_paise, currency, source_name, source_url, observed_at, valid_until

Do not overwrite historical price observations when a price changes.

## 3. Used-car listings

### used_cars
- id, seller_user_id, dealer_id nullable
- variant_id nullable
- title, description
- registration_year, odometer_km
- fuel_type, transmission, ownership_count
- asking_price_paise
- city_id, locality
- listing_status
- moderation_status
- published_at, expires_at, sold_at
- timestamps

### media_assets
- id, owner_user_id, storage_key, mime_type, size_bytes, width, height, checksum, moderation_status

### used_car_media
- used_car_id, media_asset_id, sort_order, is_primary

### listing_reports
- id, listing_id, reporter_user_id nullable, reason, details, status, resolved_by, resolved_at

## 4. Enquiries and consent

### enquiries
- id, buyer_user_id nullable
- listing_id nullable, variant_id nullable
- name, phone_e164, city_id, budget_min_paise, budget_max_paise
- purchase_timeline
- source_channel, status
- created_at

### consent_records
- id, enquiry_id, purpose, notice_version, recipient_scope, consented_at, withdrawn_at, source_ip_hash

### lead_assignments
- id, enquiry_id, dealer_id, assigned_at, delivery_status, delivered_at, accepted_at, rejected_at

### lead_events
- id, assignment_id, actor_user_id, event_type, notes, created_at

### lead_billing_items
- id, assignment_id, amount_paise, status, invoice_id nullable, reversal_of_id nullable

Enforce deduplication and recipient limits in service logic and, where possible, database constraints.

## 5. Monetization

### plans
- id, code, name, price_paise, billing_period, status

### plan_entitlements
- id, plan_id, entitlement_key, entitlement_value

### subscriptions
- id, dealer_id, plan_id, status, starts_at, ends_at, gateway_subscription_id

### payments
- id, account_user_id, dealer_id nullable, purpose, amount_paise, currency, gateway, gateway_order_id, gateway_payment_id, status, paid_at

### payment_events
- id, gateway_event_id (unique), event_type, payload_hash, processed_at, status

### financial_ledger
- id, account_id, source_type, source_id, entry_type, amount_paise, currency, reversal_of_id, created_at

### promotions
- id, listing_id nullable, dealer_id, package_code, amount_paise, starts_at, ends_at, status, payment_id

### ad_campaigns
- id, advertiser_name, campaign_name, creative_media_id, placement, starts_at, ends_at, status, sponsored_disclosure

### partner_referrals
- id, enquiry_id, partner_id, service_type, consent_record_id, status, external_reference, commission_paise, settled_at

## 6. Supporting data

- cities and states (normalized location catalogue).
- favorites.
- comparisons and comparison_items.
- articles, article_categories and article_media.
- notifications and notification_preferences.
- invoices and invoice_items.
- audit_logs.
- support_tickets.
- app_settings.

## 7. Indexing guidance

- Unique indexes for normalized email/phone where applicable.
- Composite indexes for published listings by city/status/price/year.
- Index dealer_id + listing_status.
- Index enquiry created_at/status and assignment dealer_id/status.
- Unique gateway event identifiers.
- Index subscription status/ends_at for renewal jobs.
- Full-text indexes only after language and relevance behavior are tested.

## 8. Data governance

- Store amounts as integer paise.
- Store timestamps in UTC.
- Restrict sensitive dealer and customer fields.
- Encrypt sensitive identifiers where appropriate.
- Define retention and deletion policies.
- Never store raw card credentials.
- Audit access to customer leads and personal data.
