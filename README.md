# Test task. User registration using Slim 4 framework.

PHP version 8.0

MySql 8.0.30 for Linux

OS Ubuntu 20.04.4 LTS

Framework Slim 4.10.0

Setup instructions
---------------------------------------------
1) Copy .env.example to .env
2) Edit .env file, change database credentials (keep the database name 'auth')
3) Run ./init.sql on local MySql server, it will create `auth` database and `users` table.
4) Run ./composer install
5) Run `php -S localhost:8080 -t public`
6) Open `http://localhost:8080` in your browser
7) Start registration for the first user, then follow to login.

Project Structure
-------------------------------------
/app/ — routes, configs

/public/index.php — entry point

/public/assets/ — js,css

/src/ — logic

/vendor/

/views/ - user interface (html templates)

Docker
---------------------------------------
It is nice to have but not included in the task requirements.

**@TODO:** create Dockerfile, fix docker-compose.yml

**Note:**
Change `DB_HOST` value to `DB_HOST=db` inside .env file in order to connect to database. `db` is the service name defined in docker-compose.yml for `mysql` image.

### Docker Commands
`docker-compose up -d --build`
`docker ps`
`docker-compose down`

### On image failure debug image build and see output:
`docker-compose up --build db`  (where `db` is the service name defined in docker-compose.yml for mysql image)

#### View app in browser:
After running `docker-compose up -d --build`, open `http://localhost:8080` in your browser.

#### Possible issue for Application:
If local port 8080 is occupied, then change `ports` in docker-compose.yml for service `app`.

#### Possible issue for Database:
If local port 13306 is occupied, then change `ports` in docker-compose.yml for service `db`.
