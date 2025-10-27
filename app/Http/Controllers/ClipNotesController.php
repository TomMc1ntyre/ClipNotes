<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use OpenAI; // use the base OpenAI client

class ClipNotesController extends Controller
{
    /**
     * Display all notes.
     */
    public function index()
    {
        $notes = Note::latest()->get();
        return view('home', compact('notes'));
    }

    /**
     * Show the form to create a new note.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a new note and generate summary via OpenAI.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|url',
        ]);

        // 1️⃣ Create a new note first
        $note = Note::create([
            'title'     => $request->title,
            'video_url' => $request->video_url,
            'status'    => 'processing',
        ]);

        // 2️⃣ Fake transcript for now (you can replace this with real YouTube transcript later)
        $fakeTranscript = "This is a sample transcript for the YouTube video.";

        // 3️⃣ Call OpenAI using the modern client (supports sk-proj keys)
        try {
            $client = \OpenAI::factory()
                ->withApiKey(env('OPENAI_API_KEY'))
                ->withProject(env('OPENAI_PROJECT')) // required for sk-proj keys
                ->make();

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful AI that turns YouTube transcripts into concise learning notes.'
                    ],
                    [
                        'role' => 'user',
                        'content' => "Summarize this transcript into study notes:\n\n{$fakeTranscript}"
                    ],
                ],
            ]);

            $summary = $response->choices[0]->message->content ?? 'No summary generated.';
        } catch (\Throwable $e) {
            // Handle API errors gracefully
            if (str_contains($e->getMessage(), 'rate limit')) {
                $summary = '⚠️ OpenAI rate limit reached. Please wait a few seconds and try again.';
            } else {
                $summary = 'Error generating notes: ' . $e->getMessage();
            }
        }

        // 4️⃣ Update the note with results
        $note->update([
            'notes' => $summary,
            'status' => 'done',
        ]);

        // 5️⃣ Redirect back to home
        return redirect()->route('home')->with('success', 'Notes generated successfully!');
    }

    /**
     * Show a single note.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }
}
