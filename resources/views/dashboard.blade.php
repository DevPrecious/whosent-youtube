<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid place-items-center">
            <span class="text-white">
                <a href="{{ Auth::user()->getUserUrl() }}">{{ Auth::user()->getUserUrl() }}</a>
            </span>
        </div>
        <div class="pt-6 grid place-items-center">
            @foreach ($messages as $message)
                <div class="pt-4">
                    <div class="w-[500px] p-4 rounded-md bg-white shadow-md">
                        <div class="grid text-center place-items-center">
                            <span class="text-lg">{{ $message->message }}</span>
                        </div>
                        <div class="pt-12"></div>
                        <div class="flex justify-between">
                            <span>
                                Created At
                            </span>
                            <span>
                                {{ $message->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
