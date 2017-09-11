<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class ScheduleCategory extends Model
{
    //<?php
    protected $table = "ScheduleCategory";

    public function findScheduleName($serial){
    	$name = DB::table('ScheduleCategory')->where("schCategorySerial",$serial)->first();

    	return $name->schCategoryName;
	}

	// 回傳該 schedule category的地點
	 public function getSchCategoryInfo($categorySerial) {
       $location=null;
        if($categorySerial == 1 || $categorySerial == 2 ||
        	$categorySerial == 3|| $categorySerial == 4 ||
			$categorySerial == 5|| $categorySerial == 6 ||
			$categorySerial == 7|| $categorySerial == 8 ||
			$categorySerial == 13|| $categorySerial == 14 ||
			$categorySerial == 15|| $categorySerial == 16 ||
			$categorySerial == 17|| $categorySerial == 18 )
        {

        	$location="Taipei";
		} 
		if($categorySerial == 9 || $categorySerial == 10 ||
        	$categorySerial == 11 || $categorySerial == 12 ||
			$categorySerial == 19|| $categorySerial == 20 ||
			$categorySerial == 21)
		{
        	$location="Tamsui";
		}   
        return $location;
    }
}
