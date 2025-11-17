# 🚀 Albuna Hijab API & Admin Panel (Laravel + Supabase)

This project provides a **RESTful JSON API** for Product and Promotion management, along with a simple **Admin Panel** built with Laravel Blade for data administration.

---

## 🛠️ System Requirements

Ensure your environment meets the following requirements:

* **PHP 8.2+** (recommended)
* **Composer** (PHP package manager)
* **Node.js & npm** (for Vite/Tailwind asset building)
* **PostgreSQL Database** (Supabase is used in this project)

---

## 📋 Installation & Local Setup

Follow the steps below to run this project in your local development environment.

---

### 1. Clone the Repository & Install Dependencies

```bash
# Clone the project
git clone [YOUR_REPOSITORY_URL]
cd project-api-name

# Install PHP and Node.js dependencies
composer install
npm install
```

---

### 2. Configure Environment Variables

Copy the example env file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Update the database configuration in your `.env` file:

```env
DB_CONNECTION=pgsql
DB_HOST=aws-1-ap-southeast-1.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.ctzggfgsapqpgmncpioiq
DB_PASSWORD=[YOUR_SUPABASE_PROJECT_PASSWORD]
```

---

### 3. Run Initial Database Migration

Run the migration to create the required tables (including the admin `users` table):

```bash
php artisan migrate
```

---
