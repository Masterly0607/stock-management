Project: Branch‑scoped Stock Management System
Roles & visibility

Super Admin: all branches; manage branches, users/admins, settings, global reports.

Admin (branch‑scoped): products, orders, purchase orders (PO), returns/adjustments, ledger, distributors for their branch only.

Distributor: create/view own orders, see fulfillment/payment status, confirm receipt.

Modules

Branches (SA only)

Users/Admins (SA only) + role assignment

Distributors (SA all; Admin branch‑scoped)

Products (Admin branch‑scoped): price, unit, low‑stock threshold, current stock

Orders: Distributor creates → Admin approves → Payment → Deliver (partial allowed) → Distributor fulfills. Cancel only when Pending.

Purchase Orders (PO) (Admin): Pending → Approved → Receive (partial) → Paid

Stock Ledger (read‑only): every stock movement writes here (source of truth)

Returns/Adjust (Admin): return_in, return_out, adjust

Settings (SA): company, currency (USD/KHR), tax

Dashboards: SA (global KPIs) / Admin (branch KPIs) / Distributor (personal KPIs)

Location UX: Province → District cascading select (static list)

Non‑negotiables

Branch scoping everywhere for Admin/Distributor.

Ledger is source of truth; inventory updates only via a central service that writes ledger.

Payment must be Paid before Deliver (no deliver for unpaid).

No deleting branch if related data exists.

Success criteria

KPIs match DB truth; lifecycle rules enforced; minimal tests pass (order lifecycle, ledger writes, scoping).