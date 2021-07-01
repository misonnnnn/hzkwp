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
        if ($request->path() == 'home') {

            $getClientCounts = DB::table('clients')
                ->select('*')
                ->count();
            $getActiveClientCounts = DB::table('clients')
                ->select('*')
                ->where('active','1')
                ->count();
        	return view('users.usersHome')
                ->with([
                    'getClientCounts' => $getClientCounts,
                    'getActiveClientCounts' => $getActiveClientCounts,
                ]);

        }elseif ($request->path() == 'clients') {
			$clients = DB::table('clients')
			->select('*')
			->where('accountant_id',Auth::user()->id)
			->get();
        	return view('users.usersClients')->with('clientsData' , $clients);
        }
    }

    public function getClientsPage(Request $request)
    {
    	$clientDetails = DB::table('clients')
				->select('*')
				->where('id' , $request->clientsId)
				->first();
    	return view('users.usersGetClients')
    		->with([
    			'id'	=>	$clientDetails->id,
                'name'  =>  $clientDetails->name,
                'email'  =>  $clientDetails->email,
                'contact'  =>  $clientDetails->contact,
    			'address'	=>	$clientDetails->address,
    			'businessClass'	=>	$clientDetails->businessClass,
    			'active'	=>	$clientDetails->active,
    			'email'	=>	$clientDetails->email,
    			'contact'	=>	$clientDetails->contact,
                'tin'   =>  $clientDetails->tin,
                'rf'   =>  $clientDetails->retainersFee,
                'itr'   =>  $clientDetails->itr,
                'startDate'   =>  $clientDetails->startDate,
                'endDate'   =>  $clientDetails->endDate,
                'cor'   =>  $clientDetails->cor,
    			'sa'	=>	$clientDetails->serviceAgreement,
    			]);
    }
    public function getClientCounts(Request $request)
    {
        $getClientCounts = DB::table('clients')
                ->select('*')
                ->count();
        return $getClientCounts;
    }

    public function addClient(Request $request)
    {
        $addClients = DB::table('clients')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'tin' => $request->tin,
            'businessClass' => $request->classification,
            'active' => '1',
            'retainersFee' =>$request->rf,
            'itr' => $request->itr,
            'startDate' => $request->dateStarted,
            'endDate' => $request->dateEnd,
            'accountant_id' => Auth::user()->id,
        ]);

        $addClients = DB::table('notifications')->insert([
            'title' => 'New Client',
            'body' => ' Horray! ' .  $request->name . ' just signed a contract with us!',
            ]);

        if ($addClients) {
            $results = "success";
        }else{
            $results = "error";
        }
        return $results;
    }
    public function editClient(Request $request)
    {
        $editClient = DB::table('clients')
                ->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'address' => $request->address,
                    'tin' => $request->tin,
                    'businessClass' => $request->classification,
                    'retainersFee' =>$request->rf,
                    'itr' => $request->itr,
                    'startDate' => $request->dateStarted,
                    'endDate' => $request->dateEnd,
                    'active' => $request->activeToggle,
                ]);

        if ($editClient) {
            $results = 'success';
        }else{
            $results = 'error';
        }
        return $results;
        
    }

    public function deleteClient(Request $request)
    {
        $q = DB::table('clients')->where('id', $request->clientId)->delete();
        if ($q) {
            $results = 'success';
        }else{
            $results = 'error';
        }
        return $results;
    }


    public function profile(Request $request)
    {
        if ($request->path() == 'profile') {
            return view('users.usersProfile');
        }
    }

    public function countClientTable(Request $request)
    {
        $clientTable = DB::table('clients')->select('*')->orderBy('created_at','DESC')->limit(1)->get();


        return $clientTable;
    }

    public function loadNotifications(Request $request)
    {
        $notifications = DB::table('notifications')->select('*')->orderBy('created_at','DESC')->limit(7)->get();


        return $notifications;
    }

    public function pictureUpload(Request $request) {
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/resources/profilepic/');
            $image->move($destinationPath, $name);
            $data = 'success';
            User::where('id', Auth::id())
            ->update([
                'picture' => $name
            ]);
            return back()->with('success','Image Upload successfully!');
        }
    }
}