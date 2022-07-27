<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'subscription';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
        ];
    public $timestamps = true;
}
