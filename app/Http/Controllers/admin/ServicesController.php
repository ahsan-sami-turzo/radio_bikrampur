<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AddMenuModel;
use App\models\AddSubMenuModel;
use App\models\AddHomeContentModel;
use App\models\ServicesModel;
use App\models\CatagoryModel;
use App\models\PostWithImageModel;
use App\models\PostModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ServicesController extends Controller
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

    public function adminServicePageEditor()
    {
        $servicesBackGrounds    = DB::table('services')->select('*')->get();
        $sections               = DB::table('catagory')->select('*')->where('menuId',2)->first();
        $firstSectionContents   = DB::table('postWithImage')->select('*')->where('menuId',2)->where('sectionId',1)->get();
        $secondSectionContents  = DB::table('post')->select('*')->where('menuId',2)->where('sectionId',2)->get();
        $subMenus               = DB::table('submenu')->select('*')->get();
        $servicePageEditorArr   = array(
                                  'servicesBackGrounds'    => $servicesBackGrounds,
                                  'sections'               => $sections,
                                  'firstSectionContents'   => $firstSectionContents,
                                  'subMenus'               => $subMenus,
                                  'secondSectionContents'  => $secondSectionContents
                                       );
        return view('security.admin.servicePageEditor.adminServicePageEditor',$servicePageEditorArr);
    }

    public function addBackGroundServices(Request $request)
    {

        $slideImageFileName="";
        if($request->hasFile('image_file')):
            $slideImage = $request->file('image_file');
            $filename = $slideImage->getClientOriginalName();
            $EXT = $slideImage->getClientOriginalExtension();
            $slideImageFileName = base64_encode($filename);
            $slideImageFileName = $slideImageFileName;

            $request->file('image_file')->move('public/uploads/images/backgroundImages/', $slideImageFileName);
        endif;
        $deleteAllPictures           = DB::table('services')->delete();
        $addBackgroundImage          = new ServicesModel;
        $time= Carbon::now();
        $addBackgroundImage->backGroundImagePath     = $slideImageFileName;
        $addBackgroundImage->save();

        return response::json('success');
    }


    public function deleteBackgroundImage(Request $request){

        $delete = DB::table('services')->where('id',$request->deleteBackGround)->delete();
        return response::json('success');
    }



    public function addSectionTitleAndContent(Request $request)
    {

        $delete = DB::table('catagory')->where('menuId',2)->delete();
        $addSectionTitleAndContent                    = new CatagoryModel;
        $addSectionTitleAndContent->title             = $request->firstSection;
        $addSectionTitleAndContent->description       = $request->firstSectionTag;
        $addSectionTitleAndContent->menuId            = 2;
        $addSectionTitleAndContent->sectionId         = 1;
        $addSectionTitleAndContent->save();


        $addSectionTitleAndContent                    = new CatagoryModel;
        $addSectionTitleAndContent->title             = $request->secondSection;
        $addSectionTitleAndContent->description       = $request->secondSectionTag;
        $addSectionTitleAndContent->menuId            = 2;
        $addSectionTitleAndContent->sectionId         = 2;
        $addSectionTitleAndContent->save();

        return response::json('success');

    }



    public function firstSectionContentsOfServices(Request $request)
    {
        $imageFileName="";

        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('firstSectionImage')->move('public/uploads/images/services/', $imageFileName);
        endif;


        $addContent          = new PostWithImageModel;
        $time= Carbon::now();
        $addContent->imgPath       = $imageFileName;
        $addContent->menuId        = 2;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->firstSectionTitleContent;
        $addContent->title         = $request->firstSectionTitleContent;
        $addContent->description   = $request->firstSectionDescriptionContent;
        $addContent->save();

        return response::json('success');
    }




    public function secondSectionContentsOfServices(Request $request)
    {
        $addContent          = new PostModel;
        $time= Carbon::now();
        $addContent->menuId        = 2;
        $addContent->sectionId     = 2;
        $addContent->postName      = $request->secondSectionTitleContent;
        $addContent->title         = $request->secondSectionTitleContent;
        $addContent->description   = $request->secondSectionDescriptionContent;
        $addContent->save();

        return response::json('success');
    }


    public function servicesSectionOneContentsEditView(Request $request)
    {
         $viewData = DB::table('postWithImage')->where('id',$request->attri)->select('*')->get();
         return response()->json($viewData);
    }

    public function servicesSectionTwoContentsEditView(Request $request)
    {
         $viewData = DB::table('post')->where('id',$request->attri)->select('*')->get();
         return response()->json($viewData);
    }

    public function editFirstSectionContentsOfServices(Request $request)
    {
        $imageFileName="";
        if($request->hasFile('editSectionOneContentImage')):

            $image    = $request->file('editSectionOneContentImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('editSectionOneContentImage')->move('public/uploads/images/services/', $imageFileName);

            $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
            $addContent->imgPath       = $imageFileName;
            $addContent->save();
        endif;


        $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
        $time= Carbon::now();
        $addContent->menuId        = 2;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->editSectionOneContentTitle;
        $addContent->title         = $request->editSectionOneContentTitle;
        $addContent->description   = $request->editSectionOneContentDescription;
        $addContent->save();

        return response::json('success');
    }



    public function editSecondSectionContentsOfServices(Request $request)
    {
        $addContent                =  PostModel::where('id',$request->hiddenSectionTwoContentEdit)->first();
        $time= Carbon::now();
        $addContent->menuId        = 2;
        $addContent->sectionId     = 2;
        $addContent->postName      = $request->editSectionTwoContentTitle;
        $addContent->title         = $request->editSectionTwoContentTitle;
        $addContent->description   = $request->editSectionTwoContentDescription;
        $addContent->save();

        return response::json('success');
    }


    public function servicesDeletePostSectionOne(Request $request){

        $delete = DB::table('postWithImage')->where('id',$request->deleteContentSectionOne)->delete();
        return response::json('success');
    }


    public function servicesDeletePostSectionTwo(Request $request){

        $delete = DB::table('post')->where('id',$request->deleteContentSectionTwo)->delete();
        return response::json('success');
    }








    public function addHomeContents(Request $request)
    {

        $addSectionTitleAndContent                  = new AddHomeContentModel;
        $addSectionTitleAndContent->title           = $request->title;
        $addSectionTitleAndContent->paragraph       = $request->paragraph;
        $addSectionTitleAndContent->save();

        return response::json('success');

    }





}
