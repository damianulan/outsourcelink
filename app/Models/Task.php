<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $primaryKey = 'id';


    protected $fillable = [
    'title',
    'content',
    'target',
    'added_by',
    'linked',
    'status_id'
    ];

    public $timestamps = true;

    protected $dates = [ 'deleted_at' ];
}
