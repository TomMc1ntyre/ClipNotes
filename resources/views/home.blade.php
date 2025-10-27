<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- Hero -->
        <div class="max-w-4xl mx-auto text-center my-10">
            @if (session('success'))
                <div class="max-w-3xl mx-auto bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <p class="text-5xl md:text-7xl font-bold text-gray-900 mb-8">Notes</p>

            <a href="{{ route('notes.create') }}"
               class="inline-flex items-center justify-center bg-blue-800 hover:bg-blue-900 text-white rounded-full px-6 py-4 text-2xl transition">
                + New Note
            </a>
        </div>

        <!-- Notes List -->

        <div class="max-w-4xl mx-auto px-6">
            @if($notes->isEmpty())
                <p class="text-gray-500 text-center text-xl">No notes yet. Click “New Note” to create one!</p>
            @else
                @foreach($notes as $note)
                    <a href="{{ route('notes.show', $note) }}">
                        <div class="border border-gray-200 rounded-2xl p-6 shadow-sm m-5 hover:shadow-md transition">
                            <h3 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-3">
                                {{ $note->title ?? 'Untitled Note' }}
                            </h3>

                            <p class="text-xl md:text-2xl text-gray-600">
                                {{ Str::limit($note->notes, 120, '...') ?? 'No notes generated yet.' }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                Status: {{ ucfirst($note->status) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
