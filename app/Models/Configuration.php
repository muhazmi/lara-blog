<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name', 
        'app_short_name', 
        'address', 
        'phone', 
        'smtp_host', 
        'smtp_username', 
        'smtp_password', 
        'logo', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];
}
