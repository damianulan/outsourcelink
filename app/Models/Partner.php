<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company', 
         'name',
         'surname',
         'address',
         'phone',
         'email',
         'other',
         'notes'
        ];
    public $timestamps = true;
}
