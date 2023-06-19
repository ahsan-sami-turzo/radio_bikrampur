<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AddMenuModel;
use App\models\AddSubMenuModel;
use App\models\AddHomeContentModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminDashBoard()
    {
        $subMenus   = DB::table('submenu')->select('*')->get();
        return view('security.admin.adminDashBoard',['subMenus' => $subMenus]);
    }


    public function adminMenuEditor()
    {
        $menus = DB::table('menu')->select('*')->get();
        $subMenus   = DB::table('submenu')->select('*')->get();
        return view('security.admin.menus.menus',['menus' => $menus,'subMenus' => $subMenus]);
    }

    public function addMenu(Request $request)
    {  
        $addMenu            = new AddMenuModel;
        $addMenu->menuName  = $request->menuName;
        $addMenu->route     = "/".$request->menuName;
        $addMenu->save();

         return response::json('success');

    }

    public function editMenu(Request $request)
    {
        $editMenu            = AddMenuModel::where('id',$request->menuIdNameEdit)->first();
        $editMenu->menuName  = $request->menuName;
        $editMenu->route     = "/".strtolower($request->menuName);
        $editMenu->save();

         return response::json('success');

    }

    public function adminSubMenuEditor()
    {
        $subMenus = DB::table('submenu as t1')
                       ->join('menu as t2','t1.menuId','t2.id')
                       ->select('t1.*','t2.menuName')
                       ->get();
        $menus   = DB::table('menu')->select('menuName','id')->get();
        return view('security.admin.subMenus.subMenus',['subMenus' => $subMenus, 'menus' => $menus]);
    }

    public function addSubMenu(Request $request)
    {

        $addSubMenu               = new AddSubMenuModel;
        $addSubMenu->subMenuName  = $request->subMenuName;
        $addSubMenu->menuId       = $request->menuId;
        $addSubMenu->route        = "/".$request->subMenuName;
        $addSubMenu->save();

         return response::json('success');

    }

    public function editSubMenu(Request $request)
    {
        $editMenu               = AddSubMenuModel::where('id',$request->subMenuIdNameEdit)->first();
        $editMenu->subMenuName  = $request->subMenuNameEdit;
        $editMenu->route        = "/".$request->subMenuNameEdit;
        $editMenu->save();

         return response::json('success');

    }

    public function deleteSubMenu(Request $request)
    {
        $delete        = DB::table('submenu')->where('id',$request->deleteSubMenu)->delete();
        $deleteContent = DB::table('postWithImageSubmenu')->where('subMenuId',$request->deleteSubMenu)->delete();
        $deleteSubMenu = DB::table('singlePages')->where('subMenuId',$request->deleteSubMenu)->delete();
        return response::json('success');



    }


}
