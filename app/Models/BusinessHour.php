<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getFromAttribute($value){
        return Carbon::parse($value)->format('h:i A');
    }

    public static function getBusinessHour(){
       $businesshours = self::select('day')->where('off', '1')->groupBy('day')->get();

       return $businesshours;
    }

    // public function getTimesPeriodAttribute()
    // {
    //     $times = CarbonInterval::minutes($this->step)->toPeriod($this->from, $this->to)->toArray();

    //     return array_map(function ($time) {

    //         if ($this->day == today()->format('l') &&  !$time->isPast()) {
    //             return $time->format('H:i:s');
    //         }

    //         if ($this->day != today()->format('l')) {
    //             return $time->format('H:i:s');
    //         }

    //     }, $times);
    // }

    
}
