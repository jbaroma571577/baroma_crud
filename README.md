Rice Ordering System

A simple Laravel CRUD project for managing rice products, orders, and payments.
This project is created as a school requirement to practice Laravel MVC structure.

📌 Features
🔐 Login System
User registration and login
Logout function
Session-based authentication
📋 Rice Menu Management
Add rice products
View all rice items
Edit and delete products
Manage stock quantity
Store price and description
🛒 Order System
Create orders from rice items
Select quantity (kg)
Automatic total computation
Stock is reduced after ordering
View order details and status
💳 Payment System
Mark orders as paid/unpaid
Record payment method (cash/card/online)
Track payment status
View payment history
📊 Dashboard
Total rice products
Total orders
Pending orders/payments
Quick access to modules
🏗 Project Structure
app/
 ├── Http/Controllers
 │    ├── AuthController.php
 │    ├── RiceController.php
 │    ├── OrderController.php
 │    └── PaymentController.php
 ├── Models
 │    ├── User.php
 │    ├── RiceItem.php
 │    ├── Order.php
 │    └── Payment.php

resources/views/
 ├── auth/
 ├── rice/
 ├── orders/
 ├── payments/
 └── dashboard.blade.php

routes/
 └── web.php
⚙️ Installation Guide
1. Install dependencies
composer install
2. Setup environment
cp .env.example .env
php artisan key:generate
3. Configure database

Edit .env file:

DB_DATABASE=rice_ordering_db
DB_USERNAME=root
DB_PASSWORD=
4. Run migrations
php artisan migrate
5. (Optional) Seed data
php artisan db:seed
6. Run the project
php artisan serve

Open:

http://127.0.0.1:8000
👤 Sample Login (if seeded)
Email: demo@example.com
Password: password
🧠 How It Works (Simple Flow)
User logs in
Select rice item
Enter quantity
System calculates total
Order is saved
Stock is reduced
Payment is recorded
🗄 Database Tables
users
rice_items
orders
payments
🚀 Future Improvements
Admin dashboard
Better UI design
Email notifications
Order receipt printing
👨‍🎓 About This Project

This project is created as a simple Laravel CRUD system to practice:

MVC structure
Database relationships
Basic authentication
CRUD operations
