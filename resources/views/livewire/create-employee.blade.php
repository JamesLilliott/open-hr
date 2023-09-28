<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <form wire:submit="save">
                <label>
                    Name:
                    <input type="text" wire:model="name">
                </label>
                <div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <br>
                <button type="submit" class="float-right border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2">Save</button>
            </form>
        </div>
    </div>
</div>