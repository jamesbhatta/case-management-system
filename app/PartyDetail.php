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
            'dob_ad',
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

    public function cases()
    {
        return $this->hasOne(Cases::class);
    }

    protected static function booted()
    {
        static::creating(function ($partyDetail) {
            $partyDetail->fillAdDates();
        });

        static::updating(function ($partyDetail) {
            $partyDetail->fillAdDates();
        });
    }


    public function fillAdDates()
    {
        if ($this->date) {
            $this->dob_ad = bs_to_ad($this->date);
        }
    }
}
