@extends('layouts.admin')

@section('title','Perhitungan ')
@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Perhitungan </h1>
        </div>
        <div class="card">
            <div class="container ">
                <br>
                <h3>Matrix Alternatif - Kriteria</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif / Kriteria</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matrix as $row)
                            <tr>
                                <td>{{ $row['nama'] }}</td>
                                <td>{{ $row['k1'] }}</td>
                                <td>{{ $row['k2'] }}</td>
                                <td>{{ $row['k3'] }}</td>
                                <td>{{ $row['k4'] }}</td>
                                <td>{{ $row['k5'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>

                <h3>Bobot Kepentingan</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Kepentingan</th>
                            <th>Bobot Kepentingan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bobotKepentingan as $kriteria => $bobot)
                            <tr>
                                <td>{{ $kriteria }}</td>
                                <td>{{ $kriterias->where('kriteria', $kriteria)->first()->kepentingan }}</td>
                                <td>{{ $bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>

                <h3 class="mt-4">Kesimpulan</h3>
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Nilai S</th>
                            <th>Nilai V</th>
                            <th>Kualitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($V as $id => $nilaiV)
                            <tr>
                                <td>{{ $alternatifs->find($id)->alteratif }}</td>
                                <td>{{ $S[$id] }}</td>
                                <td>{{ $nilaiV }}</td>
                                <td>{{ $kualitas[$id] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@endsection