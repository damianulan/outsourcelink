<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    protected $table = 'permits';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
    'name',
    'type_id',
    'people_id',
    'issued_on',
    'expires_on',
    'issued_by'
];
}
