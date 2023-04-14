<x-mail::message>

<h2 style="text-align: center; font-size: 1.2em: font-weight: 700; color: black">Your job feed for</h2>
<h2 style="text-align: center; font-size: 1.2em: font-weight: 400;">{{ \Carbon\Carbon::parse(today())->format('M d, Y') }}</h2>

<p style="text-align: center; font-size: 1em">Jobs are based on your subscriptions</p>

<div style="border-top: 1px solid lightgray; margin-bottom: 2em"></div>

@forelse ($job_list as $job)

## [{{ $job['title'] }}]({{ $job['url'] }})

@forelse (\App\Models\Opportunity::findorfail($job['id'])->categories as $category)
<p style="font-size: 0.8rem; background-color: #e2e8f0; padding: 0.2rem 0.4rem; display: inline-block; border-radius: 5px; margin-bottom: 2em">{{ $category->name }}</p>
@empty
@endforelse

@empty
@endforelse


<p style="font-size: 0.8em; text-align: center">You can <a href="{{ route('unsubscribe', ['email' => $email]) }}">unsubscribe here</a> to stop receiving these emails.</p>

</x-mail::message>
