<?php

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
    $dayFormat = \Carbon\Carbon::createFromFormat(
        'Y-m-d H:i:s',
        $data
    );
    $dayFormat->locale('id');
    $dayName = $dayFormat->format('l');
    $date_split = explode(
        ' ',
        $data
    );

    $date = explode('-', $date_split[0]);

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
    $date_split = explode(
        ' ',
        $data
    );

    $date = explode('-', $date_split[0]);

    $text_date = "{$date[2]} {$bulan[$date[1]]} {$date[0]}";

    return $text_date;
}
