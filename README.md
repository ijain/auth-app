# Test task. User registration using Slim framework.

PHP version 8.0

MySql 8.0.30 for Linux

OS Ubuntu 20.04.4 LTS

Framework Slim 4.10.0

Setup instructions
---------------------------------------------
1) Copy .env.example to .env
2) Edit .env file, change database credentials (keep the database name 'auth')
3) Run ./init.sql in local MySql server, it will create `auth` database and `users` table.
4) Run ./composer install
5) Run `php -S localhost:8080 -t public`
6) open `http://localhost:8080` in your browser


Docker (docker-compose not completed yet)
---------------------------------------
docker-compose up -d --build

docker ps

docker-compose down

After running `docker-compose up -d --build`, open `http://localhost:8080` in your browser.

For Application: If you have port 8080 occupied already, then change `ports` in docker-compose.yml for service named 'app'.

For Database: If you have port 13306 occupied in your local, then change `ports` in docker-compose.yml for service named 'db'.

Structure
-------------------------------------

/app/ — routes, configs

/public/index.php — entry point

/public/assets/ — js,css

/src/ — logic

/vendor/

/views/ - user interface (html templates)