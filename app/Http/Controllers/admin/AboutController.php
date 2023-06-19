<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\PostWithImageModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AboutController extends Controller
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

    public function adminAboutPageEditor()
    {
        $aboutBackGrounds       = DB::table('about')->select('*')->get();
        // $sections               = DB::table('catagory')->select('*')->where('menuId',2)->first();
        $firstSectionContents   = DB::table('postWithImage')->select('*')->where('menuId',3)->where('sectionId',1)->get();
        $subMenus               = DB::table('submenu')->select('*')->get();
        $servicePageEditorArr   = array(
                                  'aboutBackGrounds'      => $aboutBackGrounds,
                                  'firstSectionContents'  => $firstSectionContents,
                                  'subMenus'              => $subMenus

                                       );
        return view('security.admin.aboutPageEditor.adminAboutPageEditor',$servicePageEditorArr);
    }



    public function addBackGroundAbout(Request $request)
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
        $deleteAllPictures           = DB::table('about')->delete();
        $addBackgroundImage          = new AboutModel;
        $time= Carbon::now();
        $addBackgroundImage->backGroundImagePath     = $slideImageFileName;
        $addBackgroundImage->save();

        return response::json('success');
    }

    public function deleteBackgroundImageAbout(Request $request){

        $delete = DB::table('about')->where('id',$request->deleteBackGround)->delete();
        return response::json('success');
    }

    public function firstSectionContentsOfAbout(Request $request)
    {
        $imageFileName="";

        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('firstSectionImage')->move('public/uploads/images/about/', $imageFileName);
        endif;


        $addContent          = new PostWithImageModel;
        $time= Carbon::now();
        $addContent->imgPath       = $imageFileName;
        $addContent->menuId        = 3;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->firstSectionTitleContent;
        $addContent->title         = $request->firstSectionTitleContent;
        $addContent->description   = $request->firstSectionDescriptionContent;
        $addContent->save();

        return response::json('success');
    }

    public function aboutSectionOneContentsEditView(Request $request)
    {
         $viewData = DB::table('postWithImage')->where('id',$request->attri)->select('*')->get();
         return response()->json($viewData);
    }

    public function editFirstSectionContentsOfAbout(Request $request)
    {
        $imageFileName="";
        if($request->hasFile('editSectionOneContentImage')):

            $image    = $request->file('editSectionOneContentImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('editSectionOneContentImage')->move('public/uploads/images/about/', $imageFileName);

            $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
            $addContent->imgPath       = $imageFileName;
            $addContent->save();
        endif;


        $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
        $time= Carbon::now();
        $addContent->menuId        = 3;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->editSectionOneContentTitle;
        $addContent->title         = $request->editSectionOneContentTitle;
        $addContent->description   = $request->editSectionOneContentDescription;
        $addContent->save();

        return response::json('success');
    }

    public function aboutDeletePostSectionOne(Request $request){

        $delete = DB::table('postWithImage')->where('id',$request->deleteContentSectionOne)->delete();
        return response::json('success');
    }



}
