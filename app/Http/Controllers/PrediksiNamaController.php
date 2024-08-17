<?php

namespace App\Http\Controllers;

use App\Models\PrediksiNama;
use Illuminate\Http\Request;

class PrediksiNamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prediksi_namas = PrediksiNama::all(); 
        return view('prediksi_nama.index', compact('prediksi_namas'));
    }

    public function create()
    {
        return view('prediksi_nama.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'negara_1' => 'required',
            'negara_2' => 'nullable',
            'negara_3' => 'nullable',
            'negara_4' => 'nullable',
        ]);

        $prediksiNama = new PrediksiNama();
        $prediksiNama->id_admin = auth()->user()->id; // Ambil ID admin yang sedang login
        $prediksiNama->nama = $validatedData['nama'];
        $prediksiNama->negara_1 = $validatedData['negara_1'];
        $prediksiNama->negara_2 = $validatedData['negara_2'];
        $prediksiNama->negara_3 = $validatedData['negara_3'];
        $prediksiNama->negara_4 = $validatedData['negara_4'];
        $prediksiNama->save();

        return redirect()->route('prediksi-nama.index')->with('success', 'Prediksi Nama berhasil disimpan!');
    }

    public function edit(PrediksiNama $prediksi_nama) 
    {
        return view('prediksi_nama.edit', compact('prediksi_nama'));
    }
    
    public function update(Request $request, PrediksiNama $prediksi_nama) 
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'negara_1' => 'required',
            'negara_2' => 'nullable',
            'negara_3' => 'nullable',
            'negara_4' => 'nullable',
        ]);
    
        $prediksi_nama->nama = $validatedData['nama'];
        $prediksi_nama->negara_1 = $validatedData['negara_1'];
        $prediksi_nama->negara_2 = $validatedData['negara_2'];
        $prediksi_nama->negara_3 = $validatedData['negara_3'];
        $prediksi_nama->negara_4 = $validatedData['negara_4'];
        $prediksi_nama->save();
    
        return redirect()->route('prediksi-nama.index')->with('success', 'Prediksi Nama berhasil diperbarui!');
    }

    public function destroy(PrediksiNama $prediksi_nama) 
    {
        $prediksi_nama->delete();
    
        return redirect()->route('prediksi-nama.index')->with('success', 'Prediksi Nama berhasil dihapus!');
    }
}