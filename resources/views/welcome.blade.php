<x-guest-layout>
    <div class="h-screen bg-cover bg-center" style="background-image: url({{ asset('images/image3.png') }})">
        <div class="h-full w-full backdrop-blur">
            
            <nav class="flex items-center justify-between flex-wrap bg-black p-4">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <img src="http://internhub.localhost/logo.svg" alt="InternHub" class="h-9 w-auto">
                    <span class="font-semibold text-xl tracking-tight">InternHub</span>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-right lg:w-auto">
                    <!-- Empty Div to align right -->
                    <div class="text-sm lg:flex-grow">
                    </div>
                    <div>
                        <a href="/login" class="inline-block text-md px-4 py-2 text-white hover:text-orange-500 mt-4 lg:mt-0">Login</a>
                    </div>
                    <div>
                        <a href="/register" class="inline-block text-md px-4 py-2 text-white hover:text-orange-500 mt-4 lg:mt-0">Register</a>
                    </div>
                </div>
            </nav>

            <div class="h-full px-4 sm:px-16 md:px-24 lg:px-48">
                <div class="h-full flex items-center max-w-4xl">
                    <div>
                        <h1 class="text-white font-black text-7xl">
                            Find the internship that works for you
                        </h1>
                        <a href="/all-opportunities" class="bg-orange-500 hover:bg-orange-800  mt-6 inline-block px-8 py-4 rounded-lg uppercase bg-gradient-to-t from-intern to-intern/80 text-white font-bold">Start your search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
