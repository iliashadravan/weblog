<?php

function div($a, $b) {
    return (int) ($a / $b);
}

function gregorian_to_jalali($gy, $gm, $gd, $mod = '') {
    $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    if ($gy > 1600) {
        $jy = 979;
        $gy -= 1600;
    } else {
        $jy = 0;
        $gy -= 621;
    }

    $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
    $days = (365 * $gy) + (div($gy2 + 3, 4)) - (div($gy2 + 99, 100)) + (div($gy2 + 399, 400)) - 80 + $gd + $g_d_m[$gm - 1];
    $jy += 33 * (div($days, 12053));
    $days %= 12053;
    $jy += 4 * (div($days, 1461));
    $days %= 1461;

    if ($days > 365) {
        $jy += div($days - 1, 365);
        $days = ($days - 1) % 365;
    }

    if ($days < 186) {
        $jm = 1 + div($days, 31);
        $jd = 1 + ($days % 31);
    } else {
        $jm = 7 + div($days - 186, 30);
        $jd = 1 + (($days - 186) % 30);
    }

    return ($mod === '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd;
}

function jalali_date($format, $timestamp = null) {
    if ($timestamp === null) {
        $timestamp = time();
    }


    list($gy, $gm, $gd) = explode('-', date('Y-m-d', $timestamp));
    list($jy, $jm, $jd) = gregorian_to_jalali($gy, $gm, $gd);

    $keys = array(
        'Y' => $jy,
        'm' => str_pad($jm, 2, '0', STR_PAD_LEFT),
        'd' => str_pad($jd, 2, '0', STR_PAD_LEFT),
        'H' => date('H', $timestamp),
        'i' => date('i', $timestamp),
        's' => date('s', $timestamp),
    );

    $output = '';
    for ($i = 0; $i < strlen($format); $i++) {
        $output .= isset($keys[$format[$i]]) ? $keys[$format[$i]] : $format[$i];
    }

    return $output;
}
?>
