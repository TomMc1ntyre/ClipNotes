<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8 mt-10 space-y-6">
        @if($note->video_url)
            <iframe width="100%" height="315"
                src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($note->video_url, 'v=') }}"
                frameborder="0" allowfullscreen></iframe>
        @endif

        <div>
            <h3 class="font-semibold text-lg mb-2">Generated Notes:</h3>
            <p class="whitespace-pre-line text-gray-700">{{ $note->notes }}</p>
        </div>

        <a href="{{ route('home') }}" class="text-blue-700 hover:underline">← Back to all notes</a>
    </div>
</x-app-layout>
