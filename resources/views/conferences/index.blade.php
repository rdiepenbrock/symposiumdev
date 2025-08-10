<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Conferences') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc pb-3">
                        @foreach($conferences as $conference)
                            <li class="list-disc list-outside">
                                <a href="{{ route('conferences.show', ['conference' => $conference]) }}"
                                   class="hover:text-gray-700 hover:underline">
                                    {{ $conference->title }}
                                    @if(auth()->user()->favoritedConferences->pluck('id')->contains($conference->id))
                                        <a href="{{ route('conferences.unfavorite', $conference) }}" onclick="event.preventDefault(); document.getElementById('unfavorite-form-{{ $conference->id }}').submit();">★</a>
                                        <form id="unfavorite-form-{{ $conference->id }}" action="{{ route('conferences.unfavorite', $conference) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @else
                                        <a href="{{ route('conferences.favorite', $conference) }}" onclick="event.preventDefault(); document.getElementById('favorite-form-{{ $conference->id }}').submit();">☆</a>
                                        <form id="favorite-form-{{ $conference->id }}" action="{{ route('conferences.favorite', $conference) }}" method="POST" style="display:none;">
                                            @csrf
                                        </form>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function favoriteConference() {
            fetch("/conferences/1/favorite", {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
                }
            });
        }

        function unfavoriteConference() {
            fetch("/conferences/1/favorite", {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
                }
            });
        }
    </script>
</x-app-layout>
