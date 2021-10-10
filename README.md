## Gude:
1. Clone this repo in your projects folder
2. Create a MYSQL database
3. Go to .env file and change this lines accordingly:
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=parker
DB_USERNAME=root
DB_PASSWORD=
```
5. Run the folowing commands:
```bash
composer install
npm run dev
```
6. Install database tables with this command:
```bash
php artisan migrate --seed
```
7. Login using one user and update the details in profile page
8. Test and enjoy :)
