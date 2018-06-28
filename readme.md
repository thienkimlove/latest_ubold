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

### Transfer database

```$xslt
TRUNCATE TABLE cagaileo.posts;


INSERT into cagaileo.posts (`id`,`title`, `slug`, `seo_title`, `seo_desc`, `desc`, `content`, `category_id`, `status`, `views`, `image`,  `created_at`, `updated_at`)
  select id, `title`, `slug`, `seo_title`, null, `desc`, `content`, `category_id`, `status`, `views`, `image`,`created_at`, `updated_at` from caleo.posts

TRUNCATE TABLE cagaileo.products;


INSERT into cagaileo.products (`id`,`title`, `slug`, `seo_title`, `seo_desc`, `image`, `status`, `views`, `content`, `content_tab1`, `content_tab2`, `content_tab3`, `additions`,`created_at`, `updated_at`)
select id, `title`, `slug`, `seo_title`, null, `image`, 1, 0, null, `content_tab1`, `content_tab2`, `content_tab3`, null, `created_at`, `updated_at` from caleo.products

TRUNCATE TABLE cagaileo.questions;


INSERT into cagaileo.questions (`id`,`title`, `slug`, `seo_title`, `seo_desc`,`question`, `answer`, `short_answer`, `person`,  `image`, `status`, `views`, `created_at`, `updated_at`)
  select id, `title`, `slug`, `seo_title`, null, `question`, `answer`, null, `ask_person`, `image`, 1, 0, `created_at`, `updated_at` from caleo.questions

TRUNCATE  table cagaileo.tags;

insert into cagaileo.tags (id, name, slug, seo_name, seo_desc, created_at, updated_at)
  select id, name, slug, seo_name, null, created_at, updated_at from caleo.tags;

TRUNCATE  table cagaileo.product_tag;

insert into cagaileo.product_tag (product_id, tag_id)
select product_id, tag_id from caleo.product_tag;

```

### Create new instance from `cagaileo` instance

* Create new database

```textmate
mysql -e "Create database newkien"
mysqldump -uroot -p cagaileo > /tmp/cagaileo.sql
mysql -uroot -p newkien < /tmp/cagaileo.sql
```

* Important

if it same as `cagaileo`, we no need to do anything

if it have something news or override , we must add new function and new routes to `FrontendController` and `routes/web.php`

* Add in `config/database.php`

```textmate
  'newkien' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'newkien',
            'username' => 'root',
            'password' => 'tieungao',
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
```
* Add in `config/system.php`

* Add in `app/Providers/AppServiceProvider.php`

* Create file `deploy/newkien.antim.vn` and link

`ln -s /var/www/html/v2_latest/deploy/newkien.antim.vn /etc/nginx/sites-enabled/local.newkien.vn`
`ln -s /var/www/html/v2_latest/deploy/hoaxuan.nuocsucmieng.vn /etc/nginx/sites-enabled/hoaxuan.nuocsucmieng.vn`

* go to `Google Console` to add `http://newkien.antim.vn/callback` to API List

* Copy in public `cp -r public/frontend/cagaileo public/frontend/newkien`

* Copy in resources `cp -r resources/views/frontend/cagaileo  resources/views/frontend/newkien`

* Replace `cagaileo` with `newkien` in `resources/view/frontend/newkien`

but keep in `resources/view/frontend/newkien/frontend.blade.php`

```textmate
 <link rel="stylesheet" href="{{url('frontend/newkien/css/cagaileo.css')}}" type="text/css"/>
```