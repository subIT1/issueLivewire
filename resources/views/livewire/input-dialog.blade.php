<x-dialog wire:model="show">
    <x-slot name="title">
        Dialog
    </x-slot>

    <form wire:submit.prevent="submit">
        <input type="text" placeholder="min 6" wire:model.debounce.200ms="name">
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <input type="text" placeholder="email" wire:model.debounce.200ms="email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Contact</button>
    </form>
</x-dialog>
