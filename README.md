# Inventory Management & Dynamic Pricing API

## Overview

This is a REST API built using Laravel 10 to manage products, warehouses, and stock with dynamic pricing logic.

---

## Features

* API Authentication using Laravel Sanctum
* Manage products, warehouses, and stock
* Dynamic pricing based on stock and expiry
* Warehouse-wise stock report

---

## Setup

### 1. Install Project

```
composer create-project laravel/laravel inventory-api "10.*"
cd inventory-api
composer install
```

### 2. Configure Environment

```
cp .env.example .env
php artisan key:generate
```

Update database details in `.env`

---

### 3. Install Sanctum

```
composer require laravel/sanctum
php artisan migrate
```

---

### 4. Run Migration & Seeder

```
php artisan migrate:fresh --seed
```

---

### 5. Start Server

```
php artisan serve
```

---

## Authentication

### Login

```
POST /api/login
```

Body:

```
{
  "email": "admin@test.com",
  "password": "12345678"
}
```

Use token in header:

```
Authorization: Bearer TOKEN
```

---

## API Endpoints

### Get Products

```
GET /api/products
```

### Add / Update Stock

```
POST /api/stock
```

### Warehouse Report

```
GET /api/warehouses/{id}/report
```

---

## Dynamic Pricing

* Stock < 10 → +30%
* Stock 10–50 → +10%
* Stock > 100 → -20%
* Expiring within 7 days → -25%

---

## Default Login

Email: [admin@test.com](mailto:admin@test.com)
Password: 12345678

---

## Author

Abhijith Santhosh
