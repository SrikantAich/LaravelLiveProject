
# FMCG Delivery E-Commerce Website

## Overview

This project is a Laravel-based eCommerce website designed to deliver Fast-Moving Consumer Goods (FMCG) products within 6 hours. The platform allows users to browse, select, and purchase a variety of FMCG products from the comfort of their homes, ensuring quick and efficient delivery.

## Features

- **User Authentication**: Secure login and registration for users.
- **Product Catalog**: Browse a wide range of FMCG products with detailed descriptions and images.
- **Shopping Cart**: Add products to the cart and manage your orders easily.
- **Quick Checkout**: Seamless checkout process for a faster shopping experience.
- **Order Tracking**: Real-time updates on order status and delivery time.
- **Admin Panel**: Manage products, orders, and users from a dedicated admin interface.
- **Responsive Design**: Optimized for mobile and desktop devices for an enhanced user experience.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/SrikantAich/LaravelLiveProject.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd LaravelLiveProject
   ```

3. **Install dependencies**:
   ```bash
   composer install
   ```

4. **Set up the environment file**:
   ```bash
   cp .env.example .env
   ```

5. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

6. **Migrate the database**:
   ```bash
   php artisan migrate
   ```

7. **Start the development server**:
   ```bash
   php artisan serve
   ```

8. **Visit**: `http://localhost:8000` in your web browser.

## Usage

1. Register or log in to your account.
2. Browse the catalog of FMCG products.
3. Add items to your cart and proceed to checkout.
4. Track your order through the user dashboard.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request if you want to contribute to the project.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- Laravel framework
- Bootstrap for responsive design
