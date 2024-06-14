@extends('layouts.admin')

@section('title','Alternatif-edit')

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
                <a href="/alternatif" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Alternatif</h1>
        </div>
       
        <div class="card my-4  card justify-content-center ">

        

            <div class="card-body ">
               
                <form action="/alternatif-edit/{{$alternatifs->slug}}" method="post" enctype="multipart/form-data">

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
                        
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Alternatif</label>
                                <input name="alteratif" id="alteratif" type="text" class="form-control" placeholder="Masukkan Kriteria" value="{{ $alternatifs->alteratif }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                @foreach ($kriterias as $index => $k)
                                    <div class="form-group">
                                        <label>{{ $k->kriteria }}</label>
                                        <select class="form-control py-0" required="required" name="k{{ $index + 1 }}" style="width: 100%">
                                            <option value="">Pilih</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                @endforeach
                                
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