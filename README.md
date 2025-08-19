# ITC Stock Management (Laravel + Filament)

Branch‑scoped stock management with **3 roles**:

- **Super Admin**  
  - Full visibility across all branches  
  - Manage branches, users/admins, global settings, consolidated reports
- **Admin** (branch‑scoped)  
  - Manage products, orders, purchase orders, returns/adjustments  
  - Maintain branch ledger  
  - Manage distributors for their branch
- **Distributor**  
  - Create and view own orders  
  - Track order status  
  - Confirm receipt of goods

> **UI:** single **Filament** panel with role‑based navigation + Laravel Policies.  
> Each role only sees what they are allowed to.

---

## 🚀 Project Phases

1. **Scope & Requirements** (see `/docs/scope.md`)  
2. **Repo & Tooling** (Git, README, docs, .gitignore)  
3. **Environment Setup (Docker + .env)**  
4. **Base Framework Config**  
5. **Auth & Roles** (spatie/permission + Filament)  
6. **Domain Model & Migrations**  
7. **Policies & Scoping**  
8. **Filament Resources (CRUD)**  
9. **Business Rules** (Stock Service + Ledger)  
10. **Dashboards & Widgets**  
11. **Validation & Error Handling**  
12. **Testing (Pest)**  
13. **Ops & Observability**  
14. **Deployment**

---

## 🏗 Architecture (logical)

```mermaid
flowchart TB
  subgraph CLIENT["Client"]
    UI[[Filament Admin — single panel]]
  end

  subgraph APP["Laravel 12 Application"]
    SVC([Stock / Inventory Service & Business Rules])
    PERM([spatie/permission + Policies])
    FIL([Filament Resources & Widgets])
  end

  DB[(MySQL)]
  REDIS[(Redis)]
  MAIL[(Mailpit SMTP)]

  UI --> APP
  UI -->|HTTP| FIL
  APP --> DB
  APP --> REDIS
  APP --> MAIL
  SVC --> DB
  FIL --> SVC
  PERM --> FIL

  classDef client fill:#e0f2fe,stroke:#0284c7,color:#0c4a6e,stroke-width:1.2px;
  classDef app fill:#ecfdf5,stroke:#10b981,color:#065f46,stroke-width:1.2px;
  classDef infra fill:#f3f4f6,stroke:#6b7280,color:#111827,stroke-width:1.2px;

  class UI client
  class APP,SVC,PERM,FIL app
  class DB,REDIS,MAIL infra
