<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        $menus      = DB::table('menu')->select('*')->get();
        $subMenus   = DB::table('submenu')->select('*')->get();
        $data       = DB::table('homepage')->select('*')->get()->last();
        $sliders    = DB::table('sliders')->select('*')->get();
        $portfolios = DB::table('postWithImage')
                                  ->select('*')
                                  ->where('sectionId',1)
                                  ->where('menuId',4)
                                  ->get();
        $servicesContents   = DB::table('postWithImage')->select('*')->where('menuId',2)->where('sectionId',1)->get();
        $featuresContents   = DB::table('post')->select('*')->where('menuId',2)->where('sectionId',2)->get();
        $sections           = DB::table('catagory')->select('*')->where('menuId',2)->first();
        $galleryName        = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
        $galleries          = DB::table('gallery')->select('*')->get();
        $factsArea          = DB::table('factsArea')->select('*')->first();
        $indexArr   = array(
                      'menus'            => $menus,
                      'subMenus'         => $subMenus,
                      'data'             => $data,
                      'sliders'          => $sliders,
                      'galleries'        => $galleries,
                      'sections'         => $sections,
                      'servicesContents' => $servicesContents,
                      'featuresContents' => $featuresContents,
                      'galleryName'      => $galleryName,
                      'factsArea'        => $factsArea,
                      'portfolios'       => $portfolios
        );
        return view('security.index',$indexArr);

    }

    public function services()
    {
        $menus      = DB::table('menu')->select('*')->get();
        $subMenus   = DB::table('submenu')->select('*')->get();
        $servicesBackGrounds    = DB::table('services')->select('*')->first();
        $servicesSectionONeName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',2)->first();
        $servicesSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',2)->where('menuId',2)->first();
        $sectionOneContents  = DB::table('postWithImage')
                                  ->select('*')
                                  ->where('sectionId',1)
                                  ->where('menuId',2)
                                  ->get();
        $sectionTwoContents  = DB::table('post')
                                  ->select('*')
                                  ->where('sectionId',2)
                                  ->where('menuId',2)
                                  ->get();

        $servicesArray        = array(
                                   'menus'                  => $menus,
                                   'subMenus'               => $subMenus,
                                   'servicesBackGrounds'    => $servicesBackGrounds,
                                   'servicesSectionONeName' => $servicesSectionONeName,
                                   'servicesSectionTwoName' => $servicesSectionTwoName,
                                   'sectionOneContents'     => $sectionOneContents,
                                   'sectionTwoContents'     => $sectionTwoContents
                                    );
        return view('security.service',$servicesArray);

    }

    public function portfolio()
    {
        $menus                   = DB::table('menu')->select('*')->get();
        $subMenus                = DB::table('submenu')->select('*')->get();
        $portfolioBackGrounds    = DB::table('portfolio')->select('*')->first();
        $portfolioSectionOneName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',4)->first();
        $portfolioSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',2)->where('menuId',2)->first();

        $sectionOneContents  = DB::table('postWithImage')
                                  ->select('*')
                                  ->where('sectionId',1)
                                  ->where('menuId',4)
                                  ->get();
        $sectionTwoContents  = DB::table('post')
                                  ->select('*')
                                  ->where('sectionId',2)
                                  ->where('menuId',2)
                                  ->get();
        $galleryName           = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
        $galleries             = DB::table('gallery')->select('*')->get();
        $portfolioArray        = array(
                                   'menus'                   => $menus,
                                   'subMenus'                => $subMenus,
                                   'portfolioBackGrounds'    => $portfolioBackGrounds,
                                   'portfolioSectionOneName' => $portfolioSectionOneName,
                                   'portfolioSectionTwoName' => $portfolioSectionTwoName,
                                   'sectionOneContents'      => $sectionOneContents,
                                   'galleries'               => $galleries,
                                   'galleryName'             => $galleryName,
                                   'sectionTwoContents'      => $sectionTwoContents
                                    );
        return view('security.portfolio',$portfolioArray);

    }

    public function about()
    {
        $menus                  = DB::table('menu')->select('*')->get();
        $subMenus               = DB::table('submenu')->select('*')->get();
        $aboutBackGrounds       = DB::table('about')->select('*')->first();
        $sectionOneContents     = DB::table('postWithImage')
                                  ->select('*')
                                  ->where('sectionId',1)
                                  ->where('menuId',3)
                                  ->get();
        $servicesSectionTwoName = DB::table('catagory')->select('*')->where('sectionId',1)->where('menuId',2)->first();

        $sectionTwoContents     = DB::table('postWithImage')
                                    ->select('*')
                                    ->where('sectionId',1)
                                    ->where('menuId',2)
                                    ->get();
        $galleryName         = DB::table('catagory')->select('*')->where('menuId',1)->where('sectionId',10)->first();
        $galleries           = DB::table('gallery')->select('*')->get();
        $aboutViewArray      = array(
                                  'menus'                  => $menus,
                                  'subMenus'               => $subMenus,
                                  'aboutBackGrounds'       => $aboutBackGrounds,
                                  'sectionOneContents'     => $sectionOneContents,
                                  'servicesSectionTwoName' => $servicesSectionTwoName,
                                  'galleries'              => $galleries,
                                  'galleryName'            => $galleryName,
                                  'sectionTwoContents'     => $sectionTwoContents
                                  );
        return view('security.about',$aboutViewArray);

    }

    public function contact()
    {
        $menus              = DB::table('menu')->select('*')->get();
        $subMenus           = DB::table('submenu')->select('*')->get();
        $contactInfos       = DB::table('contactInfos')->select('*')->first();
        $contactBackGrounds = DB::table('contact')->select('*')->first();
        $contactArr         = array(
                                  'menus'              => $menus,
                                  'subMenus'           => $subMenus,
                                  'contactInfos'       => $contactInfos,
                                  'contactBackGrounds' => $contactBackGrounds
                                   );
        return view('security.contact',$contactArr);

    }
}
