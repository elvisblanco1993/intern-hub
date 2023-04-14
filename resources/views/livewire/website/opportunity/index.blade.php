<div>
    <header class="w-full h-96 bg-center bg-no-repeat" style="background-image: url({{ asset('internHub-logo.svg') }})">
        <div class="h-full bg-white/90 backdrop-blur-lg">
            <nav class="max-w-screen-2xl mx-auto h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
                <a href="/">
                    <img src="{{ asset('internHub-logo.svg') }}" alt="{{ config('app.name') }}" class="h-8 w-auto">
                </a>

                <div class="flex items-center space-x-4 text-sm font-medium">
                    <a href="{{ route('register') }}"
                        class="inline-block border border-intern bg-intern  text-white px-4 py-1.5 rounded-full hover:bg-transparent hover:text-intern transition-all">Post
                        a Job</a>
                </div>
            </nav>

            <div class="max-w-5xl mx-auto h-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-5xl font-extrabold">Find your dream internship</h1>
                    <p class="mt-6 text-lg font-medium max-w-3xl">Join our thriving community of aspiring tech
                        professionals and unlock your potential with the best internships and jobs in the industry.</p>
                </div>
            </div>
        </div>
    </header>

    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <x-input type="search" wire:model="query" placeholder="Search by position name" />

            <div class="flex items-center space-x-4">
                <select wire:model="category"
                    class="border-gray-300 focus:border-orange-500 focus:ring-orange-100 rounded-md shadow-sm">
                    <option value="">Filter</option>
                    @foreach (\App\Models\Category::get() as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @livewire('website.subscriber.create')
            </div>
        </div>

        <div class="mt-12">
            @foreach ($opportunities as $opportunity)
                <a href="{{ $opportunity->url }}" target="_blank" @class([ 'block', 'mt-3' => !$loop->first])>
                    <div class="relative rounded border border-gray-200 px-2 md:px-6 py-5 shadow-sm flex items-center md:space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <div
                            class="flex-shrink-0 mb-2 md:mb-0 md:absolute rounded-full md:p-4 md:bg-white md:shadow-lg md:-left-9">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>

                        <div class=" flex flex-col md:flex-row w-full">
                            <div class="flex-1 min-w-0 px-2 md:pl-6 mb-2 md:mb-0 w-full" style="color:#2d3748;">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm text-gray-500 truncate" style="color:#2d3748;">{{ $opportunity->team->name }}</p>
                                <p class="text-lg font-bold text-gray-900" style="color:#2d3748;">{{ $opportunity->title }}</p>
                                <p class="text-sm text-gray-500 truncate" style="color:#2d3748;">{{ $opportunity->salary }}</p>
                            </div>
                            <div class="flex-none md:flex flex-col md:justify-end text-sm text-gray-500 px-2"
                                style="color:#2d3748;">
                                <div class="flex-none md:flex sm:justify-end">
                                    <div class="flex items-center mr-4 mb-1 md:mb-0 text-sm text-gray-500 truncate"
                                        style="color:#2d3748;">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $opportunity->location }}
                                    </div>
                                    <div class="flex items-center" style="color:#2d3748;">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ Carbon\Carbon::parse($opportunity->created_at)->diffForHumans(null, true, true) }}
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1 md:gap-2 md:justify-end mt-2">
                                    @forelse ($opportunity->categories as $category)
                                        <div class="text-sm border text-gray-700 border-gray-400 px-1 py-0 md:px-2 rounded self-center whitespace-no-wrap">
                                            {{ $category->name }}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
