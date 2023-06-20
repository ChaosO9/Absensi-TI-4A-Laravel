<?php
// Array to map English day names to Indonesian day names
$dayTranslations = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
];

//Set default timezone
date_default_timezone_set('Asia/Singapore');

// Get the current timestamp
$timestamp = time();
$_SESSION['session_time'] = date('d-m-y H:i:s', $timestamp);

// Get the English day name using the 'l' format specifier
$englishDay = date('l', $timestamp);

// Translate the English day name to Indonesian
$indonesianDay = $dayTranslations[$englishDay];

// Format the date using the desired format
session(['date' => $indonesianDay . ', ' . date('d-m-y H:i:s', $timestamp)]);
