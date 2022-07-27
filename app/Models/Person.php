<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;
use App\Models\PersonTag;


class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'people';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    protected $fillable = [
    'type',
    'firstname',
    'secondname',
    'surname',
    'f_name',
    'm_name',
    'sex',
    'birthdate',
    'birthplace',
    'citizenships_id',
    'nations_id',
    'notes',
    'created_by',
    'last_editor',
    'status_id',
    'nin',
    'nin2',
    'tin',
    'company_id',
    'res_country',
    'mail_country',
    'res_street',
    'mail_street',
    'res_flat',
    'mail_flat',
    'res_postal',
    'mail_postal',
    'res_mailbox',
    'mail_mailbox',
    'res_place',
    'mail_place',
    'res_district',
    'mail_district',
    'res_commune',
    'mail_commune',
    'phone',
    'phone_notes',
    'email',
    'email_notes',
    'viber',
    'viber_notes',
    'telegram',
    'telegram_notes',
    'whatsapp',
    'whatsapp_notes',
    'other_contact',
    'other_contact_notes',
    'created_at'
];
    protected $dates = [ 'deleted_at' ];


    /* The roles that belong to the Person
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, PersonTag::class);
    }

}
