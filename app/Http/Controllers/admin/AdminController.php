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
        $menus = DB::table('menu')
        ->select('*')
        ->where('numberOfChilds',0)
        ->where('status',1)
        ->get();
        //dd($menus);

        return view('security.admin.adminDashBoard',['menus' => $menus,'subMenus' => $subMenus]);
    }


    public function adminMenuEditor()
    {
        $menus = DB::table('menu as a')
        ->leftjoin('menu as b', 'a.parentId', '=', 'b.id')
        ->select('a.menuName','a.parentId','b.menuName as Parent', 'a.id','a.route','a.status','a.numberOfSection')
        ->get();




        $dataAll = DB::table('menu as a')
        ->leftjoin('menu as b', 'a.parentId', '=', 'b.id')
        ->select('a.menuName','a.parentId','b.menuName as Parent', 'a.id','a.route','a.status','a.numberOfSection')
        ->get()->keyBy('id')->toArray();
        // dd($dataAll);
        $dropDown = [];


        foreach ($dataAll as $k=>$data){
            $dropDown[$k] = substr(
                $this->getParentString($dataAll, 
                 $this->getParent($k, $dataAll)
             ).' > '.$data->menuName, 3
            );
        }

        // dd($dropDown);


        // dd($dropDown);      

        $subMenus   = DB::table('submenu')->select('*')->get();
        return view('security.admin.menus.menus',
            [
                'menus' => $menus,
                'subMenus' => $subMenus,
                'dropDown' => $dropDown
            ]);
    }


    public function getParent($id, $data, $parents=array()) {
     $parent_id = isset($data[$id]) ? $data[$id]->parentId : 0;
     if ($parent_id > 0) {
       array_unshift($parents, $parent_id);
       return $this->getParent($parent_id, $data, $parents);
   }
   return $parents;
}

public function getParentString($rawData, $parentArray){
    $string = '';
    foreach ($parentArray as $value) {
        $string.= ' > '.$rawData[$value]->menuName;
    }

    return $string;

}


public function checkParentIds($id, $data = array()) {
      // $menuData = DB::table('menu as a')
      // ->leftjoin('menu as b', 'a.parentId', '=', 'b.id')
      // ->select('a.menuName','a.parentId','b.menuName as Parent', 'a.id','a.route','a.status','a.numberOfSection')
      // ->get()->keyBy('id')->toArray();
      // $parent = "";


   $parent_id = isset($data[$id]) ? $data[$id]->parentId : 0;



      // dd($menuData);
   //    $parent_id = isset($data[$id]) ? $data[$id]->parentId : 0;

   //    if ($parent_id > 0) {
   //     $data[] = $menuData->parentName;

   //     array_unshift($parent_id, $data);
   //     return $this->checkParentIds($parent_id, $data);

   //       // return $this->getParent($parent_id, $data, $parents);
   // }
       // $this->checkParentIds($menuData->parentId, $data);
//    } else {
//     $data = (empty($data)) ? '' : implode("'>'", $data);
// }
    // return $data;
   // return $data;
}

    // public function addMenu(Request $request)
    // {  
    //     $addMenu            = new AddMenuModel;
    //     $addMenu->menuName  = $request->menuName;
    //     $addMenu->parentId = $request->parentId;
    //     $addMenu->numSectionId = $request->numSectionId;
    //     $addMenu->route     = "/".$request->menuName;
    //     $addMenu->save();

    //     return $request->menuName. ' ' . $request->parentId . ' ' . $request->numSectionId;

    //     // return $addMenu;

    //     return response::json('success');

    // }

public function addMenu(Request $request)
{  
        // $addMenu            = new AddMenuModel;
        // $addMenu->id = (int)$request->id;
        // $addMenu->menuName  = $request->menuName;
        // $addMenu->parentId = $request->parentId;
        // $addMenu->numberOfSection =$request->numberOfSection;
        // $addMenu->route     = "/".$request->route;
        // $addMenu->status = $request->status;
        // $addMenu->save();

        // return $request->id . ' ' . $request->menuName. ' ' .$request->parentId . ' ' .
        // $request->numberOfSection  . ' ' . $request->route . ' ' . $request->status;

    $addMenu = new AddMenuModel;

    $inputs = $request->input();

        //dd($inputs);

    $addMenu->parentId = (int)$inputs['id'];
    $addMenu->menuName = $inputs['menuName'];
    $addMenu->numberOfSection = $inputs['numberOfSection'];
    $addMenu->route = $inputs['route'];
    $addMenu->status = $inputs['status'];
    $addMenu->iconName = $inputs['icon'];
    $addMenu->save();

    $parent = (int)$inputs['id'];

    if ($parent == 0) {

    }else{
        DB::table('menu')->where('id', $parent)->increment('numberOfChilds');
            //return 'ok';
    }


        //return $request->menuName. ' ' . $request->parentId . ' ' . $request->numSectionId;

        // return $addMenu;

    return response::json('success');

}

public function editMenu(Request $request)
{
    $preParentId = $request->preParentId;
    $vall = $request->id;
    $editMenu            = AddMenuModel::where('id',$request->id)->first();
    $editMenu->menuName  = $request->menuName;
    $editMenu->parentId = $request->parent;
    $editMenu->numberOfSection = $request->numSection;
    $editMenu->route     = "/".strtolower($request->route);
    $editMenu->status = $request->status;
    $editMenu->save();

    $preParentId = (int)$preParentId;

    if ($preParentId == 0) {

    }else{
        DB::table('menu')->where('id', $preParentId)->decrement('numberOfChilds', 1);
    }

    DB::table('menu')->where('id', $editMenu->parentId)->increment('numberOfChilds');
        // DB::table('menu')->where('id', $parent)->increment('numberOfChilds');

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

public function deleteMenu(Request $request)
{

    $deletechild = $request->parentIdDel;
    $deletechild = (int)$deletechild;

    $delete = DB::table('menu')->where('id',$request->id)->delete();



    if($deletechild == 0){

    }else{
        DB::table('menu')->where('id', $deletechild)->decrement('numberOfChilds', 1);
    }

        // $deleteContent = DB::table('postWithImageSubmenu')->where('subMenuId',$request->deleteSubMenu)->delete();
        // $deleteSubMenu = DB::table('singlePages')->where('subMenuId',$request->deleteSubMenu)->delete();
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
