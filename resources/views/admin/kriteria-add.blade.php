@extends('layouts.admin')

@section('title','Kriteria-add')

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
                <a href="/kriteria" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Kriteria</h1>
        </div>
       
        <div class="card my-4  card justify-content-center ">

        

            <div class="card-body ">
               
                <form action="/kriteria-add" method="post" enctype="multipart/form-data">

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
                        
                        <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <input name="kriteria" id="kriteria" type="text" class="form-control" placeholder="Masukkan Kriteria" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Nilai Kepentingan</label>
                                        <input name="kepentingan" id="kepentingan" type="number" class="form-control" placeholder="" required min="1" max="5">
                                    </div>                                    
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Goal/Benefit</label>
                                        <select class="form-control py-0" required="required" name="benefit" style="width: 100%">
                                            <option value="">Pilih</option>
                                            <option value="goal">Goal</option>
                                            <option value="benefit">Benefit</option>
                                        </select>
            
                                    </div>
                                </div>
                            </div>

                        <div>
                            <button  class="btn btn-icon icon-left btn-primary"  type="submit"><i class="fas fa-check"></i> Tambah</button>
                        </div>
                    
                </form>
            </div>
        </div>
    </section>
</div>

@endsection