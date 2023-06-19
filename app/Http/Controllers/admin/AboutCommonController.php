<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AboutModel;
use App\models\backgroundImageModel;
use App\models\PostWithImageModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutCommonController extends Controller
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



    public function adminAboutPageEditor($id)
    {

        //dd($id);

      $aboutBackGrounds       = DB::table('backgroundImage')
      ->where('menuId', $id)
      ->select('*')->get();


        // $sections               = DB::table('catagory')->select('*')->where('menuId',2)->first();
      $firstSectionContents   = DB::table('postWithImage')
      ->select('*')
      ->where('menuId',$id)
      ->where('sectionId',1)
      ->get();

      $subMenus               = DB::table('submenu')
      ->select('*')
      ->get();

      /*
        Creating Array To Send Data To View Page.
      */

        $servicePageEditorArr   = array(
          'aboutBackGrounds'      => $aboutBackGrounds,
          'firstSectionContents'  => $firstSectionContents,
          'subMenus'              => $subMenus,
          'id'                    => $id

      );


        return view('security.admin.adminCommonEditor.adminCommonPageEditor',$servicePageEditorArr);
    }



    public function addBackGround(Request $request)
    {

        $slideImageFileName="";

        if($request->hasFile('image_file')):
            $slideImage = $request->file('image_file');
            $filename = $slideImage->getClientOriginalName();
            $EXT = $slideImage->getClientOriginalExtension();
            $slideImageFileName = base64_encode($filename);
            $slideImageFileName = rand(0, getrandmax()).$slideImageFileName;
            $slideImageFileName = $slideImageFileName;

            $request->file('image_file')->move('public/uploads/images/backgroundImages/', $slideImageFileName);
        endif;
        $deleteAllPictures           = DB::table('about')->delete();
        $addBackgroundImage          = new backgroundImageModel;
        $time= Carbon::now();
        $addBackgroundImage->menuId = $request->id;
        $addBackgroundImage->image     = $slideImageFileName;

        $addBackgroundImage->save();
        //dd($request);

        return response::json('success');
    }

    public function deleteBackGround(Request $request){

        $delete = DB::table('backgroundImage')
        ->where('id',$request->deleteBackGround)
        ->delete();



        return response::json('success');
    }


    public function inputData(Request $request)
    {
        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = rand(0, getrandmax()).$imageFileName;
            $imageFileName = $imageFileName;

            $request->file('firstSectionImage')->move('public/uploads/images/about/', $imageFileName);
        endif;


        $addContent          = new PostWithImageModel;
        $time= Carbon::now();
        $addContent->imgPath       = $imageFileName;
        $addContent->menuId        = $request->id;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->firstSectionTitleContent;
        $addContent->title         = $request->firstSectionTitleContent;
        $addContent->description   = $request->firstSectionDescriptionContent;
        $addContent->save();

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
    $addContent->menuId        = $request->id;
    $addContent->sectionId     = 1;
    $addContent->postName      = $request->editSectionOneContentTitle;
    $addContent->title         = $request->editSectionOneContentTitle;
    $addContent->description   = $request->editSectionOneContentDescription;
    $addContent->save();

    return response::json('success');
}

public function aboutDeletePostSectionOne(Request $request){

    //dd($request->deleteContentSectionOne);

    $delete = DB::table('postWithImage')->where('id',$request->deleteContentSectionOne)->delete();
    // return $delete;

    return response::json('success');
}



}
