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
 