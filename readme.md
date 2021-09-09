# Larashop

Larashop is a Laravel constructor for e-commerce projects  

## Installation
### Using Docker
Clone project from GIT:
```sh
git clone https://github.com/IlyaKobus/shop-builder.git
```

Install docker and docker-compose to your system (for Ubuntu: https://cwiki.apache.org/confluence/pages/viewpage.action?pageId=94798094)

Go to root project directory, install and start docker containers:
```sh
docker-compose up -d
```

Clone .`env.example` as `.env`
```sh
cp ./env.example ./.env
```

If everything went OK, you can go to [http://localhost:8888][url-docker] and see project`s homepage.

### Using OpenServer
Install OpenServer.

Clone project from GIT to OpenServer /domains dir:
```sh
git clone git@bitbucket.org:devlemonteam/larashop.git
```

Update OpenServer settings: 
Modules -> Apache-PHP-7.2, PHP 7.2, MySql 5.7. 
Domains -> Domain Management: `Manual + Autosearch`. 
Add new domain to domains list, for example `larashop.local`, path: `domains\larashop\public`
Create new DB with name `larashop`

Clone .`env.example` as `.env`
```sh
cp ./env.example ./.env
```

Open `.env` and edit strings below:

```
APP_URL=http://larashop.local
DB_HOST=127.0.0.1
DB_USERNAME=root
DB_PASSWORD=
```

Install Composer and NPM.

From console, run:
```sh
composer install
npm install
php artisan migrate
php artisan db:seed
```

If everything went OK, you can go to [http://larashop.local][url-os] and should see project`s homepage.

## Credentials to Admin panel:
username: `admin`
password: `admin`

[url-docker]: <http://localhost:8888>
[url-os]: <http://larashop.local>

## Create new extension

1. Create new extension in the appropriate section of the dashboard.

2. Create new dir in `App\Modules\Extension\Resources\views\dashboard\extension\instances` with your extension name.

3. Create 2 files: `options.blade.php` and `show.blade.php`. The first one is for rendering options block at the module edit page and the second is for front-end extension representation.
