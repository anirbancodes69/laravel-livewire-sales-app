# LOCAL DEVELOPMENT
## Requirements:
Note: This local setup was aimed at windows, if you need to tweak it feel free to just point us to the changed configuration.

1. Have PHP installed on version 8.1 and composer 2
2. You can use `php artisan serve` but feel free to setup any local setup: Sail, valet or any local solution (MAMP).
3. Have node installed in the latest version
   1. We suggest [n package](https://www.npmjs.com/package/n) to manage the node version (`npm install -g n && n 21`)

## Commands to setup
We did not automate it to keep it generic and suggest:

Before migration remember to setup your database configurations in .env file.

From the root of the project:
```bash
composer install 
cp .env.example .env
php artisan key:generate
npm install && npm run dev
php artisan migrate
php artisan db:seed
php artisan serve
```

## Database access
The default is using mysql, so feel free to connect to it
