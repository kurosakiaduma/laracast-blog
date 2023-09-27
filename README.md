# Laravel Vue Blog

This is a simple blog project built with Laravel and Vue.js. It allows users to manage posts, comments, and categories.

## Getting Started

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js and npm
- Laravel CLI

### Installation

1. **Clone Repository**: Clone this repository to your local machine:

   ```shell
   git clone https://github.com/kurosakiaduma/laracast-blog.git
    ```
2. **Navigate to Backend**: Navigate to the Laravel backend directory:
    ```
   cd laracast-blog
    ```
3. **Install PHP Dependencies**: Install PHP dependencies using Composer:
    ```angular2html
    composer install
    ```
4. **Run Migrations and seed**: Run database migrations to create tables:
    ```
    php artisan migrate:fresh --seed
    ```
5. **Install JavaScript Dependencies**:
    ```angular2html
    npm install
    ```
6. **Compile Assests**:
    ```angular2html
    npm run dev
    ```
   `**NOTE**: The frontend will likely be served run on http://localhost:5173/. This is the app's entry point.`
7. **Start Laravel Server**: To serve your Vue components with the backend at `http://localhost:8000`
    ```angular2html
    php artisan serve
    ```

## Contributing
Contributions to this project are welcome. To contribute, please follow the guidelines in [CONTRIBUTING.md](https://contributing.md/)

## License
This project is open-source and available under the [MIT License](https://opensource.org/license/mit/).
```angular2html
Feel free to use this Markdown-formatted README for your project.
```
