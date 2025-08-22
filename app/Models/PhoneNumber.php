<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = [
        'name',
        'telegram',
        'viber',
        'contact_url',
        'description',
    ];
}
