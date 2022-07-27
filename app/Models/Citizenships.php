<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citizenships extends Model
{
    use HasFactory;

    protected $table = 'citizenships';
    protected $primaryKey = 'id';
}
