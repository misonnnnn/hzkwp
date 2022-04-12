<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
use App\Models\Image;


class UsersController extends Controller
{
    public function index(Request $request)
    {

       if (auth::user()->accRequest !=1) {
            Auth::logout();
            return view('auth.login')->with('accError','Your account is not ready yet. Please wait for your admin to approve your account.');
       }else {
            if ($request->path() == 'home') {
                
            $getClientCounts = DB::table('clients')
                ->select('*')
                ->count();
            $getActiveClientCounts = DB::table('clients')
                ->select('*')
                ->where('active','1')
                ->count();
            $getInactiveClientCounts = DB::table('clients')
                ->select('*')
                ->where('active',NULL)
                ->count();  
            $users_activities = DB::table('users_activities')->select('*')
                ->where('accountant_id' , Auth::user()->id)->get();

            return view('users.usersHome')
                ->with([
                    'getClientCounts' => $getClientCounts,
                    'getActiveClientCounts' => $getActiveClientCounts,
                    'getInactiveClientCounts' => $getInactiveClientCounts,
                    'users_activities' => $users_activities,
                ]);

            }elseif ($request->path() == 'clients') {
                $clients = DB::table('clients')
                ->select('*')
                ->where('accountant_id',Auth::user()->id)
                ->get();
                return view('users.usersClients')->with('clientsData' , $clients);
            }elseif ($request->path() == 'allclients') {
                $clients = DB::table('clients')
                ->select('*')
                ->get();
                return view('users.usersAllClients')->with('clientsData' , $clients);
            }
            elseif ($request->path() == 'accountants') {
                $accountants = DB::table('users')
                ->select('*')
                ->where([
                    'users.position'=> 'accountant',
                    'users.accRequest' => '1'
                    ])
                ->get();

                return view('users.usersAccountants')->with([
                    'accountants' => $accountants,
                ]);
            }

            elseif ($request->path() == 'files') {

                $countCor = DB::table('clients')
                        ->select('*')
                        ->whereNotNull('cor')
                        ->get();
                $countSa = DB::table('clients')
                        ->select('*')
                        ->whereNotNull('serviceAgreement')
                        ->get();

                return view('users.usersFiles')->with([
                        'countCor' => $countCor,
                        'countSa' => $countSa,
                    ]);
            }
            elseif ($request->path() == 'files/cor') {

                $cor = DB::table('clients')
                        ->select('*')
                        ->get();


                return view('users.usersClientCor')->with('cor' , $cor);
            }

            elseif ($request->path() == 'files/serviceagreement') {

                // $cor = DB::table('clients')
                //         ->select('*')
                //         ->get();
                $cor = DB::table('clients')
                ->select('users.name as usersName','clients.id as clientId', 'users.id as usersId', 'clients.name as clientName','clients.serviceAgreement as serviceAgreement')
                        ->join('users','users.id','=','clients.accountant_id')
                        ->get();

                return view('users.usersClientSa')->with([
                        'cor' => $cor,
                    ]);
            }
            elseif ($request->path() == 'expenses') {
                $db = DB::table('expenses')->select('*')
                        ->where('userId' , auth::user()->id)
                        ->get();
                return view('users.usersExpenses')->with('db' , $db);
            }
            elseif ($request->path() == 'file-dialog') {
                            $accountant = DB::table('users')->select('*')
                        ->where('position','accountant')
                        ->get();
                return view('users.usersFileDialog')->with('accountant' , $accountant);
            }
            elseif ($request->path() == 'settings') {
                
                return view('users.usersSettings');
            }
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
            $results = $editClient;
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



    public function getAccountantsInfo(Request $request)
    {
        $accDetails = DB::table('users')
                ->select('*')
                ->where('position' , 'accountant')
                ->where('id',$request->accountantId)
                ->first();

        $accClient = DB::table('clients')
                    ->select('*')
                    ->where('accountant_id', $accDetails->id)
                    ->get()
                    ->count();
        return view('users.usersGetAccountantsInfo')
            ->with([
                'id'    =>  $accDetails->id,
                'name'  =>  $accDetails->name,
                'picture'  =>  $accDetails->picture,
                'email'  =>  $accDetails->email,
                'position'  =>  $accDetails->position,
                'branch'  =>  $accDetails->branch,
                'contactNumber'  =>  $accDetails->contactNumber,
                'accClient'  =>  $accClient,
                ]);
    }

    public function saUpload(Request $request)
    {


        // $image = $request->file('image');
        // $name = time().'.'.$image->getClientOriginalExtension();
        // $destinationPath = public_path('/images/sa');
        // $image->move($destinationPath, $name);
        // $data = 'success';

         // DB::table('clients')->where('id', $request->clientId)
        // ->update([
        //         'serviceAgreement' => $name
        // ]);



        DB::table('clients')->where('id', $request->clientId)
        ->update([
                'serviceAgreement' => ''
        ]);

        $images = $request->file('image');

       foreach( $images as $key => $image) {
            $name[$key] = time().$key.'.'.$image->getClientOriginalExtension();
            $destinationPath[$key] = public_path('/images/sa');
            if ($image->move($destinationPath[$key] , $name[$key] )) {
                $data = 'success';
            }
            $db[$key] = DB::table('clients')->select('*')->where('id', $request->clientId)->first();
            $updatedVal = $name[$key].','.$db[$key]->serviceAgreement;
            $updatedValue = rtrim($updatedVal,",");

            DB::table('clients')->where('id', $request->clientId)->update([
                                'serviceAgreement' => $updatedValue
                        ]);
        }

        return back()->with('success','Image Upload successfully!');
    
    }

    public function corUpload(Request $request)
    {

        $image = $request->file('image');
        // $name = time().'.'.$image->getClientOriginalExtension();
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/cor');
        $image->move($destinationPath, $name);
        $data = 'success';
       
        DB::table('clients')->where('id', $request->clientId)
        ->update([
                'cor' => $name
        ]);

        return back()->with('success','Image Upload successfully!');
    
    }

    public function searchCor(Request $request)
    {
        $searchResults = DB::table('clients')
                    ->select('users.name as usersName', 'users.id as usersId', 'clients.name as clientName','clients.serviceAgreement as serviceAgreement')
                    ->join('users','users.id','=','clients.accountant_id')
                    ->where('clients.address', 'LIKE', "%{$request->searchCor}%") 
                    ->orwhere('clients.name', 'LIKE', "%{$request->searchCor}%") 
                    ->orwhere('clients.tin', 'LIKE', "%{$request->searchCor}%") 
                    ->orwhere('clients.businessName', 'LIKE', "%{$request->searchCor}%") 
                    ->orwhere('clients.businessClass', 'LIKE', "%{$request->searchCor}%") 
                    ->get();


        return $searchResults;
    }

    public function getClientSa(Request $request)
    {
        $clientsInfo = DB::table('clients')
                    ->select('*')
                    ->where('id' , $request->clientId)
                    ->get();
        return view('users.usersGetClientsSa')->with('clientsInfo',$clientsInfo);
    }

    public function addExpenses(Request $request)
    {
        $addClients = DB::table('expenses')->insert([
            'supplier' => $request->name,
            'account_title' => $request->accountTitle,
            'userId' => Auth::user()->id,
            'total' => $request->amount,
            'date' => $request->date,
        ]);

        DB::table('users_activities')->insert([
            'accountant_id' => Auth::user()->id,
            'activity_name' => 'Add Expenses',
            'description' => 'You add '. $request->accountTitle . ' expenses. Amount: ' . $request->amount . ' pesos',
        ]);


        if ($addClients) {
            $results = "success";
        }else{
            $results = "error";
        }
        return $results;
    }
}

