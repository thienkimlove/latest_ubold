<?php

namespace App\Lib;

use App\Models\Category;
use App\Models\Comment;
use App\Models\District;
use App\Models\Module;
use App\Models\Position;
use App\Models\Post;
use App\Models\Product;
use App\Models\Question;
use App\Models\Role;
use App\Models\Share;
use App\Models\Tag;
use App\Models\Video;
use Carbon\Carbon;


class Helpers {

    /* For convert from viemgan to new site */

    public static function getLatestNormalPosts()
    {
        return Post::where('status', true)->latest('created_at')->limit(5)->get();
    }

    public static function getRightIndexSharePosts()
    {
        return self::getContentByModule('posts', 'index_right_share', 4);
    }

    public static function getSharingIndex()
    {
        return Share::where('status', true)->latest('created_at')->limit(15)->get();
    }

    public static function getRightIndexPosts()
    {
        return self::getContentByModule('posts', 'index_right', 4);
    }

    public static function getRightIndexQuestions()
    {
        return self::getContentByModule('questions', 'index_right', 3);
    }

    public static function getRightIndexVideos()
    {
        return self::getContentByModule('videos', 'index_right', 3);
    }

    public static function getIndexCategoryPosts($category, $limit = 4)
    {

        $subCategoryIds = Category::where('parent_id', $category->id)->pluck('id')->all();
        $categoryIds = ($subCategoryIds) ? $subCategoryIds : [$category->id];

        return Post::where('status', true)->latest('created_at')->whereIn('category_id', $categoryIds)->limit($limit)->get();
    }

    public static function getIndexSubCategory($category, $limit = 3)
    {
        return Category::where('parent_id', $category->id)->limit($limit)->get();
    }

    /* For convert from viemgan to new site */

    public static function getProductDetails($product, $detail)
    {
        $response = [];

        if ($product->additions) {
            $response = json_decode($product->additions, true);
        }
        return isset($response[$detail]) ? $response[$detail] : '';
    }

    public static function tagList()
    {
        return Tag::pluck('name','name')->all();
    }

    public static function getModuleValues($content, $type)
    {
        return Module::where('content', $content)
            ->where('type', $type)
            ->pluck('value')
            ->all();
    }

    public static function getModules($content = 'posts')
    {
        return config('system.modules.'.env('DB_DATABASE').'.'.$content) ?  config('system.modules.'.env('DB_DATABASE').'.'.$content) : [];
    }

    public static function getProductAttributes()
    {
        return config('system.product_attributes.'.env('DB_DATABASE')) ?  config('system.product_attributes.'.env('DB_DATABASE')) : [];
    }

    public static function roleList()
    {
       return Role::pluck('name', 'id')->all();
    }

    public static function positionList()
    {
        return Position::pluck('name', 'id')->all();
    }

    public static function districtList()
    {
        return District::pluck('name', 'id')->all();
    }

    public static function productList()
    {
        return Product::pluck('title', 'id')->all();
    }


    public static function categoryList()
    {
        return Category::pluck('name', 'id')->all();
    }


    public static function inDeepArray($key, $value, $ars)
    {
        $in = false;
        foreach ($ars as $item) {
            if (isset($item[$key]) && $item[$key] == $value) {
                $in = true;
            }
        }
        return $in;
    }

    public static function formatDatetime($datetime)
    {
        return $datetime ? Carbon::parse($datetime)->format('H:i:s d/m/Y') : 'Không có thông tin';
    }

    public static function toNum($value) {
        if (!$value) {
            return 0;
        } else {
            return intval(trim($value));
        }
    }

    public static function appendToLog($message, $log_file)
    {
        @file_put_contents($log_file, $message."\n", FILE_APPEND);
    }

