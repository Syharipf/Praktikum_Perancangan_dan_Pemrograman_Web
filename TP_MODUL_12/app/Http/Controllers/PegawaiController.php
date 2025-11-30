<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create() {
        return view('pegawai.create');
    }

    public function store(Request $request) {
        Pegawai::create($request->all());
        return redirect('/pegawai');
    }

    public function edit($id) {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id) {
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
        return redirect('/pegawai');
    }

    public function destroy($id) {
        Pegawai::find($id)->delete();
        return redirect('/pegawai');
    }
}
