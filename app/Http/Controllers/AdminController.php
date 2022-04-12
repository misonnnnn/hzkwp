<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Announcements;
use SoulDoit\DataTable\SSP;
use Illuminate\Http\Request;
use App\Mail\CustomResetPassw;
use App\Models\StudentDetailsModel;
use App\Models\Classroom;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(Request $request)
    {

    	 $clients = DB::table('users')
            ->select('*')
            ->where('accRequest' , '0')
            ->get();
            return view('admin.adminHome')->with('usersData' , $clients);
    }

     public function approveAccount(Request $request)
    {
        $approveAccount = DB::table('users')
        ->where('users.email',$request->email)
        ->update([
            'accRequest' => '1',
        ]);

        if ($approveAccount) {
            $results = "success";
        }else{
            $results = "error";
        }
        return $results;
    }
}