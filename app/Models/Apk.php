<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apk extends Model
{
    protected $fillable = [
        'name',
        'description',
        'apk_type_id',
        'package_name',
        'version',
        'file_path'
    ];

    public function type()
    {
        return $this->belongsTo(ApkType::class, 'apk_type_id');
    }
}
