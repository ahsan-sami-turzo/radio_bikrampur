<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AddMenuModel;
use App\models\AddSubMenuModel;
use App\models\AddHomeContentModel;
use App\models\SlidersModel;
use App\models\GalleryModel;
use App\models\CatagoryModel;
use App\models\FactsAreaModel;

use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MediapageController extends Controller
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

    public function adminHomePageEditor()
    {   $subMenus   = DB::table('submenu')->select('*')->get();
    $data           = DB::table('homepage')->select('*')->get()->last();
    $sliders        = DB::table('sliders')->select('*')->get();
    $photoGalleries = DB::table('gallery')->select('*')->get();
    $galleryName    = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
    $factsArea      = DB::table('factsArea')->select('*')->first();
    return view('security.admin.mediaPageEditor.adminMediaPageEditor',['data' => $data,'sliders' => $sliders,'photoGalleries' => $photoGalleries,'galleryName' => $galleryName,'subMenus' => $subMenus,'factsArea' => $factsArea]);
}

public function addHomeContents(Request $request)
{

    $addHomeContent                  = new AddHomeContentModel;
    $addHomeContent->title           = $request->title;
    $addHomeContent->paragraph       = $request->paragraph;
    $addHomeContent->save();

    return response::json('success');

}


public function addSliders(Request $request)
{
    $addSliders          = new SlidersModel;
    $slideImageFileName="";
    if($request->hasFile('image_file')):
        $slideImage = $request->file('image_file');
        $filename = $slideImage->getClientOriginalName();
        $EXT = $slideImage->getClientOriginalExtension();
        $slideImageFileName = base64_encode($filename);
        $slideImageFileName = $slideImageFileName;

        $request->file('image_file')->move('public/uploads/images/sliders/', $slideImageFileName);
    endif;
    $time= Carbon::now();
    $addSliders->imgPath     = $slideImageFileName;
    $addSliders->sliderName  = $request->slideName;
    $addSliders->save();

    return response::json('success');
}

public function deleteSlider(Request $request){
    $delete = DB::table('sliders')->where('id',$request->deleteSlide)->delete();
    return response::json('success');
}



public function photoGalleryOfHomepage(Request $request)
{
    $addPhoto          = new GalleryModel;
    $slideImageFileName="";
    if($request->hasFile('galleryImage')):
        $slideImage = $request->file('galleryImage');
        $filename = $slideImage->getClientOriginalName();
        $EXT = $slideImage->getClientOriginalExtension();
        $slideImageFileName = base64_encode($filename);
        $slideImageFileName = $slideImageFileName;

        $request->file('galleryImage')->move('public/uploads/images/photoGallery/', $slideImageFileName);
        $addPhoto->imgPath     = $slideImageFileName;
        $addPhoto->save();
    endif;


    return response::json('success');
}


public function homepagePhotoGalleryDelete(Request $request)
{
 $delete = DB::table('gallery')->where('id',$request->deleteContentPhotoGallery)->delete();
 return response::json('success');
}


public function addGalleryNameAndTagLineHome(Request $request)
{
  $delete = DB::table('catagory')->where('menuId',1)->delete();
  $addSectionTitleAndContent                    = new CatagoryModel;
  $addSectionTitleAndContent->title             = $request->galleryName;
  $addSectionTitleAndContent->description       = $request->galleyTagName;
  $addSectionTitleAndContent->menuId            = 1;
  $addSectionTitleAndContent->sectionId         = 10;
  $addSectionTitleAndContent->save();
  return response::json('success');
}

public function addHomeContentsFactsArea(Request $request){
    $delete = DB::table('factsArea')->delete();
    $addHomeContentsFactsArea                    = new FactsAreaModel;
    $addHomeContentsFactsArea->firstColName      = $request->firstColName;
    $addHomeContentsFactsArea->firstColContent   = $request->firstColContentName;
    $addHomeContentsFactsArea->secondColName     = $request->secondColName;
    $addHomeContentsFactsArea->secondColContent  = $request->secondColContentName;
    $addHomeContentsFactsArea->thirdColName      = $request->thirdColName;
    $addHomeContentsFactsArea->thirdColContent   = $request->thirdColContentName;
    $addHomeContentsFactsArea->fourthColName     = $request->fourthColName;
    $addHomeContentsFactsArea->fourthColContent  = $request->fourthColContentName;
    $addHomeContentsFactsArea->save();
    return response::json('success');
}

}
