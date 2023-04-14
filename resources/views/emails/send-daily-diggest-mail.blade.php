<x-mail::message>
# Your internships feed for: {{ \Carbon\Carbon::parse(today())->format('M d, Y') }}

<p class="text-center">Jobs are based on your subscriptions, profile, and activity on Intern Hub</p>

---
@forelse ($job_list as $jobs)
@forelse ($jobs as $job)
## [{{ $job['title'] }}]({{ $job['url'] }})

@forelse (\App\Models\Opportunity::findorfail($job['pivot']['opportunity_id'])->categories as $category)
<p style="font-size: 0.8rem; background-color: #e2e8f0; padding: 0.2rem 0.4rem; display: inline-block; border-radius: 5px; margin-bottom: 2em">{{ $category->name }}</p>
@empty
@endforelse

@empty
@endforelse
@empty

@endforelse

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
