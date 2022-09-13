<?php

class ActivitySevices
{
    public static function calculateRemuneration(
        $value_hour,
        $activity_start_date
    ) {
        $current_date = new DateTime("now");
        $start_date = date_create($activity_start_date);
        $interval = date_diff(
            $start_date,
            $current_date
        );

        $number_of_days_worked = (int) str_replace("+", "", $interval->format('%R%a'));
        $number_of_hours_worked = $number_of_days_worked * 8;
        $amount_receivable = $number_of_hours_worked * $value_hour;

        return number_format($amount_receivable, 2, ",", ".");
    }
}
