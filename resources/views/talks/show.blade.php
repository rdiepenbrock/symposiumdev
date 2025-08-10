<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-2 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $talk->title }}
            </h2>
            <div class="text-sm">
                |
                Type of Talk: {{ ucwords($talk->type) }} ({{ $talk->length }})
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-lg">Abstract</h2>
                    {{ $talk->abstract }}
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-lg">Organizer Notes</h2>
                    {{ $talk->organizer_notes }}
                </div>
            </div>

            <div class="flex justify-between pt-3">
                <a href="{{ route('talks.edit', ['talk' => $talk]) }}">Edit</a>
                <x-delete-item :route="route('talks.destroy', ['talk' => $talk])" text="Delete" />
            </div>
        </div>
    </div>

</x-app-layout>
