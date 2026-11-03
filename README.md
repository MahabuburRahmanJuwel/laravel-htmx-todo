# Laravel HTMX Todo Application

A simple, interactive, and modern Todo Single Page Application (SPA) built using Laravel 11 and HTMX. This project showcases how to achieve smooth, asynchronous user interactions without full page reloads or heavy JavaScript frameworks.

## 🚀 Key Features
- **Dynamic Task Management:** Add, toggle completion status, and delete tasks instantly.
- **Asynchronous UI (HTMX):** Seamless single-page transitions using partial view swapping.
- **Tailwind CSS Integration:** Clean, responsive, and fully optimized user interface.
- **Robust Backend:** Secure routing, controller logic, and Eloquent ORM mapping.

## 🛠️ Prerequisites
Before setting up the project locally, ensure you have the following installed:
- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (or your preferred database engine)

## 💻 Installation & Local Setup

Follow these step-by-step instructions to get the application running on your local development environment:

1. **Clone the repository:**
   ```bash
   git clone https://github.com
   cd laravel-htmx-todo
   ```

2. **Install backend dependencies:**
   ```bash
   composer install
   ```

3. **Install frontend dependencies & compile assets:**
   ```bash
   npm install && npm run dev
   ```

4. **Environment Configuration:**
   Copy the example environment file to create your own:
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Encryption Key:**
   ```bash
   php artisan key:generate
   ```

6. **Database Migration:**
   Configure your database settings in the `.env` file (the default setup uses SQLite), then run:
   ```bash
   php artisan migrate
   ```

7. **Start Local Development Server:**
   ```bash
   php artisan serve
   ```
   Once started, open your browser and navigate to: `http://127.0.0.1:8000`

## 🤝 Contributing
Contributions, bug reports, and feature requests are highly appreciated! Feel free to fork this repository, make your changes on a separate branch, and submit a pull request.

## 📄 License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org).
