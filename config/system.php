<?php
 return [
     'list' => [
         'cagaileo',
         'newkien',
         'hoaxuan',
         'samtonu',
         'estrogen',
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


         'estrogen' => [
             'categories' => [
                 'index_block_1' => 'Hiện thị ở Trang Chủ Block 1',
                 'index_block_2' => 'Hiện thị ở Trang Chủ Block 2',
                 'index_block_3' => 'Hiện thị ở Trang Chủ Block 3',
                 'index_block_4' => 'Hiện thị ở Trang Chủ Block 4',
             ],
             'products' => [

             ],
             'posts' => [
                 'top_index' => 'Hiện thị ở Block Top Trang Chủ',
                 'index_right' => 'Hiện thị Block bên phải Trang chủ',
                 'index_right_share' => 'Hiện thị phần chia sẻ cột phải trang trong',
             ],
             'videos' => [
                 'index_right' => 'Hiện thị Bên phải trang Chủ',
             ],
             'questions' => [
                 'index_right' => 'Hiện thị Bên phải trang Chủ',
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

         ],

         'hoaxuan' => [
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

         'samtonu' => [
             'categories' => [

             ],
             'products' => [

             ],
             'posts' => [
                'top_index' => 'Hiện thị ở Block Top Trang Chủ',
                #'middle_index' => 'Hiện thị Block ở giữa Trang chủ',
                'below_index' => 'Hiện thị Block bên dưới Trang chủ',
                'right' => 'Hiện thị phía trên cột phải',
                'right_below' => 'Hiện thị phía dưới cột phải',
             ],
             'videos' => [
                 'right' => 'Hiện thị Bên phải trang trong',
             ],
             'questions' => [
                 'right_normal' => 'Hiện thị Bên phải trang trong'
             ],

             'shares' => [
                 'above_index' => 'Hiện thị trong mục Sâm nhung tuệ Linh',
                 'below_index' => 'Hiện thị trong mục Chia sẻ người dùng',
             ],

         ],
     ],

     'sitemap' => [
         'cagaileo' => ['categories', 'posts', 'questions', 'videos', 'products'],
         'newkien' => ['categories', 'posts', 'questions', 'videos', 'products'],
         'hoaxuan' => ['categories', 'posts', 'questions', 'videos', 'products'],
         'samtonu' => ['categories', 'posts', 'questions', 'videos', 'products'],
         'estrogen' => ['categories', 'posts', 'questions', 'videos', 'products'],
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
         'hoaxuan' => [
             'congdung',
             'xuatxu',
             'giayphep',
             'quycach',
             'tinhtrang',
             'giacu',
             'giamoi',
         ],
         'samtonu' => [
             'congdung',
             'xuatxu',
             'giayphep',
             'quycach',
             'tinhtrang',
             'giacu',
             'giamoi',
         ],

         'estrogen' => [

         ],
     ],

     'customer_content_status' => [
         0 => 'Vừa tiếp nhận',
         1 => 'Đang xử lý',
         2 => 'Đã hoàn thành'
     ],

     'comment_content_status' => [
         0 => 'Vừa tiếp nhận',
         1 => 'Chấp nhận',
         2 => 'Hủy'
     ],
 ];