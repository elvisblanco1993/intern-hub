<?php

namespace App\Jobs;

use App\Models\Opportunity;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendDailyDiggestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $job_list;
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
        $subscriptions = Subscriber::groupBy('email')->groupBy('category')->get();

        foreach ($subscriptions as $subscription) {
            // Get the jobs belonging to each categories
            $this->job_list = Opportunity::select('title', 'url', 'location')
                ->whereNotNull('closed_at')
                ->where('category', $subscription->category)
                ->whereBetween('created_at', [
                    now()->subDay()->startOfDay(),
                    now()->subDay()->endOfDay()
                ])->get()
                ->toArray();
        }

        Log::info($this->job_list);
    }
}
