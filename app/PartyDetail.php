<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'cases_id',
        'first_name',
            'middle_name',
            'last_name',
            'dob',
            'age',
            'gender',
            'marrige_status',
            'district',
            'municipality',
            'ward',
            'contact',
            'email',
            'cast',
            'religion',
            'education',
            'disability_status',
            'family_number',
            'disable_family_number',
    ];
}
