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
        //
        'regdate',
        'regenddate',
        //
        'patentserie',
        'patentnumber',
        'patentdate',
        'patentenddate',
        'patentnextpaydate',
        //
        'polisnumber',
        'poliscompany',
        'polisdate',
        'polisenddate',
        //
        'dateinwork',
        'dateoutwork',
        //'created_at',
        //'updated_at',
    ];

    protected static $monitored_dates = [
        'regdate',
        'regenddate',
        'patentdate',
        'patentenddate',
        'patentnextpaydate',
        'polisdate',
        'polisenddate',
        'dateoutwork',
    ];

    protected static $acceptable_days_before_expiration = 1;

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }

    public function isNearExpiry(string $date_column_name) : bool
    {
        if (in_array($date_column_name, self::$monitored_dates, true)) {
            $date = $this->{$date_column_name};
            if (!empty($date)) {
                $date = (new \Carbon\Carbon($date))->setTime(0, 0, 0);
                $diff = $date->diffInDays('now', false);
                return ($diff >= 0 && $diff <= self::$acceptable_days_before_expiration);
            }
        }
        return false;
    }

    public function hasAnyDatesNearExpire() : bool
    {
        foreach (self::$monitored_dates as $date_column_name) {
            if ($this->isNearExpiry($date_column_name)) {
                return true;
            }
        }
        return false;
    }
}
