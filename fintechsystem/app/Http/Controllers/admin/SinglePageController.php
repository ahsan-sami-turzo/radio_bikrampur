<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\SingleModel;
use App\models\ContactInfosModel;
use App\models\PostWithImageSubMenuModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SinglePageController extends Controller
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

    public function adminSinglePageEditor($id)
    {
        $singleBackGrounds      = DB::table('singlePages')->select('*')->where('subMenuId',$id)->get();
        $subMenus               = DB::table('submenu')->select('*')->get();
        $posts                   = DB::table('postWithImageSubmenu')->select('*')->where('subMenuId',$id)->get();
        $servicePageEditorArr   = array(
                                  'singleBackGrounds'     => $singleBackGrounds,
                                  'subMenus'              => $subMenus,
                                  'posts'                 => $posts,
                                  'id'                    => $id
                                       );
        return view('security.admin.singlePageEditor.singlePageEditor',$servicePageEditorArr);
    }



    public function addBackGroundSinglePage(Request $request)
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
        $deleteAllPictures           = DB::table('singlePages')->where('subMenuId',$request->singlePageId)->delete();
        $addBackgroundImage          = new SingleModel;
        $addBackgroundImage->backGroundImagePath  = $slideImageFileName;
        $addBackgroundImage->subMenuId            = $request->singlePageId;
        $addBackgroundImage->save();

        return response::json('success');
    }


    public function firstSectionContentsOfSinglePages(Request $request)
    {
        $imageFileName="";

        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('firstSectionImage')->move('public/uploads/images/singlePages/', $imageFileName);
        endif;


        $addContent                = new PostWithImageSubMenuModel;
        $addContent->imgPath       = $imageFileName;
        $addContent->subMenuId     = $request->singlePageId;
        $addContent->postName      = $request->firstSectionTitleContent;
        $addContent->title         = $request->firstSectionTitleContent;
        $addContent->description   = $request->firstSectionDescriptionContent;
        $addContent->save();

        return response::json('success');
    }

    public function SinglePageSectionOneContentsEditView(Request $request)
    {
         $editContents = DB::table('postWithImageSubmenu')->select('*')->where('id',$request->attri)->get();
         return response()->json($editContents);

    }

    public function editFirstSectionContentsOfSingle(Request $request)
    {
        $imageFileName="";
        if($request->hasFile('editSectionOneContentImage')):

            $image    = $request->file('editSectionOneContentImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('editSectionOneContentImage')->move('public/uploads/images/singlePages/', $imageFileName);

            $addContent                =  PostWithImageSubMenuModel::where('id',$request->hiddenSectionOneContentEdit)->first();
            $addContent->imgPath       = $imageFileName;
            $addContent->save();
        endif;


        $addContent                =  PostWithImageSubMenuModel::where('id',$request->hiddenSectionOneContentEdit)->first();
        $addContent->subMenuId     = $request->singlePageId;
        $addContent->postName      = $request->editSectionOneContentTitle;
        $addContent->title         = $request->editSectionOneContentTitle;
        $addContent->description   = $request->editSectionOneContentDescription;
        $addContent->save();

        return response::json('success');


    }

    public function deleteBackgroundImageSingle(Request $request){

        $delete = DB::table('singlePages')->where('id',$request->deleteBackGround)->delete();
        return response::json('success');
    }


    public function aboutDeletePostSectionOne(Request $request)
    {
        $delete = DB::table('postWithImageSubmenu')->where('id',$request->deleteContentSectionOne)->delete();
        return response::json('success');
    }









}
