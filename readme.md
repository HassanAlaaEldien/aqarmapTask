### How to build the project and make it up and running:

- Create new database.
- Make copy of (.env.example) as (.env) and add your database configurations (how to? look next section).
- Run: composer install.
- Run: php artisan migrate.
- Run: php artisan db:seed.
- Run: php artisan serve.
- Use (admin@task.com) as email and (password) as password to access dashboard for adding articles.

### Adding database configurations:

Inside (.env) change:

- DB_DATABASE=database_name
- DB_USERNAME=database_username
- DB_PASSWORD=database_password
