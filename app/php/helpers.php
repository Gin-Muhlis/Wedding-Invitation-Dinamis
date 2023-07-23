<?php

use Illuminate\Support\Carbon;

function makeTextDate($data)
{
    $day = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];
    $bulan = [
        '01' => 'Januari',
        '02' => 'Febuari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'Novermber',
        '12' => 'Desember',
    ];
    $dayFormat = Carbon::createFromFormat(
        'Y-m-d',
        $data
    );
    $dayFormat->locale('id');
    $dayName = $dayFormat->format('l');

    $date = explode('-', $data);

    $text_date = "{$day[$dayName]}, {$date[2]} {$bulan[$date[1]]} {$date[0]}";

    return $text_date;
}

function makeTextTime($data)
{
    $timesplit = explode(':', $data);
    $time = array_slice($timesplit, 0, 2);
    $textTime = implode(':', $time);

    return $textTime;
}

function generateDate($data)
{
    $bulan = [
        '01' => 'Januari',
        '02' => 'Febuari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'Novermber',
        '12' => 'Desember',
    ];

    $date = explode('-', $data);

    $text_date = "{$date[2]} {$bulan[$date[1]]} {$date[0]}";

    return $text_date;
}

function getTimeAgo($time)
{
    $carbonTimestamp = Carbon::createFromTimestamp($time);
    $diffTimestamp = $carbonTimestamp->diffInSeconds(Carbon::now());

    if ($diffTimestamp < 60) {
        return 'just now';
    } else if ($diffTimestamp < 3600) {
        return floor($diffTimestamp / 60) . ' minutes ago';
    } else if ($diffTimestamp < 86400) {
        return floor($diffTimestamp / 3600) . ' hours ago';
    } else if ($diffTimestamp < 2592000) {
        return floor($diffTimestamp / 86400) . ' days ago';
    } else if ($diffTimestamp < 31536000) {
        return floor($diffTimestamp / 2592000) . ' months ago';
    } else {
        return floor($diffTimestamp / 31536000) . ' years ago';
    }
}
