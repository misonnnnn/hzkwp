<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Student;
use App\Models\Announcements;
use SoulDoit\DataTable\SSP;
use App\Mail\CustomResetPassw;
use App\Models\StudentDetailsModel;
use App\Models\Classroom;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('home');
        if ($request->path()=='/') {
            return view('auth.login');
        } 
        elseif($request->path()=='signup') {
            return view('auth.signup');
        }
        elseif($request->path()=='emailVerifyNotice') {
            return view('auth.login')->with('accCreated' ,'Account Successfully created! We have send a verification link to your email');
        }

    }

    public function emailVerification(Request $request)
    {
        $db = DB::table('users')->select('*')
            ->where('emailToken' , $request->emailToken)   
            ->get();



        if ($db->isEmpty()) {
            return view('auth.login')->with('accError' , 'Link Expired');
        } else {
            DB::table('users')->where('emailToken' , $request->emailToken)   
            ->update([
                'emailVerified' => '1',
            ]);

            DB::table('users')->where('emailToken' , $request->emailToken)   
            ->update([
                'emailToken' => NULL,
            ]);

            return view('auth.login')->with('accCreated' , 'Please wait for your admin to approve your account then youre all set');
        }
        
    }

   
}
