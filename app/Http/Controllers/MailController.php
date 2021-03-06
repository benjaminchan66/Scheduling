<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Jobs\SendAgreeShiftExchangeMail;
use App\Jobs\SendApplyShiftExchangeMail;
use App\Jobs\SendDenyShiftExchangeMail;
use App\Jobs\SendShiftExchangeMail;
use App\Jobs\SendShiftExchangingInformMail;

// 僅供信件發送測試用
class MailController extends Controller
{
    
    // 排班人員換班後通知被換班的兩位醫師
    public function sendShiftExchangeMail() {
        
        $job = new SendShiftExchangeMail('台北白班發燒1', '淡水夜班發燒1');
        
        dispatch($job);
        
        echo '郵件已送出';
    }
    
    // 醫師A向醫師B提出換班申請時，以電子郵件通知
    public function applyShiftExchanging() {
        $applicant = 'George';
        $receiver = 'Mario';
        
        $job = new SendApplyShiftExchangeMail($applicant, $receiver, 'georgelesliemackay0@gmail.com');
        
        dispatch($job);
        
        echo '郵件已送出';
    }
    
    // 醫師B同意換班後以電子郵件通知醫師A
    public function agreeShiftExchanging() {
        $applicant = 'George';
        $receiver = 'Mario';
        
        $job = new SendExchangingSuccessMail($applicant, $receiver, 'georgelesliemackay0@gmail.com');
        
        dispatch($job);
        
        echo '郵件已送出';
    }
    
    // 醫師B拒絕換班後以電子郵件通知醫師A
    public function rejectShiftExchanging() {
        $applicant = 'George';
        $receiver = 'Mario';
        
        $job = new SendExchangingFailedMail($applicant, $receiver, 'georgelesliemackay0@gmail.com');
        
        dispatch($job);
        
        echo '郵件已送出';
    }
    
    // 通知排班人員醫師A以及醫師B已同意換班
    public function shiftExchangingInform() {
        
    }
}
