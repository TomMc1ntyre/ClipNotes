<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Note') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8 mt-10">
        <form action="#" method="POST" class="space-y-6">

            <div>
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">
                    Note Title
                </label>
                <input type="text" id="title" name="title"
                    placeholder="Enter note title"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="content" class="block text-lg font-medium text-gray-700 mb-2">
                    Content
                </label>
                <textarea id="content" name="content" rows="5"
                    placeholder="Write your note here..."
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>


            <div>
                <label for="video" class="block text-lg font-medium text-gray-700 mb-2">
                    Video Clip Link (optional)
                </label>
                <input type="url" id="video" name="video"
                    placeholder="https://youtube.com/..."
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>


            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}"
                   class="text-gray-600 hover:text-gray-900 transition">
                    Cancel
                </a>

                <button type="submit"
                    class="bg-blue-800 hover:bg-blue-900 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                    Save Note
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

