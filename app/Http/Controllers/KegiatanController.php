<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{

    public function index()
    {
        $kegiatans = Kegiatan::paginate(10);
        return view('kegiatan', compact('kegiatans'));
        // return view ('kegiatan');
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date'
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date'
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
