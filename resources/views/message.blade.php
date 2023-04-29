<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send a Message to') }} {{ $user->username }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pt-6 grid place-items-center">
            <form method="POST" action="{{ route('message.send', $user->username) }}" class="w-[500px] p-4 rounded-md bg-white shadow-md">
                @csrf
                <span class="text-md">Send a Message to {{ $user->username }}</span>
                @if (session()->has('success'))
                    <div class="w-full rounded-md bg-green-500 text-white">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                <div class="w-full rounded-md bg-red-500 text-white">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="pt-6"></div>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <textarea name="message" class="rounded-md border-black w-full" id="" cols="30" rows="10"></textarea>
                @error('message')
                    <span class="text-red-500">{{ $message }}</span>    
                @enderror
                <div class="pt-3">
                    <button type="submit" class="rounded-md p-3 bg-blue-500 text-white">Send</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>