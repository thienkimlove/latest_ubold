<?php

namespace App\Http\Controllers;

use App\Lib\Helpers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Province;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Watson\Sitemap\Facades\Sitemap;

class CLController extends Controller
{
    protected function generateMeta($case = null, $meta = [], $mainContent = null)
    {
        $defaultLogo = url('frontend/cagaileo/images/logo.png');
        $settings = Setting::pluck('value', 'name')->all();

        switch ($case) {
            default :
                return [
                    'meta_title' => $settings['META_INDEX_TITLE'],
                    'meta_desc' => $settings['META_INDEX_DESC'],
                    'meta_keywords' => $settings['META_INDEX_KEYWORDS'],
                    'meta_url' => url('/'),
                    'meta_image' => $defaultLogo
                ];
                break;

            case 'lien-he' :
                return [
                    'meta_title' => $settings['META_CONTACT_TITLE'],
                    'meta_desc' => $settings['META_CONTACT_DESC'],
                    'meta_keywords' => $settings['META_CONTACT_KEYWORDS'],
                    'meta_url' => url('lien-he'),
                    'meta_image' => $defaultLogo
                ];
                break;
            case 'video' :

                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : $settings['META_VIDEO_TITLE'],
                    'meta_desc' => empty($meta['desc']) ? $meta['desc'] : $settings['META_VIDEO_DESC'],
                    'meta_keywords' => empty($meta['keywords']) ? $meta['keywords'] : $settings['META_VIDEO_KEYWORDS'],
                    'meta_url' => ($mainContent) ? url('video/' . $mainContent->slug) : url('video'),
                    'meta_image' => ($mainContent)?  url('img/cache/120x120/'.$mainContent->image) : $defaultLogo
                ];

                break;
            case 'phan-phoi' :
                if ($mainContent) {
                    return [
                        'meta_title' => !empty($meta['title']) ? $meta['title'] : $settings['META_DELIVERY_TITLE'],
                        'meta_desc' => $settings['META_DELIVERY_DESC'],
                        'meta_keywords' => $settings['META_DELIVERY_KEYWORDS'],
                        'meta_url' => url('phan-phoi/' . $mainContent->id),
                        'meta_image' => $defaultLogo
                    ];
                } else {
                    return [
                        'meta_title' => !empty($meta['title']) ? $meta['title'] : $settings['META_DELIVERY_TITLE'],
                        'meta_desc' => !empty($meta['desc']) ? $meta['desc'] : $settings['META_DELIVERY_DESC'],
                        'meta_keywords' => !empty($meta['keywords']) ? $meta['keywords'] : $settings['META_DELIVERY_KEYWORDS'],
                        'meta_url' => url('phan-phoi'),
                        'meta_image' =>  $defaultLogo
                    ];
                }
                break;
            case 'tag' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => $meta['keywords'],
                    'meta_url' => url('tag/' . $mainContent),
                    'meta_image' => $defaultLogo
                ];
                break;
            case 'product_detail' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => $meta['keywords'],
                    'meta_url' => url('product/' . $mainContent),
                    'meta_image' => url('img/cache/120x120/'.$mainContent->image)
                ];
                break;
            case 'product' :
                return [
                    'meta_title' => 'Sản phẩm | '.$settings['META_INDEX_TITLE'],
                    'meta_desc' => $settings['META_INDEX_DESC'],
                    'meta_keywords' => $settings['META_INDEX_KEYWORDS'],
                    'meta_url' => url('product'),
                    'meta_image' => $defaultLogo
                ];
                break;
            case 'cau-hoi-thuong-gap' :
                return [
                    'meta_title' => !empty($meta['title']) ? $meta['title'] : $settings['META_QUESTION_TITLE'],
                    'meta_desc' => !empty($meta['desc']) ? $meta['desc'] : $settings['META_QUESTION_DESC'],
                    'meta_keywords' => !empty($meta['keywords']) ? $meta['keywords'] : $settings['META_QUESTION_KEYWORDS'],
                    'meta_url' => ($mainContent) ? url('cau-hoi-thuong-gap/' . $mainContent->slug) : url('cau-hoi-thuong-gap'),
                    'meta_image' => ($mainContent)?  url('img/cache/120x120/'.$mainContent->image) : $defaultLogo
                ];
                break;
            case 'post' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => !empty($meta['keywords']) ? $meta['keywords'] : $settings['META_POST_KEYWORDS'],
                    'meta_url' => url($mainContent->slug . '.html'),
                    'meta_image' => url('img/cache/120x120/'.$mainContent->image) 
                ];
                break;
            case 'category' :
                return [
                    'meta_title' => $meta['title'],
                    'meta_desc' => $meta['desc'],
                    'meta_keywords' => !empty($meta['keywords']) ? $meta['keywords'] : $settings['META_CATEGORY_KEYWORDS'],
                    'meta_url' => url($mainContent->slug),
                    'meta_image' => $defaultLogo
                ];
                break;
        }

    }

    public function index()
    {
        $page = 'index';

        $topModuleCategoryIds = Helpers::getModuleValues('categories', 'index_1');

        $topIndexCategory = Category::whereIn('id', $topModuleCategoryIds)->whereNull('parent_id')->get();
        
        if ($topIndexCategory->count() > 0) {
            $topIndexCategory = $topIndexCategory->first();
        } else {
            $topIndexCategory = null;
        }

        $secondModuleCategoryIds = Helpers::getModuleValues('categories', 'index_2');

        $secondIndexCategory = Category::whereIn('id', $secondModuleCategoryIds)->whereNull('parent_id')->get();

        if ($secondIndexCategory->count() > 0) {
            $secondIndexCategory = $secondIndexCategory->first();
        }  else {
            $secondIndexCategory = null;
        }

        $thirdModuleCategoryIds = Helpers::getModuleValues('categories', 'index_3');

        $thirdIndexCategory = Category::whereIn('id', $thirdModuleCategoryIds)->whereNull('parent_id')->get();

        if ($thirdIndexCategory->count() > 0) {
            $thirdIndexCategory = $thirdIndexCategory->first();
        } else {
            $thirdIndexCategory = null;
        }

        $hotIndexProductIds = Helpers::getModuleValues('products', 'hot_index');

        $hotProducts = Product::whereIn('id', $hotIndexProductIds)
            ->latest('updated_at')
            ->limit(6)
            ->get();

        $belowProductBanner = Banner::where('status', true)
            ->whereHas('position', function($q) {
                $q->where('name', 'below_product_index');
            })
            ->get();

        $middleIndexBanner = Banner::where('status', true)
            ->whereHas('position', function($q) {
                $q->where('name', 'middle_index');
            })
            ->get();
        
        return view('frontend.cagaileo.index', compact(
            'topIndexCategory',
            'secondIndexCategory',
            'thirdIndexCategory',
            'middleIndexBanner',
            'page',
            'hotProducts',
            'belowProductBanner'
        ))->with($this->generateMeta());
    }

    public function contact()
    {
        $page = 'lien-he';
        return view('frontend.cagaileo.contact', compact('page'))->with($this->generateMeta('lien-he'));
    }

    /**
     * @param null $value
     * @return $this
     */
    public function video($value = null)
    {
        $page = 'video';
        $mainVideo = null;
        $meta_title = $meta_desc = $meta_keywords = null;
        $videos = Video::paginate(6);

        $latestVideos = Video::latest('updated_at')->limit(5)->get();

        if ($videos->count() > 0) {
            $mainVideo = $videos->first();
        }

        if ($value) {
            $mainVideo = Video::where('slug', $value)->first();
            $meta_title = ($mainVideo->seo_title) ? $mainVideo->seo_title : $mainVideo->title;
            $meta_desc = $mainVideo->desc;
            $meta_keywords = $mainVideo->keywords;
            $mainVideo->update(['views' => (int)$mainVideo->views + 1]);
        }


        return view('frontend.cagaileo.video', compact('videos', 'mainVideo', 'latestVideos', 'page'))->with($this->generateMeta('video', [
            'title' => $meta_title,
            'desc' => $meta_desc,
            'keywords' => $meta_keywords,
        ], $mainVideo));

    }

    public function delivery($slug = null)
    {

        $page = 'phan-phoi';

        if ($slug) {
            $province = Province::findBySlug($slug);
            return view('frontend.cagaileo.detail_delivery', compact('province', 'page'))->with($this->generateMeta('phan-phoi', [
                'title' => $province->name,
            ], $province));
        } else {
            $provinces = Province::orderBy('id')->get();

            $deliveryProducts = Product::all();

            $success_delivery_form_message = null;

            if (session()->has('success_delivery_form_message')) {
                $success_delivery_form_message = true;
                session()->forget('success_delivery_form_message');
            }

            return view('frontend.cagaileo.new_phanphoi', compact('provinces', 'page', 'deliveryProducts', 'success_delivery_form_message'))->with($this->generateMeta('phan-phoi'));
        }

    }

    public function ajaxStore(Request $request)
    {
        $districtId = $request->input('district_id');
        $stores = Store::where('district_id', $districtId)->get();
        $html = view('frontend.cagaileo.store_list', compact('stores'))->render();

        return response()->json(['html' => $html]);
    }

    public function saveContact(Request $request)
    {
        $data = $request->all();
        $redirectUrl = null;

        if (isset($data['redirect_url'])) {
            $redirectUrl = $data['redirect_url'];
            unset($data['redirect_url']);
        }

        if (!empty($data['name']) && !empty($data['email']) && !empty($data['title']) && !empty($data['content']) && !empty($data['phone'])) {

            Contact::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'title' => $data['title'],
                'content' => $data['content'],
                'status' => 0
            ]);
        }


        if ($redirectUrl) {
            session()->put('success_delivery_form_message', true);
            return redirect()->to($redirectUrl);
        }

        return redirect('/');

    }


    public function saveOrder(Request $request)
    {
        $data = $request->all();
        $redirectUrl = null;

        if (isset($data['redirect_url'])) {
            $redirectUrl = $data['redirect_url'];
            unset($data['redirect_url']);
        }

        if (!empty($data['name']) && !empty($data['address']) && !empty($data['product_id']) && !empty($data['quantity']) && !empty($data['phone'])) {

            Order::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                'note' => (isset($data['note'])) ? $data['note'] : '',
                'status' => 0
            ]);
        }


        if ($redirectUrl) {
            session()->put('success_delivery_form_message', true);
            return redirect()->to($redirectUrl);
        }

        return redirect('/');

    }

    public function tag($value)
    {
        $page = 'tag';
        $middleIndexBanner = Banner::where('status', true)->whereHas('position', function($q){
            $q->where('name', 'middle_index');
        })->get();

        $tag = Tag::where('slug', $value)->get();

        if ($tag->count() > 0) {

            $tag = $tag->first();

            $meta_title = ($tag->seo_title) ? $tag->seo_title : $tag->name;
            $meta_desc = $tag->desc;
            $meta_keywords = $tag->keywords;

            $posts = Post::publish()
                ->whereHas('tags', function ($q) use ($tag) {
                    $q->where('id', $tag->id);
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

            return view('frontend.cagaileo.tag', compact('posts', 'tag', 'middleIndexBanner', 'page'))->with
            ($this->generateMeta([
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $value));
        }
    } 
    
    public function search(Request $request) 
    {
        $page = 'search';
        if ($request->filled('q')) {

            $middleIndexBanner = Banner::where('status', true)->whereHas('position', function($q){
                $q->where('name', 'middle_index');
            })->get();


            $keyword = $request->get('q');
            $posts = Post::publish()->where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);

            return view('frontend.cagaileo.search', compact('posts', 'keyword', 'middleIndexBanner', 'page'))->with($this->generateMeta('tag', [
                'title' => 'Tìm kiếm cho từ khóa ' . $keyword,
                'desc' => 'Tìm kiếm cho từ khóa ' . $keyword,
                'keywords' => $keyword,
            ], $keyword));
        }
    }

    public function product($value = null)
    {
        $page = 'product';



        $middleIndexBanner = Banner::where('status', true)->whereHas('position', function($q){
            $q->where('name', 'middle_index');
        })->get();


        $meta_title = $meta_desc = $meta_keywords = null;
        if ($value) {
            $product = Product::where('slug', $value)->first();


            $advProduct = Banner::where('status', true)->whereHas('position', function($q){
                $q->where('name', 'top_product_detail');
            })->get();




            $meta_title = ($product->seo_title) ? $product->seo_title : $product->title;
            $meta_desc = $product->desc;
            $meta_keywords = $product->keywords;

            $hotBelowModules = Helpers::getModuleValues('products', 'hot_below');


            $hotProducts = Product::whereIn('id', $hotBelowModules)
                ->where('id', '<>', $product->id)
                ->latest('updated_at')
                ->limit(5)
                ->get();
            return view('frontend.cagaileo.product_detail', compact(
                'product',
                'middleIndexBanner',
                'page',
                'advProduct',
                'hotProducts'
            ))->with($this->generateMeta('product_detail', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $product));
        } else {

          $products = Product::paginate(9);

            return view('frontend.cagaileo.product', compact('products', 'middleIndexBanner', 'page'))->with($this->generateMeta('product', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ]));
        }

    }

    public function question($value = null)
    {
        $middleIndexBanner = Banner::where('status', true)->whereHas('position', function($q){
            $q->where('name', 'middle_index');
        })->get();

        $success_delivery_form_message = false;

        if (session()->has('success_delivery_form_message')) {
            $success_delivery_form_message = true;
            session()->forget('success_delivery_form_message');
        }

        $page = 'cau-hoi-thuong-gap';
        $mainQuestion = null;
        $meta_title = $meta_desc = $meta_keywords = null;
        if ($value) {
            $mainQuestion = Question::where('slug', $value)->first();
            $meta_title = ($mainQuestion->seo_title) ? $mainQuestion->seo_title : $mainQuestion->title;
            $meta_desc = $mainQuestion->desc;
            $meta_keywords = $mainQuestion->keywords;

            return view('frontend.cagaileo.detail_question', compact('mainQuestion', 'middleIndexBanner', 'page', 'success_delivery_form_message'))->with($this->generateMeta('cau-hoi-thuong-gap', [
                'title' => $meta_title,
                'desc' => $meta_desc,
                'keywords' => $meta_keywords,
            ], $mainQuestion));

        }
        $questions = Question::publish()->paginate(10);
        return view('frontend.cagaileo.question', compact('questions', 'mainQuestion', 'middleIndexBanner', 'page', 'success_delivery_form_message'))->with($this->generateMeta('cau-hoi-thuong-gap', [
            'title' => $meta_title,
            'desc' => $meta_desc,
            'keywords' => $meta_keywords,
        ], $mainQuestion));
    }

    public function main($value)
    {

        $middleIndexBanner = Banner::where('status', true)->whereHas('position', function($q){
            $q->where('name', 'middle_index');
        })->get();

        if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {

            $post = Post::where('slug', $matches[1])->first();
            $post->update(['views' => (int) $post->views + 1]);

            $latestNews = Post::publish()
                ->where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->latest('updated_at')
                ->limit(6)
                ->get();
            
            $page = $post->category->slug;

            return view('frontend.cagaileo.post', compact('post', 'latestNews', 'middleIndexBanner', 'page'))->with($this->generateMeta('post', [
                'title' => ($post->seo_title) ? $post->seo_title : $post->title,
                'desc' => $post->desc,
                'keyword' => ($post->tagList) ? implode(',', $post->tagList) : null,
            ], $post));
        } else {
            $category = Category::where('slug', $value)->first();

            if ($category->children->count() == 0) {
                //child categories
                $posts = Post::publish()
                    ->where('category_id', $category->id)
                    ->latest('updated_at')
                    ->paginate(10);

            } else {
                //parent categories
                $posts = Post::publish()
                    ->whereIn('category_id', $category->children->pluck('id')->all())
                    ->latest('updated_at')
                    ->paginate(10);

            }
            
            $page = $category->slug;

            return view('frontend.cagaileo.category', compact(
                'category', 'posts', 'page','middleIndexBanner'
            ))->with($this->generateMeta('category', [
                'title' => ($category->seo_name) ?  $category->seo_name : $category->name,
                'desc' =>  ($category->desc)? $category->desc : null,
                'keyword' => ($category->keywords)? $category->keywords : null,
            ], $category));
        }
    }

    #Sitemap
    public function sitemap()
    {
        foreach (config('system.sitemap.'.env('DB_DATABASE')) as $content) {
            Sitemap::addSitemap(url('sitemap_'.$content.'.xml'));
        }

        return Sitemap::index();

    }

    public function sitemap_posts()
    {
        $contents = Post::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url($content->slug.'.html'), $content->updated_at, 'daily', '0.8');
        }
        return Sitemap::render();
    }

    public function sitemap_categories()
    {
        $contents = Category::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url($content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function sitemap_questions()
    {
        $contents = Question::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('cau-hoi-thuong-gap', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function sitemap_videos()
    {
        $contents = Video::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('video', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function sitemap_products()
    {
        $contents = Product::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('product', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }
}
