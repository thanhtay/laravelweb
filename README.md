- composer update after get code from github
- Fix error : No application encryption key has been specified. 
    cp .\.env.example .env
    php artisan key:generate
    php artisan config:cache
- Update database in .env then clear cache config: php artisan config:cache
- Run migrate:
    Note: table users, and password_resets update maxlength for email 250 to protect error when create key in mysql
    php artisan migrate
- Database:
    + change config/database.php :engine = 'InnoDB'
- Check class
    $methods = get_class_methods($this->driver());
        foreach($methods as $method)
        {
            var_dump($method);
            echo "<br>";
        }
- Module for backend
    nwidart/laravel-modules
        Reading document :"https://nwidart.com/laravel-modules/v4/introduction"
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
- Permission for admin (Backend modules)
    + add isAdmin field for users table
    + create admin_roles table
    + create admin_roles_map table
    + create Admin.php for Middleware
        https://appdividend.com/2017/07/18/laravel-5-middleware-tutorial/
        * /**
            * Get the path the user should be redirected to when they are not authenticated.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return string
            */
            protected function redirectTo($request)
            {
                if (! $request->expectsJson()) {
                    return route('login');
                }
            }

            /**
            * Handle an incoming request.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  \Closure  $next
            * @param  string[]  ...$guards
            * @return mixed
            *
            * @throws \Illuminate\Auth\AuthenticationException
            */
            public function handle($request, Closure $next, ...$guards)
            {
                $this->authenticate($request, $guards);
                if($this->auth->user()->isAdmin === 1) {
                    return $next($request);
                }
                return redirect('home');
            }

        Function validate password: password_verify($value, $hashedValue);

    + Using middleware in modules
        Modules\Backend\Providers\BackendServiceProvider in boot()
        $this->app->make('router')->aliasMiddleware('admin', \Modules\Backend\Http\Middleware\Admin::class);
- Login System
	When system get value of user login from database and validate success by request
		+ Illuminate\Auth\SessionGuard: updateSession
			Array
			(
				...
				[login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d] => 1
			)
			
		+ Request sent
			system Illuminate\Cookie\MiddlewareEncryptCookies
					getJsonPayload($payload) : $payload = json_decode(base64_decode($payload), true);
						"eyJpdiI6ImNQNWRUdWNPbjlcLysyUkx6aXJvTlhRPT0iLCJ2YWx1ZSI6IkhxT0FFXC9zU3crZnFPZkF2WU9mOXFHMGI4RVJFTVA3MHZDXC9KaWxkdHFLYVhjbldJeTdHR1wvR3hMYWcyMTlyeVQiLCJtYWMiOiJkZWFlM2VhZDU2ZDYwNDFlZWM5MDE1ODg1NDE5Mjc4NjRiODVkOTdmMzQwMGM1OWFkZTBmOGNjMTVjOGJjM2JjIn0="
						-> iv : cP5dTucOn9/+2RLziroNXQ==
						-> value:"HqOAE/sSw+fqOfAvYOf9qG0b8EREMP70vC/JildtqKaXcnWIy7GG/GxLag219ryT"
						-> mac: deae3ead56d6041eec901588541927864b85d97f3400c59ade0f8cc15c8bc3bc
						
						$decrypted = \openssl_decrypt(
							$payload['value'], $this->cipher, $this->key, 0, $iv
						); a7CuYbkB4irKAwiFAbpJeYsEQmupfXqwTO10BIyv this is name of session file
- Form
    + composer require laravelcollective/html
    + config\app.php
        providers' => [
            // ...
            Collective\Html\HtmlServiceProvider::class,
            // ...
        ],
        
        'aliases' => [
            // ...
            'Form' => Collective\Html\FormFacade::class,
            'Html' => Collective\Html\HtmlFacade::class,
            // ...
        ],