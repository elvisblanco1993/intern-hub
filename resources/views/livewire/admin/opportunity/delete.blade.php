<div>
    <button wire:click="$toggle('modal')" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>

    <x-confirmation-modal wire:model="modal">
        <x-slot name="title">{{ __("Delete opportunity") }}</x-slot>
        <x-slot name="content">
            <p>Are you sure you want to delete the opportunity named <strong>{{ $opportunity->title }}</strong> ?</p>
            <p>This action cannot be undone.</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-danger-button wire:click="delete" class="ml-4">Delete opportunity</x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
