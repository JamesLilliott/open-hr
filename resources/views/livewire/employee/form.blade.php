<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="">
                <form wire:submit="save">

                    <label for="name" class="block">Name</label>
                    <input type="text" id="name" wire:model="form.name" class="rounded shadow-sm w-full">
                    <div>@error('form.name') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="date_of_birth" class="block">Date of Birth</label>
                    <input type="date" id="date_of_birth" wire:model="form.date_of_birth" class="rounded shadow-sm w-full">
                    <div>@error('form.date_of_birth') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="start_date" class="block">Start Date</label>
                    <input type="date" id="start_date" wire:model="form.start_date" class="rounded shadow-sm w-full">
                    <div>@error('form.start_date') <span class="error">{{ $message }}</span> @enderror</div>

                    <label for="user" class="block">User</label>
                    <select id="user" wire:model="form.user_id" class="w-full">
                            <option value="">Select</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div>@error('form.user_id') <span class="error">{{ $message }}</span> @enderror</div>

                    <br>

                    <button type="submit" class="float-right border-1 border-blue-400 hover:bg-blue-400 bg-blue-300 px-4 py-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
