<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function partyDetail()
    {
        return $this->hasMany(PartyDetail::class);
    }
    public function oppositParty()
    {
        return $this->hasMany(OppositParty::class);
    }
    public function informToParty()
    {
        return $this->hasMany(InformToParty::class);
    }
    public function caseType()
    {
        return $this->hasMany(CaseType::class);
    }
}
