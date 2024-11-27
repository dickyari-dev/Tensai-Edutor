<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function master()
    {
        return view('master');
    }

    public function about()
    {
        return view('about');
    }

    public function price()
    {
        $paket = Paket::all();
        return view('price', compact('paket'));
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function teacher()
    {
        $pengajar = Pengajar::all();
        return view('teacher', compact('pengajar'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function pendaftaran()
    {
        $pengajar = Pengajar::all();
        $paket = Paket::all();
        return view('pendaftaran', compact('pengajar', 'paket'));
    }
}
