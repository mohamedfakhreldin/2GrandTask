<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\ReminderMail;
use App\Models\Advertisement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAdvertisementsReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminderemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails to advertisers who have advertisements will publish next day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $advertisers = User::with('advertisements')
        ->whereHas('advertisements',function($query){
            return $query->whereDate('start_date',now()->tomorrow()->toDateString());
         })->get();
          foreach ($advertisers as $advertiser) {
            Mail::to($advertiser->email)->send(new ReminderMail($advertiser));
        }

     return 'Emails has been set successfully';

    }
}
