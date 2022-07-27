<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use App\Models\Nations;
use App\Models\Company;
use App\Models\Subscription;
use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FirstLogin;

class AuthController extends Controller
{
    public function __construct() {
        // left for future initizalization purposes
        $this->loginView = 'auth.login';
    }
    
    public function index()
    {
        $title = 'Login';
        return view($this->loginView, [
            'title' => $title
        ]);  
  
    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $remember = $request->login_remember;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $this->companyInit();
            $candidateFilters = CandidatesController::updateViews();
            $employeeFilters = EmployeesController::updateViews();    
            Session::put('candidatesDataView', $candidateFilters);
            Session::put('employeesDataView', $employeeFilters);

            if(Log::all()->where('user_id', '=', Auth::id())->isEmpty()){
                Notification::send(Auth::user(), new FirstLogin());
            }
            $this->createLog(Auth::id(), 1);

            return redirect(route('index'));

        }
        else{
            
            $user = User::select('id')->where('email', 'like', $credentials['email'])->get();
            $this->createLog($user[0]->id, 0);
            return redirect(route($this->loginView))->with('alert', __('auth.failed'));
        }
    }

    public function register()
    {
        $title = 'Register';
        return view('auth.register', [
            'title' => $title
        ]);     
    }

    public function registration(Request $request)
    {  
        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $this->create($data);
         
        return redirect(route('index'));
    }


    public function create(array $data)
    {
      return User::create([
        'firstname' => $data['firstname'],
        'surname' => $data['surname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function createLog(int $id, int $result)
    {
      return Log::create([
        'user_id' => $id,
        'ip' => Log::getIp(),
        'result' => $result
      ]);
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect(route($this->loginView));
    }

    public function companyInit() {
        $users = DB::table('users')
                            ->select('subscriptions_id')
                            ->where('id', '=', Auth::user()->id)
                            ->get();
        
        $subscription_id = $users[0]->subscriptions_id;
        $companies = Company::all()->where('subscriptions_id', '=', $subscription_id);
        Session::put('currentCompany', $companies->first());
        Session::put('companies', $companies);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function companySwitch(int $id) {
        $id--;
        $users = DB::table('users')
                            ->select('subscriptions_id')
                            ->where('id', '=', Auth::user()->id)
                            ->get();
        $subscription_id = $users[0]->subscriptions_id;
        $comp = Company::all()->where('subscriptions_id', '=', $subscription_id);
        Session::put('currentCompany', $comp[$id]);
        return redirect()->back();
    }
}