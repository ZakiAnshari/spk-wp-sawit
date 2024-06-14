@extends('layouts.admin')

@section('title','Karyawan-Edit')

@section('content')
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/karyawan" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Karyawan</h1>
        </div>
        
        <div class="card my-4">
            
            <div class="card-body ">
                
                <form action="/karyawan-edit/{{$karyawans->slug}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="form-group ">
                                <label>Masukkan Nama</label>
                                <input  name="nama_karyawan" id="nama_karyawan" type="text" class="form-control"  value="{{ $karyawans->nama_karyawan }}"  required >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Masukkan Alamat</label>
                                <input  name="alamat" id="alamat" type="text" class="form-control"  value="{{ $karyawans->alamat }}"  required >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Masukkan No Hp</label>
                                <input  name="no_hp" id="no_hp" type="text" class="form-control"  value="{{ $karyawans->no_hp }}"  required >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control py-0" required="required" name="jenis_kelamin" style="width: 100%">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-6 ">
                            <div class="form-group ">
                                <label>Masukkan Nama</label>
                                <input  name="nama" id="nama" type="text" class="form-control"  value="{{ $karyawans->nama }}"  required >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Masukkan Alamat</label>
                                <input name="alamat" id="alamat" type="text" class="form-control" value="{{ $karyawans->alamat }}" required >
                            </div>
                        </div>
                    </div> --}}
                    <div div class="col-sm-12 col-md-7">
                        <button href="#" class="btn btn-icon icon-left btn-primary" type="submit">
                        <i class="far fa-edit"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection