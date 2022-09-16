<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\themes;
use App\category;
use App\menu;
use App\setting;
use App\articles;
use App\home;
use App\slider;
use App\images;
use App\district;
use App\province;
use App\mausac;
use App\size;
use App\messages;
use App\seo;
use Mail;
use Auth;

class c_frontend extends Controller
{
    function __construct()
    {
        $head_logo = themes::where('note','logo')->first();
        $head_logo_trang = themes::where('id',2)->first();
        $head_setting = setting::where('id',1)->first();
        $cat_pro = menu::where('classify','Product menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $menu = menu::where('classify','Main menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $menu_botton = menu::where('classify','Main botton')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        // search
        $province_search = province::wherein('id', [2])->where('status','true')->orderBy('id','desc')->get();
        view()->share( [
            'head_logo'=>$head_logo,
            'head_logo_trang'=>$head_logo_trang,
            'head_setting'=>$head_setting,
            'cat_pro'=>$cat_pro,
            'menu'=>$menu,
            'menu_botton'=>$menu_botton,
            // search
            'province_search'=>$province_search,
        ]);
    }

    public function home()
    {
        $active = '';
        $slider = themes::where('note','Slider')->get();
        $articles = articles::where('sort_by','1')->where('status','true')->orderBy('id','desc')->paginate(6);
        $articles_hot = articles::where('sort_by','1')->where('status','true')->where('hot','true')->orderBy('id','desc')->paginate(5);
        $news_new = articles::where('sort_by','2')->where('status','true')->orderBy('id','desc')->paginate(3);
        $s_category = category::where('parent','134')->get();
        $s_category1 = category::where('parent','135')->get();
        return view('pages.homes',[
            'active'=>$active,
            'slider'=>$slider,
            'articles' => $articles,
            'articles_hot' => $articles_hot,
            'news_new' => $news_new,
            's_category' => $s_category,
            's_category1' => $s_category1,
        ]);
    }

    public function sitemap()
    {
        $sitemap_category_pro = category::where('sort_by','1')->where('status','true')->get();
        $sitemap_category_new = category::where('sort_by','2')->where('status','true')->get();
        $sitemap_articles_pro = articles::where('sort_by','1')->where('status','true')->get();
        $sitemap_articles_new = articles::where('sort_by','2')->where('status','true')->get();
        return response()->view('pages.sitemap', [
            'sitemap_category_pro' => $sitemap_category_pro,
            'sitemap_category_new' => $sitemap_category_new,
            'sitemap_articles_pro' => $sitemap_articles_pro,
            'sitemap_articles_new' => $sitemap_articles_new,
            ])->header('Content-Type', 'text/xml');
    }

    public function category($curl)
    {
        $active = $curl;
        $category = category::where('slug',$curl)->first();
        if ($curl=='gioi-thieu') { $active = 'gioi-thieu'; return view('pages.about',['category'=>$category, 'active'=>$active]); }
        if ($curl=='lien-he') { $active = 'lien-he'; return view('pages.contact',['category'=>$category, 'active'=>$active]); }
        
        $cates = category::where('parent', $category["id"])->get();
        $cat_array = [$category["id"]];
        $cat_sku_array = [$category["sku"]];
        foreach ($cates as $cate) {
            $cat_array[] = $cate->id;
            $cat_sku_array[] = $cate->sku;
            $cate1s = category::where('parent', $cate->id)->get();
            foreach ($cate1s as $cate1) {
                $cat_array[] = $cate1->id;
                $cat_sku_array[] = $cate1->sku;
            }
        }
        if ($category->sort_by == 1) {
            $id_pro_array = [];
            foreach($cat_array as $key => $cat_id){
                $articles = articles::where('category_id', $cat_id)->orwhere('category_sku','like',"%$cat_sku_array[$key]%")->get();
                foreach($articles as $article){
                    $id_pro_array[] = $article->id;
                }
            }
            $new_id_pro_array = array_unique($id_pro_array);
            $articles = articles::where('status','true')->whereIn('id',$new_id_pro_array)->orderBy('id','desc')->paginate(18);
            $articles_hit = articles::where('sort_by','1')->where('status','true')->orderBy('hits','asc')->paginate(10);
            
            $category_parent = category::where('sort_by','1')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
            $category_search = category::where('sort_by','1')->where('status','true')->where('parent','>',0)->orderBy('view','asc')->get();
            
            return view('pages.product',[
                'category'=>$category, 
                'product'=>$articles, 
                'active'=>$active,
                'articles_hit'=>$articles_hit,
                'category_parent'=>$category_parent,
                'category_search'=>$category_search,
                
            ]);
        }
        if ($category->sort_by == 2) {
            $articles = articles::where('status','true')->whereIn('category_id',$cat_array)->orderBy('id','desc')->paginate(10);
            $articles_hit = articles::where('sort_by','2')->where('status','true')->orderBy('hits','asc')->paginate(10);
            return view('pages.news',[
                'category'=>$category, 
                'articles'=>$articles, 
                'active'=>$active,
                'articles_hit'=>$articles_hit,
            ]);
        }
        if ($category->sort_by == 3) {
            return view('pages.singlepage',['category'=>$category, 'active'=>$active]);
        }
        
    }

    public function articles($curl,$arurl)
    {
        $active = $curl;
        $articles = articles::where('slug',$arurl)->first();
        
        $id = $articles['id'];
        $articles->hits = $articles->hits + 1;
        $articles->save();

        $lienquan = articles::where('status','true')->where('category_id',$articles->category_id)->whereNotin('id',[$id])->take(3)->get();
        
        if ($articles->sort_by == 1) {
            $articles_hot = articles::where('sort_by','1')->where('status','true')->where('hot','true')->orderBy('id','desc')->paginate(5);
            return view('pages.articles',[
                'articles'=>$articles,
                'active'=>$active,
                'lienquan'=>$lienquan,
                'articles_hot'=>$articles_hot,
            ]);
        }elseif($articles->sort_by == 2){
            $articles_hit = articles::where('sort_by','2')->where('status','true')->orderBy('hits','asc')->paginate(10);
            return view('pages.singlenews',[
                'articles'=>$articles,
                'active'=>$active, 
                'lienquan'=>$lienquan,
                'articles_hit'=>$articles_hit,
            ]);
        }
        
    }

    // tìm kiếm
    // public function search(Request $Request)
    // {
    //     // $articles = articles::orderBy('id','desc')->where('id','!=' , 0);
    //     // if($Request->name){
    //     //     $articles->where('name','like',"%$Request->name%");
    //     // }
    //     // if($Request->category_slug){
    //     //     $articles->where('category_id', $Request->name->category_id);
    //     // }
    //     // // if($Request->ngay1 && $Request->ngay2){
    //     // //     $product->whereBetween('ngayketthuc', array($Request->ngay1, $Request->ngay2));
    //     // // }
    //     // $articles = $articles->paginate(30);

    //     return redirect('chung-cu');
    // }

    public function search_product(Request $Request)
    {
        $active = '1';
        $key = $Request->key;
        
        $articles = articles::join('product', 'product.id', '=', 'articles.product_id')
            ->select('articles.*')
            ->where('articles.status','true')->orderBy('articles.id','desc')->where('articles.sort_by','1');
        if($Request->key){ $articles->where('articles.name','like',"%$key%"); }

        if($Request->cat_parent){
            $array_cat = [];
            $cat = category::where('parent',$Request->cat_parent)->get();
            foreach ($cat as $val) {
                $array[] = $val->id;
            }
            $articles->whereIn('articles.category_id',array_unique($array));
        }

        if($Request->category_search_id){ $articles->where('articles.category_id',$Request->category_search_id); }
        if($Request->province_search_id){ $articles->where('product.province_id',$Request->province_search_id); }
        if($Request->district_search_id){ $articles->where('product.district_id',$Request->district_search_id); }
        if($Request->ward_search_id){ $articles->where('product.ward_id',$Request->ward_search_id); }
        if($Request->street_search_id){ $articles->where('product.street_id',$Request->street_search_id); }
        if($Request->ngu){ $articles->where('product.bedroom',$Request->ngu); }
        if($Request->wc){ $articles->where('product.toilet',$Request->wc); }
        if($Request->huong){ $articles->where('product.direction',$Request->huong); }
        if($Request->gia){
            if($Request->gia==1){ $articles->whereBetween('product.price', array(0, 0.5)); }
            if($Request->gia==2){ $articles->whereBetween('product.price', array(0.5, 1)); }
            if($Request->gia==3){ $articles->whereBetween('product.price', array(1, 2)); }
            if($Request->gia==4){ $articles->whereBetween('product.price', array(2, 3)); }
            if($Request->gia==5){ $articles->whereBetween('product.price', array(3, 5)); }
            if($Request->gia==6){ $articles->whereBetween('product.price', array(5, 10)); }
            if($Request->gia==7){ $articles->whereBetween('product.price', array(10, 100)); }

            if($Request->gia==11){ $articles->whereBetween('product.price', array(0, 1)); }
            if($Request->gia==22){ $articles->whereBetween('product.price', array(1, 2)); }
            if($Request->gia==33){ $articles->whereBetween('product.price', array(2, 3)); }
            if($Request->gia==44){ $articles->whereBetween('product.price', array(3, 5)); }
            if($Request->gia==55){ $articles->whereBetween('product.price', array(5, 10)); }
            if($Request->gia==66){ $articles->whereBetween('product.price', array(10, 100)); }
        }
        $articles = $articles->paginate(18);

        $category_search = category::where('sort_by','1')->where('status','true')->where('parent', 134)->orderBy('view','asc')->get();
        $category_search1 = category::where('sort_by','1')->where('status','true')->where('parent', 135)->orderBy('view','asc')->get();
        $category_sibar = category::where('sort_by','1')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $articles_hit = articles::where('sort_by','1')->where('status','true')->orderBy('hits','asc')->paginate(10);
        return view('pages.search',[
            'active'=>$active,
            'key'=>$key,
            'cat_parent'=>$Request->cat_parent,
            'category_search_id'=>$Request->category_search_id,
            'province_search_id'=>$Request->province_search_id,
            'district_search_id'=>$Request->district_search_id,
            'ward_search_id'=>$Request->ward_search_id,
            'street_search_id'=>$Request->street_search_id,
            'ngu'=>$Request->ngu,
            'wc'=>$Request->wc,
            'gia'=>$Request->gia,
            'huong'=>$Request->huong,

            'product'=>$articles,
            'category_search'=>$category_search,
            'category_search1'=>$category_search1,
            'category_sibar'=>$category_sibar,
            'articles_hit'=>$articles_hit,
        ]);
    }


    public function search(){
        $seo = seo::where('id', '168')->first();
        $articles = articles::join('product', 'product.id', '=', 'articles.product_id')->orderBy('articles.id','desc')->where('articles.id','!=' , 0)->where('articles.sort_by',1);
        if($_GET['name']){
            $articles->where('articles.name','like','%'.$_GET['name'].'%');
        }
        if($_GET['key_category']){
            $category = category::where('slug',$_GET['key_category'])->first();
            $articles->where('articles.category_id',$category['id']);
        }
        if($_GET['key_province']){
            $articles->where('product.province_id',$_GET['key_province']);
        }
        if($_GET['key_district']){
            $articles->where('product.district_id',$_GET['key_district']);
        }
        $articles = $articles->paginate(30);
        return view('pages.product',[
            'category' => $seo,
            'product' => $articles,

            'key_name' => $_GET['name'],
            'key_category' => $_GET['key_category'],
            'key_province' => $_GET['key_province'],
            'key_district' => $_GET['key_district'],
        ]);
    }

    public function searchnews(Request $Request)
    {
        $key = $Request->key;
        $news = news::where('status','true')->where('name','like',"%$key%")->orderBy('id','desc')->paginate(24);
        return view('pages.search',['news'=>$news, 'key'=>$key]);
    }
    // end tìm kiếm

	public function dangky(Request $Request)
    {
        $head_setting = setting::where('id',1)->first();
        $mail = $head_setting['email'];
		$this->validate($Request,['phone' => 'Required'],[] );
        $name = $Request->name;
        $phone = $Request->phone;
        $email = $Request->email;
        $link = $Request->link;
        $content = $Request->content;
		$date = date('m/d/Y h:i:s', time());
        
        Mail::send('email_feedback', array('name'=>$name,'phone'=>$phone,'email'=>$email,'link'=>$link,'content'=>$content,'date'=>$date) , function($message) use ($mail){
            $message->from($mail, 'hado.charmvillas.org');
            $message->to($mail, 'hado.charmvillas.org')->subject('Thông tin khách hàng');
        });
        //return view('pages.camon')->with('Alerts','Gửi thành công');
		return redirect('/')->with('Alerts','Thành công');
    }

    public function wishlist()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.wishlist');
    }
    public function myaccount()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.myaccount');
    }
    public function cart()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.cart');
    }

    public function get_signin()
    {
        return view('pages.account.signin',[]);
    }

    public function get_signup()
    {
        return view('pages.account.signup',[]);
    }
    public function getresetpassword()
    {
        return view('pages.account.getresetpassword');
    }

    public function messages()
    {
        $messages = messages::where('user_id', Auth::User()->id)->orderBy('id','desc')->get();
        return view('pages.account.messages',['messages' => $messages]);
    }
    public function delall_messages($id){
        $list = messages::where('user_id', $id)->get();
        foreach ($list as $key => $value) {
            $messages = messages::where('id',$value->id)->first();
            $messages->delete();
        }
        return redirect()->back();
    }
    public function check_messages($id){
        $list = messages::where('user_id', $id)->get();
        foreach ($list as $key => $value) {
            $messages = messages::where('id',$value->id)->first();
            $messages->status = 'acctive';
            $messages->save();
        }
        return redirect()->back();
    }
}



