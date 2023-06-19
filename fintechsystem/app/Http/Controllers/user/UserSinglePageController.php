<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSinglePageController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {

    }

    public function singlePageUser($id)
    {  $menus       = DB::table('menu')->select('*')->get();
       $subMenus    = DB::table('submenu')->select('*')->get();
       $singlePage  = DB::table('singlePages')->select('*')->where('subMenuId',$id)->first();
       $posts       = DB::table('postWithImageSubmenu')->select('*')->where('subMenuId',$id)->get();
       $singleArr   = array(
                          'menus'       => $menus,
                          'subMenus'    => $subMenus,
                          'id'          => $id,
                          'posts'       => $posts,
                          'singlePage'  => $singlePage
                          );
       return view('security.templateSingle',$singleArr);
    }


}
