<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Opportunities</h2>
            </div>
        </div>
    </header>

    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-input type="search" wire:model="query" placeholder="Search by position name" />
        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Position name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>
                    <th scope="col" class="sr-only">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($opportunities as $opportunity)
                        <tr class="bg-white border-b hover:bg-gray-50" data-href="{{ $opportunity->url }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><a href="{{ $opportunity->url }}" target="_blank">{{ $opportunity->title }}</a></th>
                            <td class="px-6 py-4"><a href="{{ $opportunity->url }}" target="_blank">{{ Carbon\Carbon::parse($opportunity->created_at)->format('M d, Y') }}</a></td>
                            <td class="px-6 py-4"><a href="{{ $opportunity->url }}" target="_blank">{{ $opportunity->category }}</a></td>
                            <td class="px-6 py-4"><a href="{{ $opportunity->url }}" target="_blank">{{ $opportunity->location }}</a></td>
                            <td class="flex items-center px-6 py-4 space-x-3">
                                @livewire('website.subscriber.create', ['category' => $opportunity->category], key('subscribe.' . $opportunity->id))
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
