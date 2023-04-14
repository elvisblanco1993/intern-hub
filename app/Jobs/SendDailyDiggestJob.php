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
            $subscribed_to_categories = [];

            foreach ($subscriber->categories as $category) {
                array_push($subscribed_to_categories, $category->id);
            }

            $jobs = Opportunity::whereHas('categories', function ($query) use ($subscribed_to_categories) {
                $query->whereIn('category_id', $subscribed_to_categories);
            })
            // ->select('title', 'url')
            ->whereNull('closed_at')
            // ->whereBetween('created_at', [
            //     now()->subDay()->startOfDay(),
            //     now()->subDay()->endOfDay()
            // ])
            ->distinct()->get()->toArray();

            if (count($jobs) > 0) {
                Mail::to($email_address)->send(new SendDailyDiggestMail($email_address, $jobs));
            }
        }
    }
}
