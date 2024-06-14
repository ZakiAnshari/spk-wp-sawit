<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PerhitunganController extends Controller
{
    // public function index()
    // {
    //     $alternatifs = Alternatif::all();
    //     $kriterias = Kriteria::all();
    
    //     // Matrix Alternatif-Kriteria
    //     $matrix = [];
    //     foreach ($alternatifs as $alternatif) {
    //         $matrix[$alternatif->id] = [
    //             'nama' => $alternatif->nama_alternatif,
    //             'k1' => $alternatif->k1,
    //             'k2' => $alternatif->k2,
    //             'k3' => $alternatif->k3,
    //             'k4' => $alternatif->k4,
    //             'k5' => $alternatif->k5,
    //         ];
    //     }
    
    //     // Bobot Kepentingan
    //     $bobotKepentingan = [];
    //     foreach ($kriterias as $kriteria) {
    //         $bobotKepentingan[$kriteria->kriteria] = $kriteria->kepentingan;
    //     }
    
    //     // Perhitungan WP
    //     $S = [];
    //     $totalS = 0;
    //     foreach ($alternatifs as $alternatif) {
    //         $S[$alternatif->id] = 1;
    //         foreach ($kriterias as $kriteria) {
    //             $nilai = $alternatif['k' . $kriteria->id];
    //             if ($kriteria->goal == 'Benefit') {
    //                 $S[$alternatif->id] *= pow($nilai, $kriteria->kepentingan);
    //             } else {
    //                 $S[$alternatif->id] *= pow($nilai, -$kriteria->kepentingan);
    //             }
    //         }
    //         $totalS += $S[$alternatif->id];
    //     }
    
    //     $V = [];
    //     foreach ($S as $id => $value) {
    //         $V[$id] = $value / $totalS;
    //     }
    
    //     arsort($V);
    
    //     // Determine quality
    //     $kualitas = [];
    //     foreach ($V as $id => $nilaiV) {
    //         if ($nilaiV >= 0.7) {
    //             $kualitas[$id] = 'Kualitas Baik';
    //         } elseif ($nilaiV >= 0.4) {
    //             $kualitas[$id] = 'Kualitas Cukup';
    //         } else {
    //             $kualitas[$id] = 'Kualitas Kurang';
    //         }
    //     }
    
      
    //     $kriterias = Kriteria::all();
    //     return view('admin.perhitungan',['kriterias' => $kriterias], compact('matrix', 'bobotKepentingan', 'S', 'V', 'alternatifs','kualitas'));

        
    // }
    
    //     public function index()
    // {
    //     $alternatifs = Alternatif::all();
    //     $kriterias = Kriteria::all();

    //     // Matrix Alternatif-Kriteria
    //     $matrix = [];
    //     foreach ($alternatifs as $alternatif) {
    //         $matrix[$alternatif->id] = [
    //             'nama' => $alternatif->nama_alternatif,
    //             'k1' => $alternatif->k1,
    //             'k2' => $alternatif->k2,
    //             'k3' => $alternatif->k3,
    //             'k4' => $alternatif->k4,
    //             'k5' => $alternatif->k5,
    //         ];
    //     }

    //     // Bobot Kepentingan and Kepentingan
    //     $bobotKepentingan = [];
    //     $kepentingan = [];
    //     $totalKepentingan = $kriterias->sum('kepentingan');
    //     foreach ($kriterias as $kriteria) {
    //         $kepentingan[$kriteria->kriteria] = $kriteria->kepentingan;
    //         $bobotKepentingan[$kriteria->nama_kriteria] = $kriteria->kepentingan / $totalKepentingan;
    //     }

    //     // Perhitungan WP
    //     $S = [];
    //     $totalS = 0;
    //     foreach ($alternatifs as $alternatif) {
    //         $S[$alternatif->id] = 1;
    //         foreach ($kriterias as $kriteria) {
    //             $nilai = $alternatif['k' . $kriteria->id];
    //             if ($kriteria->goal == 'Benefit') {
    //                 $S[$alternatif->id] *= pow($nilai, $bobotKepentingan[$kriteria->nama_kriteria]);
    //             } else {
    //                 $S[$alternatif->id] *= pow($nilai, -$bobotKepentingan[$kriteria->nama_kriteria]);
    //             }
    //         }
    //         $totalS += $S[$alternatif->id];
    //     }

    //     $V = [];
    //     foreach ($S as $id => $value) {
    //         $V[$id] = $value / $totalS;
    //     }

    //     arsort($V);

    //     // Menentukan kualitas
    //     $kualitas = [];
    //     foreach ($V as $id => $nilaiV) {
    //         if ($nilaiV >= 0.7) {
    //             $kualitas[$id] = 'Kualitas Baik';
    //         } elseif ($nilaiV >= 0.4) {
    //             $kualitas[$id] = 'Kualitas Cukup';
    //         } else {
    //             $kualitas[$id] = 'Kualitas Kurang';
    //         }
    //     }

    //     $kriterias = Kriteria::all();
    //         return view('admin.perhitungan',['kriterias' => $kriterias], compact('matrix', 'bobotKepentingan', 'S', 'V', 'alternatifs','kualitas'));

    // }

    public function index()
{
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Matrix Alternatif-Kriteria
        $matrix = [];
        foreach ($alternatifs as $alternatif) {
            $matrix[$alternatif->id] = [
                'nama' => $alternatif->alteratif,
                'k1' => $alternatif->k1,
                'k2' => $alternatif->k2,
                'k3' => $alternatif->k3,
                'k4' => $alternatif->k4,
                'k5' => $alternatif->k5,
            ];
        }

        // Bobot Kepentingan
        $bobotKepentingan = [];
        $totalKepentingan = 0;
        foreach ($kriterias as $kriteria) {
            $totalKepentingan += $kriteria->kepentingan;
        }
        foreach ($kriterias as $kriteria) {
            $bobotKepentingan[$kriteria->kriteria] = $kriteria->kepentingan / $totalKepentingan;
        }

      // Perhitungan WP
        $S = [];
        $totalS = 0;
        foreach ($alternatifs as $alternatif) {
            $S[$alternatif->id] = 1;
            foreach ($kriterias as $kriteria) {
                $nilai = $alternatif['k' . $kriteria->id];
                $bobot = $bobotKepentingan[$kriteria->kriteria];
                if ($kriteria->goal == 'Benefit') {
                    $S[$alternatif->id] *= pow($nilai, $bobot);
                } else {
                    $S[$alternatif->id] *= pow($nilai, -$bobot);
                }
            }
            $totalS += $S[$alternatif->id];
        }
        // Menghitung nilai V
        $V = [];
        foreach ($S as $id => $value) {
            $V[$id] = $value / $totalS;
        }
        arsort($V);

    // Menentukan kualitas
    $kualitas = [];
    foreach ($V as $id => $nilaiV) {
        if ($nilaiV >= 0.7) {
            $kualitas[$id] = 'Kualitas Baik';
        } elseif ($nilaiV >= 0.4) {
            $kualitas[$id] = 'Kualitas Cukup';
        } else {
            $kualitas[$id] = 'Kualitas Kurang';
        }
    }

    $kriterias = Kriteria::all();
        return view('admin.perhitungan',['kriterias' => $kriterias], compact( 'matrix','bobotKepentingan', 'S', 'V', 'alternatifs','kualitas'));
}



}