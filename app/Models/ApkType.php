<?php


// app/Models/ApkType.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApkType extends Model
{
    protected $fillable = ['name', 'description'];

    public function apks()
    {
        return $this->hasMany(Apk::class);
    }
}