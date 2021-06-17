<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlgUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'name',
        'surname',
        'position',
        'company_id',
        'ccode',
        'role',
        'email',
    ];
}
