
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <p class="py-2 text-sm/6 text-gray-600">Enter your presentation details</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full mb-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title"
                               type="text"
                               name="title"
                               placeholder="title of talk"
                               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                               value="{{ old('title', $talk->title ?? '') }}"
                               required />
                        <x-input-error :messages="$errors->get('title')" />
                    </div>
                </div>

                <div class="col-span-full mb-4">
                    <label for="type" class="block text-sm/6 font-medium text-gray-900">Type</label>
                    <div class="mt-2">
                        <select id="type"
                                name="type"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option>Select</option>
                            @foreach(App\Enums\TalkType::cases() as $talkType)
                                <option {{ old('type', $talk->type ?? '') === $talkType->value ? 'selected' : '' }}
                                    value="{{ $talkType->value }}">{{ ucwords($talkType->value) }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type')" />
                    </div>
                </div>

                <div class="col-span-full mb-4">
                    <label for="length" class="block text-sm/6 font-medium text-gray-900">Length</label>
                    <div class="mt-2">
                        <input id="length"
                               type="text"
                               name="length"
                               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                               value="{{ old('length', $talk->length ?? '') }}" />
                        <x-input-error :messages="$errors->get('length')" />
                    </div>
                </div>

                <div class="col-span-full mb-4">
                    <label for="abstract" class="block text-sm/6 font-medium text-gray-900">Abstract</label>
                    <div class="mt-2">
                        <textarea id="abstract"
                                  name="abstract"
                                  rows="3"
                                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('abstract', $talk->abstract ?? '') }}</textarea>
                        <x-input-error :messages="$errors->get('abstract')" />
                    </div>
                </div>

                <div class="col-span-full mb-4">
                    <label for="organizer_notes" class="block text-sm/6 font-medium text-gray-900">Organizer Notes</label>
                    <div class="mt-2">
                        <textarea id="organizer_notes"
                                  name="organizer_notes"
                                  rows="3"
                                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('organizer_notes', $talk->organizer_notes ?? '') }}</textarea>
                        <x-input-error :messages="$errors->get('organizer_notes')" />
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button"
                class="text-sm/6 font-semibold text-gray-900">
            Cancel
        </button>
        <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-black shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Save
        </button>
    </div>
