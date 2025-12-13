<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <strong>Laravel Portfolio CMS & Admin Dashboard</strong><br>
  A modern portfolio website with admin management built using Laravel 10+
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10+-red" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.1%2B-blue" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green" alt="License">
</p>

---

## 📌 Project Overview

This project is a **full-featured Portfolio Content Management System (CMS)** built with **Laravel**.  
It includes a **public portfolio website** and a **secure admin dashboard** for managing projects and contact messages.

The system is ideal for developers, freelancers, and students who want a **dynamic, database-driven portfolio** instead of static HTML.

---

## ✨ Features

### 🌐 Public Website
- Modern portfolio landing page
- Dynamic project listing from database
- Project cards with image, title, description, category, and external link
- Contact form with validation
- Fully responsive design

### 🔐 Authentication
- User registration and login
- Session-based authentication
- Admin role support (`is_admin`)
- Protected admin routes

### 🛠 Admin Dashboard
- Secure `/admin/dashboard`
- Project management (CRUD)
  - Create, edit, delete projects
  - Image uploads
  - Category support
  - Search and filter
- Contact message storage
- Admin-only access via middleware

### 🗂 Database & Storage
- MySQL / SQLite compatible
- Laravel migrations
- Image uploads stored in `storage/app/public`
- Public access via `php artisan storage:link`

---

## 🧱 Tech Stack

- **Backend:** Laravel 10+
- **Frontend:** Blade, Bootstrap 5.3
- **Database:** MySQL / SQLite
- **Authentication:** Laravel session auth
- **Storage:** Laravel Filesystem (public disk)

---

## 🚀 Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
