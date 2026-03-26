<?php

namespace App\Http\Controllers;

use App\Models\MeditationSession;
use Illuminate\Http\Request;

class MeditationSessionController extends Controller
{
    public function index()
    {
        $sessions = MeditationSession::where('user_id', auth()->id())
                    ->orderBy('session_date', 'desc')
                    ->paginate(10);

        return view('sessions.index', compact('sessions'));
    }




    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'session_date' => 'required|date',
        'duration' => 'required|integer|min:1',
        'notes' => 'nullable|string'
    ]);

    $session = new MeditationSession();
    $session->user_id = auth()->user()->id;
    $session->session_date = $request->session_date;
    $session->duration = $request->duration;
    $session->notes = $request->notes;
    $session->save();

    return redirect()->route('sessions.index')
        ->with('success', 'Session saved successfully');
}

    public function edit($id)
    {
        $session = MeditationSession::find($id);
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, $id)
    {
        $session = MeditationSession::find($id);

        $request->validate([
            'session_date' => 'required',
            'duration' => 'required|integer|min:1'
        ]);

        $session->session_date = $request->session_date;
        $session->duration = $request->duration;
        $session->notes = $request->notes;
        $session->save();

        return redirect()->route('sessions.index');
    }

    public function destroy($id)
    {
        $session = MeditationSession::find($id);

        if ($session) {
            $session->delete();
        }

        return redirect()->route('sessions.index');
    }
}