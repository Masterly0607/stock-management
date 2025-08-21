# ITC Stock Management System

## 🎯 Goal
A **branch-scoped stock management system** for a cosmetics company that tracks:
- Purchases (**IN**)  
- Orders (**OUT**)  
- Current stock balance  
- Full movement history (**Ledger**)  

---

## 👤 User Roles
- **Super Admin** → Manage branches, users, distributors, products, categories, settings, reports  
- **Admin (Branch Manager)** → Manage stock only for their branch (purchases, orders, transfers, stock counts, adjustments)  
- **Distributor** → Make their own orders, track status, confirm delivery  

---

## 📦 Main Features
- Branch & User Management  
- Distributor Management  
- Global Products & Categories (Super Admin only)  
- Purchases (IN), Orders (OUT, pay-before-deliver)  
- Transfers (approve → ship → receive)  
- Stock Counts & Adjustments  
- Ledger of all stock movements  
- Reports (sales, purchases, stock movement, low stock)  
- Audit Log (who did what, when)  
- Dashboards per role  

---

## 📜 Business Rules
- Products & categories are **global** (Super Admin only)  
- Admins see only their **branch data**  
- **No negative stock** allowed  
- **Pay-before-deliver** enforced  
- Ledger is **append-only** (no delete/edit)  
- Transfers must follow approve → ship → receive  
- Adjustments need reasons  

---

## 🚫 Out of Scope
- POS system  
- Barcode scanning/printing  
- Promotions/discounts  
- Multi-currency  
- Public customer portal  

---

## 📂 Documentation
For full details, see [docs/scope.md](./docs/scope.md)  
