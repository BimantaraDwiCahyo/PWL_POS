<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_code' => 'bail|required',
            'kategori_nama' => 'required',
        ]);
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KategoriModel::destroy($id);
        return redirect('/kategori');
    }

}
