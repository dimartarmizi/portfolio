@php
    /** @var \Filament\Forms\Components\Concerns\InteractsWithForms $this */
@endphp

<x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}

        <div class="pt-4">
            <x-filament::button type="submit">Simpan Pengaturan</x-filament::button>
        </div>
    </form>
</x-filament::page>
