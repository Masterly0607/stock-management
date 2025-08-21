# Project Scope — Branch-Scoped Stock Management System

## 1. Goal
A branch-scoped inventory & order system where:

- **Super Admin** manages global data (branches, users, settings, reports).
- **Admin** manages products, purchases, orders, returns/adjustments for **their branch only**.
- **Distributor** creates and tracks their own orders.
- **Stock Ledger = source of truth**; all inventory changes go through it.

---

## 2. Roles & Visibility

- **Super Admin (SA)**  
  - Access all branches  
  - Manage branches, users/admins, distributors, settings, global KPIs/reports  

- **Admin (Branch-scoped)**  
  - Manage products, orders, purchase orders, returns/adjustments, ledger, distributors for their branch  

- **Distributor**  
  - Create/view own orders  
  - See fulfillment & payment status  
  - Confirm receipt  

---

## 3. Modules

- **Branches** (SA only) — CRUD + Province → District location  
- **Users/Admins** (SA only) — CRUD + role assignment  
- **Distributors** — SA (all), Admin (branch-scoped)  
- **Products** — Admin (branch): SKU, unit, price, low-stock threshold, stock  
- **Orders** — Distributor creates → Admin approves → Payment → Deliver (partial allowed) → Distributor fulfills  
- **Purchase Orders (PO)** — Admin: Pending → Approved → Receive (partial) → Paid  
- **Stock Ledger** — Read-only, every stock movement  
- **Returns/Adjustments** — Admin: return_in, return_out, adjust  
- **Settings** — SA: company, currency (USD/KHR), tax  
- **Dashboards** — SA (global KPIs), Admin (branch KPIs), Distributor (personal KPIs)  
- **Location UX** — Province → District cascading select  

---

## 4. Non-Negotiables

- Branch scoping everywhere (Admin/Distributor only see their branch).  
- Ledger = source of truth (immutable, append-only).  
- Payment required before Deliver.  
- No deleting Branch if related data exists.  
- Partial operations allowed (Orders: deliver/fulfill, PO: receive).  

---

## 5. Data Model

- **branches**: id, name, code, province_id, district_id  
- **provinces / districts**: for cascading location  
- **users**: id, role, branch_id (nullable for SA)  
- **products**: sku(unique), name, unit_id, prices, min_stock, is_active, softDeletes  
- **current_stocks**: product_id, branch_id, qty (unique index)  
- **stock_ledgers**: product_id, branch_id, ref_type, ref_id, qty_change, note, created_by  
- **purchases / purchase_items**: unit_cost  
- **orders / order_items**: unit_price  
- **distributors**: users with role = distributor  
- **settings**: currency, locale, tax, pay_before_deliver, low_stock_threshold  

---

## 6. Lifecycles

- **Orders**  
  - `draft → approved → (paid) → delivered (partial OK) → fulfilled`  
  - Cancel only in draft/pending  

- **POs**  
  - `pending → approved → received (partial OK) → paid`  

- **Ledger Writes**  
  - PO receive → +qty  
  - Order deliver/fulfill → –qty  
  - Returns/Adjust → +/– qty  
  - Transfers → – at Branch A, + at Branch B  

---

## 7. APIs (Phase 8)

- **Master**:  
  - `POST /branches`, `GET /branches`, `PUT /branches/{id}`, `DELETE /branches/{id}`  
  - `POST /users`, `POST /distributors`, `POST /products`, `POST /units`, `POST /categories`, `POST /suppliers`  

- **Stocks**:  
  - `GET /stocks?branch_id=&product_id=`  
  - `GET /stock-logs?branch_id=&product_id=&ref_type=`  

- **POs**:  
  - `POST /purchases` (draft)  
  - `POST /purchases/{id}/items`  
  - `POST /purchases/{id}/approve`  
  - `POST /purchases/{id}/receive`  
  - `GET /purchases` / `GET /purchases/{id}`  

- **Orders**:  
  - `POST /orders` (draft)  
  - `POST /orders/{id}/items`  
  - `POST /orders/{id}/approve`  
  - `POST /orders/{id}/pay`  
  - `POST /orders/{id}/deliver`  
  - `POST /orders/{id}/fulfill`  
  - `GET /orders` / `GET /orders/{id}`  

- **Location**:  
  - `GET /provinces`  
  - `GET /provinces/{id}/districts`  

- **Settings**:  
  - `GET /settings`  
  - `PUT /settings`  

---

## 8. Constraints & Policies

- **SA**: full access  
- **Admin**: auto-scoped to user.branch_id  
- **Distributor**: own orders only; optional read-only stock for their branch  
- **Validation**:  
  - SKU unique  
  - Prices ≥ 0  
  - Stock ops only via service  
  - No over-fulfill/deliver if insufficient stock  

---

## 9. Success Criteria

- KPIs match DB truth (sales, pending orders, stock on hand).  
- Lifecycle rules enforced (no deliver when unpaid; partial ops OK).  
- Branch scoping enforced in APIs.  
- Minimal tests pass: order lifecycle, ledger writes, scoping.  
- Province → District selector works with consistent data.  

---

## 10. Out of Scope (for now)

- Multi-warehouse inside one branch  
- Complex promotions/pricing  
- Accounting ledgers for suppliers/customers  
- Barcode scanning/printing  

---
