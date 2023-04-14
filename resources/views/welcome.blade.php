<x-guest-layout>
    <div class="h-screen bg-cover bg-center" style="background-image: url({{ asset('images/image3.png') }})">
        <div class="h-full w-full backdrop-blur">
            <div class="absolute top-0 z-50 w-full h-16 bg-black/80 backdrop-blur text-white">
                <nav class="max-w-screen-2xl mx-auto h-full flex items-center justify-between px-4 sm:px-6 lg:px-8">
                    <a href="/">
                        <img src="{{ asset('internHub-logo.svg') }}" alt="{{ config('app.name') }}" class="h-8 w-auto">
                    </a>

                    <div class="flex items-center space-x-4 text-sm font-medium">
                        <a href="{{ route('register') }}" class="inline-block border border-intern bg-intern px-4 py-1.5 rounded-full hover:bg-transparent hover:text-intern transition-all">Post a Job</a>
                    </div>
                </nav>
            </div>
            <div class="h-full px-4 sm:px-6 lg:px-8">
                <div class="h-full flex items-center max-w-screen-2xl mx-auto">
                    <div>
                        <h1 class="text-white font-black text-7xl">
                            Find the internship that works for you
                        </h1>
                        <a href="{{ route('all-opportunities') }}" class="bg-orange-500 hover:bg-orange-800  mt-6 inline-block px-8 py-4 rounded-lg uppercase bg-gradient-to-t from-intern to-intern/80 text-white font-bold">Start your search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