    public static function convertDateToVietnamese( $format, $time = 0 )
    {
        if ( ! $time ) $time = time();

        $lang = array();
        $lang['sun'] = 'CN';
        $lang['mon'] = 'T2';
        $lang['tue'] = 'T3';
        $lang['wed'] = 'T4';
        $lang['thu'] = 'T5';
        $lang['fri'] = 'T6';
        $lang['sat'] = 'T7';
        $lang['sunday'] = 'Chủ nhật';
        $lang['monday'] = 'Thứ hai';
        $lang['tuesday'] = 'Thứ ba';
        $lang['wednesday'] = 'Thứ tư';
        $lang['thursday'] = 'Thứ năm';
        $lang['friday'] = 'Thứ sáu';
        $lang['saturday'] = 'Thứ bảy';
        $lang['january'] = 'Tháng Một';
        $lang['february'] = 'Tháng Hai';
        $lang['march'] = 'Tháng Ba';
        $lang['april'] = 'Tháng Tư';
        $lang['may'] = 'Tháng Năm';
        $lang['june'] = 'Tháng Sáu';
        $lang['july'] = 'Tháng Bảy';
        $lang['august'] = 'Tháng Tám';
        $lang['september'] = 'Tháng Chín';
        $lang['october'] = 'Tháng Mười';
        $lang['november'] = 'Tháng M. Một';
        $lang['december'] = 'Tháng M. Hai';
        $lang['jan'] = 'T01';
        $lang['feb'] = 'T02';
        $lang['mar'] = 'T03';
        $lang['apr'] = 'T04';
        $lang['may2'] = 'T05';
        $lang['jun'] = 'T06';
        $lang['jul'] = 'T07';
        $lang['aug'] = 'T08';
        $lang['sep'] = 'T09';
        $lang['oct'] = 'T10';
        $lang['nov'] = 'T11';
        $lang['dec'] = 'T12';

        $format = str_replace( "r", "D, d M Y H:i:s O", $format );
        $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
        $return = date( $format, $time );

        $replaces = array(
            '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
            '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
            '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
            '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
            '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
            '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
            '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
            '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
            '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
            '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
            '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
            '/\[May\](\W|$)/' => $lang['may2'] . "$1",
            '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
            '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
            '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
            '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
            '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
            '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
            '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
            '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
            '/Monday(\W|$)/' => $lang['monday'] . "$1",
            '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
            '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
            '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
            '/Friday(\W|$)/' => $lang['friday'] . "$1",
            '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
            '/January(\W|$)/' => $lang['january'] . "$1",
            '/February(\W|$)/' => $lang['february'] . "$1",
            '/March(\W|$)/' => $lang['march'] . "$1",
            '/April(\W|$)/' => $lang['april'] . "$1",
            '/May(\W|$)/' => $lang['may'] . "$1",
            '/June(\W|$)/' => $lang['june'] . "$1",
            '/July(\W|$)/' => $lang['july'] . "$1",
            '/August(\W|$)/' => $lang['august'] . "$1",
            '/September(\W|$)/' => $lang['september'] . "$1",
            '/October(\W|$)/' => $lang['october'] . "$1",
            '/November(\W|$)/' => $lang['november'] . "$1",
            '/December(\W|$)/' => $lang['december'] . "$1" );

        return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
    }
    
    public static function convertDate($time)
    {
        return self::convertDateToVietnamese('d/m/Y H:i', $time);
    }

    public static function br2nl($input)
    {
        return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
    }

    public static function getContentByModule($content, $module_type, $limit = null)
    {
        $contentIds = Module::where('type', $module_type)->where('content', $content)->pluck('value');

        if ($contentIds) {



            if ($content == 'posts') {
                if ($limit) {
                    return Post::whereIn('id', $contentIds)->where('status', true)->limit($limit)->get();
                } else {
                    return Post::whereIn('id', $contentIds)->where('status', true)->get();
                }

            }

            if ($content == 'categories') {

                if ($limit) {
                    return Category::whereIn('id', $contentIds)->where('status', true)->limit($limit)->get();
                } else {
                    return Category::whereIn('id', $contentIds)->where('status', true)->get();
                }

            }

            if ($content == 'shares') {
                if ($limit) {
                    return Share::whereIn('id', $contentIds)->where('status', true)->limit($limit)->get();
                } else {
                    return Share::whereIn('id', $contentIds)->where('status', true)->get();
                }
            }

            if ($content == 'questions') {
                if ($limit) {
                    return Question::whereIn('id', $contentIds)->where('status', true)->limit($limit)->get();
                } else {
                    return Question::whereIn('id', $contentIds)->where('status', true)->get();
                }
            }

            if ($content == 'videos') {
                if ($limit) {
                    return Video::whereIn('id', $contentIds)->where('status', true)->limit($limit)->get();
                } else {
                    return Video::whereIn('id', $contentIds)->where('status', true)->get();
                }
            }
        }

        return null;

    }

    public static function getCommentByContentId($id, $type)
    {
        return Comment::where('content_type', $type)->where('content_id', $id)->where('status', 1)->get();
    }


    public static function getLatestNews()
    {
        return Post::where('status', true)
            ->latest('created_at')
            ->limit(8)
            ->get();
    }

    public static function getYoutubeEmbedUrl($code)
    {
        // Extract video url from embed code
        $youtubeVideoId = preg_replace_callback('/<iframe\s+.*?\s+src=(".*?").*?<\/iframe>/', function ($matches) {
            // Remove quotes
            $youtubeUrl = $matches[1];
            $youtubeUrl = trim($youtubeUrl, '"');
            $youtubeUrl = trim($youtubeUrl, "'");
            // Extract id
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $youtubeUrl, $videoId);
            return $youtubeVideoId = isset($videoId[1]) ? $videoId[1] : "";
        }, $code);

        return $youtubeVideoId ;
    }

    public static function getYoutubeImage($url)
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $videoId);
        $youtubeVideoId = isset($videoId[1]) ? $videoId[1] : "";
        return 'https://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
    }
}
