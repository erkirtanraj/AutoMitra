# AutoMitra Product Requirements Document (PRD)

- Status: Initial baseline
- Product: AutoMitra
- Market: India
- Clients: Responsive website, Android app, dealer portal, admin console

## 1. Vision

Build a trustworthy automotive discovery and classifieds marketplace that helps people research new cars, find used cars, compare vehicles and contact sellers. Give dealers a practical inventory and enquiry management product.

## 2. Business objectives

1. Build a searchable, useful vehicle catalogue.
2. Acquire verified dealers and genuine seller inventory.
3. Generate consent-based buyer enquiries and measure their outcomes.
4. Establish recurring revenue from dealer subscriptions.
5. Add promoted listings, advertising and compliant partner referrals.
6. Keep marketplace trust, privacy and listing quality central to growth.

## 3. Target users

- Car buyers researching new vehicles.
- Used-car buyers comparing price, age, mileage and location.
- Individual used-car sellers.
- New- and used-car dealerships.
- Automotive advertisers and authorized finance/insurance partners.
- Internal operations, moderation, sales and support teams.

## 4. MVP scope

### P0 — required for first public release

- Public homepage and navigation.
- New-car make, model and variant catalogue.
- Vehicle specifications and editorial price fields with source and last-updated date.
- Used-car listing creation, image upload and moderation.
- Search by keyword, make, model, price, year, fuel, transmission and location.
- Vehicle detail page and enquiry form.
- User registration, login and profile.
- Dealer registration, verification status and basic inventory dashboard.
- Admin management for users, dealers, catalogue, listings and enquiries.
- Consent capture and auditable enquiry assignment.
- SEO metadata, sitemap, canonical URLs and structured data where eligible.
- Responsive accessibility-conscious UI.

### P1 — monetization and retention

- Dealer subscription plans and entitlements.
- Featured listing checkout and promotion expiry.
- Lead status tracking, assignment and dealer response tracking.
- Saved cars and saved comparisons.
- EMI calculator with clear illustrative assumptions.
- Payment reconciliation, refunds and invoices.
- Email/push notifications and renewal reminders.
- Basic analytics and CSV exports.

### P2 — expansion

- Advanced dealer CRM and multiple staff accounts.
- Editorial news/reviews and video galleries.
- City-level price intelligence using verified sources.
- Inspection booking through service partners.
- Finance and insurance partner journeys through appropriately authorized entities.
- Advanced recommendations and personalization.
- iOS client, if commercially justified.

## 5. Out of scope for initial MVP

- AutoMitra buying or holding vehicle inventory.
- Guaranteed vehicle valuation.
- Direct underwriting, lending, insurance selling or claims handling.
- Unlicensed insurance distribution or financial advice.
- Unverified real-time on-road pricing.
- Scraping competitor databases or reusing third-party copyrighted images/content.
- Automated social posting or complex AI features unrelated to the core marketplace.

## 6. Core user journeys

### Buyer
1. Browse or search cars.
2. Apply filters and open a vehicle detail page.
3. Compare vehicles or save a favourite.
4. Submit an enquiry with clear consent and contact preferences.
5. Receive acknowledgement and dealer contact.
6. Track enquiry status where authenticated.

### Individual seller
1. Register and verify contact details.
2. Enter vehicle details, location, ownership and condition.
3. Upload original photographs and supporting details.
4. Submit listing for moderation.
5. Respond to buyer enquiries.
6. Renew, edit or close the listing.

### Dealer
1. Register business and submit verification documents.
2. Admin reviews and approves dealer account.
3. Select a plan and pay where applicable.
4. Add and manage inventory within plan limits.
5. Receive consented enquiries.
6. Update lead status and view performance reports.

### Administrator
1. Review user, dealer and listing queues.
2. Maintain make/model/variant catalogue and price sources.
3. Moderate listings and reported content.
4. Manage subscriptions, payments, promotions and refunds.
5. Monitor lead assignment, consent and complaints.
6. Review revenue, traffic, audit logs and operational reports.

## 7. Functional requirements

- Search results must support pagination, sorting and filter combinations.
- Listings must have lifecycle states: draft, pending, published, rejected, expired, sold and archived.
- Dealers must only access their own inventory and leads unless explicitly authorized.
- Paid placement must be labelled and must not bypass safety or moderation checks.
- Enquiry records must retain consent text/version, timestamp, source, intended recipients and sharing scope.
- Lead billing must be idempotent and reversible through an auditable adjustment/refund workflow.
- Payment status must be based on verified server-side gateway events, not client redirects.
- Admin actions affecting money, leads, verification or content must be audited.
- Every price must indicate whether it is ex-showroom, on-road, indicative or seller-quoted, plus city/source/date where applicable.

## 8. Non-functional requirements

- Mobile-first responsive design.
- Secure authentication, authorization and rate limiting.
- Personal data minimization and explicit consent.
- Reliable image processing and storage.
- Search pages should be indexable without generating unbounded duplicate URLs.
- Target 99.5% monthly availability after production stabilization.
- Performance budgets: optimize Core Web Vitals; lazy-load below-fold media and use responsive image sizes.
- Backups, monitoring, error reporting and tested restore procedures.
- WCAG-informed keyboard navigation, contrast and form accessibility.

## 9. Trust, safety and compliance

- Verify dealers and clearly distinguish verified from unverified sellers.
- Provide report-listing, block and complaint workflows.
- Do not claim inspection, ownership or accident-free status without evidence.
- Collect only necessary personal information and define retention/deletion rules.
- Share customer data only with disclosed, consented recipients.
- Review applicable Indian privacy, consumer protection, advertising, tax, payment and intermediary requirements with qualified counsel.
- Insurance/credit referrals must operate through appropriately authorized partners and approved agreements.

## 10. Success metrics

- Active verified dealers.
- Published and available listings.
- Listing completeness and freshness.
- Search-to-detail click-through rate.
- Detail-to-enquiry conversion.
- Verified and contactable lead rate.
- Dealer response time and lead outcome.
- Dealer renewal and churn.
- Paid listing conversion.
- Monthly recurring revenue (MRR), revenue by source and contribution margin.
- Customer complaints, duplicate/fraud listing rate and refund rate.

## 11. Acceptance criteria for MVP

- A visitor can search and view new and used cars on mobile and desktop.
- A seller can submit a listing with images for moderation.
- An approved dealer can manage only its own inventory.
- A buyer can submit an enquiry after seeing the consent disclosure.
- Admin can approve/reject listings and dealers and inspect the audit trail.
- Search filters, pagination and canonical URLs behave consistently.
- No secret keys or payment credentials are exposed in client applications.
- Critical user journeys pass documented manual/API tests.
