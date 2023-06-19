<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AddMenuModel;
use App\models\AddSubMenuModel;
use App\models\UserModel;
use Response;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSettingsController extends Controller
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
    public function adminSettingsView()
    {
        $subMenus   = DB::table('submenu')->select('*')->get();
        return view('security.admin.adminSettingsView',['subMenus' => $subMenus]);
    }

    public function adminSettingsUserNameChange(Request $request)
    {
        $id = Auth::user()->id;
        $userNamechange            =  UserModel::where('id',$id)->first();
        $userNamechange->name      =  $request->UserName;
        $userNamechange->save();
        return response::json('success');
    }


    public function adminSettingsUserPasswordChange(Request $request)
    {
        if (Hash::check($request->get('currentPassword'), Auth::user()->password)) {
            $id = Auth::user()->id;
            $userPasschange            =  UserModel::where('id',$id)->first();
            $userPasschange->password  =  bcrypt($request->resetPassword);
            $userPasschange->save();
            return response::json('success');
        }
    }
}
