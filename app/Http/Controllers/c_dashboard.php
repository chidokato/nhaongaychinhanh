<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\articles;
use App\size;


class c_dashboard extends Controller
{
	public function dashboard()
    {
    	$articles_search = articles::orderBy('id','desc')->get();
    	$articles = articles::where('status','true')->orderBy('id','desc')->get();
    	$size = size::orderBy('name','asc')->get();
    	return view('admin.dashboard',[
    		'articles_search'=>$articles_search,
    		'articles'=>$articles,
    		'size'=>$size,
        ]);
    }


    public function search(Request $Request)
    {
        $articles = articles::orderBy('id','desc')->where('status','true');
        if($Request->articles_id){
            $articles->where('id', $Request->articles_id);
        }
        
        $articles = $articles->paginate($Request->paginate);
        $size = size::orderBy('name','asc')->get();
        $articles_search = articles::orderBy('id','desc')->get();
        return view('admin.dashboard',[
            'articles'=>$articles,
            'size'=>$size,
            'articles_search'=>$articles_search,

            'key'=>$Request->key,
            'paginate'=>$Request->paginate,
        ]);
    }


}

