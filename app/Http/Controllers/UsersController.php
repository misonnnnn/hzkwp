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


class UsersController extends Controller
{
    public function index(Request $request)
    {
        return view('users.usersHome');
    }
}