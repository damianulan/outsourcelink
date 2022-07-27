<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonTag extends Model
{
    use HasFactory;

    protected $table = 'person_tags';
    protected $primaryKey = 'id';
    protected $fillable = ['people_id', 'tag_id'];
    public $timestamps = false;
}
