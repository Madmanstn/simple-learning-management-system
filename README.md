# 📘 Simple Learning Management System (LMS)

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="LMS Logo" width="120"/>
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"/></a>
  <a href="#"><img src="https://img.shields.io/badge/php-%3E%3D8.2-purple.svg" alt="PHP Version"/></a>
  <a href="#"><img src="https://img.shields.io/badge/laravel-11.x-red.svg" alt="Laravel"/></a>
</p>

<p align="center">
  <strong>A simple role-based Learning Management System for instructors and students</strong>
</p>

<p align="center">
  🌐 <a href="https://simple-learning-management-system-production-84db.up.railway.app"><strong>Live Demo</strong></a>
</p>

---

## 🎯 Overview

The **Simple Learning Management System (LMS)** is a web-based application built with **Laravel 11** that supports **Instructor** and **Student** roles.
It allows instructors to manage courses while students can browse and view available courses in a clean and intuitive interface.

This project demonstrates core LMS concepts such as authentication, role-based access control, and CRUD operations using modern Laravel practices.

---

## ✨ Features

### 🔐 Authentication & Roles

* Secure user authentication
* Instructor and Student role separation

### 📚 Course Management

* Instructors can create, update, and delete courses
* Course dashboard for instructors
* Students can browse and view available courses

### 📊 Dashboard

* Instructor dashboard for course management
* Clean UI using Blade and Tailwind CSS

---

## 🛠 Technology Stack

| Technology          | Purpose               |
| ------------------- | --------------------- |
| **Laravel 11**      | Backend framework     |
| **PHP 8.2+**        | Server-side language  |
| **MySQL**           | Database              |
| **Blade Templates** | Server-side rendering |
| **Tailwind CSS**    | UI styling            |

---

## 🚀 Getting Started

### Prerequisites

* PHP 8.2+
* Composer
* Node.js & NPM
* MySQL

### Installation

```bash
# Clone repository
git clone https://github.com/Madmanstn/simple-learning-management-system.git
cd simple-learning-management-system

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database in .env
```

### Run Migrations

```bash
php artisan migrate
```

### Run the Application

```bash
php artisan serve
npm run dev
```

Access the app at:
`http://localhost:8000`

---

## 👥 Team (BSIS III – 2)

| Name                    | Role      |
| ----------------------- | --------- |
| **Joshua Arcillas**     | Leader    |
| **Dave Palconit**       | Developer |
| **Mark Jou Satulombon** | Developer |
| **Jon Ethan Tio**       | Developer |
| **John Lloyd Cañadora** | Developer |

---

## 📄 License

This project is licensed under the **MIT License**.

---

<p align="center">
  <strong>Built with Laravel 💻 | Simple • Clean • Functional</strong>
</p>

