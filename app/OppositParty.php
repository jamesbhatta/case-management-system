<?php

namespace App;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OppositParty extends Model
{
    use HasFactory;
    // protected $guarded=['id'];
    protected $fillable = [
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

    protected static function booted()
    {

        static::creating(function ($OppositParty) {
            $OppositParty->fillAdDates();
        });

        static::updating(function ($OppositParty) {
            $OppositParty->fillAdDates();

        });
    }

    public function getAgeAttribute() {
        return Carbon::parse(bs_to_ad($this->dob))->age;
        // return "hello";
    }


    public function fillAdDates()
    {
        if ($this->dob) {
            $this->dob_ad = bs_to_ad($this->dob);
            
        }
    }
}
