# Laravel Basic CRUD

This is a simple Laravel-based CRUD (Create, Read, Update, Delete) application that demonstrates the use of **RESTful APIs**, **Eloquent ORM**, **MVC architecture**, **Blade templates**, and **MySQL** as the database.

## :rocket: Features
- Full CRUD functionality for managing products.
- Uses **Laravel Sail** for easy local development in Docker.
- Styled with **Tailwind CSS**.
- Clean and well-structured code following Laravel best practices.
- Uses **Eloquent ORM** for database interactions.

## :camera_flash: Screenshots
### :house_with_garden: Home Page
![Home Page](screenshots/home-page.png)

### :heavy_plus_sign: Create Product Page
![Create Page](screenshots/create-page.png)

### :memo: Products List Page
![Products Page](screenshots/products-page.png)

### :pencil2: Edit Product Page
![Edit Page](screenshots/edit-page.png)

## :hammer_and_wrench: Installation

### :round_pushpin: Prerequisites
- [Docker](https://www.docker.com/) installed.
- [Git](https://git-scm.com/) installed.
- [Node.js](https://nodejs.org/) installed (ensure **npm** is included during installation).
- [Composer](https://getcomposer.org/) installed.

### :gear: Setup:
**Clone the repository:**
```sh
git clone https://github.com/Mhmdxc/Laravel_Basic-CRUD.git
cd Laravel_Basic-CRUD
```

**Install PHP dependencies using Composer:**
```sh
composer install
```

**Install JavaScript dependencies using npm:**
```sh
npm install
```

**Copy the example environment file:**
```sh
cp .env.example .env
```
 > Update the `.env` file with your database credentials and other necessary configurations.

**Running the Application**
Start the containers:
```sh
./vendor/bin/sail up -d
```

**Generate an application key:**
```sh
./vendor/bin/sail artisan key:generate
```

**Run database migrations:**
```sh
./vendor/bin/sail artisan migrate
```
 > After running the migrations, if you encounter any issues, it's likely due to MySQL not being fully loaded yet. In such cases, try waiting a few moments and then re-running the migration command.***

**Start Vite (for Tailwind styles and JS bundling):**
```sh
./vendor/bin/sail npm run dev
```

### :white_check_mark: Now, the application should be accessible at **http://localhost**.


## API Endpoints
This application provides a RESTful API for managing products:
- `GET /products` - Retrieve all products.
- `POST /products` - Create a new product.
- `GET /products/{id}` - Retrieve a specific product.
- `PUT /products/{id}` - Update a product.
- `DELETE /products/{id}` - Delete a product.

## Technologies Used
- **Laravel** (PHP framework)
- **MySQL** (Database)
- **Blade** (Laravel templating engine)
- **Eloquent ORM** (Database management)
- **Tailwind CSS** (Styling)
- **Vite** (Frontend asset bundling)

## License
This project is open-source and available under the [MIT License](LICENSE).
"