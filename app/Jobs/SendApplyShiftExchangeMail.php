<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use App\Mail\ApplyShiftExchange;

class SendApplyShiftExchangeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    //
    protected $receiver;
    protected $applicant;
    protected $applicantShift;
    protected $receiverShift;
    protected $admin;
    

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->receiver->email)
            ->send(new ApplyShiftExchange($this->applicant, $this->receiver));
    }
}
