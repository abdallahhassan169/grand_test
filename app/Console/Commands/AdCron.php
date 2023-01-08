<?php

namespace App\Console\Commands;
use App\Models\Advertise;
use App\Models\Adverister;
use Mail;
use \Carbon\Carbon;
use App\Mail\AdReminder;
use Illuminate\Console\Command;

class AdCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send reminder to clients ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tomorrow=Carbon::tomorrow();
        $ads=Advertise::whereDay('start_date', '=', $tomorrow)->get();
        
        foreach($ads as $key => $ad)
        {
            $adverister=$ad->adverister;
            $email = $adverister->email;
            Mail::to($email)->send(new AdReminder($adverister));
        }    }
}
