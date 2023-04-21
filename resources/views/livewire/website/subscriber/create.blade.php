<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <button wire:click="$toggle('modal')" class="mt-2 md:mt-0 px-4 py-2 bg-intern text-white border border-intern rounded-md">Subscribe</button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">Subscribe</x-slot>
        <x-slot name="content">
            <div>
                <x-label for="name">Full Name</x-label>
                <x-input id="name" type="text" wire:model="name" placeholder="Zara Moonstone" required class="mt-1 w-full" />
                <x-input-error for="name" class="mt-1"/>
            </div>
            <div class="mt-4">
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" wire:model="email" placeholder="zmoo001@fiu.edu" required class="mt-1 w-full" />
                <x-input-error for="email" class="mt-1"/>
            </div>
            <div class="mt-4">
                <x-label for="categories">Select your preferences</x-label>
                <select wire:model="categories" multiple
                    class="mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-100 rounded-md shadow-sm">
                    @foreach (\App\Models\Category::get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="categories" class="mt-1"/>
            </div>
            <div class="mt-4">
                <p class="text-xs">Please note that by subscribing your email to our job board, you are consenting to receive regular job alerts and updates from us. We will do our best to provide accurate and relevant job opportunities based on your preferences, but we cannot guarantee the availability or suitability of any particular job. We also do not endorse or verify the accuracy of the job listings, and it is your responsibility to independently research and evaluate any job opportunities before applying or accepting any offers. We are not responsible for any actions or decisions you make based on the information provided on our job board. We recommend using caution and exercising due diligence when engaging with potential employers or recruiters. Your privacy is important to us, and we will not share your email or personal information with third parties without your explicit consent. By subscribing to our job board, you acknowledge and accept these terms and conditions.</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="save" class="ml-4">Subscribe</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
