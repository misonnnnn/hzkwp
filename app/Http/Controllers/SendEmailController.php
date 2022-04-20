<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Mail;
 
use App\Mail\VerifyMail;
 
 
class SendEmailController extends Controller
{
     
    public function index()
    {
 
      Mail::to('misonjohnemmanuel@gmail.com')->send(new VerifyMail());
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->json('Great! Successfully send in your mail');
         }
    } 
}