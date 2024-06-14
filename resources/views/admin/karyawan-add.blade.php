@extends('layouts.admin')

@section('title','Karyawan-add')

@section('content')
<style>
    .form-group label{
        font-size: medium;
    }
</style>
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/karyawan" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Karyawan</h1>
        </div>
       
        <div class="card my-4  card justify-content-center ">

        

            <div class="card-body ">
               
                <form action="/karyawan-add" method="post" enctype="multipart/form-data">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @csrf
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama_karyawan" id="nama_karyawan" type="text" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama_karyawan') }}" required >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Masukkan Alamat</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" required >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Masukkan No Hp</label>
                                    <input name="no_hp" id="no_hp" type="number" class="form-control" placeholder="Masukkan Nomor Hp" value="{{ old('no_hp') }}" required >
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
                        <div div class="col-sm-12 col-md-7">
                            <button  class="btn btn-icon icon-left btn-primary"  type="submit"><i class="fas fa-check"></i> Tambah</button>
                        </div>
                    
                </form>
            </div>
        </div>
    </section>
</div>

@endsection