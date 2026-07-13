# 🏦 Loan Eligibility & Lead Management System

A Laravel 12 based Loan Eligibility and Lead Management System that allows customers to apply for loans, calculates credit score, evaluates eligibility using BRE (Business Rule Engine), provides REST APIs, and includes an Admin Dashboard for managing leads.

---

# 🚀 Features

### Customer Module
- Apply for Loan
- Input Validation
- Credit Score Generation
- BRE Eligibility Check
- Loan Approval/Rejection

### Admin Module
- Admin Login
- Dashboard
- Total Leads
- Eligible Leads
- Rejected Leads
- Average Credit Score
- Lead Management (View, Edit, Delete)
- Search Leads

### BRE Rule Management
- Add Rule
- Edit Rule
- Delete Rule

### REST API
- Create Loan Lead
- JSON Response
- Credit Score
- BRE Status

---

# 🛠 Tech Stack

- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5
- Blade Template
- Postman
- XAMPP

---

# 📂 Project Structure

```
app/
routes/
resources/
public/
database/
screenshots/
```

---

# 🔌 REST API

## Create Lead

```
POST /api/leads
```

### Sample Request

```json
{
  "full_name":"Vicky Chaubey",
  "mobile":"9999999911",
  "email":"vicky@gmail.com",
  "dob":"2001-01-01",
  "city":"Jaipur",
  "pincode":"303002",
  "loan_type":"Home Loan",
  "employment_type":"Salaried",
  "monthly_income":50000,
  "loan_amount":300000,
  "property_value":700000
}
```

### Sample Response

```json
{
  "status":"success",
  "lead_id":4,
  "credit_score":736,
  "bre_status":"Eligible",
  "rejection_reason":""
}
```

---

# 📸 Project Screenshots

## Home Page

![Home](screenshots/01-home-page.png)

## Loan Result

![Loan Result](screenshots/02-loan-result.png)

## Loan Result 2

![Loan Result](screenshots/02-loan-result2.png)

## Admin Login

![Admin Login](screenshots/03-admin-login.png)

## Dashboard

![Dashboard](screenshots/04-dashboard.png)

## Dashboard Statistics

![Dashboard](screenshots/05-dashboard2.png)

## Lead Management

![Leads](screenshots/06-leads.png)

## Lead Management 2

![Leads](screenshots/07-leads2.png)

## Edit Lead

![Edit](screenshots/08-leads-edit.png)

## REST API Testing (Postman)

![API](screenshots/09-api-postman.png)

## Database Structure

![Database](screenshots/11-database.png)

---

# ⚙ Installation

```bash
git clone https://github.com/Vickychaubey73/loan-management-system.git
```

```bash
cd loan-management-system
```

```bash
composer install
```

```bash
cp .env.example .env
```

Configure Database

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan serve
```

---

# 👨‍💻 Author

**Vicky Chaubey**

- GitHub: https://github.com/Vickychaubey73

---

# ⭐ Project Highlights

- Laravel 12
- REST API
- Credit Score Logic
- BRE Rule Engine
- Admin Dashboard
- CRUD Operations
- Search Functionality
- MySQL Database
- Bootstrap UI
