<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
use App\User;
class SearchController extends Controller
{
    public function searched(Request $request){
        
       
        $search = $request->get('search');
       // $posts = DB::table('users')->where('firstname','like','%'.$search.'%')->paginate(20);
       if(empty($search)){
       	echo "please";
        
       }
        
       else{
       		$posts = User::where('firstname','like','%'.$search.'%')->orWhere('lastname','like','%'.$search.'%')->orderBy('id','desc')->get();
       		
       		 
         }
         $total_row = $posts->count();
    if($total_row > 0){
      	  return view('search.index')->with('posts',$posts)->with('msg','No data found');
    }

     
       }
   	
    }

