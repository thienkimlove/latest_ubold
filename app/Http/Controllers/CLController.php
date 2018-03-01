<?php

namespace App\Http\Controllers;

use App\Lib\Helpers;
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

    public $logo = '/frontend/cagaileo/images/logo.png';

    private function getSetting($key)
    {
        $settings = Setting::pluck('value', 'name')->all();
        return isset($settings[$key]) ? $settings[$key] : '';

    }


    public function index()
    {
        $page = 'index';

        $meta = [];
        $meta['meta_title'] = $this->getSetting('META_INDEX_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_INDEX_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_INDEX_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] = url('/');


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

        
        return view('frontend.cagaileo.index', compact(
            'topIndexCategory',
            'secondIndexCategory',
            'thirdIndexCategory',
            'page',
            'hotProducts'))->with($meta);
    }

    public function contact()
    {
        $page = 'lien-he';
        $meta = [];

        $meta['meta_title'] = $this->getSetting('META_CONTACT_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_CONTACT_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_CONTACT_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] =route('frontend.contact');


        return view('frontend.cagaileo.contact', compact('page'))->with($meta);
    }

    /**
     * @param null $value
     * @return $this
     */
    public function video($value = null)
    {
        $page = 'video';

        $meta = [];

        $meta['meta_title'] = $this->getSetting('META_VIDEO_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_VIDEO_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_VIDEO_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] =route('frontend.video');

        $mainVideo = null;
        $videos = Video::paginate(6);
        $latestVideos = Video::latest('updated_at')->limit(5)->get();
        if ($videos->count() > 0) {
            $mainVideo = $videos->first();
        }

        if ($value) {
            $mainVideo = Video::findBySlug($value);
            if ($mainVideo) {
                $meta_title = ($mainVideo->seo_title) ? $mainVideo->seo_title : $mainVideo->title;
                $meta_desc = $mainVideo->desc;
                $meta_keywords = $mainVideo->keywords;
                $mainVideo->update(['views' => (int)$mainVideo->views + 1]);


                $meta['meta_title'] = $meta_title;
                $meta['meta_desc'] = $meta_desc;
                $meta['meta_keywords'] = $meta_keywords;
                $meta['meta_image'] = url('img/cache/120x120/'.$mainVideo->image);
                $meta['meta_url'] = route('frontend.video', $mainVideo->slug);
            } else {
                return redirect('/');
            }
        }

        return view('frontend.cagaileo.video', compact('videos', 'mainVideo', 'latestVideos', 'page'))->with($meta);

    }

    public function delivery($slug = null)
    {

        $page = 'phan-phoi';

        $meta = [];

        $meta['meta_title'] = $this->getSetting('META_DELIVERY_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_DELIVERY_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_DELIVERY_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] =route('frontend.delivery');

        if ($slug) {
            $province = Province::findBySlug($slug);
            if ($province) {
                $meta['meta_title'] = $province->name;
                $meta['meta_url'] =route('frontend.delivery', $slug);
                return view('frontend.cagaileo.detail_delivery', compact('province', 'page'))->with($meta);
            } else {
                return redirect('/');
            }
        } else {
            $provinces = Province::orderBy('id')->get();

            $deliveryProducts = Product::all();

            $success_delivery_form_message = null;

            if (session()->has('success_delivery_form_message')) {
                $success_delivery_form_message = true;
                session()->forget('success_delivery_form_message');
            }

            return view('frontend.cagaileo.new_phanphoi', compact('provinces', 'page', 'deliveryProducts', 'success_delivery_form_message'))->with($meta);
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
        } else {
            \Log::info($data);
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
        $meta = [];


        $tag = Tag::findBySlug($value);

        if ($tag) {
            $meta_title = ($tag->seo_title) ? $tag->seo_title : $tag->name;
            $meta_desc = $tag->desc;
            $meta_keywords = $tag->keywords;

            $posts = Post::publish()
                ->whereHas('tags', function ($q) use ($tag) {
                    $q->where('id', $tag->id);
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

            $meta['meta_title'] = $meta_title;
            $meta['meta_desc'] = $meta_desc;
            $meta['meta_keywords'] = $meta_keywords;
            $meta['meta_image'] = $this->logo;
            $meta['meta_url'] =route('frontend.tag', $value);

            return view('frontend.cagaileo.tag', compact('posts', 'tag', 'page'))->with($meta);
        } else {
            redirect('/');
        }
    } 
    
    public function search(Request $request) 
    {
        $page = 'search';
        if ($request->filled('q')) {


            $keyword = $request->get('q');
            $posts = Post::publish()->where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);

            $meta = [];
            $meta['meta_title'] = 'Tìm kiếm cho từ khóa ' . $keyword;
            $meta['meta_desc'] = 'Tìm kiếm cho từ khóa ' . $keyword;
            $meta['meta_keywords'] = $keyword;
            $meta['meta_image'] = $this->logo;
            $meta['meta_url'] = route('frontend.search');


            return view('frontend.cagaileo.search', compact('posts', 'keyword', 'page'))->with($meta);
        } else {
            return redirect('/');
        }
    }

    public function product($value = null)
    {
        $page = 'product';

        $meta = [];

        $meta['meta_title'] = $this->getSetting('META_PRODUCT_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_PRODUCT_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_PRODUCT_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] =route('frontend.product');



        if ($value) {
            $product = Product::findBySlug($value);

            if ($product) {

                $meta_title = ($product->seo_title) ? $product->seo_title : $product->title;
                $meta_desc = $product->desc;
                $meta_keywords = $product->keywords;

                $meta['meta_title'] = $meta_title;
                $meta['meta_desc'] = $meta_desc;
                $meta['meta_keywords'] = $meta_keywords;
                $meta['meta_image'] = url('img/cache/120x120/'.$product->image);
                $meta['meta_url'] = route('frontend.product', $product->slug);


                $hotBelowModuleIds = Helpers::getModuleValues('products', 'hot_below');


                $hotProducts = Product::whereIn('id', $hotBelowModuleIds)
                    ->latest('updated_at')
                    ->limit(5)
                    ->get();
                return view('frontend.cagaileo.product_detail', compact(
                    'product',
                    'page',
                    'hotProducts'
                ))->with($meta);
            } else {
                return redirect('/');
            }
        } else {
          $products = Product::paginate(9);
          return view('frontend.cagaileo.product', compact('products', 'page'))->with($meta);
        }

    }

    public function question($value = null)
    {

        $success_delivery_form_message = false;

        if (session()->has('success_delivery_form_message')) {
            $success_delivery_form_message = true;
            session()->forget('success_delivery_form_message');
        }

        $page = 'cau-hoi-thuong-gap';
        $mainQuestion = null;
        $meta = [];

        $meta['meta_title'] = $this->getSetting('META_QUESTION_TITLE');
        $meta['meta_desc'] = $this->getSetting('META_QUESTION_DESC');
        $meta['meta_keywords'] = $this->getSetting('META_QUESTION_KEYWORDS');
        $meta['meta_image'] = $this->logo;
        $meta['meta_url'] =route('frontend.question');


        if ($value) {
            $mainQuestion = Question::findBySlug($value);
            if ($mainQuestion) {
                $meta_title = ($mainQuestion->seo_title) ? $mainQuestion->seo_title : $mainQuestion->title;
                $meta_desc = $mainQuestion->desc;
                $meta_keywords = $mainQuestion->keywords;

                $meta['meta_title'] = $meta_title;
                $meta['meta_desc'] = $meta_desc;
                $meta['meta_keywords'] = $meta_keywords;
                $meta['meta_image'] = url('img/cache/120x120/'.$mainQuestion->image);
                $meta['meta_url'] = route('frontend.question', $mainQuestion->slug);

                return view('frontend.cagaileo.detail_question', compact('mainQuestion', 'page', 'success_delivery_form_message'))->with($meta);
            } else {
                return redirect('/');
            }
        }
        $questions = Question::publish()->paginate(10);
        return view('frontend.cagaileo.question', compact('questions', 'mainQuestion', 'page', 'success_delivery_form_message'))->with($meta);
    }

    public function main($value)
    {

        if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {

            $post = Post::findBySlug($matches[1]);
            if ($post) {
                $post->update(['views' => (int) $post->views + 1]);

                $latestNews = Post::publish()
                    ->where('category_id', $post->category_id)
                    ->where('id', '!=', $post->id)
                    ->latest('updated_at')
                    ->limit(6)
                    ->get();

                $page = $post->category->slug;

                $meta = [];

                $meta['meta_title'] = ($post->seo_title) ? $post->seo_title : $post->title;
                $meta['meta_desc'] = $post->desc;
                $meta['meta_keywords'] = ($post->tagList) ? implode(',', $post->tagList) : null;
                $meta['meta_image'] = url('img/cache/120x120/'.$post->image);
                $meta['meta_url'] = route('frontend.main', $post->slug.'.html');

                return view('frontend.cagaileo.post', compact('post', 'latestNews', 'page'))->with($meta);
            } else {
                return redirect('/');
            }
        } else {
            $category = Category::findBySlug($value);

            if ($category) {
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

                $meta = [];

                $meta['meta_title'] = ($category->seo_name) ?  $category->seo_name : $category->name;
                $meta['meta_desc'] = ($category->desc)? $category->desc : null;
                $meta['meta_keywords'] = ($category->keywords)? $category->keywords : null;
                $meta['meta_image'] = $this->logo;
                $meta['meta_url'] = route('frontend.main', $category->slug);

                return view('frontend.cagaileo.category', compact(
                    'category', 'posts', 'page'
                ))->with($meta);
            } else {
                return redirect('/');
            }
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
