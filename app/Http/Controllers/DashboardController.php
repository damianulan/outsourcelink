<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Nations;
use App\Models\Person;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RecentActivity;
use App\Notifications\TaskAdded;

class DashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyId = Session::get('currentCompany')->id;
        $candidates_table = DB::table('people')
        ->select('id', 'firstname', 'surname', 'birthdate', 'nations_id', 'status_id', 'company_id', 'created_at')
        ->where('type', '=', '0')
        ->where('company_id', '=', $companyId)
        ->orderBy('created_at', 'asc')
        ->take(10)
        ->get();
        $candidates = Person::all()->where('type', '=', '0');
        $employees = Person::all()->where('type', '=', '1')->where('status_id', '=', '7');
        $candidatesInMonth = 0;
        $employeesInMonth = 0;
        foreach ($candidates as $candidate){
            if((string)$candidate->created_at->month == (string)Carbon::now()->month){
                $candidatesInMonth++;
            }
        }
        foreach ($employees as $employee){
            if((string)$employee->created_at->month == (string)Carbon::now()->month){
                $employeesInMonth++;
            }
        }
        $candidatesNum = $candidates->count();
        $employeesNum = $employees->count();
        $nations = Nations::all();
        $statuses = Status::all()->where('type', '=', '0');
        $title = __('pages.dashboard');
        $tasks = Task::all()->where('target', '=', Auth::user()->id);
        $users = User::all()->where('subscriptions_id', '=', Auth::user()->subscriptions_id);
        return view('index', [
            'title' => $title,
            'candidates' => $candidates_table,
            'nations' => $nations,
            'statuses' => $statuses,
            'users' => $users,
            'tasks' => $tasks,
            'candidatesNum' => $candidatesNum,
            'employeesNum' => $employeesNum,
            'candidatesInMonth' => $candidatesInMonth,
            'employeesInMonth' => $employeesInMonth
        ]);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->task_title,
            'content' => $request->task_content,
            'target' => $request->task_target,
            'added_by' => Auth::user()->id,
            'status_id' => '16',
            'due_date' => $request->task_due,
        ];
        $user = User::all()->where('id', '=', $request->task_target);
        Notification::send($user, new TaskAdded(Auth::user()));

        Task::create($data);
        return redirect(route('index'))->with('success', 'Task has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


