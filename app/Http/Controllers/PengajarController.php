<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajar = Pengajar::all(); // Ambil semua data pengajar
        return view('admin.pengajar.index', compact('pengajar'));
    }

    public function pengajarIndex()
    {
        $pengajar = Pengajar::all(); // Ambil semua data pengajar
        return view('admin.pengajar.pengajarIndex', compact('pengajar'));
    }

    public function dataPengajar()
    {
        $pengajar = Pengajar::all(); // Ambil semua data pengajar
        return view('pengajar.dataPengajar', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengajar' => 'required',
            'foto' => 'image|nullable|max:1999',
            'usia' => 'required|integer',
            'nomor_telepon' => 'required',
            'tingkat_pendidikan' => 'required',
            'sesi_kosong' => 'required',
            'mata_pelajaran' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Add User
        $user = new User();
        $user->name = $request->nama_pengajar;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'Pengajar';
        $user->save();

        $pengajar = new Pengajar();
        $pengajar->user_id = $user->id;
        $pengajar->nama_pengajar = $request->nama_pengajar;

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $pengajar->foto = $filename;
        }

        $pengajar->usia = $request->usia;
        $pengajar->nomor_telepon = $request->nomor_telepon;
        $pengajar->tingkat_pendidikan = $request->tingkat_pendidikan;
        $pengajar->sesi_kosong = $request->sesi_kosong;
        $pengajar->mata_pelajaran = $request->mata_pelajaran;
        $pengajar->alamat = $request->alamat;
        $pengajar->save();

        return redirect()->route('pengajar.index')->with('message', 'Pengajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajar $pengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajar = Pengajar::findOrFail($id);
        $user = User::where('id', $pengajar->user_id)->first();
        return view('admin.pengajar.edit', compact('pengajar', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_pengajar' => 'required',
            'foto' => 'image|nullable|max:1999',
            'usia' => 'required|integer',
            'nomor_telepon' => 'required',
            'tingkat_pendidikan' => 'required',
            'sesi_kosong' => 'required',
            'mata_pelajaran' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'user_id' => 'required|exists:users,id', // Validasi untuk user_id
        ]);

        $pengajar = Pengajar::findOrFail($request->id);
        $pengajar->nama_pengajar = $request->nama_pengajar;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $pengajar->foto = $filename;
        }
        $pengajar->usia = $request->usia;
        $pengajar->nomor_telepon = $request->nomor_telepon;
        $pengajar->tingkat_pendidikan = $request->tingkat_pendidikan;
        $pengajar->sesi_kosong = $request->sesi_kosong;
        $pengajar->mata_pelajaran = $request->mata_pelajaran;
        $pengajar->alamat = $request->alamat;
        $pengajar->save();

        $user = User::findOrFail($request->user_id); // Ambil user berdasarkan user_id
        $user->name = $request->nama_pengajar;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('pengajar.index')->with('message', 'Pengajar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajar = Pengajar::findOrFail($id);
        $pengajar->delete();

        return redirect()->route('pengajar.index')->with('message', 'Pengajar berhasil dihapus');
    }
}
