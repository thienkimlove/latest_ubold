<?php
 return [
     'list' => [
         'cagaileo',
         'newkien',
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
             'posts' => [
                 'right' => 'Right Normal',
                 'right_index' => 'Right Index',
                 'top1_index_category' => 'Top1 Index Category',
                 'top2_index_category' => 'Top2 Index Category',
                 'top3_index_category' => 'Top3 Index Category',
             ],
             'videos' => [
                 'right' => 'Right Normal',
                 'right_index' => 'Right Index',
             ],
             'questions' => [
                 'right_normal' => 'Right Normal'
             ],

         ],
         'newkien' => [
             'categories' => [
                 'index_1' => 'Top Category Index',
                 'index_2' => 'Second Category Index',
                 'index_3' => 'Third Category Index',
             ],
             'products' => [
                 'hot_index' => 'Hot Product Index',
                 'hot_below' => 'Hot Product Below',
             ],
             'posts' => [
                 'right' => 'Right Normal',
                 'right_index' => 'Right Index',
                 'top1_index_category' => 'Top1 Index Category',
                 'top2_index_category' => 'Top2 Index Category',
                 'top3_index_category' => 'Top3 Index Category',
             ],
             'videos' => [
                 'right' => 'Right Normal',
                 'right_index' => 'Right Index',
             ],
             'questions' => [
                 'right_normal' => 'Right Normal'
             ],

         ]
     ],

     'sitemap' => [
         'cagaileo' => ['categories', 'posts', 'questions', 'videos', 'products'],
         'newkien' => ['categories', 'posts', 'questions', 'videos', 'products'],
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
         'newkien' => [
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