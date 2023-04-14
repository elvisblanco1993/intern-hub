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
                <x-label for="categories">Select categories</x-label>
                <select wire:model="categories" multiple
                    class="mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-100 rounded-md shadow-sm">
                    @foreach (\App\Models\Category::get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="categories" class="mt-1"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="save" class="ml-4">Create</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
