<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foreigner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =[
        'company_id',
        'ccode',
        'surname',
        'name',
        'country_id',
        //'regdate',
        //'regenddate',
        'patentserie',
        'patentnumber',
        //'patentdate',
        //'patentenddate',
        //'patentnextpaydate',
        'polisnumber',
        'poliscompany',
        //'polisdate',
        //'polisenddate',
        'dateoutwork',
        //'dateinwork',
    ];
}
