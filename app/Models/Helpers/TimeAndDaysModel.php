<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Model;

class TimeAndDaysModel extends Model
{
    static public function convertTimeToFloat($time){
        $parts = explode(':', $time);
        return $parts[0] + floor(($parts[1]/60)*100) / 100;
    }

    static public function getFirstDayOfMonth($month, $year){
        $current_month = \Carbon\Carbon::now()->month;
        $difference = $current_month - $month;
        $start = \Carbon\Carbon::now()->startOfMonth()->modify('-'.$difference.' month')->toDateString();
        $start = str_replace(\Carbon\Carbon::now()->year, '20'.$year, $start);

        return $start;
    }

    static public function getLastDayOfMonth($month, $year){
        $current_month = \Carbon\Carbon::now()->month;
        $difference = $current_month - $month;
        $end = \Carbon\Carbon::now()->startOfMonth()->modify('-'.$difference.' month')->endOfMonth()->toDateString();
        $end = str_replace(\Carbon\Carbon::now()->year, '20'.$year, $end);

        return $end;
    }

    static public function getDayByDate($date){
        $date = strtotime($date);
        return date('D', $date);
    }

    static public function getDayCodeByDate($date){
        $date = strtotime($date);
        if(date('D', $date) == 'Mon'){ return 1; }
        elseif(date('D', $date) == 'Tue'){ return 2; }
        elseif(date('D', $date) == 'Wed'){ return 3; }
        elseif(date('D', $date) == 'Thu'){ return 4; }
        elseif(date('D', $date) == 'Fri'){ return 5; }
        elseif(date('D', $date) == 'Sat'){ return 6; }
        elseif(date('D', $date) == 'Sun'){ return 7; }
    }

    static public function getDayCodeByDay($day){
        if($day == 'Mon'){ return 1; }
        elseif($day == 'Tue'){ return 2; }
        elseif($day == 'Wed'){ return 3; }
        elseif($day == 'Thu'){ return 4; }
        elseif($day == 'Fri'){ return 5; }
        elseif($day == 'Sat'){ return 6; }
        elseif($day == 'Sun'){ return 7; }
    }

    static public function getDatesAndDaysByMonthAndYear($month, $year){
        $start_date = "01-".$month."-".$year;
        $start_time = strtotime($start_date);

        $end_time = strtotime("+1 month", $start_time);

        for($i=$start_time; $i<$end_time; $i+=86400)
        {
            $list[] = explode(' ', date('d D', $i));
        }

        return $list;
    }

    static public function getDatesAndDaysByMonthYearAndDay($month, $year, $day){
        $start_date = "01-".$month."-".$year;
        $start_time = strtotime($start_date);
        $list = [];

        $end_time = strtotime("+1 month", $start_time);

        for($i=$start_time; $i<$end_time; $i+=86400)
        {
            $date_day = explode(' ', date('d D', $i));
            if(self::getDayCodeByDay($date_day[1]) == $day){
                $list[] = $date_day;
            }
        }

        return $list;
    }

    static public function getDatesByMonthAndYear($month, $year){
        $start_date = "01-".$month."-".$year;
        $start_time = strtotime($start_date);

        $end_time = strtotime("+1 month", $start_time);

        for($i=$start_time; $i<$end_time; $i+=86400)
        {
            $list[] = explode(' ', date('d', $i))[0];
        }

        return $list;
    }
}
