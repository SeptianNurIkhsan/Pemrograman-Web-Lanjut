<?php

class NilaiConverter
{
    private $partisipasi;
    private $tugas;
    private $uts;
    private $uas;

    public function __construct($partisipasi, $tugas, $uts, $uas)
    {
        $this->partisipasi = $partisipasi;
        $this->tugas = $tugas;
        $this->uts = $uts;
        $this->uas = $uas;
    }

    public function hitungNilaiAkhir()
    {
        // Implementasi perhitungan nilai akhir sesuai link yang diberikan
        $nilaiAkhir = ($this->partisipasi * 0.1) + ($this->tugas * 0.2) + ($this->uts * 0.3) + ($this->uas * 0.4);
        return $nilaiAkhir;
    }

    public function konversiNilaiHuruf()
    {
        // Implementasi konversi nilai huruf sesuai link yang diberikan
        $nilaiAkhir = $this->hitungNilaiAkhir();

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

?>
