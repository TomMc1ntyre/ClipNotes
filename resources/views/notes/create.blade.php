<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Note') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8 mt-10">
        <form action="{{ route('notes.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">
                    Note Title
                </label>
                <input type="text" id="title" name="title"
                    placeholder="Enter note title"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="video_url" class="block text-lg font-medium text-gray-700 mb-2">
                    Video Clip Link
                </label>
                <input type="url" id="video_url" name="video_url"
                    placeholder="https://youtube.com/..."
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('video_url')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition">Cancel</a>

                <button type="submit"
                    class="bg-blue-800 hover:bg-blue-900 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                    Save Note
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
