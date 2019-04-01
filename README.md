- composer update after get code from github
- Fix error : No application encryption key has been specified. 
    cp .\.env.example .env
    php artisan key:generate
    php artisan config:cache