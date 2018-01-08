<?php
 return [
     'list' => [
         'cagaileo'
     ],
     'user_status' => [
         1 => 'Active',
         0 => 'Inactive'
     ],
     'modules' => [
         'cagaileo' => [
             'categories' => [
                 'index_1' => 'Top Category Index',
                 'index_2' => 'Second Category Index',
                 'index_3' => 'Third Category Index',
             ],
             'products' => [
                 'hot_index' => 'Hot Product Index',
                 'hot_below' => 'Hot Product Below',
             ],
         ]
     ],

     'sitemap' => [
         'cagaileo' => ['categories', 'posts', 'questions', 'videos', 'products'],
     ],

     'product_attributes' => [
         'cagaileo' => [
             'congdung',
             'xuatxu',
             'giayphep',
             'quycach',
             'tinhtrang',
             'giacu',
             'giamoi',
         ],
     ],

     'customer_content_status' => [
         0 => 'Vừa tiếp nhận',
         1 => 'Đang xử lý',
         2 => 'Đã hoàn thành'
     ],
 ];