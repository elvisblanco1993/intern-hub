<?php

namespace App\Jobs;

use App\Models\Subscriber;
use App\Models\Opportunity;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use App\Mail\SendDailyDiggestMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendDailyDiggestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $job_list = [];
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = Subscriber::groupBy('email')->get();

        foreach ($subscribers as $subscriber) {
            $email_address = $subscriber->email;
            $full_name = $subscriber->name;
            foreach ($subscriber->categories as $category) {
                $jobs = $category->opportunities()->select('title', 'url')->whereNull('closed_at')->distinct()->get()->toArray();
                // $jobs = Opportunity::select('title', 'url')->where('category', 'like', '%' . $category->name . '%')
                //     ->whereNull('closed_at')
                //     ->whereBetween('created_at', [
                //         now()->subDay()->startOfDay(),
                //         now()->subDay()->endOfDay()
                //     ])
                //     ->get()->toArray();
                // if ( array_intersect($jobs, $this->job_list) ) {
                // }
                if (count($this->job_list) > 0) {
                    $indices = [];
                    foreach ($this->job_list as $item) {
                        array_push($indices, $item[0]['pivot']['opportunity_id']);
                        foreach($jobs as $job) {
                            if(!in_array($job['pivot']['opportunity_id'], $indices)) {
                                array_push($this->job_list, $jobs);
                            }
                        }
                    }
                } else {
                    array_push($this->job_list, $jobs);
                }
            }

            if (count($this->job_list) > 0) {
                Mail::to($email_address)->send(new SendDailyDiggestMail($this->job_list));
            }
        }
    }
}
