<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class KonversiNilaiController extends Controller
{
    public function index()
    {
        return view('konversi_nilai');
    }

    public function konversi()
    {
        $validationRules = [
            'partisipasi' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'tugas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uts' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
        ];

        $validationMessages = [
            'partisipasi' => [
                'required' => 'Nilai partisipasi harus diisi.',
                'numeric' => 'Harap masukkan nilai dalam bentuk angka.',
                'greater_than_equal_to' => 'Nilai partisipasi harus di antara 0 - 100.',
                'less_than_equal_to' => 'Nilai partisipasi harus di antara 0 - 100.',
            ],
            'tugas' => [
                'required' => 'Nilai tugas harus diisi.',
                'numeric' => 'Harap masukkan nilai dalam bentuk angka.',
                'greater_than_equal_to' => 'Nilai tugas harus di antara 0 - 100.',
                'less_than_equal_to' => 'Nilai tugas harus di antara 0 - 100.',
            ],
            'uts' => [
                'required' => 'Nilai UTS harus diisi.',
                'numeric' => 'Harap masukkan nilai dalam bentuk angka.',
                'greater_than_equal_to' => 'Nilai UTS harus di antara 0 - 100.',
                'less_than_equal_to' => 'Nilai UTS harus di antara 0 - 100.',
            ],
            'uas' => [
                'required' => 'Nilai UAS harus diisi.',
                'numeric' => 'Harap masukkan nilai dalam bentuk angka.',
                'greater_than_equal_to' => 'Nilai UAS harus di antara 0 - 100.',
                'less_than_equal_to' => 'Nilai UAS harus di antara 0 - 100.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to('/konversi')->withInput()->with('validation', $this->validator);
        }

        // Proses konversi dan perhitungan nilai akhir
        $partisipasi = $this->request->getVar('partisipasi');
        $tugas = $this->request->getVar('tugas');
        $uts = $this->request->getVar('uts');
        $uas = $this->request->getVar('uas');

        // Konversi dan perhitungan nilai akhir
        $nilaiAkhir = ($partisipasi + $tugas + $uts + $uas) / 4;
        $nilaiHuruf = $this->konversiNilaiHuruf($nilaiAkhir);

        // Tampilkan hasil
        $data = [
            'nilaiAkhir' => $nilaiAkhir,
            'nilaiHuruf' => $nilaiHuruf,
        ];

        return view('hasil_konversi', $data);
    }

    private function konversiNilaiHuruf($nilaiAkhir)
    {
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