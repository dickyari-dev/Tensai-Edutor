<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('owner.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('owner.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga_pertemuan' => 'required',
            'harga_bulanan' => 'required',
            'frekuensi' => 'required',
            'durasi' => 'required',
        ]);
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga_per_pertemuan' => $request->harga_pertemuan,
            'harga_paket' => $request->harga_bulanan,
            'frekuensi' => $request->frekuensi,
            'durasi' => $request->durasi,
        ]);
        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Paket::find($id)->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        return view('owner.paket.edit', compact('paket'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga_pertemuan' => 'required',
            'harga_bulanan' => 'required',
            'frekuensi' => 'required',
            'durasi' => 'required',
        ]);
        $paket = Paket::find($request->id);
        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga_per_pertemuan' => $request->harga_pertemuan,
            'harga_paket' => $request->harga_bulanan,
            'frekuensi' => $request->frekuensi,
            'durasi' => $request->durasi,
        ]);
        return redirect()->route('paket.index')->with('success', 'Paket berhasil diubah');
    }
}
