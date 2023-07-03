@php
    //Set default timezone
    date_default_timezone_set('Asia/Singapore');
    
    // Get the current timestamp
    $timestamp = time();
    
    // Get the English day name using the 'l' format specifier
    $englishDay = date('l', $timestamp);
@endphp

@if (Session::get('locale') == 'id')
    @php
        $dayTranslations = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];
        
        // Translate the English day name to Indonesian
        $indonesianDay = $dayTranslations[$englishDay];
        
        // Format the date using the desired format
        session(['date' => $indonesianDay . ', ' . date('d-m-y H:i:s', $timestamp)]);
    @endphp
@elseif (Session::get('locale') == 'en')
    @php
        // Format the date using the desired format
        session(['date' => $englishDay . ', ' . date('d-m-y H:i:s', $timestamp)]);
    @endphp
@endif
