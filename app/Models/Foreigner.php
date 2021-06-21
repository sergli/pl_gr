<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foreigner extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'surname',
        'position_id',
        'country_id',
        //'regdate',
        //'regenddate',
//        'patentserie',
//        'patentnumber',
        //'patentdate',
        //'patentenddate',
        //'patentnextpaydate',
//        'polisnumber',
//        'poliscompany',
        //'polisdate',
        //'polisenddate',
//        'dateoutwork',
        //'dateinwork',
        //'created_at',
        //'updated_at',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
