## Laravel Blog Application

-   laravel version 8

Login credentials for `admin` role
-   Email: admin@admin.com
-   Password: password

## Setup Instruction

Download the repository by either downloading the zip or using git clone command

```bash
git clone https://github.com/GauravGurung123/blog-post-task.git
```
Or using SSH

```bash
git clone git@github.com:GauravGurung123/blog-post-task.git
```


Copy content of `.env.example` to a new file named `.env` in project root directory.

```bash
cp .env.example .env
```

Install all the dependencies with composer

```bash
composer install 
```

Create a new database in phpMyAdmin. Example database name: `my_blog`

Configure the database settings in .env file. Heres an example for db connection.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_blog
DB_USERNAME=root
DB_PASSWORD=
```

Generate a key for laravel project

```bash
php artisan key:generate
```

Run migrations and seed the database(create tables in db)

```bash
php artisan migrate --seed
```

Finally run your project using

```bash
php artisan serve
```
