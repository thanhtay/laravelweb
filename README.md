- composer update after get code from github
- Fix error : No application encryption key has been specified. 
    cp .\.env.example .env
    php artisan key:generate
    php artisan config:cache
- Update database in .env then clear cache config: php artisan config:cache
- Run migrate:
    Note: table users, and password_resets update maxlength for email 250 to protect error when create key in mysql
    php artisan migrate
- Check class
    $methods = get_class_methods($this->driver());
        foreach($methods as $method)
        {
            var_dump($method);
            echo "<br>";
        }
- Module
    nwidart/laravel-modules