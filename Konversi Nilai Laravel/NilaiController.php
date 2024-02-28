<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        return view('nilai.index');
    }

    public function convert(Request $request)
    {
        $request->validate([
            'partisipasi' => 'required|numeric|min:0|max:100',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $partisipasi = $request->input('partisipasi');
        $tugas = $request->input('tugas');
        $uts = $request->input('uts');
        $uas = $request->input('uas');

        $nilaiAkhir = ($partisipasi + $tugas + $uts + $uas) / 4;

        $nilaiHuruf = $this->konversiNilaiHuruf($nilaiAkhir);

        return view('nilai.hasil', compact('nilaiAkhir', 'nilaiHuruf'));
    }

    private function konversiNilaiHuruf($nilaiAkhir)
    {
        // Logika konversi nilai huruf sesuai dengan tautan yang diberikan
        // Implementasikan sesuai dengan kebutuhan
        // Contoh implementasi sederhana:
        if ($nilaiAkhir >= 80) {
            return 'A';
        } elseif ($nilaiAkhir >= 70) {
            return 'B';
        } elseif ($nilaiAkhir >= 60) {
            return 'C';
        } elseif ($nilaiAkhir >= 50) {
            return 'D';
        } else {
            return 'E';
        }
    }
}