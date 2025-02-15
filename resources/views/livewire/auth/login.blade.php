<div>
    <div class="container bg-gray-600 rounded-2xl p-10 text-white">
        <h1>Login</h1>
        <input type="email" wire:model="form.email" class="w-full p-2 my-2 bg-gray-700 rounded" placeholder="Email">
        @error('form.email')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <input type="password" wire:model="form.password" class="w-full p-2 my-2 bg-gray-700 rounded"
            placeholder="password">
        @error('form.password')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <button wire:click="save" class="w-full p-2 my-2 bg-blue-500 rounded">Login</button>
    </div>
</div>
