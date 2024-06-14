@extends('layouts.admin')

@section('title','Alternatif-add')

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
            <h1>Tambah Alternatif</h1>
        </div>
       
        <div class="card my-4  card justify-content-center ">

        

            <div class="card-body ">
               
                <form action="/alternatif-add" method="post" enctype="multipart/form-data">


                    @csrf
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label>Alternatif</label>
                                    <input name="alteratif" id="alteratif" type="text" class="form-control" placeholder="Masukkan Nama" value="{{ old('alteratif') }}" required >
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
                        <div div class="col-sm-12 col-md-7">
                            <button  class="btn btn-icon icon-left btn-primary"  type="submit"><i class="fas fa-check"></i> Tambah</button>
                        </div>
                    
                </form>
            </div>
        </div>
    </section>
</div>
 <!-- Include Bootstrap JS and dependencies -->
 
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection