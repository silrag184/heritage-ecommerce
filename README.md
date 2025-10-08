# Silrag Mrong E-commerce Project

This is a modern e-commerce web application built using the Laravel framework. The project provides a robust platform for managing and selling products online with a clean separation between the frontend user experience and the backend administration panel.

## Features

- **Frontend User Interface**
  - Home page showcasing featured products and categories.
  - Shop section for browsing products by categories and filters.
  - About Us page to provide information about the company.
  - Responsive design for optimal viewing on desktop and mobile devices.

- **Backend Admin Panel**
  - Secure authentication and authorization using Laravel Jetstream.
  - Manage product categories and subcategories with CRUD operations.
  - Manage product attributes such as colors and sizes.
  - Upload and manage images for categories and products.
  - Dashboard for overview and management of the e-commerce store.

- **Technical Details**
  - Built with Laravel 12, PHP 8.2, and Livewire for reactive components.
  - Uses Eloquent ORM for database interactions.
  - Implements RESTful routes for backend management.
  - Utilizes Tailwind CSS for styling and responsive design.
  - Includes database migrations and seeders for easy setup.
  - Supports session management, caching, and queue processing.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/silrag184/heritage-ecommerce.git
   cd heritage
   ```

2. Install PHP dependencies using Composer:
   ```bash
   composer install
   ```

3. Install frontend dependencies using npm:
   ```bash
   npm install
   npm run dev
   ```

4. Set up your environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Usage

- Access the frontend at `http://localhost:8000`.
- Access the admin panel after logging in at `http://localhost:8000/dashboard`.
- Use the admin panel to manage categories, subcategories, colors, sizes, and other product attributes.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
