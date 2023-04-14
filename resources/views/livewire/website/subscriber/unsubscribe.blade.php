<div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            @if ($subscriber)
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Unsubscribe</h1>
                <p class="text-gray-600 mb-6">We're sorry to see you go!<br class="mb-2">If you unsubscribe, you will no longer receive our daily job digest, which includes the latest job openings in your field. Please note that unsubscribing will remove you from our mailing list and you won't receive any further job notifications from us.<br class="mb-2">If you wish to continue receiving job updates in the future, you can always resubscribe by visiting our website or contacting our support team.<br class="mb-3">Thank you for your interest in our job digest!</p>
                <form wire:submit.prevent="unsubscribe">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Unsubscribe
                    </button>
                </form>
            @else
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-green-500 mb-6 text-center">Unsubscribed</h1>
                    <p class="text-gray-600 text-center mb-6">You have been successfully unsubscribed from our daily job diggest!</p>
                    <a href="{{ route('all-opportunities') }}" class="px-4 py-2 bg-slate-300 text-slate-900 rounded-md text-sm">Beam me back home</a>
                </div>
            @endif
        </div>
    </div>
</div>
