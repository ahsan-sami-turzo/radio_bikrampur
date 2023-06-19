<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\PortfolioModel;
use App\models\PostWithImageModel;
use App\models\CatagoryModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PortfolioController extends Controller
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

    public function adminPortfolioPageEditor()
    {
        $portfolioBackGrounds    = DB::table('portfolio')->select('*')->get();
        $sections               = DB::table('catagory')->select('*')->where('menuId',4)->first();
        $firstSectionContents   = DB::table('postWithImage')->select('*')->where('menuId',4)->where('sectionId',1)->get();
        $subMenus               = DB::table('submenu')->select('*')->get();
    
        $servicePageEditorArr   = array(
                                  'portfolioBackGrounds'  => $portfolioBackGrounds,
                                  'firstSectionContents'  => $firstSectionContents,
                                  'subMenus'              => $subMenus,
                                  'sections'              => $sections

                                       );
        return view('security.admin.portfolio.adminPortfolioPageEditor',$servicePageEditorArr);
    }



    public function addBackGroundPortfolio(Request $request)
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
        $deleteAllPictures           = DB::table('portfolio')->delete();
        $addBackgroundImage          = new PortfolioModel;
        $time= Carbon::now();
        $addBackgroundImage->backGroundImagePath     = $slideImageFileName;
        $addBackgroundImage->save();

        return response::json('success');
    }



    public function firstSectionContentsOfPortfolio(Request $request)
    {
        $imageFileName="";

        if($request->hasFile('firstSectionImage')):
            $image    = $request->file('firstSectionImage');
            $filename = $image->getClientOriginalName();
            $EXT      = $image->getClientOriginalExtension();
            $imageFileName = base64_encode($filename);
            $imageFileName = $imageFileName;

            $request->file('firstSectionImage')->move('public/uploads/images/portfolio/', $imageFileName);
        endif;


        $addContent          = new PostWithImageModel;
        $time= Carbon::now();
        $addContent->imgPath       = $imageFileName;
        $addContent->menuId        = 4;
        $addContent->sectionId     = 1;
        $addContent->postName      = $request->firstSectionTitleContent;
        $addContent->title         = $request->firstSectionTitleContent;
        $addContent->description   = $request->firstSectionDescriptionContent;
        $addContent->save();

        return response::json('success');
    }



        public function addSectionTitleAndContentPortfolio(Request $request)
        {

            $delete = DB::table('catagory')->where('menuId',4)->delete();
            $addSectionTitleAndContent                    = new CatagoryModel;
            $addSectionTitleAndContent->title             = $request->firstSection;
            $addSectionTitleAndContent->description       = $request->firstSectionTag;
            $addSectionTitleAndContent->menuId            = 4;
            $addSectionTitleAndContent->sectionId         = 1;
            $addSectionTitleAndContent->save();

            return response::json('success');

        }


        public function portfolioSectionOneContentsEditView(Request $request)
        {
             $viewData = DB::table('postWithImage')->where('id',$request->attri)->select('*')->get();
             return response()->json($viewData);
        }

        public function editFirstSectionContentsOfPortfolio(Request $request)
        {
            $imageFileName="";
            if($request->hasFile('editSectionOneContentImage')):

                $image    = $request->file('editSectionOneContentImage');
                $filename = $image->getClientOriginalName();
                $EXT      = $image->getClientOriginalExtension();
                $imageFileName = base64_encode($filename);
                $imageFileName = $imageFileName;

                $request->file('editSectionOneContentImage')->move('public/uploads/images/portfolio/', $imageFileName);

                $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
                $addContent->imgPath       = $imageFileName;
                $addContent->save();
            endif;


            $addContent                =  PostWithImageModel::where('id',$request->hiddenSectionOneContentEdit)->first();
            $time= Carbon::now();
            $addContent->menuId        = 4;
            $addContent->sectionId     = 1;
            $addContent->postName      = $request->editSectionOneContentTitle;
            $addContent->title         = $request->editSectionOneContentTitle;
            $addContent->description   = $request->editSectionOneContentDescription;
            $addContent->save();

            return response::json('success');
        }
        public function portfolioDeletePostSectionOne(Request $request){

            $delete = DB::table('postWithImage')->where('id',$request->deleteContentSectionOne)->delete();
            return response::json('success');
        }


        public function deleteBackgroundImagePortfolio(Request $request){

          $delete = DB::table('portfolio')->where('id',$request->deleteBackGround)->delete();
          return response::json('success');
        }

}
