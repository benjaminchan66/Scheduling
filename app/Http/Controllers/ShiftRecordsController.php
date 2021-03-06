<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftRecords;
use Illuminate\Support\Facades\Input;

class ShiftRecordsController extends Controller
{
    //列出所有換班紀錄
    public  function  shiftRecords(){
         $shiftRecords = new ShiftRecords();
         $shiftRecordsData = $shiftRecords->shiftRecordsList();

         return view ("shiftRecords",array('shiftRecords' => $shiftRecordsData));

    } 

    //查詢 單一醫生換班紀錄
    public function getShiftRecordsByDoctorID(){
        $shiftRecords = new ShiftRecords();
        $data = $shiftRecords ->getShiftRecordsByDoctorID();

        return view ("getShiftRecordsByDoctorID",array('data' => $data));
    }

    //新增換班
    public function addShifts(){
    		$addShifts = new ShiftRecords();
    		$scheduleID_1 = Input::get('scheduleID_1');
    		$scheduleID_2 = Input::get('scheduleID_2');
    		$schID_1_doctor = Input::get('schID_1_doctor');
    		$schID_2_doctor = Input::get('schID_2_doctor');
            $created_at = date('Y-m-d:h-m-s'); //????
            $doc2Confirm = 1;
            $adminConfirm = 1;

    		$newShiftSerial = $addShifts->addShifts($scheduleID_1,$scheduleID_2,$schID_2_doctor,$schID_2_doctor,$doc2Confirm,$adminConfirm,$created_at);

    		 return redirect('shiftRecords'); 

    }

    //醫生確認換班
    public function doc2Confirm(){
        $doc2Confirm = Input::get('doc2Confirm');
        $update = new ShiftRecords();
        $serial = Input::get('serial');
        $updatedDoc2Confirm = $update->doc2Confirm($serial,$doc2Confirm);
        
        return redirect('shiftRecords'); 

    }

    //排班人員確認換班
    public function adminConfirm($id){
        $update = new ShiftRecords();
        $adminConfirm = Input::get('adminConfirm');

        $updatedDoc2Confirm = $update->doc2Confirm($id,$adminConfirm);

        return redirect('shiftRecords'); 

    }

     public function getDataByID() {
        $serial = Input::get('serial');

        return view('doctorCheckShift', array('serial' => $serial) );

    }


}
