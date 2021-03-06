<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versp extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function personalDetail()
    {
        return $this->hasMany(PersonalDetail::class);
    }
}
