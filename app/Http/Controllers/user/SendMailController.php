<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Response;

class SendMailController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {

  }

  public function userContactFormSendMail(Request $request)
  {
    Mail::Send('emails.contactMessage',[ 'message' =>$request->message ], function($mail) use($request){
      $mail->from($request->email, $request->email);
      $mail->to('27dae050e2-e2efee@inbox.mailtrap.io')->subject($request->subject)->setBody($request->message);
    });

     return response::json('success');
  }


}
