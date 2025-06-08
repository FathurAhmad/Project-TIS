<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index() {
        return view('kegiatan');
    }

    public function fetch() {
        return response()->json(Kegiatan::where('user_id', Auth::id())->get());
    }

    public function show($id) {
        return response()->json(Kegiatan::where('user_id', Auth::id())->findOrFail($id));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'description' => 'nullable',
            'type' => 'required'
        ]);

        $validated['user_id'] = Auth::id();
        return response()->json(Kegiatan::create($validated));
    }

    public function update(Request $request, $id) {
        $event = Kegiatan::where('user_id', Auth::id())->findOrFail($id);
        $event->update($request->all());
        return response()->json($event);
    }

    public function destroy($id) {
        Kegiatan::where('user_id', Auth::id())->findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}