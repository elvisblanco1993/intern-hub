<div style="background-image: url({{ asset('/static_assets/login_background.jpg')}})" class="h-screen min-h-screen bg-center bg-cover">
    <div class="h-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0 backdrop-blur">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
