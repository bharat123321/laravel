<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Post;
use App\comment;
use App\view;
class viewController extends Controller
{
	public function index($id){
          $image = User::findorFail($id);
          return view('view',['image'=>$image,'user'=>Auth::user()]);
           /*$user_id = $id;
             $view = new view;
             $view->user_id = $user_id;
            $view->avatar=$avatar;
             $view->save();*/
      
	}
	 
}