### Setup Framework 

* `composer create-project --prefer-dist laravel/laravel caleo_v2`

* `composer require cartalyst/sentinel`

* install sentinel for laravel `https://cartalyst.com/manual/sentinel/2.0`

* `cviebrock/eloquent-sluggable`

* Run migration `php artisan migrate --database=cagaileo`

* `php artisan ide-helper:generate`

* `php artisan migrate --database=cagaileo`

* `php artisan db:seed --database=cagaileo`

* To make KCFinder work we must have `public/files/images` and `imagick or gd` php extensions.

### Note about roles and permissions.

* User have access permissions by role its have. But also we can set this permission mode for this user directly.

 - Inherit : For this permission, user have or have not this permission base on role its have.
 
 - Reject : Event user roles have this permissions, user not have.
 
 - Grant : User roles do not have this permission but user have.
 