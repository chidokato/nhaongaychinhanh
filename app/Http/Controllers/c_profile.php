<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\themes;
use App\category;
use App\menu;
use App\setting;
use App\articles;
use App\product;
use App\home;
use App\slider;
use App\images;
use App\province;
use App\district;
use App\ward;
use App\street;
use App\mausac;
use App\size;
use App\messages;
use App\seo;
use App\user;
use Mail;
use Auth;
use File;
use Image;

class c_profile extends Controller
{
    function __construct()
    {
        $head_logo = themes::where('note','logo')->first();
        $head_logo_trang = themes::where('id',2)->first();
        $head_setting = setting::where('id',1)->first();
        $cat_pro = menu::where('classify','Product menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $menu = menu::where('classify','Main menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $menu_botton = menu::where('classify','Main botton')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $province_search = province::wherein('id', [2])->where('status','true')->orderBy('id','desc')->get();
        view()->share( [
            'head_logo'=>$head_logo,
            'head_logo_trang'=>$head_logo_trang,
            'head_setting'=>$head_setting,
            'cat_pro'=>$cat_pro,
            'menu'=>$menu,
            'menu_botton'=>$menu_botton,
            'province_search'=>$province_search,
        ]);
    }

    public function profile()
    {
        $articles = articles::where('user_id',Auth::User()->id)->where('status','true')->get();
        return view('pages.account.profile',[
            'articles' => $articles,
        ]);
    }
    public function postprofile(Request $Request, $id)
    {
        $user = User::find($id);
        $user->your_name = $Request->your_name;
        $user->phone = $Request->phone;
        $user->address = $Request->address;
        
        if ($Request->hasFile('img')) {
            if(File::exists('data/user/'.$user->avatar)) { File::delete('data/user/'.$user->avatar); } // xóa ảnh
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/user/".$filename)){$filename = str_random(4)."_".$filename;}
            $file->move('data/user', $filename);
            $user->avatar = $filename;
        } // thêm ảnh
        
        $user->save();
        return redirect('profile')->with('Success','Sửa thông tin thành công');
    }

    public function changepassword()
    {
        return view('pages.account.changepassword',[
            // 'articles' => $articles,
        ]);
    }
    public function postchangepassword(Request $Request, $id)
    {
        $user = User::find($id);
        if (password_verify($Request->passwordold, $user->password)) {
            $user->password = bcrypt($Request->password);
            $user->save();
            return redirect('profile/changepassword')->with('Success','Sửa thông tin thành công');
        } else {
            return redirect('profile/changepassword')->withInput()->with('Alerts','Mật khẩu cũ không đúng');
        }

        $user = User::find($id);
        if ($user->password == bcrypt($Request->passwordold)) {
            
        }else{
            return redirect('profile/changepassword')->withInput()->with('Alerts','Mật khẩu cũ không đúng');
        }
    }
    public function listitem()
    {
        $category = category::where('sort_by',1)->where('parent',0)->where('status','true')->get();
        $articles = articles::where('sort_by',1)->where('user_id',Auth::User()->id)->where('status','true')->orderBy('id','desc')->get();
        return view('pages.account.listitem',[
            'category' => $category,
            'articles' => $articles,
        ]);
    }
    public function search_post(Request $Request)
    {
        $category = category::where('sort_by',1)->where('parent',0)->where('status','true')->get();
        $datefilter[] = '';
        $articles = articles::orderBy('id','desc')->where('sort_by',1)->where('user_id',Auth::User()->id)->where('status','true');
        if($Request->key){
            $articles->where('name','like',"%$Request->key%");
        }
        if($Request->category_id){
            $array[] = $Request->category_id;
            $cat = category::where('parent',$Request->category_id)->get();
            foreach ($cat as $val) {
                $array[] = $val['id'];
            }
            $articles->whereIn('category_id',array_unique($array));
        }
        if(isset($Request->datefilter)){
            $datefilter = explode(" - ", $Request->datefilter);
            $day1 = date('Y-m-d',strtotime($datefilter[0]));
            $day2 = date('Y-m-d',strtotime($datefilter[1]));
            $articles->whereDate('created_at','>=', $day1)->whereDate('created_at','<=', $day2);
        }
        $articles = $articles->get();
        
        return view('pages.account.listitem',[
            'category' => $category,
            'articles' => $articles,
            'key' => $Request->key,
            'category_id' => $Request->category_id,
            'datefilter' => $Request->datefilter,
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function getlogin()
    {
        return view('pages.account.login',[
        ]);
    }
    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:3|max:32'
            ],[]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('Alerts','Tài khoản hoặc mật khẩu không đúng !');
        }
    }
    public function getsignup()
    {
        return view('pages.account.signup',[
        ]);
    }
    public function signup(Request $Request)
    {
        $this->validate($Request,
            [
                "email" => "unique:users,email",
            ],[
                "email.unique"=>"Email đã tồn tại trên hệ thống",
            ]);
        $user = new User;
        $user->your_name = $Request->your_name;
        $user->email = $Request->email;
        $user->password = bcrypt($Request->password);
        $user->permission = 5;
        $user->save();

        return redirect('profile/login')->with('Alerts','Đăng ký thành công');
        
    }
    public function resetpassword()
    {
        return view('pages.account.resetpassword',[
        ]);
    }
    public function postresetpassword(Request $Request)
    {
        $user = user::where('email', $Request->email)->first();
        $user->password = bcrypt($Request->password);
        $user->save();
        return redirect('profile/login')->with('Alerts','Đổi mật khẩu thành công');
    }

    public function post()
    {
        $category = category::where('sort_by', 1)->where('parent', 0)->get();
        $subcategory = category::where('sort_by', 1)->where('parent', 134)->get();
        $province = province::get();
        return view('pages.account.post',[
            'category' => $category,
            'subcategory' => $subcategory,
            'province' => $province,
        ]);
    }
    public function postpost(Request $Request)
    {
        // $this->validate($Request,
        // [
        //     "name" => "unique:articles,name",
        // ],[
        //     "name.unique"=>"Tiêu đề đã tồn tại trên hệ thống",
        // ]);
        // dd($Request->file('images'));
        // seo
        $seo = new seo;
        $seo->title = $Request->name;
        $seo->description = $Request->name;
        $seo->save();

        // product
        $product = new product;
        $product->price = str_replace( array(',') , '', $Request->price );
        switch ($Request->unit) {
            case "1000000":
                $product->unit = 'Triệu';
                break;
            case "1000000000":
                $product->unit = 'Tỷ';
                break;
            default:
                $product->unit = '';
        }
        $product->area = $Request->area;
        $product->bedroom = $Request->bedroom;
        $product->toilet = $Request->toilet;
        $product->direction = $Request->direction;
        $product->maps = $Request->maps;
        if($product->price){$product->search_price = $product->price*$Request->unit;}
        // $product->saleoff = str_replace( array(',') , '', $Request->saleoff );
        // $product->number = $Request->number;
        // $product->investor_id = $Request->investor_id;
        $product->province_id = $Request->province_id;
        $product->district_id = $Request->district_id;
        $product->ward_id = $Request->ward_id;
        $product->street_id = $Request->street_id;
        $product->address = $Request->address;
        $product->save();

        // articles
        $articles = new articles;
        $articles->user_id = Auth::User()->id;
        $articles->category_id = $Request->category_id;
        $articles->seo_id = $seo->id;
        $articles->product_id = $product->id;
        $articles->sort_by = '1';
        $articles->sku = str_random(8);
        $articles->name = $Request->name;
        $articles->slug = changeTitle($Request->name);
        $articles->content = $Request->content;
        $articles->hits = '50';
        $articles->status = 'true';

        if($Request->hasFile('images')){
            foreach ($Request->file('images') as $key => $file) {
                if ($key==0) {
                    if(isset($file)){
                        $filename = $file->getClientOriginalName();
                        while(file_exists("data/product/".$filename)){ $filename = str_random(4)."_".$filename; }
                        $img = Image::make($file)->resize(1000, 600, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
                        $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/300/'.$filename));
                        $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/80/'.$filename));
                        $articles->img = $filename;
                    }
                }
            }
        }

        $articles->save();

        if($Request->hasFile('images')){
            foreach ($Request->file('images') as $key => $file) {
                $images = new images();
                if(isset($file)){
                    $images->articles_id = $articles->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/".$filename)){ $filename = str_random(4)."_".$filename; }
                    $img = Image::make($file)->resize(1000, 600, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
                    $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/300/'.$filename));
                    $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/80/'.$filename));
                    $images->img = $filename;
                    $images->save();
                }
            }
        }

        return redirect('profile/articles/listitem')->with('Alerts','Đăng tin thành công');
    }

    public function edit($id)
    {
        $data = articles::where('id', $id)->first();
        $parent = category::where('id',$data->category_id)->first();
        $category = category::where('sort_by', 1)->where('parent', 0)->get();
        $subcategory = category::where('sort_by', 1)->where('parent', $parent->parent)->get();

        $province = province::get();
        $district = district::where('province_id',$data->product->province_id)->get();
        $ward = ward::where('district_id',$data->product->district_id)->get();
        $street = street::where('district_id',$data->product->district_id)->get();

        return view('pages.account.post',[
            'category' => $category,
            'subcategory' => $subcategory,
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'street' => $street,
            'data' => $data,
            'parent' => $parent,
        ]);
    }

    public function postedit(Request $Request, $id)
    {
        // articles
        $articles = articles::find($id);
        $articles->user_id = Auth::User()->id;
        $articles->category_id = $Request->category_id;
        $articles->name = $Request->name;
        $articles->slug = changeTitle($Request->name);
        $articles->content = $Request->content;

        if ($Request->hasFile('img')) {
            // xóa ảnh cũ
            if(File::exists('data/product/'.$articles->img)) { 
                File::delete('data/product/'.$articles->img); 
                File::delete('data/product/300/'.$articles->img); 
                File::delete('data/product/80/'.$articles->img); 
            }
            // xóa ảnh cũ
            // thêm ảnh mới
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(1000, 800, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/80/'.$filename));
            $articles->img = $filename;
            // thêm ảnh mới
        }

        $articles->save();

        // seo
        $seo = seo::find($articles['seo_id']);
        $seo->title = $Request->title;
        $seo->description = $Request->description;
        $seo->save();

        // product
        $product = product::find($articles['product_id']);
        $product->price = str_replace( array(',') , '', $Request->price );
        switch ($Request->unit) {
            case "1000000":
                $product->unit = 'Triệu';
                break;
            case "1000000000":
                $product->unit = 'Tỷ';
                break;
            default:
                $product->unit = '';
        }
        $product->area = $Request->area;
        $product->bedroom = $Request->bedroom;
        $product->toilet = $Request->toilet;
        $product->direction = $Request->direction;
        $product->maps = $Request->maps;
        if($product->price){$product->search_price = $product->price*$Request->unit;}
        // $product->saleoff = str_replace( array(',') , '', $Request->saleoff );
        // $product->number = $Request->number;
        // $product->investor_id = $Request->investor_id;
        $product->province_id = $Request->province_id;
        $product->district_id = $Request->district_id;
        $product->ward_id = $Request->ward_id;
        $product->street_id = $Request->street_id;
        $product->address = $Request->address;
        $product->save();

        if($Request->hasFile('images')){
            foreach ($Request->file('images') as $key => $file) {
                $images = new images();
                if(isset($file)){
                    $images->articles_id = $articles->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/".$filename)){ $filename = str_random(4)."_".$filename; }
                    $img = Image::make($file)->resize(1000, 600, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/'.$filename));
                    $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/300/'.$filename));
                    $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/product/80/'.$filename));
                    $images->img = $filename;
                    $images->save();
                }
            }
        }

        return redirect('profile/articles/listitem')->with('Alerts','Đăng tin thành công');
    }

    public function getdelete($id)
    {
        $articles = articles::find($id);
        // del seo
        if (isset($articles->seo_id)) {
            $seo = seo::find($articles->seo_id);
            $seo->delete();
        }
        // del product
        if (isset($articles->product_id)) {
            $product = product::find($articles->product_id);
            $product->delete();
        }
        // xóa ảnh
        if(File::exists('data/product/'.$articles->img)) {
            File::delete('data/product/'.$articles->img);
            File::delete('data/product/300/'.$articles->img);
            File::delete('data/product/80/'.$articles->img);
        }
        // del images
        if (isset($articles->images)) {
            foreach ($articles->images as $key => $value) {
                $images = images::find($value->id);
                if(File::exists('data/images/'.$images->img)) {
                    File::delete('data/images/'.$images->img);
                    File::delete('data/images/100/'.$images->img);
                }
                $images->delete();
            }
        }
        $articles->delete();
        return redirect('profile/articles/listitem')->with('Alerts','Thành công');
    }


    

    // public function wishlist()
    // {
    //     // $category = category::where('slug',$curl)->first();
    //     return view('pages.wishlist');
    // }
    // public function myaccount()
    // {
    //     // $category = category::where('slug',$curl)->first();
    //     return view('pages.myaccount');
    // }
    // public function cart()
    // {
    //     // $category = category::where('slug',$curl)->first();
    //     return view('pages.cart');
    // }

    // public function get_signin()
    // {
    //     return view('pages.account.signin',[]);
    // }

    // public function get_signup()
    // {
    //     return view('pages.account.signup',[]);
    // }
    

    // public function messages()
    // {
    //     $messages = messages::where('user_id', Auth::User()->id)->orderBy('id','desc')->get();
    //     return view('pages.account.messages',['messages' => $messages]);
    // }
    // public function delall_messages($id){
    //     $list = messages::where('user_id', $id)->get();
    //     foreach ($list as $key => $value) {
    //         $messages = messages::where('id',$value->id)->first();
    //         $messages->delete();
    //     }
    //     return redirect()->back();
    // }
    // public function check_messages($id){
    //     $list = messages::where('user_id', $id)->get();
    //     foreach ($list as $key => $value) {
    //         $messages = messages::where('id',$value->id)->first();
    //         $messages->status = 'acctive';
    //         $messages->save();
    //     }
    //     return redirect()->back();
    // }
}



