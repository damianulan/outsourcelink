<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class PagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    //App Pages

    public function sysSettings() {
        $title = __('pages.sys_settings');
        return view('pages.settings.system.index', [
            'title' => $title,
        ]);
    }

}
