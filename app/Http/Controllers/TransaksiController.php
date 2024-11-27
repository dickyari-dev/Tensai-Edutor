<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::paginate(10); // Ambil data transaksi dengan pagination
        return view('owner.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_orang_tua' => 'required|string|max:255',
            'tingkat_pendidikan' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'pilihan_hari' => 'required|string|max:255',
            'pilihan_waktu' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'rencana_mulai_kelas' => 'required|date',
            'nomor_telepon_siswa' => 'required|string|max:255',
            'nomor_telepon_orang_tua' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_pembayaran' => 'required|in:Belum dibayar,Sudah dibayar',
        ]);

        $data = $request->all();

        // Handle upload file
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/bukti_pembayaran'), $filename);
            $data['bukti_pembayaran'] = $filename;
        }

        Transaksi::create($data);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('owner.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $paket = Paket::all();
        return view('owner.transaksi.edit', compact('transaksi', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nama_orang_tua' => 'required',
            'tingkat_pendidikan' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_hari' => 'required',
            'pilihan_waktu' => 'required',
            'mata_pelajaran' => 'required',
            'rencana_mulai_kelas' => 'required|date',
            'nomor_telepon_siswa' => 'required|',
            'nomor_telepon_orang_tua' => 'required|',
            'bukti_pembayaran' => 'image|nullable|max:1999',
            'status_pembayaran' => 'required',
            'paket_id' => 'required',
        ]);

        $transaksi = Transaksi::find($request->id);

        $transaksi->nama_siswa = $request->nama_siswa;
        $transaksi->nama_orang_tua = $request->nama_orang_tua;
        $transaksi->tingkat_pendidikan = $request->tingkat_pendidikan;
        $transaksi->asal_sekolah = $request->asal_sekolah;
        $transaksi->pilihan_hari = $request->pilihan_hari;
        $transaksi->pilihan_waktu = $request->pilihan_waktu;
        $transaksi->mata_pelajaran = $request->mata_pelajaran;
        $transaksi->rencana_mulai_kelas = $request->rencana_mulai_kelas;
        $transaksi->nomor_telepon_siswa = $request->nomor_telepon_siswa;
        $transaksi->nomor_telepon_orang_tua = $request->nomor_telepon_orang_tua;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->paket_id = $request->paket_id;
        // Mengelola update bukti pembayaran jika ada file baru
        if($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $bukti_pembayaran = $filename;
            $transaksi->bukti_pembayaran = $bukti_pembayaran;
        }

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        // Hapus file bukti pembayaran jika ada
        if ($transaksi->bukti_pembayaran) {
            Storage::delete('public/bukti_pembayaran/' . $transaksi->bukti_pembayaran);
        }

        // Hapus data transaksi
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function pendaftaran(Request $request)
    {
        $request->validate([
            'nama_orang_tua' => 'required|string|max:255',
            'tingkat_pendidikan' => 'required|string|max:255',
            'asal_sekolah' => 'required',
            'pilihan_hari' => 'required',
            'pilihan_waktu' => 'required',
            'mata_pelajaran' => 'required',
            'rencana_mulai_kelas' => 'required|date',
            'nomor_telepon_siswa' => 'required|string|max:255',
            'nomor_telepon_orang_tua' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // $data = $request->all();

        // Handle upload file
        if($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/bukti_pembayaran'), $filename);
            $bukti_pembayaran = $filename;
        }

        $transaksi = Transaksi::create([
            'nama_siswa' => $request->nama_siswa,
            'nama_orang_tua' => $request->nama_orang_tua,
            'tingkat_pendidikan' => $request->tingkat_pendidikan,
            'asal_sekolah' => $request->asal_sekolah,
            'pilihan_hari' => $request->pilihan_hari,
            'pilihan_waktu' => $request->pilihan_waktu,
            'mata_pelajaran' => $request->mata_pelajaran,
            'rencana_mulai_kelas' => $request->rencana_mulai_kelas,
            'nomor_telepon_siswa' => $request->nomor_telepon_siswa,
            'nomor_telepon_orang_tua' => $request->nomor_telepon_orang_tua,
            'bukti_pembayaran' => $bukti_pembayaran,
            'status_pembayaran' => 'Sudah dibayar',
            'pengajar_id' => $request->pengajar_id,
            'paket_id' => $request->paket_id,
        ]);
        
        // Create New Siswa
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telepon_siswa' => $request->nomor_telepon_siswa,
            'nomor_telepon_orang_tua' => $request->nomor_telepon_orang_tua,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'pilihan_hari' => $request->pilihan_hari,
            'pilihan_waktu' => $request->pilihan_waktu,
            'mata_pelajaran' => $request->mata_pelajaran,
            'status_pembayaran' => 'Sudah dibayar',
            'pengajar_id' => $request->pengajar_id,
        ]);

        return redirect('/pendaftaran')->with('success', 'Transaksi berhasil ditambahkan.');
    }
}
