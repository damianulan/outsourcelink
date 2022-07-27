<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Person;
use App\Models\User;
use App\Models\Citizenships;
use App\Models\Nations;
use App\Models\Company;
use App\Models\Permit;
use App\Models\Tag;
use App\Models\PersonTag;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RecentActivity;

class CandidatesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->candidatesLabel = __('pages.candidates');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyId = Session::get('currentCompany')->id;
        $candidates = Person::all()->where('type', '=', '0')->where('company_id', '=', $companyId);
        $title = $this->candidatesLabel . ' - ' . __('pages.view');
        $cols = array_keys($this->updateViews());
        $citizenships = Citizenships::all();
        $nations = Nations::all();
        $statuses = Status::all()->where('type', '=', '0');
        return view('pages.people.candidates.candidatesView', [
            'title' => $title,
            'candidates' => $candidates,
            'cols' => $cols,
            'citizenships' => $citizenships,
            'nations' => $nations,
            'statuses' => $statuses
         ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->candidatesLabel . ' - ' . __('pages.add');
        $tags = Tag::all();
        $citizenships = Citizenships::all();
        $nations = Nations::all();
        $statuses = Status::all()->where('type', '=', '0');
        return view('pages.people.candidates.candidatesAdd', [
            'title' => $title,
            'citizenships' => $citizenships,
            'nations' => $nations,
            'tags' => $tags,
            'statuses' => $statuses
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $person = Person::create($this->personDataMergerCreate($request));
        $pid = $person->id;
        $tags = $request->input('tags');
        if($tags != null){
            foreach($tags as $tag){
                PersonTag::create([
                    'people_id' => $pid,
                    'tag_id' => $tag
                ]);
            }
        }
        $this->permitsCreate($request, $pid);
        $users = User::all()->where('subscriptions_id', '=', Auth::user()->subscriptions_id);
        $fullname = $request->input('firstname') . ' ' . $request->input('surname');
        Notification::send($users, new RecentActivity($person, Auth::user(), 'candidate.create'));
        return redirect(route('candidates.edit', $pid))->with('success', __('messages.person_added', ['person' => $fullname]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function permitsCreate(Request $request, string $pid)
    {
        if(!(empty($request->input('idnumber')))){
            Permit::create([
                'name' => $request->input('idnumber'),
                'type_id' => '1',
                'people_id' => $pid,
                'issued_on' => $request->input('id_issued_on'),
                'expires_on' => $request->input('id_expires_on'),
                'issued_by' => $request->input('id_issued_by')
            ]);
        }
        if(!(empty($request->input('passport')))){
            Permit::create([
                'name' => $request->input('passport'),
                'type_id' => '2',
                'people_id' => $pid,
                'issued_on' => $request->input('passport_issued_on'),
                'expires_on' => $request->input('passport_expires_on'),
                'issued_by' => $request->input('passport_issued_by')
            ]);
        }
        if(!(empty($request->input('visa')))){
            Permit::create([
                'name' => $request->input('visa'),
                'type_id' => '3',
                'people_id' => $pid,
                'issued_on' => $request->input('visa_issued_on'),
                'expires_on' => $request->input('visa_expires_on'),
                'issued_by' => $request->input('visa_issued_by')
            ]);
        }
        if(!(empty($request->input('rescard')))){
            Permit::create([
                'name' => $request->input('rescard'),
                'type_id' => '4',
                'people_id' => $pid,
                'issued_on' => $request->input('rescard_issued_on'),
                'expires_on' => $request->input('rescard_expires_on'),
                'issued_by' => $request->input('rescard_issued_by')
            ]);
        }
        if(!(empty($request->input('dlicense')))){
            Permit::create([
                'name' => $request->input('dlicense'),
                'type_id' => '5',
                'people_id' => $pid,
                'issued_on' => $request->input('dlicense_issued_on'),
                'expires_on' => $request->input('dlicense_expires_on'),
                'issued_by' => $request->input('dlicense_issued_by')
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function requestViews(Request $request)
    {
        $data = [
            'fullname' => $request->fullname,
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'surname' => $request->surname,
            'f_name' => $request->f_name,
            'm_name' => $request->m_name,
            'sex' => $request->sex,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'citizenship' => $request->citizenship,
            'nationality' => $request->nationality,
            'notes' => $request->notes,
            'status' => $request->status,
            'nin' => $request->nin,
            'nin2' => $request->nin2,
            'tin' => $request->tin,
            'residence_address' => $request->residence_address,
            'mailing_address' => $request->mailing_address,
            'contact_numbers' => $request->contact_numbers,
            'actions' => $request->actions
        ];
        Session::put('dataView', $data);
        return redirect(route('candidates.index'));
    }

    public static function updateViews()
    {
        return [
            'fullname' => 'on',
            'firstname' => null,
            'secondname' => null,
            'surname' => null,
            'f_name' => null,
            'm_name' => null,
            'sex' => 'on',
            'birthdate' => 'on',
            'birthplace' => null,
            'citizenship' => null,
            'nationality' => null,
            'notes' => null,
            'status' => 'on',
            'nin' => null,
            'nin2' => null,
            'tin' => null,
            'residence_address' => null,
            'mailing_address' => null,
            'contact_numbers' => null,
            'actions' => 'on',
            
        ];

    }
    public function loadColumnNames()
    {
        return [
            'fullname',
            'firstname',
            'secondname',
            'surname',
            'f_name',
            'm_name',
            'sex',
            'birthdate',
            'birthplace',
            'citizenship',
            'nationality',
            'notes',
            'status',
            'nin',
            'nin2',
            'tin',
            'residence_address',
            'mailing_address',
            'contact_numbers',
            'actions'
        ];
    }
   
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function personDataMergerCreate(Request $request){
        return [
        'type' => 0,
        'firstname' => $request->input('firstname'),
        'secondname' => $request->input('secondname'),
        'surname' => $request->input('surname'),
        'f_name' => $request->input('f_name'),
        'm_name' => $request->input('m_name'),
        'sex' => $request->input('sex'),
        'birthdate' => $request->input('birthdate'),
        'birthplace' => $request->input('birthplace'),
        'citizenships_id' => $request->input('citizenship'),
        'nations_id' => $request->input('nationality'),
        'notes' => $request->input('notes'),
        'created_by' => Auth::user()->id,
        'last_editor' => Auth::user()->id,
        'status_id' => $request->input('status'),
        'nin' => $request->input('nin'),
        'nin2' => $request->input('nin2'),
        'tin' => $request->input('tin'),
        'company_id' => Session::get('currentCompany')->id,
        'res_country' => $request->input('res_country'),
        'mail_country' => $request->input('mail_country'),
        'res_street' => $request->input('res_street'),
        'mail_street' => $request->input('mail_street'),
        'res_flat' => $request->input('res_flat'),
        'mail_flat' => $request->input('mail_flat'),
        'res_postal' => $request->input('res_postal'),
        'mail_postal' => $request->input('mail_postal'),
        'res_mailbox' => $request->input('res_mailbox'),
        'mail_mailbox' => $request->input('mail_mailbox'),
        'res_place' => $request->input('res_place'),
        'mail_place' => $request->input('mail_place'),
        'res_district' => $request->input('res_district'),
        'mail_district' => $request->input('mail_district'),
        'res_commune' => $request->input('res_commune'),
        'mail_commune' => $request->input('mail_commune'),
        'phone' => $request->input('phone'),
        'phone_notes' => $request->input('phone_notes'),
        'email' => $request->input('email'),
        'email_notes' => $request->input('email_notes'),
        'viber' => $request->input('viber'),
        'viber_notes' => $request->input('viber_notes'),
        'telegram' => $request->input('telegram'),
        'telegram_notes' => $request->input('telegram_notes'),
        'whatsapp' => $request->input('whatsapp'),
        'whatsapp_notes' => $request->input('whatsapp_notes'),
        'other_contact' => $request->input('other_contact'),
        'other_contact_notes' => $request->input('other_contact_notes'),
        ];
    }

   /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function personDataMergerUpdate(Request $request){
        return [
        'firstname' => $request->input('firstname'),
        'secondname' => $request->input('secondname'),
        'surname' => $request->input('surname'),
        'f_name' => $request->input('f_name'),
        'm_name' => $request->input('m_name'),
        'sex' => $request->input('sex'),
        'birthdate' => $request->input('birthdate'),
        'birthplace' => $request->input('birthplace'),
        'citizenships_id' => $request->input('citizenship'),
        'nations_id' => $request->input('nationality'),
        'notes' => $request->input('notes'),
        'last_editor' => Auth::user()->id,
        'status_id' => $request->input('status'),
        'nin' => $request->input('nin'),
        'nin2' => $request->input('nin2'),
        'tin' => $request->input('tin'),
        'res_country' => $request->input('res_country'),
        'mail_country' => $request->input('mail_country'),
        'res_street' => $request->input('res_street'),
        'mail_street' => $request->input('mail_street'),
        'res_flat' => $request->input('res_flat'),
        'mail_flat' => $request->input('mail_flat'),
        'res_postal' => $request->input('res_postal'),
        'mail_postal' => $request->input('mail_postal'),
        'res_mailbox' => $request->input('res_mailbox'),
        'mail_mailbox' => $request->input('mail_mailbox'),
        'res_place' => $request->input('res_place'),
        'mail_place' => $request->input('mail_place'),
        'res_district' => $request->input('res_district'),
        'mail_district' => $request->input('mail_district'),
        'res_commune' => $request->input('res_commune'),
        'mail_commune' => $request->input('mail_commune'),
        'phone' => $request->input('phone'),
        'phone_notes' => $request->input('phone_notes'),
        'email' => $request->input('email'),
        'email_notes' => $request->input('email_notes'),
        'viber' => $request->input('viber'),
        'viber_notes' => $request->input('viber_notes'),
        'telegram' => $request->input('telegram'),
        'telegram_notes' => $request->input('telegram_notes'),
        'whatsapp' => $request->input('whatsapp'),
        'whatsapp_notes' => $request->input('whatsapp_notes'),
        'other_contact' => $request->input('other_contact'),
        'other_contact_notes' => $request->input('other_contact_notes'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Person::findOrFail($id);
        $currCompany = Session::get('currentCompany');
        $companies = Session::get('companies');
        if($currCompany->id != $candidate->company_id){
            foreach ($companies as $company){
                if($company->id == $currCompany->id){
                    Session::put('currentCompany', $company);
                }
            }
        }
        $title = $candidate->surname . ' ' . $candidate->firstname . '-' . $this->candidatesLabel;
        $lastEditor = User::findOrFail($candidate->last_editor);
        $createdBy = User::findOrFail($candidate->created_by);
        $tags = Tag::all();
        $citizenships = Citizenships::all();
        $nations = Nations::all();
        $statuses = Status::all()->where('type', '=', '0');
        return view('pages.people.candidates.candidatesEdit', [
            'candidate' => $candidate,
            'lastEditor' => $lastEditor,
            'createdBy' => $createdBy,
            'title' => $title,
            'citizenships' => $citizenships,
            'nations' => $nations,
            'tags' => $tags,
            'statuses' => $statuses
         ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::all()->where('subscriptions_id', '=', Auth::user()->subscriptions_id);
        $candidateObj = Person::findOrFail($id);
        $fullname = $candidateObj->firstname . ' ' . $candidateObj->surname;
        $candidateObj->update($this->personDataMergerUpdate($request));
        Notification::send($users, new RecentActivity($candidateObj, Auth::user(), 'candidate.edit'));
        return redirect(route('candidates.edit', $id))->with('success', __('messages.person_edited', ['person' => $fullname]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::findOrFail($id)->delete();
        return redirect()->back();
    }


}
