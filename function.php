<?php

//施設検索ボタン設置用定数
const FACILITYITEMS = [
    'sauna' => "サウナ",
    'coldspa' => "水風呂",
    'openspa' => "露天風呂",
    'sodaspa' => "炭酸泉",
    'parking' => "駐車場",
    'restaurant' => "お食事処",
    'restroom' => "休憩処",
    'comic' => "漫画コーナー",
    'salon' => "アカスリ/エステ",
    'wifi' => "Wi-Fiフリー",
];

//定休日出力用定数
const WEEK_MON = 1 << 6;
const WEEK_TUE = 1 << 5;
const WEEK_WED = 1 << 4;
const WEEK_THU = 1 << 3;
const WEEK_FRI = 1 << 2;
const WEEK_SAT = 1 << 1;
const WEEK_SUN = 1;
const WEEK_NONE = 0;


//営業ステータス出力
function sentoStatus($holiday,$opentime,$closetime):string {
    $status　= null;
    $date = new DateTime();
    $weekIndex = $date ->format('w');
    $todayWeek = array( "日", "月", "火", "水", "木", "金", "土" );
    $todayTime = $date ->format('H:i');
    $holiday = mb_substr( $holiday , 0 , mb_strlen($holiday)-2 );
    //定休日判定
    if( mb_strpos($holiday, $todayWeek[$weekIndex]) !== false){
        $status = '<div class="status status-holiday">定休日</div>';
    }
    //営業状況判定
    if(empty($status)){
        if($opentime <= $todayTime && $todayTime <= $closetime){
            $status = '<div class="status status-open">営業中</div>';
        }else{
            $status = '<div class="status status-close">準備中</div>';
        }
    }
    return $status;
}

//施設検索ボタン設置用定数
function facilityLinks(array $sento) :string {
    $html = null;
    foreach (FACILITYITEMS as $key => $name){
        if ($sento[search_.$key]){
            $html .= "<a href=\"result.php?search-items[]={$key}\" class=\"s-btn s-btn-blue\">$name</a>";
        }
    }
    return $html;
}

//定休日出力（ビット ⇒ 曜日に変換）
function toHoliday($flags):string {
    $holiday = null;
    $flags = bindec($flags);
    if(($flags | WEEK_NONE) == 0){
        $holiday .= "不定休";
    }else{
        if(($flags & WEEK_MON) != 0){ $holiday .= "月"; }
        if(($flags & WEEK_TUE) != 0){ $holiday .= "火"; }
        if(($flags & WEEK_WED) != 0){ $holiday .= "水"; }
        if(($flags & WEEK_THU) != 0){ $holiday .= "木"; }
        if(($flags & WEEK_FRI) != 0){ $holiday .= "金"; }
        if(($flags & WEEK_SAT) != 0){ $holiday .= "土"; }
        if(($flags & WEEK_SUN) != 0){ $holiday .= "日"; }
        $holiday .="曜日";
    }
    return $holiday;
}

