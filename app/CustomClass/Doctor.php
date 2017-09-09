<?php
namespace App\CustomClass;

class Doctor {
    
    private $doctorID = 0; // 醫師ID
    private $major = ''; // 專職科別
    private $totalShifts = 0; // 總班數
    private $dayShifts = 0; // 白天班數
    private $nightShifts = 0; // 夜晚班數
    private $weekendShifts = 0; // 假日班數
    private $location = ''; // 所屬院區
    private $taipeiShiftsLimit = 0; // 在台北院區可上的班數的上限
    private $tamsuiShiftsLimit = 0; // 在淡水院區可上的班數的上限
    private $surgicalShifts = 0; // 外科班數
    private $medicalShifts = 0; // 內科班數
    
    // 以下部分在此類別產生
    private $lostShfits = 0; // 沒選上預約的班的數量
    private $otherLocationShifts = []; // 存放每週在非職登院區上班的班數，當月有幾週就給幾個0
    
    function __construct($doctorDic) {
        $this->doctorID = $doctorDic['doctorID'];
        $this->major = $doctorDic['major'];
        $this->totalShifts = $doctorDic['totalShifts'];
        $this->dayShifts = $doctorDic['dayShifts'];
        $this->nightShifts = $doctorDic['nightShifts'];
        $this->weekendShifts = $doctorDic['weekendShifts'];
        $this->location = $doctorDic['location'];
        $this->taipeiShiftsLimit = $doctorDic['taipeiShiftsLimit'];
        $this->surgicalShifts = $doctorDic['surgicalShifts'];
        $this->medicalShifts = $doctorDic['medicalShifts'];
    }
    
    function printData() {
        echo 'Doctor ID : '.doctorID.'<br>';
        echo '所屬院區 : '.$location.'<br>';
        echo '台北院區上班限制 : '.$taipeiShiftsLimit.'<br>';
        echo '淡水院區上班限制 : '.$tamsuiShiftsLimit.'<br>';
    }
    
    // 計算排班當月有幾週
    private function getWeeksOfMonth() {
        $currentDateStr = date('Y-m-d');
        $dateArr = explode('-', $currentDateStr);
        
        // 將年與月轉換為數字
        $year = (int)$dateArr[0];
        $month = (int)$dateArr[1];
        
        // 調整至排班的月份
        $month = ($month + 1) % 12;
        if($month == 1) {
            $year += 1;
        }
        
        // 計算當月有幾天，取得排班次月第一日後往前推一天
        $theMonthAfter = ($month + 1) % 12;
        $nextMonthFirstDay = '';
        if($theMonthAfter == 1) {
            $nextMonthFirstDay = ($year + 1).'-'.$theMonthAfter.'-01';
        }else {
            $nextMonthFirstDay = $year.'-'.$theMonthAfter.'-01';
        }
        
        $lastDayOfMonth = date('Y-m-d', strtotime($nextMonthFirstDay.'-1 day'));
        $daysOfMonth = (int)(explode('-', $lastDayOfMonth)[2]);
        
        $weekdayOfMonth = [];
        for($i = 1; i <= $daysOfMonth; $i++) {
            $dateStr = '';
            if($i < 10) {
                $dateStr = $year.'-'.$month.'-0'.$i;
            }else {
                $dateStr = $year.'-'.$month.'-'.$i;
            }
            $dateStr = date('N', strtotime($dateStr));
        }
    }
}