# AutoMitra

**India's smart car marketplace — Find. Compare. Buy. Sell. Drive.**

AutoMitra is a planned India-wide automotive marketplace with a responsive website, Android application, dealer portal and administration console. It will support new-car discovery, used-car classifieds, comparisons, seller enquiries, dealer inventory and partner referrals.

> AutoMitra is an independent product. It may learn from common automotive marketplace patterns, but must use original branding, original UI, licensed data and authorized integrations. It must not copy CarDekho's proprietary content, code, images, logo or trade dress.

## Product goals

- Help buyers discover and compare new and used vehicles.
- Help individuals and verified dealers publish vehicle listings.
- Route consented buyer enquiries to relevant sellers.
- Monetize through dealer subscriptions, promoted listings, qualified leads, advertising and compliant partner referrals.
- Launch nationally as a website and Android app, while building dealer supply city by city.

## Documentation

- [Product Requirements (PRD)](docs/PRD.md)
- [Technical Requirements (TRD)](docs/TRD.md)
- [Business Plan](docs/BUSINESS_PLAN.md)
- [Monetization](docs/MONETIZATION.md)
- [Database Design](docs/DATABASE_DESIGN.md)
- [UI Guidelines](design/UI_GUIDELINES.md)
- [Color Tokens](design/COLOR_TOKENS.md)
- [Roadmap](docs/ROADMAP.md)

## Proposed technology

- Website: React + Vite
- Android: Flutter
- Backend: Laravel REST API
- Database: MySQL 8.4
- Authentication: Laravel Sanctum
- Media: S3-compatible object storage
- Notifications: Firebase Cloud Messaging
- Payments: Razorpay, subject to merchant onboarding and applicable policies

## Delivery approach

Build a focused MVP first: vehicle catalogue, used-car listings, search and filters, comparison, seller enquiries, dealer portal and admin moderation. Add advanced lead billing, partner integrations and growth tooling after validation.

## Status

Documentation baseline — implementation not yet started. All revenue, traffic, pricing and growth figures in planning documents are assumptions to validate, not guarantees.
