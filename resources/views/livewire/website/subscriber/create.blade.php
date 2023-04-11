<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <button wire:click="$toggle('modal')">Subscribe</button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">Subscribe</x-slot>
        <x-slot name="content">
            <div class="">
                <x-label>Please enter your e-mail</x-label>
                <x-input type="email" wire:model="email" placeholder="jdoe001@fiu.edu" class="mt-1 w-full" />
                <x-input-error for="email" class="mt-1"/>
            </div>
            <div class="mt-4">
                <p class="text-sm">Please note that by subscribing your email to our job board, you are consenting to receive regular job alerts and updates from us. We will do our best to provide accurate and relevant job opportunities based on your preferences, but we cannot guarantee the availability or suitability of any particular job. We also do not endorse or verify the accuracy of the job listings, and it is your responsibility to independently research and evaluate any job opportunities before applying or accepting any offers. We are not responsible for any actions or decisions you make based on the information provided on our job board. We recommend using caution and exercising due diligence when engaging with potential employers or recruiters. Your privacy is important to us, and we will not share your email or personal information with third parties without your explicit consent. By subscribing to our job board, you acknowledge and accept these terms and conditions.</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="save">Subscribe</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
