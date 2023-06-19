<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ContactModel;
use App\models\ContactInfosModel;
use App\models\PostWithImageModel;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ContactController extends Controller
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

    public function adminContactPageEditor()
    {   

        //dd($id);

        $subMenus   = DB::table('submenu')->select('*')->get();
        $contactBackGrounds     = DB::table('contact')->select('*')->get();
        // $sections               = DB::table('catagory')->select('*')->where('menuId',2)->first();
        $firstSectionContents   = DB::table('postWithImage')->select('*')->where('menuId',3)->where('sectionId',1)->get();
        $secondSectionContents  = DB::table('post')->select('*')->where('menuId',2)->where('sectionId',2)->get();
        $contactInfos           = DB::table('contactInfos')->select('*')->first();
        $servicePageEditorArr   = array(
          'contactBackGrounds'    => $contactBackGrounds,
          'firstSectionContents'  => $firstSectionContents,
          'subMenus'              => $subMenus,
          'contactInfos'          => $contactInfos
      );
        return view('security.admin.contact.adminContactPageEditor',$servicePageEditorArr);
    }



    public function addBackGroundContact(Request $request)
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
        $deleteAllPictures           = DB::table('contact')->delete();
        $addBackgroundImage          = new ContactModel;
        $time= Carbon::now();
        $addBackgroundImage->backGroundImagePath     = $slideImageFileName;
        $addBackgroundImage->save();

        return response::json('success');
    }

    public function deleteBackgroundImageAbout(Request $request){

        $delete = DB::table('about')->where('id',$request->deleteBackGround)->delete();
        return response::json('success');
    }



    public function addContactInfos(Request $request)
    {

        $delete = DB::table('contactInfos')->delete();
        $addContactInfo             = new ContactInfosModel;
        $addContactInfo->country    = $request->countryName;
        $addContactInfo->city       = $request->cityName;
        $addContactInfo->address    = $request->addressName;
        $addContactInfo->ph         = $request->phoneNo;
        $addContactInfo->timing     = $request->officeHour;
        $addContactInfo->mail       = $request->emailName;
        $addContactInfo->mailTag    = $request->tagline;
        $addContactInfo->save();
        return response::json('success');

    }







}
