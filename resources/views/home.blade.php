<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- Hero -->
        <div class="max-w-4xl mx-auto text-center my-10">
            <p class="text-5xl md:text-7xl font-bold text-gray-900 mb-8">Notes</p>

            <a href="{{ route('notes.create') }}"
               class="inline-flex items-center justify-center bg-blue-800 hover:bg-blue-900 text-white rounded-full px-6 py-4 text-2xl transition">
                + New Note
            </a>
        </div>

        <!-- Example card -->
            <div class="max-w-4xl mx-auto px-6">
                <div class="border border-gray-200 rounded-2xl p-6 shadow-sm m-5">
                    <h3 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-3">Project Ideas</h3>
                    <p class="text-xl md:text-2xl text-gray-600">
                        Brainstorming app features and…
                    </p>
                </div>
            </div>
            <div class="max-w-4xl mx-auto px-6">
                <div class="border border-gray-200 rounded-2xl p-6 shadow-sm m-5">
                    <h3 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-3">Project Ideas</h3>
                    <p class="text-xl md:text-2xl text-gray-600">
                        Brainstorming app features and…
                    </p>
                </div>
            </div>
            <div class="max-w-4xl mx-auto px-6">
                <div class="border border-gray-200 rounded-2xl p-6 shadow-sm m-5">
                    <h3 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-3">Project Ideas</h3>
                    <p class="text-xl md:text-2xl text-gray-600">
                        Brainstorming app features and…
                    </p>
                </div>
            </div>
    </div>
</x-app-layout>
