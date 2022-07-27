<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\PersonTag;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;


    /* The roles that belong to the Person
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, PersonTag::class);
    }
}
