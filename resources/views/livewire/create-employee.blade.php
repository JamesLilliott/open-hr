<form wire:submit="save">
    <label>
        <input type="text" wire:model="name">
    </label>
    <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>

    <button type="submit">Save</button>
</form>