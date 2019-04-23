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
- Auth
    + Auth::routes()
        - path : D:\host\www\php\laravelweb\vendor\laravel\framework\src\Illuminate\Routing\Router.php
    + Modify password_resets
        - Create a class extends Illuminate\Auth\Passwords\DatabaseTokenRepository name App\Http\Controllers\Auth\TDatabaseTokenRepository;
        - Overwrite getPayload()
        - Create a class extends Illuminate\Auth\Passwords\PasswordBrokerManager name App\Http\Controllers\Auth\Passwords\TPasswordBrokerManager
        - Overwrite createTokenRepository() with TDatabaseTokenRepository();
        - Comment out PasswordResetServiceProvider in config/app.php
        - Create a provider
            + php artisan make:provider TPasswordResetServiceProvider;
            + define App\Providers\ComposerServiceProvider::class in config/app.php
            + php artisan config:cache
- Mail (using gmail)
    + Create gmail
    + .env
        APP_URL=http://hoctap.com
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=465
        MAIL_USERNAME=thanhtaytest90@gmail.com
        MAIL_PASSWORD=thanhtay78
        MAIL_ENCRYPTION=ssl
    + php artisan config:cache