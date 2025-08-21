# ITC Stock Management System — Scope & Requirements
> Tech Stack: **Laravel 12 + Filament**  
> Database: **MySQL**  
> UI: **Single Filament Panel**  
> Access Control: **Spatie Roles + Laravel Policies**

---

## 1) Project Description
System to manage stock across multiple branches. Tracks purchases (IN), orders (OUT), current stock, and full history of stock movements.  
Roles: **Super Admin**, **Admin (Branch Manager)**, **Distributor**.  

---

## 2) Goals & Success Criteria

### Goals
- Accurate stock per branch  
- One Stock Ledger as single source of truth  
- Clear roles & permissions with branch scoping  
- Printable invoices, receipts, and reports  

### Success Criteria
- Purchases increase stock, orders decrease stock correctly  
- Stock never goes below zero  
- Pay-before-deliver enforced  
- Reports match ledger totals  
- Key actions recorded in Audit Log  

---

## 3) Non-Negotiables
- Branch-scoped access for Admin/Distributor  
- StockLedger logs all IN/OUT/ADJUST/RETURN  
- No negative stock  
- Pay-before-deliver rule  
- Global product & category master by Super Admin only  
- Single Filament panel with role-based menus  

---

## 4) User Roles

### Super Admin
- Manage branches, users, distributors  
- Manage global products & categories  
- Configure system settings  
- View/manage all purchases, orders, transfers, adjustments  
- Access all dashboards, reports, audit logs  

### Admin (Branch Manager)
- Manage stock operations for their branch  
- Manage distributors for their branch  
- View branch dashboards & reports  
- Cannot create global products/categories  

### Distributor
- Create and view their own orders  
- Track order status  
- Confirm receipt of goods  

---

## 5) Modules (Features)
- **Branches** → CRUD branches (Super Admin)  
- **Users & Roles** → Manage users, assign roles (Super Admin)  
- **Distributors** → CRUD distributors linked to branch  
- **Products & Categories (Global)** → CRUD by Super Admin  
- **Purchases (IN)** → Create PO, approve, receive, record payments  
- **Orders (OUT)** → Create order, approve, invoice, deliver, payments  
- **Transfers** → Branch-to-branch with approve → ship → receive  
- **Stock Counts** → Draft → counted → post variance  
- **Adjustments/Returns** → Record damage, loss, returns  
- **Stock Ledger** → Append-only log of movements  
- **Reports** → Weekly, monthly, annual, global reports  
- **Settings** → Currency, tax, invoice template  
- **Audit Log** → Track user actions  
- **Dashboards** → KPIs per role  

---

## 6) Business Rules
- Products & Categories are global (Super Admin only)  
- Admins see only their branch data  
- No negative stock allowed  
- Pay-before-deliver for orders  
- StockLedger is append-only  
- Low-stock thresholds per branch/product  
- Transfers = approve → ship → receive  
- Stock counts post variance into ledger  
- Adjustments require reasons  
- Invoices/receipts must reference ledger entries  

---

## 7) Data Highlights
- **Provinces/Districts** → Location master  
- **Branches** → id, name, location, status  
- **Users** → id, name, email, branch_id, roles  
- **Distributors** → id, name, branch_id, location, contact  
- **Products** → sku, name, category, unit, cost, price, images, status  
- **Categories** → name, description, status  
- **Purchases/Orders** → header + items  
- **Transfers** → from_branch, to_branch, status  
- **Stock Ledger** → datetime, product, branch, movement, qty, ref_id, note  
- **Current Stock** → product_id, branch_id, on_hand  
- **Audit Log** → actor, action, target, before/after, timestamp  

---

## 8) Reports & KPIs
- **Reports** → Inventory valuation, sales summary, purchase summary, branch performance, low-stock alerts, invoices  
- **KPIs** → On-hand stock, stock value, top sellers, order fulfillment rate, adjustment variance  

---

## 9) Out of Scope
- Retail POS  
- Barcode scanning/printing  
- Promotions/discounts  
- Multi-currency  
- Public customer portal  

---

## 10) Assumptions & Risks
**Assumptions**  
- One company, multiple branches, single product catalog  
- Stable internet, Cambodia timezone  
- Email available (SMTP)  

**Risks**  
- Data migration complexity  
- Different branch workflows may cause adoption issues  
- Training required for Admins & Distributors  

---

## 11) Acceptance Checklist
- [ ] Scope & requirements accepted  
- [ ] Non-negotiables confirmed  
- [ ] Roles & permissions agreed  
- [ ] Out-of-scope acknowledged  
