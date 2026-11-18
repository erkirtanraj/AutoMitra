# AutoMitra Monetization and Revenue Operations

## 1. Revenue catalogue

### Dealer subscriptions

| Plan | Price/month | Suggested entitlement |
|---|---:|---|
| Basic | ₹999 | Up to 10 active used-car listings |
| Professional | ₹2,499 | Up to 50 active listings and lead tools |
| Premium | ₹4,999 | Up to 150 active listings, team access and priority support |

Entitlements must be enforced server-side. Plan changes, renewals, cancellations and grace periods must be auditable.

### Promoted listings

| Package | Price | Duration |
|---|---:|---|
| Featured | ₹199 | 7 days |
| Premium | ₹349 | 15 days |
| Top placement | ₹499 | 30 days |

Promotion must have start/end times, eligible listing state, placement, payment reference and impression/click tracking. Label sponsored placement.

### Lead billing

Illustrative starting price: ₹250 per qualified lead. Pricing may vary by city/category after validation.

A billable lead must:
- Have valid, purpose-specific consent.
- Include contact details verified by approved method.
- Include enough vehicle/budget/location intent to be actionable.
- Be deduplicated against the agreed time window.
- Be assigned only to recipients disclosed to the customer.
- Have a traceable delivery record.

Define dealer dispute reasons and service-level timelines. Provide credit notes/refunds for invalid leads based on published rules. Never bill solely because a form was submitted.

### Display advertising

Use approved advertising providers and comply with their policies. Maintain ad placement controls, consent management where required, page-quality standards and sponsored-content disclosure.

### Partner referrals

Finance and insurance referral journeys require legal review and appropriately authorized partner arrangements. Clearly disclose the partner, purpose, data sharing and compensation where required. Do not collect or distribute regulated leads outside the permitted role.

### Sponsored promotions

Sell clearly labelled campaigns with insertion orders, campaign dates, creative approval, placement, impressions/click reporting and invoice history.

## 2. Revenue ledger

Every charge/credit must create an immutable ledger entry:
- transaction_id
- source_type and source_id
- customer/dealer/partner account
- amount in paise
- currency
- tax components
- gateway reference
- status
- created_at and settled_at
- reversal_of_id for refunds/adjustments

Do not edit historical financial rows. Use reversal and adjustment entries.

## 3. Subscription lifecycle

States:
- pending
- trialing
- active
- past_due
- grace_period
- cancelled
- expired
- refunded

Use verified gateway events and periodic reconciliation. Payment webhook handling must be idempotent.

## 4. Admin revenue reporting

Report:
- Gross billings by source.
- Discounts and credits.
- Refunds and chargebacks.
- Net collections.
- Tax collected/payable fields as advised by accountant.
- Gateway fees.
- Partner payable/receivable.
- MRR, renewal rate and churn.
- Revenue per dealer and per lead.
- Contribution margin by channel.

Keep gross booking, cash collection and recognized revenue distinct.

## 5. Unit economics

Track:
- Dealer CAC and subscription payback.
- Dealer activation and 30/90-day retention.
- Cost per qualified lead.
- Lead acceptance, contact and conversion rates.
- Refund/invalid-lead rate.
- Paid listing conversion.
- Advertising revenue per 1,000 pageviews.
- Partner referral completion and payout.

## 6. Pricing governance

All prices are initial hypotheses. Run controlled tests and review monthly. Do not change a live plan's entitlement for an already-paid period without a clear contractual policy and customer notice.
