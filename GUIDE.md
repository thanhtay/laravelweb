- Using migration:
    document: https://laravel.com/docs/5.8/migrations
    php artisan make:migration add_is_admin_to_users // create
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('isAdmin')->nullable();
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isAdmin');
        });
    }
    php artisan migrate // run
    php artisan migrate:rollback // rollback

    php artisan migrate --path=/database/migrations/2019_04_24_041055_create_admin_roles_table.php
- Using seeding
    php artisan db:seed
    php artisan db:seed --class=UsersTableSeeder