# 🍚 Rice Ordering System

A Laravel-based web application for managing customers, rice menu items, orders, and payments for a rice-selling business. This is a simple student project built using Laravel's MVC architecture.

## Features

### 1. **Login Module** 🔐
- User authentication with email and password
- Secure login validation
- Session management
- Logout functionality
- User registration with password confirmation

### 2. **Rice Menu Management** 📋
- Add new rice products with details
- View all rice items in a table format
- Edit rice product information
- Delete rice items
- Track stock quantities
- Store rice information:
  - Rice name (e.g., Jasmine, Brown, Dinorado)
  - Price per kilogram
  - Stock quantity
  - Description

### 3. **Order Management** 🛒
- Create new orders
- Select rice items
- Input quantity (in kilograms)
- Automatic total cost calculation (quantity × price)
- View order details:
  - Rice name
  - Quantity
  - Price per kg
  - Total amount
- Track order status (Pending/Completed)
- Automatic stock deduction after ordering

### 4. **Payment Management** 💳
- Process payments for orders
- Record payment transactions
- Update payment status (Paid/Unpaid)
- View payment history
- Track payment method (Cash, Card, Online)
- Display payment date and time

### 5. **Dashboard** 📊
- Overview of total orders
- Total amount spent
- Number of rice products
- Pending payments count
- Quick navigation to main features

## Project Structure

```
baroma_crud/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       ├── RiceController.php
│   │       ├── OrderController.php
│   │       └── PaymentController.php
│   └── Models/
│       ├── User.php
│       ├── RiceItem.php
│       ├── Order.php
│       └── Payment.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 0001_01_01_000003_create_rice_items_table.php
│   │   ├── 0001_01_01_000004_create_orders_table.php
│   │   └── 0001_01_01_000005_create_payments_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── RiceItemSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard.blade.php
│       ├── rice/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── orders/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── show.blade.php
│       ├── payments/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or SQLite
- Node.js (optional, for frontend assets)

### Step 1: Install Dependencies
```bash
cd baroma_crud
composer install
```

### Step 2: Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### Step 3: Configure Database
Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rice_ordering_db
DB_USERNAME=root
DB_PASSWORD=
```

Or use SQLite:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### Step 4: Run Migrations
```bash
php artisan migrate
```

### Step 5: Seed Sample Data (Optional)
```bash
php artisan db:seed
```

This will create:
- 2 demo user accounts
- 6 sample rice products with stock

### Step 6: Start the Application
```bash
php artisan serve
```

The application will be available at: `http://127.0.0.1:8000`

## Demo Credentials

After running the seeders, you can login with:

**User 1:**
- Email: `demo@example.com`
- Password: `password`

**User 2:**
- Email: `admin@example.com`
- Password: `password`

## Database Schema

### Users Table
- `id` - Primary Key
- `name` - User's full name
- `email` - Email address (unique)
- `password` - Hashed password
- `email_verified_at` - Email verification timestamp
- `remember_token` - Token for "Remember Me"
- `timestamps` - created_at, updated_at

### Rice Items Table
- `id` - Primary Key
- `name` - Rice product name
- `price_per_kg` - Price per kilogram (decimal)
- `stock_quantity` - Current stock in kg (integer)
- `description` - Product description
- `timestamps` - created_at, updated_at

### Orders Table
- `id` - Primary Key
- `user_id` - Foreign Key (Users)
- `rice_item_id` - Foreign Key (Rice Items)
- `quantity` - Order quantity in kg (decimal)
- `price_per_kg` - Price at time of order
- `total_amount` - Computed total (quantity × price)
- `status` - Order status (pending/completed)
- `timestamps` - created_at, updated_at

### Payments Table
- `id` - Primary Key
- `order_id` - Foreign Key (Orders)
- `amount` - Payment amount (decimal)
- `status` - Payment status (paid/unpaid)
- `payment_date` - Date when payment was made
- `payment_method` - Method used (cash/card/online)
- `timestamps` - created_at, updated_at

## Key Features Implementation

### Authentication Flow
1. User registers or logs in
2. Email and password are validated
3. Session is created upon successful login
4. Users can access protected routes
5. Logout clears the session

### Order Process
1. User selects rice item from menu
2. Enters quantity needed
3. System validates stock availability
4. Calculates total cost
5. Creates order record
6. Automatically deducts from stock
7. Creates payment record (initially unpaid)

### Payment Process
1. User views pending orders
2. Clicks "Pay" for an order
3. Selects payment method
4. Confirms payment
5. System updates order to "completed"
6. Payment marked as "paid" with date/time

## Styling

The application uses custom CSS with a clean, modern design:
- Responsive grid layout
- Professional color scheme
- Form validation feedback
- Table with hover effects
- Card-based dashboard
- Mobile-friendly navigation

All styles are embedded in the `layouts/app.blade.php` file for easy customization.

## Relationships

- **User** has many **Orders**
- **RiceItem** has many **Orders**
- **Order** belongs to **User**
- **Order** belongs to **RiceItem**
- **Order** has one **Payment**
- **Payment** belongs to **Order**

## Troubleshooting

### Database Connection Error
- Verify database credentials in `.env`
- Ensure database exists
- Run `php artisan migrate` again

### Authentication Issues
- Clear cached routes: `php artisan route:clear`
- Clear config cache: `php artisan config:clear`
- Clear session: `php artisan session:clear`

### Missing Tables
- Run `php artisan migrate:fresh` to reset database
- Then run `php artisan db:seed`

## Future Enhancements

Possible improvements for future versions:
- Admin panel for staff
- Order history reports
- Customer management
- Inventory alerts
- Email notifications
- Invoice generation
- Multi-currency support
- User roles and permissions

## License

This project is open-source software licensed under the MIT license.

## Author

Created as a student project demonstrating Laravel CRUD operations and MVC architecture.

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
