<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Talks') }}
            </h2>

            <x-nav-link :href="route('talks.create')" :active="request()->routeIs('talks.create')">
                {{ __('Create a Talk') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc pb-3">
                        @foreach($talks as $talk)
                            <li>
                                <a href="{{ route('talks.show', ['talk' => $talk]) }}"
                                   class="hover:text-gray-700 hover:underline">
                                    {{ $talk->title }} <span class="text-sm">({{ ucwords($talk->type) }} \ {{ $talk->length }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
