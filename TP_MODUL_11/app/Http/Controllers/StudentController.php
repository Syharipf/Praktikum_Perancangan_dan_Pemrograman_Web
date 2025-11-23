<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        // Simpan ke session
        session([
            'nama' => $request->nama,
            'nim'  => $request->nim,
        ]);

        return redirect()->route('result');
    }

    public function result()
    {
        $nama = session('nama');
        $nim  = session('nim');

        return view('result', compact('nama', 'nim'));
    }
}
