<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyShiftExchange extends Mailable
{
    use Queueable, SerializesModels;
    
    // 醫師向其他醫師提出換班申請通知信件
    protected $applicant = '';
    protected $receiver = '';
    
    // formal
    protected $receiver;
    protected $applicant;
    protected $applicantShift;
    protected $receiverShift;
    protected $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver, $applicant, $applicantShift, $receiverShift, $admin)
    {
        //
        $this->receiver = $receiver;
        $this->applicant = $applicant;
        $this->applicantShift = $applicantShift;
        $this->receiverShift = $$receiverShift;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('【馬偕醫院】換班申請確認')
            ->markdown('emails.applyShiftExchange', [
                'receiverName' => $this->receiver->name,
                'applicant' => $this->applicant,
                'applicantShift' => $this->applicantShift,
                'receiverShift' => $this->receiverShift,
                'admin' => $this->admin
            ]);
    }
}
