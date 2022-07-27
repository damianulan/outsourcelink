<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Misc extends Controller
{
    // public function getSerialNumber(string $type): string
    // {
    //     $lastUsedSerialNumber = DB::table('people')->select('serial')->orderByDesc('serial')->first();
    //     // explode by - so you have your tho sequences of the number
    //     if(empty($lastUsedSerialNumber)){
    //         $lastUsedSerialNumber = "CCC-AAA-0000";
    //     }
    //     else{
    //         $parts = explode('-', $lastUsedSerialNumber->serial);

    //         if ((int) $parts[2] === 9999) {
    //           $parts[1] = $parts[1]++;
    //           $parts[2] = 0000;
    //         }
    //         if ((int) $parts[2] < 9999) {
    //            $parts[2] = str_pad(++$parts[2], 3, '0', STR_PAD_LEFT);
    //         }
    //         $lastUsedSerialNumber = $parts[0] . '-' . $parts[1] . '-' . $parts[2];
    //     }
    //     return $lastUsedSerialNumber;
    // }

    //public function getLastPersonId
}
