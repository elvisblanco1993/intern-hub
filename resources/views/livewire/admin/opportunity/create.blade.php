<div>
    <x-button wire:click="$toggle('modal')">New opportunity</x-button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">New Opportunity</x-slot>
        <x-slot name="content">
            <div>
                <x-label for="title">Position Title</x-label>
                <x-input id="title" type="text" wire:model="title" class="mt-1 w-full" />
                <x-input-error for="title"/>
            </div>
            <div class="mt-6">
                <x-label for="location">Location</x-label>
                <x-input id="location" type="text" wire:model="location" class="mt-1 w-full" />
                <x-input-error for="location"/>
            </div>
            <div class="mt-6">
                <x-label for="url">URL to Description/Application</x-label>
                <x-input id="url" type="text" wire:model="url" class="mt-1 w-full" />
                <x-input-error for="url"/>
            </div>
            <div class="mt-6">
                <x-label for="salary">Salary (optional)</x-label>
                <x-input id="salary" type="text" wire:model="salary" class="mt-1 w-full" />
            </div>
            <div class="mt-6">
                <x-label for="category">Category</x-label>
                <select name="" id="category" wire:model="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full">
                    @include('partials.categories')
                </select>
                <x-input-error for="category"/>
            </div>

            @if ($category == 'Other')
                <div class="mt-6 bg-slate-100 p-4 rounded-lg">
                    <x-label for="custom_category">Write your own category here</x-label>
                    <x-input id="custom_category" type="text" wire:model="custom_category" class="mt-1 w-full" />
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="save" class="ml-4">Create</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
